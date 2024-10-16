<?php
class Creset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('memail');
        $this->load->model('Motp');
    }
    
    public function otp() {
        // Determine which action is being performed
        $action = $this->input->post('action');
        $email = $this->input->post('email');

        if ($action === 'send') {
            // Handle OTP sending
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
                'required' => 'Input Your Email!',
                'valid_email' => 'Email Not Valid!',
            ]);

            if ($this->form_validation->run() === FALSE) {
                // Form validation failed, reload the view
                $data['konten'] = $this->load->view('auth/lupa_pass', '', TRUE);
                $this->load->view('auth/login_page', $data);
            } else {
                if ($this->Motp->isEmailRegistered($email)) {
                    $email = $this->input->post('email');
                    $otp = $this->generateOtp();

                    // Store OTP and expiration in the database
                    $this->Motp->storeOtp($email, $otp);

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
                    $this->email->from('no-reply@pnbtc@gmail.com','PNBTC');
                    $this->email->to($email);
                    $this->email->subject("[RESET PASSWORD] PNBTC Account");
                    $this->email->message('Your OTP is: ' . $otp);

                    if ($this->email->send()) {
                        // Inform the user and show verification section
                        $this->session->set_userdata('email', $email); // Store email for later use
                        $this->session->set_flashdata('success', 'OTP Has Been Send To Your Email.');
                        $data['konten'] = $this->load->view('auth/lupa_pass', '', TRUE);
                        $this->load->view('auth/login_page', $data);
                    } else {
                        echo "<script>alert('Send OTP Error.');</script>";
                        $data['konten'] = $this->load->view('auth/lupa_pass', '', TRUE);
                        $this->load->view('auth/login_page', $data);
                    }
                }else {
                    $this->session->set_flashdata('error', 'Email is not registered!');
                    $data['konten'] = $this->load->view('auth/lupa_pass', '', TRUE);
                    $this->load->view('auth/login_page', $data);
                }
            }
        } elseif ($action === 'verify') {
            // Handle OTP verification
            $this->form_validation->set_rules('otp', 'OTP', 'required|numeric|min_length[6]|max_length[6]',
            [
                'required'=>'Input OTP Code!',
                'min_length'=>'OTP Code is 6 number!',
                'max_length'=>'OTP Code cannot exceed 6 number!',
            ]);
            
            if ($this->form_validation->run() === FALSE) {
                // Validation failed, reload the view
                $data['konten'] = $this->load->view('auth/lupa_pass', '', TRUE);
                $this->load->view('auth/login_page', $data);
            } else {
                $otp = $this->input->post('otp');
                $email = $this->session->userdata('email'); // Retrieve email from session

                // Verify OTP
                if ($this->Motp->verifyOtp($email, $otp)) {
                    $data['konten'] = $this->load->view('auth/reset_pass', '', TRUE);
                    $this->load->view('auth/login_page', $data);
                } else {
                    $this->session->set_flashdata('error', 'Invalid OTP.');
                    $data['konten'] = $this->load->view('auth/lupa_pass', '', TRUE);
                    $this->load->view('auth/login_page', $data);
                }
            }
        }
    }

    private function generateOtp() {
        return rand(100000, 999999); // Generate a 6-digit OTP
    }

    public function resetPassword() {
    // Handle password reset
    $this->load->library('form_validation');
    $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[5]');
    
    if ($this->form_validation->run() === FALSE) {
        $data['konten'] = $this->load->view('auth/reset_pass', '', TRUE);
        $this->load->view('auth/login_page', $data);
    } else {
        $new_password = $this->input->post('new_password');
        $email = $this->session->userdata('email'); // Store email in session or other method

        // Update password in the database
        if ($this->Motp->updatePassword($email, $new_password)) {
            echo "<script>alert('Password Successfully Reset, Login In to Yout Account.');</script>";
            redirect('chalaman/login');
        } else {
            $this->session->set_flashdata('error', 'Reset Password Error');
            echo "<script>alert('Failed to reset password. Please try again.');</script>";
            $data['konten'] = $this->load->view('auth/reset_pass', '', TRUE);
            $this->load->view('auth/login_page', $data);
        }
    }
}
}
?>
