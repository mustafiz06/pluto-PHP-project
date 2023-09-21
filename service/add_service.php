<?php
include('../extends/header.php');
include('icon.php');
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Add Service</h1>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form action="add_service_POST.php" method="POST">
                <label for="exampleInputEmail1" class="form-label">Service Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="service_name">
                <br>
                <label for="exampleInputEmail1" class="form-label">Service description</label>
                <textarea class='form-control' rows="4" name="service_description"></textarea>
                <br>

                <label for="exampleInputEmail1" class="form-label">Price</label>
                <input type="number" class="form-control" id="exampleInputEmail1" name="service_price">

                <label for="exampleInputEmail1" class="form-label">Icon</label>
                <input type="text" class="form-control" id="service_icon" name="service_icon">

                <div class="card">
                    <div class="card-body">
                        <?php foreach ($fonts as $font) : ?>
                            <span class="fa-2x"><i class="<?= $font ?>" onclick="myFunc(event)"></i></span>
                        <?php endforeach; ?>
                    </div>
                </div>


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
            <script>
                const icon_field = document.getElementById("service_icon");

                function myFunc(event) {
                    icon_field.value = event.target.getAttribute('class');
                }
            </script>
        </div>
    </div>
</div>

<?php

include('../extends/footer.php')

?>