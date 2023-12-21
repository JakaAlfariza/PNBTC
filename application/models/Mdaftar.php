<?php
    class Mdaftar extends CI_Model
    {
       function simpandaftar()
        {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $role = $this->input->post('role');

            // Cek email atau username apakah sudah ada
            $email_exists = $this->isEmailExists($email);
            $username_exists = $this->isUsernameExists($username);

            if ($email_exists || $username_exists) {
                $data['email'] = $email;
                $data['username'] = $username;

                if ($email_exists) {
                    $data['email_error'] = 'Email sudah terdaftar.';
                }
                if ($username_exists) {
                    $data['username_error'] = 'Username sudah terdaftar.';
                }

                // If there is an error and the role is 'admin', load the 'cdaftar/tampilakun' view
                if ($role === 'admin') {
                    $tampilakun['hasil'] = $this->tampilakun();
                    $data['konten'] = $this->load->view('daftar_admin', $data, TRUE);
                    $data['table'] = $this->load->view('daftar_table', $tampilakun, TRUE);
                    $this->load->view('vadmin', $data);
                } else {
                    // If the role is not 'admin', load the 'daftar' view with error messages
                    $this->load->view('daftar', $data);
                }
            } else {
                // Data di input
                $data_to_insert = array(
                    'username' => $username,
                    'email' => $email,
                    'password' => $hashed_password,
                    'role' => ($role === 'admin') ? 'admin' : 'user' // Set the role from the form
                );

                $this->db->insert('user', $data_to_insert);

                // If the role is 'admin', redirect to 'cdaftar/tampilakun'
                
                if ($role === 'admin') {
                    redirect('cdaftar/tampilakun', 'refresh');
                } else {
                    echo "<script>alert('Data berhasil disimpan');</script>";
                    redirect('chalaman/login', 'refresh');
                }
            }
        }

        // Function Cek email apakah sudah ada
        private function isEmailExists($email)
        {
            $this->db->where('email', $email);
            $query = $this->db->get('user');

            return $query->num_rows() > 0;
        }

        // Function Cek username apakah sudah ada
        private function isUsernameExists($username)
        {
            $this->db->where('username', $username);
            $query = $this->db->get('user');

            return $query->num_rows() > 0;
        }

        function hapusakun($id)
        {
            $sql="delete from user where id='".$id."'";
            $this->db->query($sql);
            redirect('cdaftar/tampilakun','refresh');    
        }

        function tampilakun()
        {
            $sql = "select * from user";
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
