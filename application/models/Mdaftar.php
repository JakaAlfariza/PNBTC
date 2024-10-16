<?php
class Mdaftar extends CI_Model
{
    
    function simpandaftar()
    {   
        //Cek siapa yang melakukan daftar
        if ($this->session->userdata('role') === 'admin') {
            $email = $this->input->post('email');
            $nama = $this->input->post('nama');
            $password = $this->input->post('password');
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $gender = $this->input->post('gender');
            $tipe_card = $this->input->post('tipe_card');
            $id_card = $this->input->post('id_card');
            $role = $this->input->post('role');

            $data_to_insert = array(
                'email' => $email,
                'nama' => $nama,
                'password' => $hashed_password,
                'gender' => $gender,
                'tipe_card' => $tipe_card,
                'id_card' => $id_card,
                'role' => $role, //jika admin maka sesuai input
                'foto' => 'default.jpg',
            );

            $this->db->insert('user', $data_to_insert);

            $this->session->set_flashdata('success', 'Account Successfully Created.');
            redirect('cdaftar/tampilakun', 'refresh');
        } else {
            $email = $this->input->post('email');
            $nama = $this->input->post('nama');
            $gender = $this->input->post('gender');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $password = $this->input->post('password');
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $data_to_insert = array(
                'email' => $email,
                'nama' => $nama,
                'gender' => $gender,
                'tgl_lahir' => $tgl_lahir,
                'password' => $hashed_password,
                'role' => 'user' //jika bukan admin, default 'user'
            );

            $this->db->insert('user', $data_to_insert);

            $this->session->set_flashdata('success', 'Account Successfully Created, Please Login.');
            redirect('chalaman/login', 'refresh');
        }
    }

    //Admin only
    function hapusakun($id_user)
    {
        $sql = "delete from user where id_user='" . $id_user . "'";
        $this->db->query($sql);
        $this->session->set_flashdata('success', 'Account Successfully Deleted.');
        redirect('cdaftar/tampilakun', 'refresh');
    }

    //Admin only
    function tampilakun()
    {
        $id_user = $this->session->userdata('id_user');

        $sql = "SELECT * FROM user WHERE id_user != $id_user";
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

    function getakun($id_user) 
    {
        $this->db->select('*')->from('user')->where('id_user',$id_user);
        $data = $this->db->get()->result();

        echo json_encode($data);
        
    }


    public function get_user_by_id($id_user) {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('user');  // Assuming your user table is named 'user'
        return $query->row();
    }

    public function updateakun($id_user)
    {
        // Get form data
        $data = $this->input->post();
        
        // Fetch the current record from the database
        $current_data = $this->db->get_where('user', array('id_user' => $id_user))->row_array();

        if (!$current_data) {
            // Handle the case where the user is not found
            $this->session->set_flashdata('error', 'User not found.');
            redirect('cdaftar/tampilakun', 'refresh');
            return;
        }

        // Prepare an array to hold the updated fields
        $update_data = [];

        // Loop through form data and update only fields that are provided
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                // Check for uniqueness constraints
                if ($key == 'email') {
                    $this->db->where('email', $value);
                    $this->db->where('id_user !=', $id_user); // Exclude the current user
                    $email_exists = $this->db->count_all_results('user') > 0;

                    if ($email_exists) {
                        // Email is not unique
                        $this->session->set_flashdata('error', 'Email already exists!');
                        redirect('cdaftar/tampilakun', 'refresh');
                        return;
                    }
                }

                if ($key == 'id_card') {
                    $this->db->where('id_card', $value);
                    $this->db->where('id_user !=', $id_user); // Exclude the current user
                    $id_card_exists = $this->db->count_all_results('user') > 0;

                    if ($id_card_exists) {
                        // ID card is not unique
                        $this->session->set_flashdata('error', 'ID Card already exists!');
                        redirect('cdaftar/tampilakun', 'refresh');
                        return;
                    }
                }

                // Check if password needs to be hashed
                if ($key == 'password') {
                    $update_data[$key] = password_hash($value, PASSWORD_BCRYPT);
                } else {
                    // Update data array with the new value
                    $update_data[$key] = $value;
                }
            } else {
                // If field is empty, keep the existing value from the current data
                if (array_key_exists($key, $current_data)) {
                    $update_data[$key] = $current_data[$key];
                }
            }
        }

        // Ensure 'id_user' is not included in the update data
        unset($update_data['id_user']);
        
        // Prepare the condition to specify which record to update
        $this->db->where('id_user', $id_user);

        // Update the user data
        $response = $this->db->update('user', $update_data);

        if ($response) {
            // Set a success message and redirect
            $this->session->set_flashdata('success', 'Account successfully updated.');
        } else {
            // Set an error message
            $this->session->set_flashdata('error', 'Failed to update account.');
        }

        // Redirect to the desired page
        redirect('cdaftar/tampilakun', 'refresh');
    }

}
?>
