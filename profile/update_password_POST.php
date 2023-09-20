<?php
include("../config/db.php");

session_start();

if (isset($_POST['password_update'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $user_id = $_SESSION['user_id'];

    if ($current_password && $new_password && $confirm_password) {
        $encrypt_Password = sha1($current_password);
        $password_query = "SELECT COUNT(*) AS matching_password FROM users WHERE password='$encrypt_Password' AND id='$user_id'";
        $password_query_connect = mysqli_query($db_connect, $password_query);
        if (mysqli_fetch_assoc($password_query_connect)['matching_password'] == 1) {
            if ($new_password != $current_password) {
                if ($new_password == $confirm_password) {
                    $encrypt_update_password = sha1($new_password);
                    $password_update_query = "UPDATE users SET password='$encrypt_update_password' WHERE id='$user_id'";
                    mysqli_query($db_connect,$password_update_query);
                    $_SESSION['password_update success'] = 'password updated successfully';
                    header('location: ./update_password.php');
                } else {
                    $_SESSION['password_update error'] = "new password & confirm password are same";
                    header("location: ./update_password.php");
                }
            } else {
                $_SESSION['password_update error'] = "current password & new password are same";
                header("location: ./update_password.php");
            }
        } else {
            $_SESSION['password_update error'] = "current password didn't match";
            header("location: ./update_password.php");
        }
    } else {
        $_SESSION['password_update error'] = 'field is empty';
        header("location: ./update_password.php");
    }
}
