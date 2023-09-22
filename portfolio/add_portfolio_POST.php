<?php
include('../config/db.php');
session_start();

$title = $_POST['portfolio_title'];
$sub_title = $_POST['portfolio_sub_title'];
$description = $_POST['portfolio_description'];


$image = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$explode = explode('.', $image);
$extension = end($explode);
$new_image_name = $title . "-" . date("d-m-Y") . "-" . "." . $extension;
$image_path = "../images/portfolio/" . $new_image_name;


if ($title && $sub_title && $description && move_uploaded_file($tmp_name, $image_path)) {

    $insert_query = "INSERT INTO portfolios (title,description,subtitle,image) VALUES ('$title','$description','$sub_title','$new_image_name')";
    mysqli_query($db_connect, $insert_query);


    $_SESSION['add_portfolio success'] = 'successfully added';
    header('location:../portfolio/portfolio_list.php');
} else {
    $_SESSION['add_portfolio error'] = 'unable to add portfolio';
    header('location: ../portfolio/add_portfolio.php');
}
