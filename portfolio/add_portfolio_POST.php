<?php
include('../config/db.php');
session_start();
//get user data
$identify_id = $_SESSION['user_id'];
$user_query = "SELECT *  FROM users WHERE id='$identify_id'";
$user_query_connect = mysqli_query($db_connect, $user_query);
$user=mysqli_fetch_assoc($user_query_connect);


$portfolio_add_user = $user['name'];
$portfolio_add_image = $user['image'];

$title = $_POST['portfolio_title'];
$sub_title = $_POST['portfolio_sub_title'];
// $description = $_POST['portfolio_description'];
$description = $db_connect->real_escape_string($_POST['portfolio_description']);


$image = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$explode = explode('.', $image);
$extension = end($explode);
$new_image_name = $title . "-" . date("h-i-sa") . "-" . date("d-m-Y") . "-" . "." . $extension;
$image_path = "../images/portfolio/" . $new_image_name;



if ($portfolio_add_user && $portfolio_add_image) {
    if ($title && $sub_title && $description && move_uploaded_file($tmp_name, $image_path)) {

        $insert_query = "INSERT INTO portfolios (title,description,subtitle,image,user_name,user_image) VALUES ('$title','$description','$sub_title','$new_image_name','$portfolio_add_user','$portfolio_add_image')";
        mysqli_query($db_connect, $insert_query);


        $_SESSION['add_portfolio success'] = 'successfully added';
        header('location:../portfolio/portfolio_list.php');
    } else {
        $_SESSION['add_portfolio error'] = 'unable to add portfolio';
        header('location: ../portfolio/add_portfolio.php');
    }
} else {
    $_SESSION['add_portfolio error'] = 'For add portfolio you need to be authorized user.If already you have an account please update your profile image.';
    header('location: ../portfolio/add_portfolio.php');
}
