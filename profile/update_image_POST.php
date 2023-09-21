<?php
session_start();
include('../config/db.php');


if (isset($_POST['image_update'])) {
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $explode = explode('.', $image);
    $extension = end($explode);
    $new_image_name = $user_name."-".$user_id."-".date("d-m-Y")."-".".".$extension;
    $image_path = "../images/users/".$new_image_name;


    //for unlink
    $image_query = "SELECT image  FROM users WHERE id='$user_id'";
    $image_query_connect = mysqli_query($db_connect,$image_query);
    $existing_image = mysqli_fetch_assoc($image_query_connect)['image'];

    if (move_uploaded_file($tmp_name, $image_path)) {
        $update_image_query = "UPDATE users SET image='$new_image_name' WHERE id='$user_id'";
        mysqli_query($db_connect, $update_image_query);

        unlink('../images/users/'.$existing_image);

        $_SESSION['user_image'] = $new_image_name;
        header("location:../home/home.php");
    } else {
        header("location:./update_image.php");
        $_SESSION['user_image error'] = "Please, select an image";
    }
}
