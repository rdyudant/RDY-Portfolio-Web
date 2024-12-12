<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Pastikan path ini benar, tergantung instalasi Composer Anda.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Server SMTP Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'pasukanrdy01@gmail.com'; // Ganti dengan email Gmail Anda
        $mail->Password = 'qsrz azcp ciur xzkn'; // Ganti dengan App Password Gmail Anda
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Pengaturan email
        $mail->setFrom($email, $name); // Email pengirim
        $mail->addAddress('pasukanrdy01@gmail.com'); // Ganti dengan email tujuan Anda

        // Konten email
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "<h3>You received a message from $name</h3><p>$message</p>";
        $mail->AltBody = strip_tags($message);

        $mail->send();
        echo "OK"; // Respons sukses
    } catch (Exception $e) {
        echo "Error: {$mail->ErrorInfo}";
    }
}
?>
