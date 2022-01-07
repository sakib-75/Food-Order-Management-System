<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Luigi's</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>


    <!-- Stylesheets -->
    <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
    <link href="plugin-frameworks/swiper.css" rel="stylesheet">
    <link href="fonts/ionicons.css" rel="stylesheet">
    <link href="common/styles.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="Admin/fontawesome-free-5.13.0-web/css/all.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


</head>

<body>

    <header>
        <div class="container">
            <a class="logo" href="index.php"><img src="images/logo-white.png" alt="Logo"></a>

            <div class="right-area">
                <h6><a class="plr-20 color-white btn-fill-primary" href="tel:+8801914603437"> Order: +8801914603437</a></h6>
            </div><!-- right-area -->

            <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

            <ul class="main-menu font-mountainsre" id="main-menu">
                <li id="item"><a href="index.php">Home</a></li>
                <li id="item"><a href="fullmenu.php">Menu</a></li>
                <li id="item"><a href="allnews.php">News</a></li>
                <li id="item"><a href="services.php">Services</a></li>
                <li id="item"><a href="about_us.php">About us</a></li>

            </ul>

            <div class="clearfix"></div>
        </div><!-- container -->
    </header>
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



        .zoom-effect-container {
            float: left;
            position: relative;
            height: 300px;
            width: 100%;
            margin: 0 auto;
            overflow: hidden;
            border-radius: 10px;
        }

        .image-card {
            position: absolute;
            top: 0;
            left: 0;
        }

        .image-card img {
            -webkit-transition: 0.4s ease;
            transition: 0.5s ease;
        }

        .zoom-effect-container:hover .image-card img {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

    </style>

    <section class="bg-7 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
            <div class="dplay-tbl">
                <div class="dplay-tbl-cell center-text color-white pt-90">

                    <h1 class="mt-30 mb-15"><i><b>Blog and Food News</b></i></h1>
                </div><!-- dplay-tbl-cell -->
            </div><!-- dplay-tbl -->
        </div><!-- container -->
    </section>


    <?php

extract($_POST); 
if(isset($_POST['add'])){ 

     $search = $_POST['search'];
	 $where = "where food like '%$search%' ";
    
}else{   
    $where="";  
}  

?>

    <div class="col-md-5 col-lg-4 mt-50" style="margin:auto">

        <form action="" method="post" id="form" class="mb-sm-30 mt-sm-30 placeholder-2 form-style-1 pos-relative">
            <input type="text" name="search" class="pr-50" autocomplete="off" placeholder="Search food name...">
            <input type="hidden" name="add" value="post" />
            <button name="submit" class="abs-tbr plr-20" type="submit"><i class="fa fa-search"></i></button>
        </form>

        <!--mx-w-500x-->
    </div>

    <div class="w3-main w3-content w3-padding" style="max-width:1300px;margin-top:30px">
        <div class="w3-row-padding w3-padding-16 w3-center">



            <?php 
						include_once 'connection.php';

                            $post_query = "SELECT * FROM postnews $where";
		                    $post_query_result = mysqli_query($mysqli,$post_query);
		                    if (!$post_query_result) {
		                           	die("view_add_query_result failed ".mysqli_error($mysqli));
		                    }

		                    while ($row=mysqli_fetch_assoc($post_query_result)) {
                                
								$postid=$row['postid'];
			                    $foodname=$row['food'];
								$title=$row['title'];
								$image=$row['image'];
								$date=$row['date'];
								
							?>

            <div class="w3-quarter mt-30" id="newsbody">

                <div class="zoom-effect-container">
                    <div class="image-card">
                        <img src="Admin/<?php echo $image;?>" alt="Image" id="img">

                    </div>
                </div>
                <span style="margin-top:15px"><i class="fa fa-calendar-o mr-2"></i><?php echo $date?></span>
                <p style="margin-top:5px"><i class="fas fa-utensils"></i> <b>: <?php echo $foodname ;?></b></p>

                <a href='blog.php?newsid=<?php echo $postid ;?>'>
                    <h3><?php echo $title ;?></h3>
                </a>
            </div>

            <?php
			}
			?>

        </div>
    </div>


    <style>
        #form {
            font-size: 18px;
        }

        #img {
            height: 300px;
            width: 100%;
            border-radius: 15px;
        }


        @media only screen and (max-width: 600px) {
            #form {
                font-size: 16px;
            }

            #img {
                height: auto;
                width: 100%;
            }

            #newsbody {
                height: auto;
                width: 100%;
            }

        }

        #newsbody {
            height: 520px;
            margin: auto;
            padding: 10px;

        }

    </style>



    <br><br><br>

</body>

</html>

<?php include_once 'footer.php'; ?>
