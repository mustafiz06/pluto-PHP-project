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
            <h1>Update Profile</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <form action="update_profile_POST.php" method="POST">

                    <label for="name" class="form-label">New Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $_SESSION['user_name'] ?>">

                    <label for="phone" class="form-label">Phone No</label>
                    <input type="phone" class="form-control" id="phone" name="phone" value="<?= $user['phone'] ?>">

                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?= $user['address'] ?>">

                    <label for="profession" class="form-label">Profession</label>
                    <input type="text" class="form-control" id="profession" name="profession" value="<?= $user['profession'] ?>">

                    <label for="country" class="form-label">Country</label>
                    <?php $country = array('Bangladesh', 'India', 'Pakistan','Japan', 'China', 'Indonesia','Malaysia', 'Thailand', 'Soutn Korea','North Korea'); ?>
                    <select name="country" id="country" class="form-control">
                        <?php foreach ($country as $key => $value) { ?>
                            <option value="<?= $value; ?>" <?php if ($user['country'] == $value) echo "selected" ?>><?= $value; ?></option>
                        <?php   } ?>
                    </select>

                    <label for="birth_date" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= $user['birth_date'] ?>">

                    <br>
                    <label for="gender" class="form-label">Gender</label>

                    <?php $gender = array('Male', 'Female', 'Others'); ?>
                    <select name="gender" id="gender" class="form-control">
                        <?php foreach ($gender as $key => $value) { ?>
                            <option value="<?= $value; ?>" <?php if ($user['gender'] == $value) echo "selected" ?>><?= $value; ?></option>
                        <?php   } ?>
                    </select>
                    <br>

                    <?php if (isset($_SESSION['name_update error'])) : ?>
                        <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['name_update error'] ?></div>
                    <?php endif;
                    unset($_SESSION['name_update error']) ?>

                    <button type="submit" class="btn-primary rounded mt-2 py-2 px-2" name="name_update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

include('../extends/footer.php')

?>