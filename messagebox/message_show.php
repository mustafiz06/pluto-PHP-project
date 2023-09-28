<?php
include('../extends/header.php');
include('../config/db.php');

$identify_id = $_GET['message_show_id'];
$message_query = "SELECT * FROM messagebox WHERE id='$identify_id'";
$messages = mysqli_query($db_connect, $message_query);

?>
<?php foreach ($messages as $message) : ?>
    <div class="card text-center">
        <div class="card-header" style="text-align: left;">
            <p>Sender: <?= $message['name'] ?></p>
            <!-- <p>Send From: <?= $message['email'] ?></p> -->
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= $message['subject'] ?></h5>
            <p class="card-text"><?= $message['message'] ?></p>
            <a href="messagebox_POST.php?feedback_id=<?= $message['id'] ?>" class="btn btn-primary"><i class="large material-icons">feedback</i>Send Feedback</a>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <p>Date: <?= $message['date'] ?></p>
            <p>Time: <?= $message['time'] ?></p>
        </div>
    </div>
<?php endforeach; ?>