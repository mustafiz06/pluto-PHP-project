<?php
include('../extends/header.php');
include('../config/db.php');

$user_id = $_SESSION['user_id'];
$user_query = "SELECT * FROM users WHERE id='$user_id'";
$users = mysqli_query($db_connect, $user_query);
$user = mysqli_fetch_assoc($users);

?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <section style="background-color: #eee;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <?php if (!$user['image']) : ?>
                                        <a href="../profile/update_image.php">
                                            <span><i class="fa fa-user-circle-o" title="Upload Profile Picture" aria-hidden="true" style="font-size:15rem;"></i></span>
                                        </a>
                                    <?php else : ?>
                                        <a href="../profile/update_image.php">
                                            <img src="../images/users/<?= $user['image'] ?>" title="Change Profile Picture" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; height:150px;">
                                        </a>
                                    <?php endif ?>

                                    <h5 class="my-3"><?= $_SESSION['user_name'] ?></h5>
                                    <p class="text-muted mb-1"><?= $user['profession'] ?></p>
                                    <p class="text-muted mb-4"><?= $user['address'] ?></p>
                                    <a href="../profile/update_profile.php" class="btn btn-primary mb-2"><i class="large material-icons">edit</i>Edit Profile</a>
                                    <a href="../profile/update_password.php" class="btn btn-primary mb-2">Change Password</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">User ID</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $_SESSION['user_id'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $user['name'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $user['email'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $user['phone'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Profession</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $user['profession'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $user['address'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Gender</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $user['gender'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Date of Birth</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?= $user['birth_date'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php

include('../extends/footer.php')

?>