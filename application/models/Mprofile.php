<?php
class Mprofile extends CI_Model
{
    public function simpanprofile($id_user)
    {
        // Retrieve user input
        $email = $this->input->post('email');
        $nama = $this->input->post('nama');
        $new_password = $this->input->post('new_password');
        $repeat_password = $this->input->post('repeat_password');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $gender = $this->input->post('gender');
        $tipe_card = $this->input->post('tipe_card');
        $id_card = $this->input->post('id_card');
        $status = $this->input->post('status');

        // Retrieve existing user data
        $existing_data = $this->db->get_where('user', ["id_user" => $id_user])->row();

        if (!$existing_data) {
            $this->session->set_flashdata('error', 'User not found.');
            redirect('cprofile/tampilakun', 'refresh');
            return;
        }

        // Prepare data to update
        $data_to_update = [];

        // Check for changes and prepare data
        if ($existing_data->nama !== $nama) {
            $data_to_update['nama'] = $nama;
        }

        if ($existing_data->email !== $email) {
            // Check if new email already exists
            if ($this->db->where('email', $email)->where('id_user !=', $id_user)->count_all_results('user') > 0) {
                $this->session->set_flashdata('error', 'Email already exists.');
                redirect('cprofile/tampilakun', 'refresh');
                return;
            }
            $data_to_update['email'] = $email;
        }

        if ($existing_data->tgl_lahir !== $tgl_lahir) {
            $data_to_update['tgl_lahir'] = $tgl_lahir;
        }

        if ($existing_data->gender !== $gender) {
            $data_to_update['gender'] = $gender;
        }

        if ($existing_data->tipe_card !== $tipe_card) {
            $data_to_update['tipe_card'] = $tipe_card;
        }

        if ($existing_data->id_card !== $id_card) {
            $data_to_update['id_card'] = $id_card;
        }

        if ($existing_data->status !== $status) {
            $data_to_update['status'] = $status;
        }

        // Update user if there are changes
        if (!empty($data_to_update)) {
            $this->db->where('id_user', $id_user);
            $this->db->update('user', $data_to_update);

            $this->db->where('id_user', $id_user);
            $query = $this->db->get('user');
            $updated_user = $query->row_array();
            
            // Update session data
            $this->session->set_userdata([
                'nama' => $updated_user['nama'],
                'tipe_card' => $updated_user['tipe_card'],
                'tgl_lahir' => $updated_user['tgl_lahir'],
                'id_card' => $updated_user['id_card'],
                'gender' => $updated_user['gender'],
                'status' => $updated_user['status'],
                // Add other session variables as needed
            ]);
            $this->session->set_flashdata('success', 'Profile updated successfully');
            redirect('cprofile/tampilakun', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'No changes were made.');
            redirect('cprofile/tampilakun', 'refresh');
        }
    }

    // Mengambil value dari database
    function tampilakun()
    {
        $query = $this->db->get('user');
        return $query->result();
    }

    // Proses hapus akuun
    function hapusakun()
    {
        $id_user = $this->session->userdata('id_user');
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');

        echo "<script>alert('Account Successfully Deleted');</script>";
        $this->session->sess_destroy();
        redirect('chalaman/login', 'refresh');
    }

    function uploadfoto(){
        // Load upload library\
        $id_user = $this->session->userdata('id_user');
        $config['upload_path'] = './img_profile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048; // 2MB
        $config['file_name'] = $id_user . '_profile_photo';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profilePhoto')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('cprofile/tampilakun', 'refresh');
        } else {
            // Check if the user has an existing profile photo
            $existing_photo = $this->session->userdata('foto');
            if ($existing_photo && file_exists('./img_profile/' . $existing_photo)) {
                // Delete the old photo
                unlink('./img_profile/' . $existing_photo);
            }

            $uploadData = $this->upload->data();
            $file_name = $uploadData['file_name'];

            // Update user's profile photo in the database
            $this->db->where('id_user', $id_user);
            $this->db->update('user', ['foto' => $file_name]);

            // Update session data
            $this->session->set_userdata('foto', $file_name);
            $this->session->set_flashdata('success', 'Profile photo updated successfully.');
            redirect('cprofile/tampilakun', 'refresh');
        }
    }

    public function get_user_by_id($id_user) {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('user');  // Assuming your user table is named 'user'
        return $query->row();
    }

    public function update_password($id_user, $new_password) {
        $data = array(
            'password' => $new_password
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
    }
    
    public function simpanpassword($id_user,$new_password)
    {
        $id_user = $this->input->post('id_user');
        $current_password = $this->input->post('current_password');
        $new_password = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);

        $user = $this->Mprofile->get_user_by_id($id_user);

        if (password_verify($current_password, $user->password)) {
            $this->Mprofile->update_password($id_user, $new_password);
            $this->session->set_flashdata('success', 'Password updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Current password is incorrect.');
        }
        redirect('cprofile/tampilakun#password');
    }
}
?>
