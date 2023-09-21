<?php
include('../extends/header.php');
include('../config/db.php');


$service_query = "SELECT * FROM services";
$services = mysqli_query($db_connect, $service_query);
$service_single = mysqli_fetch_assoc($services);
$serial = 1;

?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Service List</h1>
        </div>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">ICOn</th>
            <th scope="col">Service name</th>
            <th scope="col">Details</th>
            <th scope="col">Price</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($service_single) : ?>
            <?php foreach ($services as $service) : ?>
                <tr>
                    <th scope="row"><?= $serial++ ?></th>
                    <td>
                        <i class="<?= $service['icon'] ?>"></i>
                    </td>
                    <td><?= $service['name'] ?></td>
                    <td><?= $service['description'] ?></td>
                    <td><?= $service['price'] ?></td>
                    <td>
                        <?php if ($service['status']  == 'active') : ?>
                            <a href="service_list_POST.php?status_change=<?= $service['id'] ?>" class="btn btn-success btn-sm"><?= $service['status'] ?></a>
                        <?php else : ?>
                            <a href="service_list_POST.php?status_change=<?= $service['id'] ?>" class="btn btn-danger btn-sm"><?= $service['status'] ?></a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="service_list_edit.php?edit_id=<?= $service['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="service_list_POST.php?delete_id=<?= $service['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" class="text-center text-danger"> Data not found </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php

include('../extends/footer.php')

?>