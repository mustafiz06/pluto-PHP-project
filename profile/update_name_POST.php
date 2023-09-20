<?php
include('../config/db.php');
session_start();


if(isset($_POST['name_update'])){
    $name = $_POST['name'];
    if($name){
        $user_id = $_SESSION['user_id'];
        $name_update_query = "UPDATE users SET name='$name' WHERE id='$user_id'";
        mysqli_query($db_connect,$name_update_query);
        $_SESSION['user_name'] = $name;
        header('location: ./update_name.php');

    }else{
        $_SESSION['name_update error'] = 'name field requried';
        header('location: ./update_name.php');
    }
}
