<?php
include('../extends/header.php');
include('../config/db.php');


$message_query = "SELECT * FROM messagebox";
$messages = mysqli_query($db_connect, $message_query);
$messages_single = mysqli_fetch_assoc($messages);
$serial = 1;

?>

<div class="row ">
    <div class="col" style="margin-bottom: 2px;">
        <div class="page-description d-flex justify-content-between align-items-center">
            <h1>Message Box</h1>
            <h4>Total message = <?= mysqli_num_rows($messages) ?></h4>
        </div>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Sender</th>
            <th scope="col">E-mail</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($messages_single) : ?>
            <?php foreach ($messages as $message) : ?>
                <tr>
                    <th scope="row"><?= $serial++ ?></th>
                    <td><?= $message['name'] ?></td>
                    <td><?= $message['email'] ?></td>
                    <td><?= $message['subject'] ?></td>
                    <td><?= (substr($message['message'], 0, 50)) ?>.... <a href="message_show.php?message_show_id=<?= $message['id'] ?>">Show More</a></td>
                    
                    <td>
                        <a href="messagebox_POST.php?message_delete_id=<?= $message['id'] ?>" class="btn btn-danger"><i class="large material-icons">delete</i>Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" class="text-center text-danger fw-bold"> No message here </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php

include('../extends/footer.php')

?>
