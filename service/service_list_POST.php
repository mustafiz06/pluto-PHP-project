<?php
include('../config/db.php');
session_start();


// delete data
if(isset($_GET['delete_id'])){
    $user_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM services WHERE id='$user_id'";

    mysqli_query($db_connect,$delete_query);

    header('location: ./service_list.php');
};

// status change
if(isset($_GET['status_change'])){
    $user_id = $_GET['status_change'];
    $select_status = "SELECT * FROM services WHERE id='$user_id'";
    $connect = mysqli_query($db_connect,$select_status);
    $service = mysqli_fetch_assoc($connect);

    if($service['status'] == 'active'){
        $status_query = "UPDATE services SET status='Deactivated' WHERE id='$user_id'";
        mysqli_query($db_connect,$status_query);
        header('location: ./service_list.php');
    }else{
        $status_query = "UPDATE services SET status='active' WHERE id='$user_id'";
        mysqli_query($db_connect,$status_query);
        header('location: ./service_list.php');
    }

}
//edit
if(isset($_POST['service_update'])){
    $name = $_POST['service_name'];
    $description = $_POST['service_description'];
    $icon = $_POST['icon'];
    $id = $_POST['service_id'];
    $price = $_POST['service_price'];

    if($name && $description && $icon && $price){
        $edit_query = "UPDATE services SET name='$name',description='$description',icon='$icon',price='$price' WHERE id='$id'";
        mysqli_query($db_connect,$edit_query);
        header('location: ./service_list.php');

    }
}

