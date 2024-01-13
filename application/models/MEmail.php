<?php
class MEmail extends CI_Model
{
    public function send($link,$email){
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
        $this->email->from('no-reply@PNBCC@gmail.com','PNBCC');
        $this->email->to($email);
        $this->email->subject("Verifikasi email");
        $this->email->message("Ada event baru nih yuk kunjugi link berikut ini ".$link);
 
        if ($this->email->send()){
         echo"Email Terkirim";
        }
        else{
         echo"failed";
        }
        // redirect('chalaman/tampil');
    }
}

?>