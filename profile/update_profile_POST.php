<?php
include('../config/db.php');
session_start();


if(isset($_POST['name_update'])){
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $profession = $_POST['profession'];
    $gender = $_POST['gender'];
    $birth_date = $_POST['birth_date'];
    $country = $_POST['country'];
    
    if($user_id){
        $user_id = $_SESSION['user_id'];
        $name_update_query = "UPDATE users SET name='$name',address='$address' ,phone='$phone' ,profession='$profession' ,gender='$gender' ,birth_date='$birth_date',country='$country' WHERE id='$user_id'";
        mysqli_query($db_connect,$name_update_query);

        $_SESSION['name_update success'] = "Successfully update";
        header('location: ../home/home.php');
        

    }else{
        $_SESSION['name_update error'] = 'name field requried';
        header('location: ./update_profile.php');
    }
}
