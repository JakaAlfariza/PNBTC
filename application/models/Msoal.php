<?php
class Msoal extends CI_Model
{
    //BANK SOAL
    public function simpanbanksoal()
    {
        $nama_bank = $this->input->post('nama_bank');
        $deskrip_bank = $this->input->post('deskrip_bank');
        $tipe_bank = $this->input->post('tipe_bank');
    
        $data=array(
            'nama_bank'=>$nama_bank,
            'deskrip_bank'=>$deskrip_bank,
            'tipe_bank'=>$tipe_bank,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        );   
        
        $this->db->insert('bank_soal',$data);
        $this->session->set_flashdata('success', 'Question bank successfully created');
        redirect('csoal/tampilbanksoal','refresh');
    }

    public function get_all_banks() {
        $this->db->select('*');
        $query = $this->db->get('bank_soal');
        return $query->result();
    }

    public function get_bank_by_id($id_bank) {
        $this->db->where('id_bank', $id_bank);
        $query = $this->db->get('bank_soal');
        return $query->row();
    }

    public function delete_bank($id_bank) {
        $this->db->where('id_bank', $id_bank);
        $this->db->delete('bank_soal');
        $this->session->set_flashdata('success', 'Question bank successfully deleted');
    }

    function updatebank($id_bank)
    {
        $nama_bank = $this->input->post('nama_bank');
        $deskrip_bank = $this->input->post('deskrip_bank');
        $tipe_bank = $this->input->post('tipe_bank');
    
        $data=array(
            'nama_bank'=>$nama_bank,
            'deskrip_bank'=>$deskrip_bank,
            'tipe_bank'=>$tipe_bank,
            'updated_at' => date('Y-m-d'),
        );

        $this->db->where('id_bank', $id_bank);
        $response = $this->db->update('bank_soal', $data);
        $this->session->set_flashdata('success', 'Question bank updated successfully');
        redirect('csoal/tampilbanksoal','refresh');
    }

    //SECTION
    public function get_sections_by_bank($id_bank) {
        $this->db->select('section.*, COUNT(soal.id_soal) as total_questions');
        $this->db->from('section');
        $this->db->join('soal', 'soal.id_section = section.id_section', 'left');
        $this->db->where('section.id_bank', $id_bank);
        $this->db->group_by('section.id_section');
        $query = $this->db->get();
        return $query->result();
    }

    public function simpansection() {
        // Convert timer to HH:MM:SS or set to NULL if not provided
        $timer_in_seconds = $this->input->post('timer');
        $formatted_timer = null;
        if (!empty($timer_in_seconds)) {
            $formatted_timer = $this->secondsToTime($timer_in_seconds);
        }

        // Set deskrip_section based on nama_section
        $nama_section = $this->input->post('nama_section');
        $deskrip_section = '';
        $part_section = '';
        switch ($nama_section) {
            case 'Part 1: Photographs':
                $part_section = 1;
                $deskrip_section = 'For each question in this part, you will hear four statements about a picture. When you hear the statements, you must select the one statement that best describes what you see in the picture and mark your answer. <strong>The statements will not be printed and will be spoken only one time.</strong>';
                break;
            case 'Part 2: Question-Response':
                $part_section = 2;
                $deskrip_section = 'You will hear a question or statement and three responses spoken in English. <strong>They will not be printed and will be spoken only one time.</strong> Select the best response to the question or statement and mark the letter (A), (B), or (C).';
                break;
            case 'Part 3: Conversations':
                $part_section = 3;
                $deskrip_section = 'You will hear some conversations between two or more people. You will be asked to answer three questions about what the speakers say in each conversation. Select the best response to each question and mark the letter (A), (B), (C), or (D). <strong>The conversations will not be printed and will be spoken only one time.</strong>';
                break;
            case 'Part 4: Talk':
                $part_section = 4;
                $deskrip_section = 'You will hear some talks given by a single speaker. You will be asked to answer three questions about what the speaker says in each talk. Select the best response to each question and mark the letter (A), (B), (C), or (D). <strong>The talks will not be printed and will be spoken only one time.</strong>';
                break;
            case 'Part 5: Incomplete Sentences':
                $part_section = 5;
                $deskrip_section = 'A word or phrase is missing in each of the sentences below. Four answer choices are given below each sentence. Select the best answer to complete the sentence. Then mark the letter (A), (B), (C), or (D).';
                break;
            case 'Part 6: Text Completion':
                $part_section = 6;
                $deskrip_section = 'Read the texts that follow. A word, phrase, or sentence is missing in parts of each text. Four answer choices for each question are given below the text. Select the best answer to complete the text. Then mark the letter (A), (B), (C), or (D).';
                break;
            case 'Part 7: Reading Comprehension':
                $part_section = 7;
                $deskrip_section = 'In this part you will read a selection of texts, such as magazine and newspaper articles, e-mails, and instant messages. Each text or set of texts is followed by several questions. Select the best answer for each question and mark the letter (A), (B), (C), or (D).';
                break;
        }

        // Handle image upload if needed
        $image_name = null;
        if ($this->input->post('add_media') === 'image') {
            $config['upload_path'] = './section_material/images';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048; // Set max size in KB
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar_section')) {
                // Capture upload errors
                $upload_error = $this->upload->display_errors();
                log_message('error', 'Image upload error: ' . $upload_error);
                $this->session->set_flashdata('error', 'Image upload failed: ' . $upload_error);
                redirect('csoal/tampilsection/' . $this->input->post('id_bank'));
            } else {
                $image_data = $this->upload->data();
                $image_name = $image_data['file_name'];
            }
        }

