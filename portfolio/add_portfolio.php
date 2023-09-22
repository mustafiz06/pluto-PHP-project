<?php
include('../extends/header.php');
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Add portfolio</h1>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form action="add_portfolio_POST.php" method="POST" enctype="multipart/form-data">
                <label for="portfolio_title" class="form-label">portfolio title</label>
                <input type="text" class="form-control" id="portfolio_title" name="portfolio_title">
                <br>
                <label for="portfolio_sub_title" class="form-label">portfolio title</label>
                <input type="text" class="form-control" id="portfolio_sub_title" name="portfolio_sub_title">
                <br>
                
                <label for="portfolio_description" class="form-label">portfolio description</label>
                <textarea class='form-control' rows="4" id="portfolio_description" name="portfolio_description"></textarea>
                <br>
                <label for="portfolio_image"> Image</label>
                <input id="portfolio_image" type="file" class="form-control" name="image">


                <?php if (isset($_SESSION['add_portfolio error'])) : ?>
                    <div id="emailHelp" class="form-text fw-bold text-danger"><?= $_SESSION['add_portfolio error'] ?></div>
                <?php endif;
                unset($_SESSION['add_portfolio error']) ?>

                <?php if (isset($_SESSION['add_portfolio success'])) : ?>
                    <div id="emailHelp" class="form-text fw-bold text-success"><?= $_SESSION['add_portfolio success'] ?></div>
                <?php endif;
                unset($_SESSION['add_portfolio success']) ?>

                <button type="submit" class="btn-primary rounded mt-2 py-4 px-4" title="add_portfolio">Add portfolio</button>
            </form>
        </div>
    </div>
</div>

<?php

include('../extends/footer.php')

?>