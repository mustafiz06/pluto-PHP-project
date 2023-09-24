<?php
include('../config/db.php');
session_start();


// delete data
if (isset($_GET['portfolio_delete_id'])) {
    $identify_id = $_GET['portfolio_delete_id'];
    $delete_query = "DELETE FROM portfolios WHERE id='$identify_id'";
    mysqli_query($db_connect, $delete_query);
    header('location: ./portfolio_list.php');
};

// status change
if (isset($_GET['portfolio_status_change'])) {
    $identify_id = $_GET['portfolio_status_change'];
    $select_status = "SELECT * FROM portfolios WHERE id='$identify_id'";
    $connect = mysqli_query($db_connect, $select_status);
    $portfolio = mysqli_fetch_assoc($connect);

    if ($portfolio['status'] == 'active') {
        $status_query = "UPDATE portfolios SET status='Deactivated' WHERE id='$identify_id'";
        mysqli_query($db_connect, $status_query);
        header('location: ./portfolio_list.php');
    } else {
        $status_query = "UPDATE portfolios SET status='active' WHERE id='$identify_id'";
        mysqli_query($db_connect, $status_query);
        header('location: ./portfolio_list.php');
    }
}


//edit portfolio
if (isset($_POST['portfolio_update'])) {
    $identify_id = $_POST['portfolio_id'];
    $title = $_POST['portfolio_title'];
    $sub_title = $_POST['portfolio_sub_title'];
    $description = $_POST['portfolio_description'];

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $explode = explode('.', $image);
    $extension = end($explode);
    $new_image_name = $title . "-" . date("h-i-sa") . '-' . date("d-m-Y") . "-" . "." . $extension;
    $image_path = "../images/portfolio/" . $new_image_name;

    if ($title && $description && $sub_title) {
        $edit_query = "UPDATE portfolios SET title='$title',description='$description',subtitle='$sub_title' WHERE id='$identify_id'";
        mysqli_query($db_connect, $edit_query);

        $_SESSION['edit_portfolio success'] = 'Successfully updated';
        header('location: ./portfolio_list.php');
    }
    else{
        $_SESSION['edit_portfolio error'] = 'Fail to updated Portfolio';
        header('location: ./portfolio_edit_list.php');
    }

    if ($image) {
        if (move_uploaded_file($tmp_name, $image_path)) {
            $edit_query_image = "UPDATE portfolios SET image='$new_image_name' WHERE id='$identify_id'";
            mysqli_query($db_connect, $edit_query_image);

            $_SESSION['edit_portfolio success'] = 'Successfully updated';
            header('location: ./portfolio_list.php');
        }
        else{
            $_SESSION['edit_portfolio error'] = 'Fail to updated Image';
            header('location: ./portfolio_edit_list.php');
        }
    }
}
