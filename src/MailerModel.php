<?php

namespace Magento;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require dirname(dirname(__FILE__)) .'\vendor\autoload.php';
require dirname(dirname(__FILE__)) .'../constants.php';
class Mailer
{
    public function send($content)
    {

        $mail = new PHPMailer();
        $mail->IsSMTP(); // telling the class to use SMTP
        $mail->Host = Host; // SMTP server
        $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
        // 1 = errors and messages
        // 2 = messages only
        $mail->SMTPAuth = true; // enable SMTP authentication
        //$mail->SMTPSecure = 'ssl'; //or tsl -> switched off
        $mail->Port = Port; // set the SMTP port for the service server
        $mail->Username = Username; // account username
        $mail->Password = Password; // account password

        $mail->SetFrom(Username);
        $mail->Subject = Subject;
        // if(!$content) return false;
        $mail->MsgHTML($content);
        $mail->AddAddress(to);

        return $mail->Send()?true: false;
    }
}
