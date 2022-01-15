<?php 
ob_start(); 
session_start(); 
//database Connection For Every Page
	include "connection.php";
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Food profile</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>

    <link href="singlefoodcss/css/bootstrap.min.css" rel="stylesheet">
    <link href="singlefoodcss/css/font-awesome.min.css" rel="stylesheet">
    <link href="singlefoodcss/style.css" rel="stylesheet">


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
                <h6><a class="plr-20 color-white btn-fill-primary" href="tel:+8801914603437 "> Call: +8801914603437</a>
                </h6>
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


    <section class="bg-7 h-500x main-slider pos-relative" style=" background-image: url('images/blog-1-1000x400.jpg');">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
            <div class="dplay-tbl">
                <div class="dplay-tbl-cell center-text color-white pt-90">
                    <h4 style="font-family:Lucida Console">Food Profile</h4>
                    <h3 style="  font-family:Segoe Script;"><b><?php  echo $_GET['productname']; ?></b></h3>
                </div><!-- dplay-tbl-cell -->
            </div><!-- dplay-tbl -->
        </div><!-- container -->
    </section>

    <br><br>

    <div class="container main-body">
        <div class="row mt-3">
            <div class="col-md-3">
                <h4 class="text-center">Categories</h4>
                <br>
                <ul class="list-group categories-list">
                    <?php	
			        $sql="select * from category ";
			        $query=$mysqli->query($sql);
			        while($row=$query->fetch_array()){
						$catname=$row['catname'];?>

                    <li style="font-size:15px;" id="hov" class="list-group-item">
                        <a href="allfood.php?p_id=<?php echo $catname;?>">
                            <h5><b><?php echo $row['catname'] ?></b></h5>
                        </a>
                    </li>
                    <?php }?>
                </ul>
            </div>

            <div class="col-md-9">
                <?php 
				include_once 'connection.php';

                if (isset($_GET['productname'])) {
							
		            $the_post_id=$_GET['productname'];
		            $post_edit_query = "SELECT * FROM product WHERE productname = '$the_post_id' ";
		            $post_edit_query_result = mysqli_query($mysqli,$post_edit_query);
		            if (!$post_edit_query_result) {
		                die("view_add_query_result failed ".mysqli_error($mysqli));
		            }

		            while ($row=mysqli_fetch_assoc($post_edit_query_result)) {
								
			            $foodid=$row['productid'];
                        $foodname=$row['productname'];
						$category=$row['categoryname'];
						$price=$row['price'];
						$image=$row['photo'];
						$quantity=$row['quantity'];
						$offer=$row['offer'];
                        $offer_title=$row['offer_title'];
								
						if($quantity>0){
							$availability="Available";
							$style2="success";
									
						}else{
							$availability="Not Available";
							$style2="danger";
						}
								
						if($offer>0){
							$badge='<img style="float: right !important;height:150px;width:150px"src="images/offer.jpg" alt="Mobile">';
							        
							$cut=$price*($offer/100);
							$final_price=($price-$cut);
							$price_style =' &#2547; <b style="color:red;text-decoration: line-through;">'.$price.'</b> is now';
						}
						else{
							$badge="";
							$price_style="";
							$final_price=$price;
						}
									
						//Rating Calculation
                        $sql1="SELECT count(review_id) as total FROM user_review WHERE foodid='$foodid' ";
                        $result1 =  mysqli_query($mysqli,$sql1);
                        $value1 = mysqli_fetch_assoc($result1);
                        $total = $value1['total']; //Totel review of this food

                        $sql1="SELECT sum(rating) as total FROM user_review WHERE foodid='$foodid' ";
                        $result2 =  mysqli_query($mysqli,$sql1);
                        $value2 = mysqli_fetch_assoc($result2);
                        $totalrate = $value2['total']; //Total sum of rating of this food

                        if($total==0){
	                        $Rating="";	
	                        $place = '<span style="font-size:14px;" class="badge badge-pill badge-danger"> No Review </span>';
                        }
                        else{	
                            $Rate=$totalrate/$total;
	                        $Rating=number_format($Rate, 1, '.', '');
	
	                        if($Rating<3){
		                        $style="color:red"; 
	                        }	
                            else{ 
		                        $style="color:green";												
	                        }
	                        $place = "<b style=".$style." > ". $Rating ." </b>";
                        }
						?>

                <!-- single food start -->
                <div class="row single-ad-item mb-3" style="border-radius:25px">
                    <div class="col-md-12">
                        <!-- food title -->
                        <h3 class="item-title"><?php echo $foodname; ?></h3><br> 
                        <h5 class="item-details">Category :<b> <?php echo $category;  ?></b> </h5>
                        <h5 class="item-details">
                            Rating : <b><?php echo $place;?></b>
                            <?php
							if( (1<$Rating && $Rating<2) || (2<$Rating && $Rating<3) || (3<$Rating && $Rating<4) || (4<$Rating && $Rating<5) ){
                                for ($x=1; $x < $Rating; $x++) {?>
                                    <i class="fa fa-star" style="font-size:20px"></i>
                                <?php 
                                }?>

                                <i class="fas fa-star-half-alt" style="font-size:20px"></i>
                            <?php	
							}
							else{									
								for ($x=1; $x <= $Rating; $x++) {?>
                                    <i class="fa fa-star" style="font-size:20px"></i>
                                <?php
                                }
							}	
							?>
                        </h5>

                        <?php echo $badge;?>
                        <h5 class="item-details">
                            Available Quantity: <b> <?php echo $quantity; ?></b>
                            <span style="font-size:14px" class="badge badge-pill badge-<?php  echo $style2;?>">
                                <?php echo $availability;?>
                            </span>
                        </h5>
                        <h5 class="item-details">
                            Price :<?php echo $price_style;?> &#2547;
                            <b><?php echo $final_price;?></b>
                        </h5>
                        <?php

                        if($offer>0){?>
                            <h5 style="color:Crimson;font-family: Lucida Handwriting;font-weight:bold">
                                <?php echo $offer_title;?>
                            </h5>
                        <?php
                        }
                        ?>

                        <br>
                        <!-- food image -->
                        <div class="single-item-img p_img">
                            <img id="myImg" src="Admin/<?php echo $image; ?>" alt="<?php echo $foodname ;?>">
                        </div>
                        <br><br>
                        <div class="row-center">
                            <span class="small mr-3">
                                <a id="hov1" href="addcart.php?insert=<?php echo $foodname ;?>" class="btn btn-warning btn-lg">
                                    <i class="fas fa-cart-plus"></i> Add to cart
                                </a>
                            </span>

                            <?php
							if($quantity==0){ //Order is not possible
							?>
                            <span class="small mr-3">
                                <a id="not-allowed" href="" class="btn btn-success btn-lg">
                                    <i class="fas fa-check-circle"></i> Order now
                                </a>
                            </span>
                            <?php
								echo '<b style="color:red;font-size:16px "> Out of stock </b>';							
							}
							else{  //Order possible
							?>
                                <span class="small mr-3">
                                    <a id="hov1" href="order.php?productname=<?php echo $foodname ;?>" class="btn btn-success btn-lg">
                                        <i class="fas fa-check-circle"></i> Order now
                                    </a>
                                </span>
                            <?php	
							}	
				            ?>

                            <a id="hov1" href="reviewmodal.php?productname=<?php echo $foodname ;?>" class="pull-right btn btn-primary btn-lg">
                                <i class="fas fa-award"></i> Review
                            </a>

                        </div>
                        <br>

                    </div>
                </div>
                <?php   
					}

				}
				?>

            </div>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

    <br>
    <br>
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

        .item-details{
            font-size: 20px;
            margin: 5px 0px;
        }

        #not-allowed {
            cursor: not-allowed;
            border-radius: 25px;
        }

        #hov:hover {
            -webkit-box-shadow: 0px 0px 10px 0px red;
            box-shadow: 0px 0px 10px 0px red;
        }

        #hov {
            border-radius: 25px;
            margin-bottom: 15px;
        }

        #hov1:hover {
            -webkit-box-shadow: 0px 0px 10px 0px black;
            box-shadow: 0px 0px 10px 0px black;
        }

        #hov1 {
            border-radius: 25px;
        }

        #myImg {
            cursor: zoom-in;
            transition: 0.5s;
            border-radius: 20px;
        }

        #myImg:hover {
            opacity: 0.8;
            -ms-transform: scale(1.05);
            /* IE 9 */
            -webkit-transform: scale(1.05);
            /* Safari 3-8 */
            transform: scale(1.05);
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Sit on top */
            padding-top: 80px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;


            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 100%;
            max-width: 900px;

        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
            font-size: 30px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 50px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
            font-size: 60px;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>




    <section class="pt-0">
        <div class="container">
            <br>
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4" style="text-align:justify">
                    <h4 class="pos-relative mb-20 pt-20"><i class="abs-bl icon-box icon-pizza"></i><b
                            class="pl-60">Italian pizza</b></h4>
                    <p class="mb-30">There are many variations of passages of Lorem Ipsum available, but the majority
                        have suffered alteration in some form, by injected humour, or randomised words which don't look
                        even slightly believable.</p>
                </div><!-- col-md-4-->

                <div class="col-sm-12 col-md-6 col-lg-4" style="text-align:justify">
                    <h4 class="pos-relative mb-20 pt-20"><i class="abs-bl icon-box icon-ingradient"></i><b
                            class="pl-60">Best ingredients</b></h4>
                    <p class="mb-30">There are many variations of passages of Lorem Ipsum available, but the majority
                        have suffered alteration in some form, by injected humour, or randomised words which don't look
                        even slightly believable. </p>
                </div><!-- col-md-4-->

                <div class="col-sm-12 col-md-6 col-lg-4" style="text-align:justify">
                    <h4 class="pos-relative mb-20 pt-20"><i class="abs-bl icon-box icon-cshef"></i><b class="pl-60">Top
                            Chefs</b></h4>
                    <p class="mb-30">There are many variations of passages of Lorem Ipsum available, but the majority
                        have suffered alteration in some form, by injected humour, or randomised words which don't look
                        even slightly believable. </p>
                </div><!-- col-md-4-->
            </div><!-- row-->
        </div><!-- container-->
    </section><!-- counter-section-->


    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function () {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }
    </script>

</body>

</html>

<?php include_once 'footer.php'; ?>