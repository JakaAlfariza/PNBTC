<?php
class Cpractice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasi();
        $this->load->model('mpractice');
    }

    public function section_test() {
        $id_user = $this->session->userdata('id_user');
        $credits = $this->mpractice->get_user_credits($id_user); // Assume this method gets the current user's credits

        if ($credits < 1) {
            $this->session->set_flashdata('error', 'Not enough Test Credits, please buy it first.');
            redirect('cuser/buytest');
        } else {
            // Deduct one credit
            $this->mpractice->deduct_user_credit($id_user);

            // Fetch a random practice bank of type "test"
            $bank = $this->mpractice->get_random_practice_bank_by_type();

            if (!$bank) {
                $this->session->set_flashdata('error', 'No practice banks of type "test" available.');
                redirect('cuser/practice');
            }

            $id_bank = $bank->id_bank;
            $tipe_bank = $bank->tipe_bank;
            $this->session->set_userdata('practice_bank_id', $id_bank);

            $this->session->set_userdata('id_user', $id_user); // Set user ID
            $this->session->set_userdata('id_bank', $id_bank); // Set bank ID
            $this->session->set_userdata('tipe_bank', $tipe_bank);
            
            // Load the first section based on the bank, ordered by part_section
            $section = $this->mpractice->get_first_section_by_bank($id_bank);
            if ($section) {
                $data['section'] = $section;

                // Initialize the question index
                $this->session->set_userdata('current_question_index', 0);

                $this->load->view('dashuser/practice/intro', $data);
            } else {
                // Handle case where no sections are found
                redirect('cpractice/complete');
            }
        }
    }



    public function section_intro() {
        $bank = $this->mpractice->get_random_practice_bank();

        if (!$bank) {
            $this->session->set_flashdata('error', 'No practice banks available.');
            redirect('cuser/practice');
        }

        $id_bank = $bank->id_bank;
        $tipe_bank = $bank->tipe_bank;
        $this->session->set_userdata('practice_bank_id', $id_bank);
        $this->session->set_userdata('id_user', $this->session->userdata('id_user')); // Ensure user ID is set
        $this->session->set_userdata('id_bank', $id_bank); // Set bank ID
        $this->session->set_userdata('tipe_bank', $tipe_bank);

        // Load the first section based on the bank, ordered by part_section
        $section = $this->mpractice->get_first_section_by_bank($id_bank);
        if ($section) {
            $data['section'] = $section;
            
            // Initialize the question index
            $this->session->set_userdata('current_question_index', 0);
            
            $this->load->view('dashUser/practice/intro', $data);
        } else {
            // Handle case where no sections are found
            redirect('cpractice/complete');
        }
    }

    public function end_session() {
        $this->session->unset_userdata('practice_bank_id');
        $this->session->unset_userdata('current_question_index'); // Clear question index as well
        echo json_encode(['status' => 'success']);
    }

    public function clear_session_and_redirect() {
        // Clear session data
        $this->session->unset_userdata('practice_bank_id');
        $this->session->unset_userdata('current_question_index');

        // Optionally set a flag or redirect to the desired page
        redirect('cuser/practice');
    }


    public function show_questions($id_section) {
        // Fetch the current question based on section and current question index from session
        $question_index = $this->session->userdata('current_question_index');
        $questions = $this->mpractice->get_questions_by_section($id_section);
        $section = $this->mpractice->get_section($id_section);
        $total_questions_until_section = $this->mpractice->get_total_questions_until_section($id_section);

        if (isset($questions[$question_index])) {
            $data['question'] = $questions[$question_index];
            $data['section'] = $this->mpractice->get_section($id_section);
            $data['is_last_question'] = ($question_index == count($questions) - 1);
            $data['timer'] = $section->timer;
            $data['question_number'] = $total_questions_until_section - (count($questions) - $question_index);
            $data['question_number'] = $data['question_number'] + 1;

            // Check the type of question
            if ($data['question']->tipe_soal == 'Reading') {
                $this->load->view('dashuser/practice/show_reading', $data);
            } else {
                $this->load->view('dashuser/practice/question', $data);
            }
        } else {
            // No more questions in this section, move to the next section
            $next_section = $this->mpractice->get_next_section($id_section);
            if ($next_section) {
                $this->session->set_userdata('current_question_index', 0); // Reset question index for new section
                redirect('cpractice/show_questions/' . $next_section->id_section);
            } else {
                $this->session->unset_userdata('practice_bank_id');        
                $this->session->unset_userdata('current_question_index');
                redirect('cpractice/complete');
            }
        }
    }

    public function next_question() {
        $question_index = $this->session->userdata('current_question_index');
        $id_section = $this->input->post('id_section');
        $selected_option = $this->input->post('selected_option');

        // Fetch questions for the current section
        $questions = $this->mpractice->get_questions_by_section($id_section);

        // Initialize user answers in session
        $user_answers = $this->session->userdata('user_answers');
        if (!$user_answers) {
            $user_answers = [];
        }

        // Get the current question
        $current_question = $questions[$question_index];

        // Check if the selected option is correct
        $is_correct = ($selected_option === $current_question->jawaban) ? 1 : 0;

        // Record the user's answer
        $user_answers[$current_question->id_soal] = [
            'selected_option' => $selected_option,
            'correct_option' => $current_question->jawaban,
            'tipe_soal' => $current_question->tipe_soal,
            'is_correct' => $is_correct
        ];

        $this->session->set_userdata('user_answers', $user_answers);

        if (isset($questions[$question_index + 1])) {
            // Increment the question index
            $this->session->set_userdata('current_question_index', $question_index + 1);
            echo json_encode(['id_section' => $id_section, 'status' => 'continue']);
        } else {
            // No more questions in this section, move to the next section
            $next_section = $this->mpractice->get_next_section($id_section);
            if ($next_section) {
                $this->session->set_userdata('current_question_index', 0); // Reset question index for new section
                echo json_encode(['id_section' => $next_section->id_section, 'status' => 'next_section']);
            } else {
                // No more sections, redirect to completion page
                echo json_encode(['status' => 'complete']);
            }
        }
    }



    public function show_section_intro($id_section) {
        // Fetch section details based on $id_section
        $section = $this->mpractice->get_section($id_section);
        
        if ($section) {
            $data['section'] = $section;
            
            // Check the type of section and load the appropriate view
            if ($section->tipe_section == 'Reading') {
                $this->load->view('dashuser/practice/intro_reading', $data);
            } else {
                $this->load->view('dashuser/practice/intro', $data);
            }
        } else {
            // Handle the case when the section does not exist
            show_404();
        }
    }

    public function complete() {
        // Get user answers from session
        $user_answers = $this->session->userdata('user_answers');
        $counts = $this->count_correct_answers($user_answers);

        // Extract variables from counts array
        $listening_correct = isset($counts['listening']) ? $counts['listening'] : 0;
        $reading_correct = isset($counts['reading']) ? $counts['reading'] : 0;

        // Get scores from the database
        $listening_score = $this->mpractice->get_listening_score($listening_correct);
        $reading_score = $this->mpractice->get_reading_score($reading_correct);

        // Calculate total_correct
        $total_correct = $listening_score + $reading_score;

        // Get additional data
        $id_user = $this->session->userdata('id_user');
        $id_bank = $this->session->userdata('id_bank'); // Assuming you have this in session
        $tipe_bank = $this->session->userdata('tipe_bank'); // Assuming you have this in session
        $tgl_ujian = date('Y-m-d H:i:s'); // Current date and time

        // Prepare data for insertion
        $data = array(
            'id_user' => $id_user,
            'id_bank' => $id_bank,
            'nilai_listening' => $listening_score,
            'nilai_reading' => $reading_score,
            'nilai_total' => $total_correct,
            'tgl_ujian' => $tgl_ujian,
            'tipe_ujian' => $tipe_bank
        );

        // Insert data into the hasil_ujian table
        $this->mpractice->insert_results($data);

        // Load the view with variables
        $this->load->view('dashUser/practice/complete', compact('listening_score', 'reading_score', 'total_correct'));
    }




    private function count_correct_answers($user_answers) {
        $counts = [
            'listening' => 0,
            'reading' => 0,
            'total' => 0
        ];

        foreach ($user_answers as $answer) {
            if ($answer['is_correct']) {
                if (strtolower($answer['tipe_soal']) == 'listening') {
                    $counts['listening']++;
                } elseif (strtolower($answer['tipe_soal']) == 'reading') {
                    $counts['reading']++;
                }
                $counts['total']++;
            }
        }

        return $counts;
    }




}
?>
