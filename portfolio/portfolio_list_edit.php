<?php
include('../extends/header.php');
include('../config/db.php');
$id = $_GET['portfolio_edit_id'];
$portfolio_query = "SELECT * FROM portfolios WHERE id='$id'";
$result = mysqli_query($db_connect, $portfolio_query);
$portfolio = mysqli_fetch_assoc($result);
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>portfolio edit page</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="portfolio_list_POST.php" method="POST" enctype="multipart/form-data">
                    <label for="portfolio_title" class="form-label">portfolio Title</label>
                    <input type="text" class="form-control" name="portfolio_title" value="<?= $portfolio['title']  ?>">

                    <label for="portfolio_sub_title" class="form-label">portfolio Sub-Title</label>
                    <input type="text" class="form-control" name="portfolio_sub_title" value="<?= $portfolio['subtitle']  ?>">

                    <input type="text" hidden name="portfolio_id" value="<?= $portfolio['id']  ?>">

                    <label for="portfolio_description" class="form-label">portfolio Description</label>
                    <textarea class='form-control' rows="4" name="portfolio_description"><?= $portfolio['description']  ?></textarea>
                    <br>
                    <label for="exampleInputEmail1" class="form-label">Image</label>
                    <br>
                    <img src="../images/portfolio/<?= $portfolio['image'] ?>" alt="No Image" style="height: 100px; width:100px;">

                    <input id="portfolio_image" type="file" class="form-control" name="image">

                    <?php if (isset($_SESSION['edit_portfolio error'])) : ?>
                        <div id="emailHelp" class="form-text fw-bold text-danger"><?= $_SESSION['edit_portfolio error'] ?></div>
                    <?php endif;
                    unset($_SESSION['edit_portfolio error']) ?>

                    <?php if (isset($_SESSION['edit_portfolio success'])) : ?>
                        <div id="emailHelp" class="form-text fw-bold text-success"><?= $_SESSION['edit_portfolio success'] ?></div>
                    <?php endif;
                    unset($_SESSION['edit_portfolio success']) ?>

                    <button type='submit' name="portfolio_update" class='btn btn-info mt-5'>Update</button>
                </form>

            </div>
        </div>
    </div>
</div>

<?php

include('../extends/footer.php');

?>