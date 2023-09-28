<?php
include('../config/db.php');


if (isset($_GET['message_delete_id'])) {
    $identify_id = $_GET['message_delete_id'];
    $delete_query = "DELETE FROM messagebox WHERE id='$identify_id'";
    mysqli_query($db_connect, $delete_query);
    header('location: ./messagebox.php');
};


//feedback


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('../src/PHPMailer.php');
include('../src/SMTP.php');
include('../src/Exception.php');


$identify_id = $_POST['identify_id'];
$name = $_POST['name'];
$client_email = $_POST['client_email'];
$answer = $db_connect->real_escape_string($_POST['answer']);

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
    $mail->addAddress($client_email);     //Add a recipient
    $mail->addReplyTo($client_email);

    //Content
    $mail->isHTML(true);
    $mail->Subject = "Reply from Pluto Family";
    $mail->Body    = $answer;
    $mail->AltBody = $answer;

    $mail->send();
    $is_sent_mail = true;
}
// save data after feedback reply
if ($is_sent_mail === true) {
    if ($answer) {

        $update_query = "UPDATE messagebox SET answer='$answer' WHERE id='$identify_id'";
        mysqli_query($db_connect, $update_query);

        $_SESSION['add success'] = 'successfully sent';
        header('location:./messagebox.php');
    } else {
        $_SESSION['add error'] = 'Failed to send';
        header('location:./feedback.php');
    }
}