
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Luigi's</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>

    <link type="text/css" rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <script src="Bootstrap/js/jquery.min.js"></script>
    <script src="Bootstrap/js/bootstrap.js"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css" />

    <!-- Stylesheets -->
    <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
    <link href="plugin-frameworks/swiper.css" rel="stylesheet">
    <link href="fonts/ionicons.css" rel="stylesheet">
    <link href="common/styles.css" rel="stylesheet">

</head>

<body>

    <header>
        <div class="container">
            <a class="logo" href="index.php"><img src="images/logo-white.png" alt="Logo"></a>
            <div class="right-area">
                <h6><a title="Profile Setting" class="plr-20 color-white btn-fill-primary ml-4" href="profile.php"> <i class="fas fa-user"></i> </a></h6>
            </div>
            <div class="right-area">
                <h6><a title="Cart" class="plr-20 color-white btn-fill-primary ml-4" href="cart.php"><i class="ion-android-cart"></i> </a></h6>
            </div>


            <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

            <ul class="main-menu font-mountainsre" id="main-menu">
                <li><a href="index.php" id="item">Home</a></li>
                <li><a href="fullmenu.php" id="item">Menu</a></li>
                <li><a href="allnews.php" id="item">News</a></li>
                <li><a href="services.php" id="item">Services</a></li>
                <li><a href="about_us.php" id="item">About us</a></li>

                <?php
                          if(isset($_COOKIE["u_name"])){
                            echo '<li><a href="logout.php" id="item"> Logout </a></li>';														
                          }else {
                            $_SESSION['RedirectKe'] = $_SERVER['REQUEST_URI'];
                            echo '<li><a href="login.php" id="item"> Login </a></li>';
                            echo '<li><a href="signup.php" id="item"> Sign In </a></li>';
                          }?>

            </ul>

            <div class="clearfix"></div>
        </div><!-- container -->

    </header>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img id="slider-img" class="d-block w-100" src="images/br10_1582637958.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h4><a id="carousel-button" class="plr-20 color-white btn-fill-primary" href="fullmenu.php">Order food</a></h4>
                </div>
            </div>
            <div class="carousel-item">
                <img id="slider-img" class="d-block w-100" src="images/banner2.png" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h4><a id="carousel-button" class="plr-20 color-white btn-fill-primary" href="fullmenu.php">Order food</a></h4>
                </div>
            </div>
            <div class="carousel-item">
                <img id="slider-img" class="d-block w-100" src="images/baked_pizza.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h4><a id="carousel-button" class="plr-20 color-white btn-fill-primary" href="fullmenu.php">Order food</a></h4>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <style>
        html {
            font-size: 100%;
            /* 16px */
        }

        body {
            text-rendering: optimizeLegibility;

        }

        #item {
            font-size: 1.1rem;
        }

        #carousel-button {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)
        }

        #slider-img {
            opacity: .9;
            height: 600px;
        }

        @media only screen and (max-width: 600px) {
            #slider-img {
                height: 350px;
                width: auto;
            }
        }

    </style>


    <section class="story-area left-text center-sm-text pos-relative">
        <div class="abs-tbl bg-2 w-20 z--1 dplay-md-none"></div>
        <div class="abs-tbr bg-3 w-20 z--1 dplay-md-none"></div>
        <div class="container">
            <div class="heading">
                <img class="heading-img" src="images/heading_logo.png" alt="">
                <h2>Our Story</h2>
            </div>

            <div class="row">
                <div class="col-md-6" style="text-align:justify">
                    <p class="mb-30">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                </div><!-- col-md-6 -->

                <div class="col-md-6" style="text-align:justify">
                    <p class="mb-30">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate </p>
                </div><!-- col-md-6 -->
            </div><!-- row -->
        </div><!-- container -->
    </section>





    <section class="counter-section center-text pt-0" id="counter">
        <div class="container">
            <h5 class="font-30 mb-70 mb-sm-40 left-text"><b>Milestones</b></h5>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="mb-30 ">
                        <i class="mlr-auto mb-30  icon-gradient icon-pizza"></i>
                        <h2><b><span class="counter-value" data-duration="400" data-count="574">0</span></b></h2>
                        <h5 class="semi-black"><b>Pizza </b></h5>
                    </div><!-- margin-b-30 -->
                </div><!-- col-md-3-->

                <div class="col-sm-6 col-md-3">
                    <div class="mb-30">
                        <i class="mlr-auto mb-30 icon-gradient icon-sea-food"></i>
                        <h2><b><span class="counter-value" data-duration="1400" data-count="94">0</span></b></h2>
                        <h5 class="semi-black"><b>Sea Food Dshes</b></h5>
                    </div><!-- margin-b-30 -->
                </div><!-- col-md-3-->

                <div class="col-sm-6 col-md-3">
                    <div class="mb-30">
                        <i class="mlr-auto mb-30 icon-gradient icon-pasta"></i>
                        <h2><b><span class="counter-value" data-duration="300" data-count="39">0</span></b></h2>
                        <h5 class="semi-black"><b>Pasta </b></h5>
                    </div><!-- margin-b-30 -->
                </div><!-- col-md-3-->

                <div class="col-sm-6 col-md-3">
                    <div class="mb-30">
                        <i class="mlr-auto mb-30 icon-gradient icon-salad"></i>
                        <h2><b><span class="counter-value" data-duration="1000" data-count="52">0</span></b></h2>
                        <h5 class="semi-black"><b>Salads </b></h5>
                    </div><!-- margin-b-30 -->
                </div><!-- col-md-3-->

            </div><!-- row-->
        </div><!-- container-->
    </section><!-- counter-section-->







    <section class="story-area bg-seller color-white pos-relative">
        <div class="pos-bottom triangle-up"></div>
        <div class="pos-top triangle-bottom"></div>
        <div class="container">
            <div class="heading">
                <img class="heading-img" src="images/heading_logo.png" alt="">
                <h2>Best Sellers</h2>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-4  col-sm-6 ">
                    <div class="center-text mb-30">
                        <div class="ïmg-200x mlr-auto pos-relative">
                            <h6 class="ribbon-cont">
                                <div class="ribbon primary"></div><b>OFFER</b>
                            </h6>
                            <img src="Admin/upload/ds4_1582637756.jpg" style="height:210px; border-radius: 50%" alt="">
                        </div>
                        <h5 class="mt-20">Fruit-custard</h5>
                        <h4 class="mt-5"><b>420 tk</b></h4>
                        <h6 class="mt-20"><a href="order.php?productname=Fruit-custard" class="btn-brdr-primary plr-25"><b>Order Now</b></a></h6>
                    </div>
                    <!--text-center-->
                </div><!-- col-md-3 -->

                <div class="col-lg-3 col-md-4  col-sm-6 ">
                    <div class="center-text mb-30">
                        <div class="ïmg-200x mlr-auto pos-relative">
                            <h6 class="ribbon-cont">
                                <div class="ribbon primary"></div><b>OFFER</b>
                            </h6>
                            <img src="Admin/upload/pasta3_1582637021.jpg" style="height:210px; border-radius: 50%" alt="">
                        </div>

                        <h5 class="mt-20">Padana</h5>
                        <h4 class="mt-5"><b>1,050 tk</b></h4>
                        <h6 class="mt-20"><a href="order.php?productname=Padana" class="btn-brdr-primary plr-25"><b>Order Now</b></a></h6>
                    </div>
                    <!--text-center-->
                </div><!-- col-md-3 -->

                <div class="col-lg-3 col-md-4  col-sm-6 ">
                    <div class="center-text mb-30">
                        <div class="ïmg-200x mlr-auto pos-relative"><img src="Admin/upload/pas_1582636939.jpg" style="height:200px; border-radius: 50%" alt=""></div>
                        <h5 class="mt-20">Mimosa</h5>
                        <h4 class="mt-5"><b>1050 tk</b></h4>
                        <h6 class="mt-20"><a href="order.php?productname=Mimosa" class="btn-brdr-primary plr-25"><b>Order Now</b></a></h6>
                    </div>
                    <!--text-center-->
                </div><!-- col-md-3 -->
                <div class="col-lg-3 col-md-4  col-sm-6 ">
                    <div class="center-text mb-30">
                        <div class="ïmg-200x mlr-auto pos-relative"><img src="Admin/upload/ds3_1582637673.jpg" style="height:200px; border-radius: 50%" alt=""></div>
                        <h5 class="mt-20">Cherry Custard Cake</h5>
                        <h4 class="mt-5"><b>500 tk</b></h4>

                        <h6 class="mt-20"><a href="order.php?productname=Cherry Custard Cake" class="btn-brdr-primary plr-25"><b>Order Now</b></a></h6>
                    </div>
                    <!--text-center-->
                </div><!-- col-md-3 -->

                <div class="col-lg-3 col-md-4  col-sm-6 ">
                    <div class="center-text mb-30">
                        <div class="ïmg-200x mlr-auto pos-relative"><img src="Admin/upload/pepperoni-pizza3+srgb._1584699903.jpg" style="height:200px; border-radius: 50%" alt=""></div>
                        <h5 class="mt-20">Pepperoni Pizza</h5>
                        <h4 class="mt-5"><b>1020 tk</b></h4>
                        <h6 class="mt-20"><a href="order.php?productname=Pepperoni Pizza" class="btn-brdr-primary plr-25"><b>Order Now</b></a></h6>
                    </div>
                    <!--text-center-->
                </div><!-- col-md-3 -->

                <div class="col-lg-3 col-md-4  col-sm-6 ">
                    <div class="center-text mb-30">
                        <div class="ïmg-200x mlr-auto pos-relative">

                            <img src="Admin/upload/grilled+chicken+caprese+pasta2_1584700411.jpg" style="height:200px; border-radius: 50%" alt="">
                        </div>
                        <h5 class="mt-20">Grilled Chicken Caprese</h5>
                        <h4 class="mt-5"><b>950 tk</b></h4>
                        <h6 class="mt-20"><a href="order.php?productname=Grilled Chicken Caprese" class="btn-brdr-primary plr-25"><b>Order Now</b></a></h6>
                    </div>
                    <!--text-center-->
                </div><!-- col-md-3 -->

                <div class="col-lg-3 col-md-4  col-sm-6 ">
                    <div class="center-text mb-30">
                        <div class="ïmg-200x mlr-auto pos-relative">
                            <img src="Admin/upload/romana.png" style="height:200px; border-radius: 50%" alt="">
                        </div>
                        <h5 class="mt-20">Romana Pizza</h5>
                        <h4 class="mt-5"><b>1050 tk</b></h4>
                        <h6 class="mt-20"><a href="order.php?productname=Romana Pizza" class="btn-brdr-primary plr-25"><b>Order Now</b></a></h6>
                    </div>
                    <!--text-center-->
                </div><!-- col-md-3 -->

                <div class="col-lg-3 col-md-4  col-sm-6 ">
                    <div class="center-text mb-30">
                        <div class="ïmg-200x mlr-auto pos-relative"><img src="Admin/upload/bar3_1582637275.jpg" style="height:200px; border-radius: 50%" alt=""></div>
                        <h5 class="mt-20">Le Pigeon Burger</h5>
                        <h4 class="mt-5"><b>1050 tk</b></h4>
                        <h6 class="mt-20"><a href="order.php?productname=Le Pigeon Burger" class="btn-brdr-primary plr-25"><b>Order Now</b></a></h6>
                    </div>
                    <!--text-center-->
                </div><!-- col-md-3 -->
            </div><!-- row -->

            <h6 class="center-text mt-40 mt-sm-20 mb-30"><a href="fullmenu.php" class="btn-primaryc plr-25"><b>SEE TODAYS MENU</b></a></h6>
        </div><!-- container -->
    </section>



    <section class="pt-0">
        <div class="container">
            <br>
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4" style="text-align:justify">
                    <h4 class="pos-relative mb-20 pt-20"><i class="abs-bl icon-box icon-pizza"></i><b class="pl-60">Italian pizza</b></h4>
                    <p class="mb-30">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                </div><!-- col-md-4-->

                <div class="col-sm-12 col-md-6 col-lg-4" style="text-align:justify">
                    <h4 class="pos-relative mb-20 pt-20"><i class="abs-bl icon-box icon-ingradient"></i><b class="pl-60">Best ingredients</b></h4>
                    <p class="mb-30">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
                </div><!-- col-md-4-->

                <div class="col-sm-12 col-md-6 col-lg-4" style="text-align:justify">
                    <h4 class="pos-relative mb-20 pt-20"><i class="abs-bl icon-box icon-cshef"></i><b class="pl-60">Top Chefs</b></h4>
                    <p class="mb-30">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
                </div><!-- col-md-4-->
            </div><!-- row-->
        </div><!-- container-->
    </section><!-- counter-section-->






    <!-- SCIPTS -->
    <script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
    <script src="plugin-frameworks/bootstrap.min.js"></script>
    <script src="plugin-frameworks/swiper.js"></script>
    <script src="plugin-frameworks/jquery.waypoints.min.js"></script>
    <script src="plugin-frameworks/progressbar.min.js"></script>
    <script src="common/scripts.js"></script>

    <!-- SCIPTS -->
    <script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
    <script src="plugin-frameworks/bootstrap.min.js"></script>
    <script src="plugin-frameworks/swiper.js"></script>
    <script src="common/scripts.js"></script>


</body>

</html>


<?php include 'footer.php'; ?>
