<?php
include('../config/db.php');
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$flag = false;

if ($name) {
    if (!preg_match("/^[a-zA-Z-' .]*$/", $name)) {
        $_SESSION['name error'] = 'Only letters and white space allowed';
        header('location: ../registration/registration.php');
    } else {
        $flag = true;
    }
} else {
    $_SESSION['name error'] = 'please fill up name field';
    header('location: ../registration/registration.php');
}

if ($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $flag = true;
    } else {
        $_SESSION['email error'] = 'provide valid emaill address';
        header('location: ../registration/registration.php');
    }
} else {
    $_SESSION['email error'] = 'please fill up email field';
    header('location: ../registration/registration.php');
}

if ($password) {
    if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
        $flag = true;
    } else {
        $_SESSION['password error'] = 'please provide a charactor,a number and special character';
        header('location: ../registration/registration.php');
    }
} else {
    $_SESSION['password error'] = 'please provide your password';
    header('location: ../registration/registration.php');
}

if ($confirm_password) {
    if ($password == $confirm_password) {
        $flag = true;
    } else {
        $_SESSION['confirm_password error'] = 'confirm_password and password did not match';
        header('location: ../registration/registration.php');
    }
} else {
    $_SESSION['confirm_password error'] = 'please provide your confirm_password';
    header('location: ../registration/registration.php');
}

// db code start

if ($flag == true) {
    if ($name && $email && $password && $confirm_password) {
        $select_query = "SELECT COUNT(*) AS email_check FROM users WHERE email='$email'";
        $connect = mysqli_query($db_connect, $select_query);
        if (mysqli_fetch_assoc($connect)['email_check'] < 1) {
            $encript = sha1($password);
            $insert_query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$encript')";
            mysqli_query($db_connect, $insert_query);

            $_SESSION['db_user_name'] = $name;
            $_SESSION['db_user_email'] = $email;
            $_SESSION['db_user_password'] = $password;

            $_SESSION['db_success'] = 'succesfully registraterd';
            header('location: ../login/login.php');
        } else {
            $_SESSION['db_connect error'] = 'User already exits';
            header('location: ../registration/registration.php');
        }
    } else {
        $_SESSION['db_connect error'] = 'field Can not be empty';
        header('location: ../registration/registration.php');
    }
} else {
    $_SESSION['db_connect error'] = 'something went wrong';
    header('location: ../registration/registration.php');
}
