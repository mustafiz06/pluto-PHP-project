<?php
include('../config/db.php');


if (isset($_GET['message_delete_id'])) {
    $identify_id = $_GET['message_delete_id'];
    $delete_query = "DELETE FROM messagebox WHERE id='$identify_id'";
    mysqli_query($db_connect, $delete_query);
    header('location: ./messagebox.php');
};