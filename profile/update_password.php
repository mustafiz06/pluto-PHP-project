<?php
include('../extends/header.php')
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Update Password</h1>
        </div>
    </div>
</div>
<div class="col-6">
    <div class="card">
        <div class="card-header card-body">
            <h2 class="text-center">Password Update</h2>
        </div>
        <div class="card-body">
            <form action="update_password_POST.php" method="POST">
                <label for="exampleInputEmail1" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" name="current_password">
                <label for="exampleInputEmail1" class="form-label">New Password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" name="new_password">
                <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" name="confirm_password">

                <?php if (isset($_SESSION['password_update error'])) : ?>
                    <?php $alert_message = $_SESSION['password_update error'] ?> 
                    <?php  echo "<script type='text/javascript'>alert('$alert_message')</script>"; ?>
                <?php endif; unset($_SESSION['password_update error']) ?>
                


                <?php if (isset($_SESSION['password_update success'])) : ?>
                    <div id="emailHelp" class="form-text fw-bold text-success"><?= $_SESSION['password_update success'] ?></div>
                <?php endif; unset($_SESSION['password_update success']) ?>

                <button type="submit" class="btn-primary rounded mt-2 py-4 px-4" name="password_update">Update Password</button>
            </form>
        </div>
    </div>
</div>

<?php

include('../extends/footer.php')

?>