<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:/Users/Maxime/vendor/autoload.php';


function tokenGen()
{
    $rtoken ="";
    $array_letters = array_merge(range('A', 'Z'),range('a', 'z'),range(0, 9));;
    for($i=0; $i<30; $i++){
        $rtoken .= $array_letters[array_rand($array_letters, 1)];
    }
    return $rtoken;
}

$token = tokenGen();

// @ts-ignore
$mail = new PHPMailer();                // @ignore

$mail->SMTPDebug = 2;                   // Enable verbose debug output
$mail->isSMTP();                        // Set mailer to use SMTP
$mail->Host       = 'ssl0.ovh.net;';    // Specify main SMTP server
$mail->SMTPAuth   = true;               // Enable SMTP authentication
$mail->Username   = 'postmaster@captair.paris';     // SMTP username
$mail->Password   = '8VHg2$v*25S%Cs3';         // SMTP password
$mail->SMTPSecure = 'ssl';              // Enable TLS encryption, 'ssl' also accepted
$mail->Port       = 465;                // TCP port to connect to
$mail->setFrom('noreply@captair.paris', 'captair.paris noreply');
$mail->addAddress('maxime.tardieu@gmail.com');

$mail->Subject = "Confirmation de votre adresse mail sur captair.paris";
$mail->Body = "<a href='http://localhost/confirmation.php?token=$token'>click to confirm email adress</a>";
$mail->AltBody = "This is the plain text version of the email content";

try {
    $mail->send();
    echo "Message has been sent successfully";

    //connect to db and add usage of token (password reset/acc confirmation)

    
} catch (Exception $e) {         // @ignore
    echo "Mailer Error: " . $mail->ErrorInfo;
}

?>