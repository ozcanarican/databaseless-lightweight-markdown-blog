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
        $mail->SMTPDebug = true;
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
    } catch (Exception $e) {
        echo "Mail hata: {$mail->ErrorInfo}";
    }
}

if (isset($_POST['email']) && isset($_POST['isim']) && isset($_POST['mesaj'])) {
    mailAt($_POST['email'], $_POST['isim'], EMAILSUBJECT, $_POST['mesaj']);
} else {
    echo "Missing fields";
}
