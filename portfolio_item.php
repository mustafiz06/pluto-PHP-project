<?php
include('./config/db.php');
$portfolio_id = $_GET['portfolio_id'];
$portfolio_query = "SELECT * FROM portfolios WHERE id='$portfolio_id'";
$portfolios = mysqli_query($db_connect, $portfolio_query);
$portfolio = mysqli_fetch_assoc($portfolios);
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kufa - Personal Portfolio HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="./frontend_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./frontend_assets/css/animate.min.css">
    <link rel="stylesheet" href="./frontend_assets/css/magnific-popup.css">
    <link rel="stylesheet" href="./frontend_assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./frontend_assets/css/flaticon.css">
    <link rel="stylesheet" href="./frontend_assets/css/slick.css">
    <link rel="stylesheet" href="./frontend_assets/css/aos.css">
    <link rel="stylesheet" href="./frontend_assets/css/default.css">
    <link rel="stylesheet" href="./frontend_assets/css/style.css">
    <link rel="stylesheet" href="./frontend_assets/css/responsive.css">
</head>

<body class="theme-bg">

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- header-start -->
    <header>
        <div id="header-sticky" class="transparent-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <a href="index.php" class="navbar-brand logo-sticky-none"><img src="./frontend_assets/img/logo/logo.png" alt="Logo"></a>
                                <a href="index.php" class="navbar-brand s-logo-none"><img src="./frontend_assets/img/logo/s_logo.png" alt="Logo"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active"><a class="nav-link" href="./index.php#home">Home</a></li>
                                        <li class="nav-item"><a class="nav-link" href="./index.php#about">about</a></li>
                                        <li class="nav-item"><a class="nav-link" href="./index.php#service">service</a></li>
                                        <li class="nav-item"><a class="nav-link" href="./index.php#portfolio">portfolio</a></li>
                                        <li class="nav-item"><a class="nav-link" href="./index.php#contact">Contact</a></li>
                                    </ul>
                                </div>
                                <div class="header-btn">
                                    <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- offcanvas-start -->
        <div class="extra-info">
            <div class="close-icon menu-close">
                <button>
                    <i class="far fa-window-close"></i>
                </button>
            </div>
            <div class="logo-side mb-30">
                <a href="index-2.html">
                    <img src="img/logo/logo.png" alt="" />
                </a>
            </div>
            <div class="side-info mb-30">
                <div class="contact-list mb-30">
                    <h4>Office Address</h4>
                    <p>123/A, Miranda City Likaoli
                        Prikano, Dope</p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Phone Number</h4>
                    <p>+0989 7876 9865 9</p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Email Address</h4>
                    <p>info@example.com</p>
                </div>
            </div>
            <div class="social-icon-right mt-20">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="offcanvas-overly"></div>
        <!-- offcanvas-end -->
    </header>
    <!-- header-end -->

    <!-- main-area -->
    <main>
        <!-- portfolio-details-area -->
        <section class="portfolio-details-area pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10">
                         <div class="single-blog-list">
                                <div class="blog-list-thumb mb-35">
                                    <img src="./images/portfolio/<?= $portfolio['image'] ?>" alt="Portfolio Image">
                                </div>
                                <div class="blog-list-content blog-details-content portfolio-details-content">
                                    <h2><?= $portfolio['title'] ?></h2>
                                    <p><?= $portfolio['description'] ?></p>
                                    <div class="blog-list-meta">
                                        <ul>
                                            <li class="blog-post-date">
                                                <h3>Share On</h3>
                                            </li>
                                            <li class="blog-post-share">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="avatar-post mt-70 mb-60">
                                    <ul>
                                        <li>
                                            <div class="post-avatar-img">
                                                <img src="./images/users/<?= $portfolio['user_image'] ?>" alt="img" style="width: 100px; height:100px;">
                                            </div>
                                            <div class="post-avatar-content">
                                                <h5><?= $portfolio['user_name'] ?></h5>
                                                <p>Vehicula dolor amet consectetur adipiscing elit. Cras sollicitudin, tellus vitae
                                                    condimem
                                                    egestliberos dolor auctor
                                                    tellus.</p>
                                                <div class="post-avatar-social mt-15">
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                      
                    </div>
                </div>
            </div>
        </section>
        <!-- portfolio-details-area-end -->

    </main>
    <!-- main-area-end -->

    <!-- footer -->
    <footer>
        <div class="copyright-wrap primary-bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->



    <!-- JS here -->
    <script src="./frontend_assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./frontend_assets/js/popper.min.js"></script>
    <script src="./frontend_assets/js/bootstrap.min.js"></script>
    <script src="./frontend_assets/js/isotope.pkgd.min.js"></script>
    <script src="./frontend_assets/js/one-page-nav-min.js"></script>
    <script src="./frontend_assets/js/slick.min.js"></script>
    <script src="./frontend_assets/js/ajax-form.js"></script>
    <script src="./frontend_assets/js/wow.min.js"></script>
    <script src="./frontend_assets/js/aos.js"></script>
    <script src="./frontend_assets/js/jquery.waypoints.min.js"></script>
    <script src="./frontend_assets/js/jquery.counterup.min.js"></script>
    <script src="./frontend_assets/js/jquery.scrollUp.min.js"></script>
    <script src="./frontend_assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="./frontend_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="./frontend_assets/js/plugins.js"></script>
    <script src="./frontend_assets/js/main.js"></script>
</body>


</html>