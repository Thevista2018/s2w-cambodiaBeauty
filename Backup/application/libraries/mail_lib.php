<?php

class Mail_lib
{

    var $sender_name = 'Info Myanmarhoreca';
    var $sender_email = 'info@myanmarbuilddecor.com';
    var $bcc_email = 'info@myanmarbuilddecor.com';

    ///////////////////////////////////////////////// Construct /////////////////////////////////////////////////
    function __construct()
    {
        header ('Content-type: text/html; charset=utf-8');
    }

    ///////////////////////////////////////////////// Send : E-mail /////////////////////////////////////////////////
    function sendEmail($emailto=null, $subject=null, $message=null, $emailfrom=null, $sendername=null)
    {
        if (empty($emailto) || empty($subject) || empty($message))
            return false;

        if ($emailfrom)
            $this->sender_email = $emailfrom;
        if ($sendername)
            $this->sender_name = $sendername;

        /* -- Content-type header -- */
        $headers = "MIME-Version: 1.0 \r\n" ;
        $headers .= "Content-type: text/html; charset=utf-8 \r\n" ;

        /* -- Additional header -- */
        if ($emailfrom && $sendername)
            $headers .= "From: ".$this->sender_name." <".$this->sender_email.">" . "\r\n";
        else if ($emailfrom)
            $headers .= "From: ".$this->sender_email."\r\n";
        else
            $headers .= "From: ".$this->sender_name." <".$this->sender_email.">" . "\r\n";
//        $header .= "Bcc: ".$this->bcc_email. "\r\n";

        // $headers = "From: info@myanmarbuilddecor.com" . "\r\n";
        $headers = "From: info@myanmarbuilddecor.com" . "\r\n" ."CC: info@myanmarbuilddecor.com";

//        ini_set("sendmail_from", "info@myanmarhoreca.com");

            require_once APPPATH . 'third_party/class.phpmailer.php';
            require_once APPPATH . 'third_party/class.smtp.php';
            $mail = new PHPMailer;
            $mail->SMTPDebug = 0;
            $mail->CharSet = "utf-8";
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = "mail.myanmarbuilddecor.com";
            $mail->Port = 25;
            $mail->Username = "info@myanmarbuilddecor.com";
            $mail->Password = "TheV1st@";

            $mail->SetFrom("info@myanmarbuilddecor.com" , "Myanmar Builddecor");
            $mail->AddAddress("info@icvex.com");
            $mail->AddCC($emailfrom,$sendername);
            $mail->Subject = 'Myanmar Builddecor : '. $subject;


            $mail->MsgHTML( $message );
            $sendEmail = $mail->Send();

            if( $sendEmail == true ){
                return 1;
            }else{
                 return 0;
            }

        // if (mail($emailto, $subject, $message, $headers))
        //     return 1;
        // else
        //     return 0;



    }

}

/* End of file mail_lib.php */
/* Location: ./application/libraries/mail_lib.php */
