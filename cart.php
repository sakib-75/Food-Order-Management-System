<?php   // Login first alert

session_start();
include_once 'connection.php';
 $_SESSION['message'] = '';

  if(!isset($_COOKIE["u_name"])){
  $_SESSION['message'] = "Login First !!";
  $style="color:red";
  
  $_SESSION['RedirectKe'] = $_SERVER['REQUEST_URI'];  
  header( "refresh:3;url=login.php" );
  
  $_COOKIE['u_name']="";
  
 }
  
 if(isset($_GET['id'])){  // message color code
    $idd=$_GET['id'];
    if($idd==1){
	    $_SESSION['message'] = " ..Already In Cart!!";
		$style="color:brown";
    }
    elseif($idd==2){
	    $_SESSION['message'] = " ..Successfully Added to Cart !!";
		$style="color:green";
    }
    elseif($idd==3){
	    $_SESSION['message'] = " ..Successfully Deleted !!";
		$style="color:red";
    }
 }
 else{
	$style="color:red";
 }	
?>


<?php  //food name in message

if(isset($_GET['food'])){
	
    $foodmessage=$_GET['food'];
 
 }
 else{
	 
	$foodmessage="";
 }	 
	 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Food cart</title>
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
    <link href="plugin-frameworks/swiper.css" rel="stylesheet">
    <link href="fonts/ionicons.css" rel="stylesheet">
    <link href="common/styles.css" rel="stylesheet">

</head>


<body>




    <section class="bg-7 h-500x main-slider pos-relative" style="background-image: url('images/cart.jpg') ">
        <header>
            <div class="container">
                <a class="logo" href="index.php"><img src="images/logo-white.png" alt="Logo"></a>

                <div class="right-area">
                    <h6><a class="plr-20 color-white btn-fill-primary" href="tel:+8801914603437">Call: +8801914603437</a></h6>
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
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
            <div class="dplay-tbl">
                <div class="dplay-tbl-cell center-text color-white pt-90">

                    <h2 class="mt-30 mb-15">Cart</h2>
                </div><!-- dplay-tbl-cell -->
            </div><!-- dplay-tbl -->
        </div><!-- container -->
    </section>

    <br>
    <br>
    <br>



    <div class="container">
        <div class=" text-center">
            <h2>Available item in cart &nbsp <i class="fas fa-cart-plus"></i></h2>
            <br>
        </div>
        <h4 style="<?php echo $style;?>" class='text-center mt-3'> <b style="font-family:Verdana;color:#ff6600"><?php echo $foodmessage; ?></b><b><?php echo $_SESSION['message']; ?></b></h4><br><br>

        <?php

        include_once 'connection.php';
          
		$username=$_COOKIE['u_name'];
		$query = "SELECT * FROM cart where user='$username' ";
		$post_edit_query_result = mysqli_query($mysqli,$query);
		if (!$post_edit_query_result) {
			die("view_add_query_result failed ".mysqli_error($mysqli));
		}
		if (mysqli_num_rows($post_edit_query_result)==0)
        {
			 ?><h4 style='color:red' class='text-center mt-3'><b><?php echo "No Item Available In Cart"; ?></b></h4>
        <?php
        }

		while ($row=mysqli_fetch_assoc($post_edit_query_result)) {
								
			$foodname=$row['food'];
            $price=$row['price'];
			$image=$row['photo'];
				
			?>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <?php echo"<a href='singlefood.php?productname=$foodname' ><h5><b> $foodname</b> </h5></a>" ?>

                </div>
                <div class="panel-footer text-center">
                    <h5> &#2547; <?php echo number_format($price, 2); ?> </h5>
                </div>
                <div class="panel-body">

                    <img src="Admin/<?php echo $image; ?>" height="225px;" width="100%">

                </div>
            </div>

            <div class=" text-center">
                <a onclick="return confirm('Are you sure to delete.. <?php echo $foodname ;?>?')" href="deleteproduct.php?delete=<?php echo $foodname ;?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Remove</a>
            </div>
            <br><br>

        </div>

        <?php
			
        }
		
?>

    </div>



    <br> <br> <br> <br>


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

    </style>



</body>

</html>


<?php include_once 'footer.php'; ?>
