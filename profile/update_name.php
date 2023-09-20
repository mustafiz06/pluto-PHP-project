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
                <form action="update_name_POST.php" method="POST">
                    <label for="exampleInputEmail1" class="form-label">Old Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" readonly name="name" placeholder="<?= $_SESSION['user_name'] ?>">
                    
                    <label for="exampleInputEmail1" class="form-label">New Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                    
                    <?php  if(isset($_SESSION['name_update error'])) : ?>
                    <div id="emailHelp" class="form-text text-danger"><?= $_SESSION['name_update error'] ?></div>
                    <?php endif; unset($_SESSION['name_update error']) ?>

                    <button type="submit" class="btn-primary rounded mt-2 py-2 px-2" name="name_update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

include('../extends/footer.php')

?>