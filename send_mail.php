<?php
require 'mailer/class.phpmailer.php';
$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'janaki@webindia.com'; // SMTP username
    $mail->Password = 'Thiloshanth@123'; // SMTP password
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to

    // Email content and recipients
    $mail->setFrom('janaki@webindia.com', 'Your Name');
    $mail->addAddress('janaki@webindia.com', 'Recipient Name');
    $mail->Subject = 'Test';
    $mail->Body = 'First Mail';

    // Send email
    if ($mail->send()) {
        echo 'Email sent successfully';
    } else {
        echo 'Error: ' . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
