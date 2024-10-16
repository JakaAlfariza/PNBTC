<?php
class MEmail extends CI_Model
{
    public function send($link, $email, $nama_event, $penyelenggara, $tingkat_event, $tgl_event){
        //Konfugrasi email
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
        $this->email->from('no-reply@pnbcc@gmail.com','PNBCC');
        $this->email->to($email);
        $this->email->subject("[EVENT TERBARU!] ".$nama_event);
        $this->email->message(
        "Ada event baru nih ".$nama_event." yang di selenggarakan oleh ".$penyelenggara.", Mungkin event baru ini 
        menarik untuk kamu! jangan ragu untuk mendaftar, event ini tingkat ".$tingkat_event." loh.. & akan dilaksanakan
        pada ".strftime('%A %H:%M, %e %B %Y', strtotime($tgl_event)).". Yuk segera kunjugi website PNBCC untuk informasi lebih lanjut, pada link berikut ".$link);
 
        if ($this->email->send()){
         echo"Email Terkirim";
        }
        else{
         echo"Email gagal terikirm";
        }
    }

    public function sendotp($email, $otp){
        //Konfugrasi email
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

    }
}

?>