<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include "makemail.php";






function tokenGen()
{
    $rtoken = "";
    $array_letters = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));;
    for ($i = 0; $i < 30; $i++) {
        $rtoken .= $array_letters[array_rand($array_letters, 1)];
    }
    return $rtoken;
}



function phpMailSender($token, $email, $typeofemail)
{
    // @ts-ignore
    $mail = new PHPMailer();                // @ignore

    $mail->SMTPDebug = 0;                   // Enable verbose debug output
    $mail->isSMTP();                        // Set mailer to use SMTP
    $mail->Host       = 'ssl0.ovh.net;';    // Specify main SMTP server
    $mail->SMTPAuth   = true;               // Enable SMTP authentication
    $mail->Username   = 'postmaster@captair.paris';     // SMTP username
    $mail->Password   = '8VHg2$v*25S%Cs3';         // SMTP password
    $mail->SMTPSecure = 'ssl';              // Enable TLS encryption, 'ssl' also accepted
    $mail->Port       = 465;                // TCP port to connect to
    $mail->setFrom('noreply@captair.paris', 'captair.paris noreply');
    $mail->addAddress($email);
    if ($typeofemail == 0) {
        $mail->Subject = "Confirmation de votre adresse mail sur captair.paris";
        $mail->Body = makemail($token);
        $mail->AltBody = "This is the plain text version of the email content";
    } else if ($typeofemail == 1) {
        $mail->Subject = "Changement de votre mot de passe captair.paris";
        $mail->Body = makemail($token);
        $mail->AltBody = "This is the plain text version of the email content";
    }
    try {
        $mail->send();
        echo "Message has been sent successfully";

        //connect to db and add usage of token (password reset/acc confirmation)


    } catch (Exception $e) {         // @ignore
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
