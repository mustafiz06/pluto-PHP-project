<?php
include('../config/db.php');
session_start();

$name = $_POST['service_name'];
$description = $_POST['service_description'];
$icon = $_POST['service_icon'];
$price = $_POST['service_price'];


    if ($name && $description && $icon && $price) {
            $insert_query = "INSERT INTO services (name,description,icon,price) VALUES ('$name','$description','$icon','$price')";
            mysqli_query($db_connect, $insert_query);


            $_SESSION['add_service success'] = 'successfully added';
            header('location:../service/service_list.php');
            
        } else {
            $_SESSION['add_service error'] = 'unable to add service';
            header('location: ../service/add_service.php');
        }
