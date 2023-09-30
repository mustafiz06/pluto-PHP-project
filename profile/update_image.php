<?php
$title = 'Update Image | Pluto';
include('../extends/header.php');

$user_id = $_SESSION['user_id'];
$user_query = "SELECT * FROM users WHERE id='$user_id'";
$users = mysqli_query($db_connect, $user_query);
$user = mysqli_fetch_assoc($users);
?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Update Image</h1>
        </div>
    </div>
</div>
<div class="card-body">
    <form action="update_image_POST.php" method="POST" enctype="multipart/form-data">

        <div class="row">
            <?php if (!$user['image']) : ?>
                <h3>You have not set any picture yet.</h3>
                <h2 class="text-warning"> Choose a formal picture for your account.</h2>
            <?php else : ?>
                <img src="../images/users/<?= $user['image'] ?>" title="Change Profile Picture" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height:150px;">
            <?php endif ?>
        </div>

        <input id="myInput" type="file" class="form-control" name="image" placeholder="ghg">


        <?php if (isset($_SESSION['user_image success'])) : ?>
            <div id="emailHelp" class="form-text text-success fw-bold"><?= $_SESSION['user_image success'] ?></div>
        <?php endif;
        unset($_SESSION['user_image success']) ?>

        <?php if (isset($_SESSION['user_image error'])) : ?>
            <div id="emailHelp" class="form-text text-danger fw-bold"><?= $_SESSION['user_image error'] ?></div>
        <?php endif;
        unset($_SESSION['user_image error']) ?>


        <button type="submit" class="btn btn-success btn-sm mt-4" name="image_update">update</button>
    </form>

</div>
<?php

include('../extends/footer.php')

?>