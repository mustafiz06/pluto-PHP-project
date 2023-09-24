<?php
include('../extends/header.php');
include('../config/db.php');


$portfolio_query = "SELECT * FROM portfolios";
$portfolios = mysqli_query($db_connect, $portfolio_query);
$portfolio_single = mysqli_fetch_assoc($portfolios);
$serial = 1;

?>


<div class="row">
    <div class="col">
    <div class="page-description d-flex justify-content-between align-items-center">
            <h1>Portfolio List</h1>
            <span><a href="./add_portfolio.php" class="btn btn-success"><i class="large material-icons">add</i> Add Portfolio</a></span>
        </div>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Sub-title</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($portfolio_single) : ?>
            <?php foreach ($portfolios as $portfolio) : ?>
                <tr>
                    <th scope="row"><?= $serial++ ?></th>
                    <td>
                       <img src="../images/portfolio/<?= $portfolio['image'] ?>" alt="No Image" style="height: 100px; width:100px;">
                    </td>
                    <td><?= $portfolio['title'] ?></td>
                    <td><?= $portfolio['subtitle'] ?></td>
                    <td><?= $portfolio['description'] ?></td>
                    <td>
                        <?php if ($portfolio['status']  == 'active') : ?>
                            <a href="portfolio_list_POST.php?portfolio_status_change=<?= $portfolio['id'] ?>" class="btn btn-success btn-sm"><?= $portfolio['status'] ?></a>
                        <?php else : ?>
                            <a href="portfolio_list_POST.php?portfolio_status_change=<?= $portfolio['id'] ?>" class="btn btn-danger btn-sm"><?= $portfolio['status'] ?></a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="portfolio_list_edit.php?portfolio_edit_id=<?= $portfolio['id'] ?>" class="btn btn-primary"><i class="large material-icons">edit</i>Edit</a>
                        <a href="portfolio_list_POST.php?portfolio_delete_id=<?= $portfolio['id'] ?>" class="btn btn-danger"><i class="large material-icons">delete</i>Delete</a>
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