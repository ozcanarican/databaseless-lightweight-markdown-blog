<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'blogconf.php';

function mailAt($reply, $name, $konu, $mesaj)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = false;
        $mail->Host       = EMAILSERVER;                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = EMAILUSER;                     // SMTP username
        $mail->Password   = EMAILPASS;                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($reply, $name);
        $mail->addAddress(EMAIL);     // Add a recipient
        $mail->addReplyTo($reply, $name);

        // Content
        $mail->isHTML(true);                                // Set email format to HTML
        $mail->Subject = $konu;
        $mail->Body    = $mesaj;
        $mail->AltBody = $mesaj;

        $mail->send();
        //echo 'Mail yollandı';
    } catch (Exception $e) {
        //echo "Mail hata: {$mail->ErrorInfo}";
    }
}