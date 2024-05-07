<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$mail = new PHPMailer(true);

try {
 
    $mail->isSMTP();
    $mail->Host = 'mail.forteteknik.az';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@forteteknik.az'; 
    $mail->Password = '90bs62890bs628'; 
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('info@forteteknik.az', 'Sayt Təklif formu');


    $mail->addAddress('info@forteteknik.az', 'Sayt Təklif formundan gələn Email');

    $mail->isHTML(true);
    $mail->Subject = 'Teklif İsteği';
    $mail->Body = "
       <div class='jumbotron'>
       <h1 class='display-4'>Sayt Təklif formundan gələn mail</h1>
        <p><strong class='mail-baslik'>Ad ve Soyad:</strong> $name</p>
        <p><strong class='mail-baslik'>E-poçt ünvanı:</strong> $email</p>
        <p><strong class='mail-baslik'>Telefon:</strong> $phone</p>
        <p><strong class='mail-baslik'>Mesaj:</strong><span class='text-success'> $message </span></p>
        </div>
    ";

    $mail->send();
    echo 'E-poçt uğurla göndərildi, sorğunuza tez bir zamanda cavab veriləcək';
} catch (Exception $e) {
    echo "E-poçt göndərilərkən xəta baş verdi: {$mail->ErrorInfo}";
} 
 } else {
    echo 'Etibarsız sorğu';
}


?>
