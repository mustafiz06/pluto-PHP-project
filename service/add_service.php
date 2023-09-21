<?php
include('../extends/header.php')
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Add Service</h1>
        </div>
    </div>
</div>
<div class="col-6">
    <div class="card">
        <div class="card-body">
            <form action="add_service_POST.php" method="POST">
                <label for="exampleInputEmail1" class="form-label">Service Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="service_name">
                <br>
                <label for="exampleInputEmail1" class="form-label">Service description</label>
                <textarea name="service_description" id="" cols="83" rows="2"></textarea>
                <br>

                <label for="exampleInputEmail1" class="form-label">Price</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="service_price">

                <label for="exampleInputEmail1" class="form-label">Icon</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="service_icon">


                <?php if (isset($_SESSION['add_service error'])) : ?>
                    <div id="emailHelp" class="form-text fw-bold text-danger"><?= $_SESSION['add_service error'] ?></div>
                <?php endif;
                unset($_SESSION['add_service error']) ?>

                <?php if (isset($_SESSION['add_service success'])) : ?>
                    <div id="emailHelp" class="form-text fw-bold text-success"><?= $_SESSION['add_service success'] ?></div>
                <?php endif;
                unset($_SESSION['add_service success']) ?>

                <button type="submit" class="btn-primary rounded mt-2 py-4 px-4" name="add_service">Add service</button>
            </form>
        </div>
    </div>
</div>

<?php

include('../extends/footer.php')

?>