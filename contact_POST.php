<?php
include('./config/db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('./src/PHPMailer.php');
include('./src/SMTP.php');
include('./src/Exception.php');


$name = $_POST['name'];
$client_email = $_POST['email'];
$subject = $db_connect->real_escape_string($_POST['subject']);
$message = $db_connect->real_escape_string($_POST['message']);
$date = date("Y-m-d");
$time = date("h-i-sa");

$is_sent_mail = false;

if ($name && $client_email) {

    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'themustafiz06@gmail.com';
    $mail->Password   = 'jkgc ubzy kawi pmgd';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;
    //Recipients
    $mail->setFrom('admin@pluto.com', 'Pluto Family');
    $mail->addAddress($client_email, $name);     //Add a recipient
    $mail->addReplyTo($client_email);

    //Content
    $mail->isHTML(true);
    $mail->Subject = "Greeting for joining Pluto Family";
    $mail->Body    = 'Hi there!
                    Welcome to the <b>Pluto Family</b><br> 
                    I am glad that you are reading this email. I will be happy to help you grow your business. <br>
                    As a thank you for joining us, I would like to give you a gift.';
    $mail->AltBody = 'Hi there!
                    Welcome to the <b>Pluto Family</b><br> 
                    I am glad that you are reading this email. I will be happy to help you grow your business. <br>
                    As a thank you for joining us, I would like to give you a gift.';

    $mail->send();
    $is_sent_mail = true;
}


if ($is_sent_mail === true) {
    if ($name && $client_email && $subject && $message) {

        $insert_query = "INSERT INTO messagebox (name,email,subject,message,date,time) VALUES ('$name','$client_email','$subject','$message','$date','$time')";
        mysqli_query($db_connect, $insert_query);


        $_SESSION['add success'] = 'successfully sent';
        header('location:./index.php');
    } else {
        $_SESSION['add error'] = 'Failed to send';
        header('location:./index.php');
    }
}
