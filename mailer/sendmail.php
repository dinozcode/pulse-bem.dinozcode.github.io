<?php

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

    

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'utf-8';
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '********';                 // Наш логин
    $mail->Password = '********';                           // Наш пароль от ящика
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    
    $mail->setFrom('*******@mail', 'Pulse');   // От кого письмо 
    $mail->addAddress('******@mail');     // Add a recipient

    

    $mail->isHTML(true);
    $mail->Subject = 'Данные';
    $mail->Body    = '
            Пользователь оставил данные <br> 
        Имя: ' . $name . ' <br>
        Номер телефона: ' . $phone . '<br>
        E-mail: ' . $email . '';
    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }


?>