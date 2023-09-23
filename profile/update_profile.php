<?php
include('../extends/header.php')
?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Update Name</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <form action="update_profile_POST.php" method="POST">

                    <label for="name" class="form-label">New Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="<?= $_SESSION['user_name'] ?>">

                    <label for="phone" class="form-label">Phone No</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone">

                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">

                    <label for="profession" class="form-label">Profession</label>
                    <input type="text" class="form-control" id="profession" name="profession" placeholder="Profession">

                    <label for="birth_date" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Date of birth">

                    <br>
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
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