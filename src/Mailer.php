<?php

namespace Magento;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require dirname(dirname(__FILE__)) .'\vendor\autoload.php';

class Mailer
{
    public function send($content)
    {
        // setting phpmailer and some dummy input data
        $To = 'nandeeshyadav2@gmail.com';
        $Subject = 'test';
        $Host = 'smtp.gmail.com';
        $Username = 'nandeeshyadav6@gmail.com';
        $Password = '******';
        $Port = "587";

        $mail = new PHPMailer();
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host = $Host; // SMTP server
        $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
        // 1 = errors and messages
        // 2 = messages only
        $mail->SMTPAuth = true; // enable SMTP authentication
        //$mail->SMTPSecure = 'ssl'; //or tsl -> switched off
        $mail->Port = $Port; // set the SMTP port for the service server
        $mail->Username = $Username; // account username
        $mail->Password = $Password; // account password

        $mail->SetFrom($Username);
        $mail->Subject = $Subject;
        // if(!$content) return false;
        $mail->MsgHTML($content);
        $mail->AddAddress($To);

        return !$mail->Send()?false: true;
    }
}