        $this->upload->initialize(array());

        // Handle audio upload if section type is Listening
        $audio_name = null;
        if ($this->input->post('tipe_section') === 'Listening') {
            $config['upload_path'] = './section_material/audio';
            $config['allowed_types'] = 'mp3|wav';
            $config['max_size'] = 2048; // Set max size in KB
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('audio_section')) {
                // Capture upload errors
                $upload_error = $this->upload->display_errors();
                log_message('error', 'Audio upload error: ' . $upload_error);
                $this->session->set_flashdata('error', 'Audio upload failed: ' . $upload_error);
                redirect('csoal/tampilsection/' . $this->input->post('id_bank'));
            } else {
                $audio_data = $this->upload->data();
                $audio_name = $audio_data['file_name'];
            }
        }

        // Prepare data for database insertion
        $data = [
            'id_bank' => $this->input->post('id_bank'),
            'nama_section' => $nama_section,
            'deskrip_section' => $deskrip_section,
            'timer' => $formatted_timer,
            'tipe_section' => $this->input->post('tipe_section'),
            'gambar_section' => $image_name,
            'audio_section' => $audio_name,
            'part_section' => $part_section,
        ];

        // Insert data into the database
        if ($this->db->insert('section', $data)) {
            $this->session->set_flashdata('success', 'Section successfully created');
        } else {
            $this->session->set_flashdata('error', 'Failed to create section');
        }

        redirect('csoal/tampilsection/' . $this->input->post('id_bank'));
    }

    private function secondsToTime($seconds) {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $seconds = $seconds % 60;
        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }


    public function get_all_section() {
        $this->db->select('*');
        $query = $this->db->get('section');
        return $query->result();
    }

    public function get_section_by_id($id_section) {
        $this->db->where('id_section', $id_section);
        $query = $this->db->get('section');
        return $query->row();
    }

    public function delete_section($id_section) {
        $this->db->where('id_section', $id_section);
        $this->db->delete('section');
        $this->session->set_flashdata('success', 'Section successfully deleted');
    }

    public function updatesection($id_section, $id_bank) {
        // Convert timer to HH:MM:SS
        $timer_in_seconds = $this->input->post('timer');
        $formatted_timer = $this->secondsToTime($timer_in_seconds);

        // Check if timer is 0 and set to null if true
        $formatted_timer = ($timer_in_seconds == 0) ? null : $formatted_timer;

        // Fetch the existing data for the section
        $existing_section = $this->get_section_by_id($id_section);

        // Handle image upload if needed
        $image_name = $existing_section->gambar_section;
        if ($this->input->post('add_image_checkbox')) {
            $config['upload_path'] = './section_material/images';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar_section')) {
                // Delete the old image file
                if ($image_name) {
                    unlink('./section_material/images' . $image_name);
                }

                $image_data = $this->upload->data();
                $image_name = $image_data['file_name'];
            }
        }

        $this->upload->initialize(array());

        // Handle audio upload if section type is Listening
        $audio_name = $existing_section->audio_section;
        if ($this->input->post('tipe_section') === 'Listening') {
            $config['upload_path'] = './section_material/audio';
            $config['allowed_types'] = 'mp3|wav';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('audio_section')) {
                // Delete the old audio file
                if ($audio_name) {
                    unlink('./section_material/audio' . $audio_name);
                }

                $audio_data = $this->upload->data();
                $audio_name = $audio_data['file_name'];
            }
        }

        // Prepare data for database update
        $data = [
            'timer' => $formatted_timer,
            'gambar_section' => $image_name,
            'audio_section' => $audio_name,
        ];

        // Fetch the current section data to compare
        $current_section_data = $this->db->get_where('section', ['id_section' => $id_section])->row_array();

        // Check for changes
        if ($data !== array_intersect_assoc($data, $current_section_data)) {
            $this->db->where('id_section', $id_section);
            $this->db->update('section', $data);
            $this->session->set_flashdata('success', 'Section updated successfully');
        } else {
            $this->session->set_flashdata('success', 'No changes made to the section');
        }
    }

    //SOAL
    public function get_bank_id_by_section($id_section) {
        $this->db->select('id_bank');
        $this->db->from('section');
        $this->db->where('id_section', $id_section);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->id_bank;
        } else {
            return null;
        }
    }

    public function get_all_soal_by_section($id_section) {
        $this->db->where('id_section', $id_section);
        $query = $this->db->get('soal'); // Replace with your actual table name
        return $query->result();
    }

    public function get_tipe_section($id_section) {
        $this->db->where('id_section', $id_section);
        $query = $this->db->get('section'); 

        return $query->row();
    }

    public function simpansoal() {
        // Retrieve data from the form
        $id_section = $this->input->post('id_section');
        $tipe_soal = $this->input->post('tipe_soal');
        $pertanyaan = $this->input->post('pertanyaan');
        $a = $this->input->post('a');
        $b = $this->input->post('b');
        $c = $this->input->post('c');
        $d = $this->input->post('d');
        $jawaban = $this->input->post('jawaban');

        // Initialize variables
        $image_name = null;
        $audio_name = null;

        // Default values for options if they are null
        $options = [
            'a' => 'Option A',
            'b' => 'Option B',
            'c' => 'Option C',
            'd' => 'Option D'
        ];

        // Update options with provided values if they are not empty
        if (!empty($a)) $options['a'] = $a;
        if (!empty($b)) $options['b'] = $b;
        if (!empty($c)) $options['c'] = $c;
        if (!empty($d)) $options['d'] = $d;

        // Assign updated options
        $a = $options['a'];
        $b = $options['b'];
        $c = $options['c'];
        $d = $options['d'];
        
        // Upload image if present
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './soal_material/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                $image_data = $this->upload->data();
                $image_name = $image_data['file_name'];
            }
        }

        // Reset upload configuration for audio
        $this->upload->initialize(array());

        // Upload audio if present and if the question type is Listening
        if ($tipe_soal === 'Listening' && !empty($_FILES['audio']['name'])) {
            $config['upload_path'] = './soal_material/audio/';
            $config['allowed_types'] = 'mp3|wav';
            $this->upload->initialize($config);

            if ($this->upload->do_upload('audio')) {
                $audio_data = $this->upload->data();
                $audio_name = $audio_data['file_name'];
            }
        }

        // Prepare data for insertion
        $data = array(
            'tipe_soal' => $tipe_soal,
            'pertanyaan' => $pertanyaan,
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'd' => $d,
            'jawaban' => $jawaban,
            'id_section' => $id_section,
            'gambar' => $image_name,
            'audio' => $audio_name,
        );

        // Insert data into database
        if ($this->db->insert('soal', $data)) {
            $this->session->set_flashdata('success', 'Question successfully added!');
            return true;
        } else {
            $this->session->set_flashdata('error', 'Failed to add question.');
            return false;
        }
    }

    public function delete_soal($id_soal) {
        $this->db->where('id_soal', $id_soal);
        $this->db->delete('soal');
        $this->session->set_flashdata('success', 'Question successfully deleted');
    }

    public function get_soal_by_id($id_soal) {
        $this->db->where('id_soal', $id_soal);
        $query = $this->db->get('soal');
        return $query->row();
    }

    public function updatesoal($id_soal, $id_section) {
        // Load the upload library
        $this->load->library('upload');
        
        // Retrieve data from the form
        $id_soal = $this->input->post('id_soal');
        $id_section = $this->input->post('id_section');
        $tipe_soal = $this->input->post('tipe_soal');
        $pertanyaan = $this->input->post('pertanyaan');
        $a = $this->input->post('a');
        $b = $this->input->post('b');
        $c = $this->input->post('c');
        $d = $this->input->post('d');
        $jawaban = $this->input->post('jawaban');

        // Retrieve existing image and audio filenames from the database
        $this->db->select('gambar, audio');
        $this->db->from('soal');
        $this->db->where('id_soal', $id_soal);
        $query = $this->db->get();
        $result = $query->row();

        $image_name = $result->gambar;
        $audio_name = $result->audio;

        // Default values for options if they are null
        $options = [
            'a' => 'Option A',
            'b' => 'Option B',
            'c' => 'Option C',
            'd' => 'Option D'
        ];

        // Update options with provided values if they are not empty
        if (!empty($a)) $options['a'] = $a;
        if (!empty($b)) $options['b'] = $b;
        if (!empty($c)) $options['c'] = $c;
        if (!empty($d)) $options['d'] = $d;

        // Assign updated options
        $a = $options['a'];
        $b = $options['b'];
        $c = $options['c'];
        $d = $options['d'];
        
        // Upload new image if present
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './soal_material/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar')) {
                // Delete the old image file if it exists
                if ($image_name && file_exists('./soal_material/images/' . $image_name)) {
                    unlink('./soal_material/images/' . $image_name);
                }
                $image_data = $this->upload->data();
                $image_name = $image_data['file_name'];
            } else {
                // Handle upload error
                $this->session->set_flashdata('error', 'Image upload error: ' . $this->upload->display_errors());
                return false;
            }
        }

        // Reset upload configuration for audio
        $this->upload->initialize(array());

        // Upload new audio if present and if the question type is Listening
        if ($tipe_soal === 'Listening' && !empty($_FILES['audio']['name'])) {
            $config['upload_path'] = './soal_material/audio/';
            $config['allowed_types'] = 'mp3|wav';
            $this->upload->initialize($config);

            if ($this->upload->do_upload('audio')) {
                // Delete the old audio file if it exists
                if ($audio_name && file_exists('./soal_material/audio/' . $audio_name)) {
                    unlink('./soal_material/audio/' . $audio_name);
                }
                $audio_data = $this->upload->data();
                $audio_name = $audio_data['file_name'];
            } else {
                // Handle upload error
                $this->session->set_flashdata('error', 'Audio upload error: ' . $this->upload->display_errors());
                return false;
            }
        }

        // Prepare data for update
        $data = array(
            'tipe_soal' => $tipe_soal,
            'pertanyaan' => $pertanyaan,
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'd' => $d,
            'jawaban' => $jawaban,
            'id_section' => $id_section,
            'gambar' => $image_name,
            'audio' => $audio_name,
        );

        // Update the record
        $this->db->where('id_soal', $id_soal);
        $update_status = $this->db->update('soal', $data);

        // Check if update was successful
        if ($update_status) {
            $this->session->set_flashdata('success', 'Question successfully updated!');
            return true;
        } else {
            // Log and display the error
            $error = $this->db->error();
            $this->session->set_flashdata('error', 'Failed to update question.');
            return false;
        }
    }

}
?>
