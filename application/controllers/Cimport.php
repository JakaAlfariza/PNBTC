<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

class Cimport extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Mimport');
    }

    private function buatpwd() {
        $kata = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
        $password = substr(str_shuffle($kata), 0, 6);
        return $password;
    }

    public function import() {
    if (isset($_FILES['upload_file']) && $_FILES['upload_file']['error'] == 0) {
        $upload_file = $_FILES['upload_file']['name'];
        $extension = pathinfo($upload_file, PATHINFO_EXTENSION);

        // Load the appropriate reader based on file extension
        if ($extension == 'csv') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else if ($extension == 'xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
        $sheetdata = $spreadsheet->getActiveSheet()->toArray();
        $sheetcount = count($sheetdata);

        if ($sheetcount > 1) {
            $data = array();
            $duplicate_entries = array();
            for ($i = 1; $i < $sheetcount; $i++) {
                $email = isset($sheetdata[$i][0]) ? $sheetdata[$i][0] : null;
                $nama = isset($sheetdata[$i][1]) ? $sheetdata[$i][1] : null;
                $gender = isset($sheetdata[$i][2]) ? $sheetdata[$i][2] : null;
                $tgl_lahir_excel = isset($sheetdata[$i][3]) ? $sheetdata[$i][3] : null;

                // Convert date format from Excel (01/01/2001) to YYYY-MM-DD
                $tgl_lahir_php = date_create_from_format('d/m/Y', $tgl_lahir_excel);
                $tgl_lahir_formatted = $tgl_lahir_php ? $tgl_lahir_php->format('Y-m-d') : null;

                // Ensure that name, email, and date of birth are not empty
                if (!empty($nama) && !empty($email) && !empty($tgl_lahir_formatted)) {
                    // Check if email already exists
                    if ($this->Mimport->is_email_duplicate($email)) {
                        $duplicate_entries[] = "Email: $email";
                        // Set email to null if duplicate
                        $email = null;
                    } else {
                        // Generate password and hash it
                        $plain_password = $this->buatpwd();
                        $hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);

                        $data[] = array(
                            'nama' => $nama,
                            'email' => $email,
                            'gender' => $gender,
                            'tgl_lahir' => $tgl_lahir_formatted, // Using format YYYY-MM-DD
                            'password' => $hashed_password, // Using hashed password
                            'foto' => 'default.jpg',
                            'role' => 'user',
                            'credits' => 1,
                        );

                        // Send email with plain password only if email is not null
                        if (!is_null($email)) {
                            $this->send_password_email($email, $plain_password);
                        }
                    }
                }
            }

            if (!empty($data)) {
                foreach ($data as $row) {
                    // Insert each row individually to handle duplicates gracefully
                    $insertdata = $this->db->insert('user', $row);

                    if (!$insertdata && !is_null($row['email'])) {
                        $duplicate_entries[] = "Email: {$row['email']}";
                    }
                }

                if (empty($duplicate_entries)) {
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
                } else {
                    $duplicates = implode('<br>', $duplicate_entries);
                    $this->session->set_flashdata('warning', 'Data berhasil ditambahkan dengan beberapa duplikasi: <br>' . $duplicates);
                }
            } else {
                $this->session->set_flashdata('error', 'Tidak ada data yang valid untuk diimpor');
            }
        } else {
            $this->session->set_flashdata('error', 'File tidak memiliki cukup baris untuk diimpor');
        }
    } else {
        $this->session->set_flashdata('error', 'Tidak ada file yang dipilih atau terjadi kesalahan saat mengunggah file');
    }

    redirect('cdaftar/tampilakun');
}

private function send_password_email($email, $password) {
    $this->load->library('email');

    $config['useragent'] = "codeigniter";
    $config['mailpath'] = "usr/bin/sendmail";
    $config['protocol'] = "smtp";
    $config['smtp_host'] = "smtp.gmail.com";
    $config['smtp_port'] = "465";
    $config['smtp_user'] = "imadeadianugrah@gmail.com";
    $config['smtp_pass'] = "lshh qmzz ympp vmhe";
    $config['smtp_crypto'] = "ssl";
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";
    $config['smtp_timeout'] = "30";
    $config['wordwrap'] = "TRUE";

    $this->email->initialize($config);
    $this->email->from('no-reply@pnbtc@gmail.com', 'PNBTC');
    $this->email->to($email);
    $this->email->subject("[New Account] PNBTC Account Password");
    $this->email->message("Your account has been created. Your password is: $password");

    if (!$this->email->send()) {
        log_message('error', 'Email failed to send to: ' . $email);
    }
}

}
?>
