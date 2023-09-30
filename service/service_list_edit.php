<?php
$title = 'Edit service | Pluto';
include('../extends/header.php');
include('icon.php');
$id = $_GET['edit_id'];
$service_query = "SELECT * FROM services WHERE id='$id'";
$result = mysqli_query($db_connect, $service_query);
$service = mysqli_fetch_assoc($result);

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Services edit page</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="service_list_POST.php" method="POST">
                    <label for="exampleInputEmail1" class="form-label">Service Title</label>
                    <input type="text" class="form-control" name="service_name" value="<?= $service['name']  ?>">

                    <input type="text" hidden name="service_id" value="<?= $service['id']  ?>">

                    <label for="exampleInputEmail1" class="form-label">Service Description</label>
                    <textarea class='form-control' rows="4" name="service_description"><?= $service['description']  ?></textarea>

                    <label for="exampleInputEmail1" class="form-label">Price</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="service_price" value="<?= $service['price']  ?>">

                    <label for="exampleInputEmail1" class="form-label">Icon</label>
                    <input type="text" class="form-control" name="icon" id="service_icon" value="<?= $service['icon']  ?>">
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <?php foreach ($fonts as $font) : ?>
                                <span class="fa-2x"><i class="<?= $font ?>" onclick="myFunc(event)"></i></span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <button type='submit' name="service_update" class='btn btn-info mt-5'>Insert</button>
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
</div>

<?php

include('../extends/footer.php');

?>