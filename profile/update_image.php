<?php
include('../extends/header.php');

// $user_image = $_SESSION['user_image'] ;
// echo $user_image;
echo $_SESSION['user_id'];
echo $_SESSION['user_name'];
?>


<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Update Image</h1>
        </div>
    </div>
</div>
<div class="card-body">
    <form action="update_image_POST.php" method="POST" enctype="multipart/form-data">

        <div class="row">
            <img src="../images/users/<?=$_SESSION['user_image'] ?>" style="width: 100px; height:100px;">
        </div>

        <input id="myInput" type="file" class="form-control" name="image">


        <?php if (isset($_SESSION['user_image error'])) : ?>
            <div id="emailHelp" class="form-text text-danger fw-bold"><?= $_SESSION['user_image error'] ?></div>
        <?php endif;
        unset($_SESSION['user_image error']) ?>


        <button type="submit" class="btn btn-success btn-sm mt-4" name="image_update">update</button>
    </form>

</div>
<?php

include('../extends/footer.php')

?>