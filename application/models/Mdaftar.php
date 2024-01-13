<?php
class Mdaftar extends CI_Model
{
    
    function simpandaftar()
    {   

        if ($this->session->userdata('role') === 'admin') {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $nama = $this->input->post('nama');
            $password = $this->input->post('password');
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = $this->input->post('role');

            $data_to_insert = array(
                'username' => $username,
                'email' => $email,
                'nama' => $nama,
                'password' => $hashed_password,
                'role' => $role
            );

            $this->db->insert('user', $data_to_insert);

            echo "<script>alert('Data berhasil disimpan');</script>";
            redirect('cdaftar/tampilakun', 'refresh');
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $nama = $this->input->post('nama');
            $password = $this->input->post('password');
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $data_to_insert = array(
                'username' => $username,
                'email' => $email,
                'nama' => $nama,
                'password' => $hashed_password,
                'role' => 'user'
            );

            $this->db->insert('user', $data_to_insert);

            echo "<script>alert('Data berhasil disimpan');</script>";
            redirect('chalaman/login', 'refresh');
        }
    }


    function hapusakun($id)
    {
        $sql = "delete from user where id='" . $id . "'";
        $this->db->query($sql);
        redirect('cdaftar/tampilakun', 'refresh');
    }

    function tampilakun()
    {
        $logged_in_user_id = $this->session->userdata('id');

        $sql = "SELECT * FROM user WHERE id != $logged_in_user_id";
        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $hasil[] = $row;
            }
        } else {
            $hasil = "";
        }

        return $hasil;
    }

}
?>
