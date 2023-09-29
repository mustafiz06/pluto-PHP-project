<?php
include('../extends/header.php');

$id = $_GET['feedback_id'];
$messages_query = "SELECT * FROM messagebox WHERE id='$id'";
$result = mysqli_query($db_connect, $messages_query);
$messages = mysqli_fetch_assoc($result);
?>


<div class="col-8">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">Send your feedback</h1>
            <form action="messagebox_POST.php" method="POST">

                <input type="text"  class="form-control" name="identify_id" value="<?= $messages['id']  ?>" hidden>
                <input type="text" class="form-control" id="name" name="name" value="<?= $messages['name']  ?>" hidden>
                <input type="text" class="form-control" id="client_email" name="client_email" value="<?= $messages['email']  ?>" hidden>

                <label for="answer" class="form-label">Answer</label>
                <textarea class='form-control' rows="4" id="answer" name="answer" required><?= $messages['answer']  ?></textarea>

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-success mt-2" title="Submit Your Answer!">Send<i class="material-icons" style="margin-left: 5px;">send</i></button>
                </div>
            </form>
        </div>
    </div>
</div>