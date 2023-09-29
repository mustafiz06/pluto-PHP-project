<?php
include('../extends/header.php');


$service_query = "SELECT * FROM services";
$services = mysqli_query($db_connect, $service_query);
$service_single = mysqli_fetch_assoc($services);
$serial = 1;

?>


<div class="row">
    <div class="col">
        <div class="page-description d-flex justify-content-between align-items-center">
        <div>
                <h1>Service List</h1>
                <h4>Total service data = <?= mysqli_num_rows($services) ?></h4>
                </div>
            <span><a href="./add_service.php" class="btn btn-success"><i class="large material-icons">add</i>Add Service</a></span>
        </div>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Icon</th>
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
                        <i class="<?= $service['icon'] ?> fa-3x"></i>
                    </td>
                    <td><?= $service['name'] ?></td>
                    <td><?= (substr($service['description'], 0, 80)) ?>....</td>
                    <td><?= $service['price'] ?></td>
                    <td>
                        <?php if ($service['status']  == 'active') : ?>
                            <a href="service_list_POST.php?status_change=<?= $service['id'] ?>" class="btn btn-success btn-sm"><?= $service['status'] ?></a>
                        <?php else : ?>
                            <a href="service_list_POST.php?status_change=<?= $service['id'] ?>" class="btn btn-danger btn-sm"><?= $service['status'] ?></a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="service_list_edit.php?edit_id=<?= $service['id'] ?>" class="btn btn-primary"><i class="large material-icons">edit</i>Edit</a>
                        <a href="service_list_POST.php?delete_id=<?= $service['id'] ?>" class="btn btn-danger"><i class="large material-icons">delete</i>Delete</a>
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