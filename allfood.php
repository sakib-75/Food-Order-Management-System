<?php ob_start(); ?>
<?php session_start(); ?>
<?php 
//database Connection For Every Page
	include "connection.php";
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>All Food</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">


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
                <h6><a class="plr-20 color-white btn-fill-primary" href="tel:+8801914603437 "> Call: +8801914603437 </a></h6>
            </div><!-- right-area -->

            <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

            <ul class="main-menu font-mountainsre" id="main-menu">
                <li id="item"><a href="index.php">Home</a></li>
                <li id="item"><a href="fullmenu.php">Menu</a></li>
                <li id="item"><a href="allnews.php">News</a></li>
                <li id="item"><a href="03_menu.html">Services</a></li>
                <li id="item"><a href="02_about_us.html">About us</a></li>

            </ul>

            <div class="clearfix"></div>
        </div><!-- container -->
    </header>


    <section class="bg-7 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
            <div class="dplay-tbl">
                <div class="dplay-tbl-cell center-text color-white pt-90">

                    <h3 class="mt-30 mb-15">The Best Quality food </h3>
                </div><!-- dplay-tbl-cell -->
            </div><!-- dplay-tbl -->
        </div><!-- container -->
    </section>

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

        #hov:hover {
            -webkit-box-shadow: 0px 0px 10px 0px red;
            box-shadow: 0px 0px 10px 0px red;
        }

        #hov {
            border-radius: 25px;
            margin-bottom: 15px;
        }

        #offer-img {
            float: right !important;
            height: 140px;
            width: 230px
        }

        @media only screen and (max-width: 600px) {
            #offer-img {
                float: right !important;
                height: 60px;
                width: 120px;
                margin-top: 10px;
            }
        }

    </style>


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

                    <li id="hov" style="font-size:15px;" class="list-group-item"><a href="allfood.php?p_id=<?php echo $catname;?>">
                            <h5><b><?php echo $row['catname'] ?></b></h5>
                        </a></li>

                    <?php }?>
                </ul>
            </div>
            <div class="col-md-9">

                    <?php
                        //query for view post by category 
				        if (isset($_GET['p_id'])) {
				    	$p_id=$_GET['p_id'];
				    	$view_post_query = "SELECT * FROM product WHERE categoryname= '$p_id' ";
						$view_post_query_result = mysqli_query($mysqli,$view_post_query);
						if (!$view_post_query_result) {
							die("view_add_query_result failed ".mysqli_error($mysqli));
						}
		
                        ?><h3 class="item-title"><?php echo $p_id; ?></h3><br><?php
						while ($row=mysqli_fetch_assoc($view_post_query_result)) {
                            
				            $foodid=$row['productid'];
			                $foodname=$row['productname'];
							$category=$row['categoryname'];
							$price=$row['price'];
							$image=$row['photo'];
							$offer=$row['offer'];
								
								
                            $sql1="SELECT count(username) as total FROM user_review WHERE foodid='$foodid' ";
                            $result1 =  mysqli_query($mysqli,$sql1);
                            $value1 = mysqli_fetch_assoc($result1);
                            $total = $value1['total'];


                            $sql1="SELECT sum(rating) as total FROM user_review WHERE foodid='$foodid' ";
                            $result2 =  mysqli_query($mysqli,$sql1);
                            $value2 = mysqli_fetch_assoc($result2);
                            $totalrate = $value2['total'];

                            if($total==0){
	                           $Rating="No rating";
                            }
                            else{
                                $Rate=$totalrate/$total;
	                            $Rating=number_format($Rate, 1, '.', '');
                            }
								
								
							if($offer>0){
								$badge='<img id="offer-img" src="images/offer.png" alt="Special Offer">';
							    $prc='('.$offer.' % off)';
								$cut=$price*($offer/100);
							    $final_price=($price-$cut);
							}
							else{
								$badge="";
								$prc="";
							    $final_price=$price;
							}
							
							?>
                <div class="row single-ad-item mb-3" style="border-radius:15px">
                    <div class="col-md-3">
                        <img src="Admin/<?php echo $image; ?>" style="height:150px; border-radius: 10%" alt="myads">
                    </div>
                    <div class="col-md-9">
                        <a href='singlefood.php?productname=<?php echo $foodname ;?>'>
                            <h4 style="font-family:Calibri"><b><?php echo $foodname;?></b>  </h4> 
                        </a>
                        <?php echo $badge;?>
                        <p>
                            <span>
                                <h5 style="font-family:Calibri;font-size:150%">Price: &#2547; <b><?php echo $final_price ;?></b> <?php echo $prc;?> </h5>
                            </span>
                            <span>
                                <h5 style="font-family:Calibri;font-size:150%">Category: <b><?php echo $category; ?></b></h5>
                            </span> &nbsp
                            <span>
                                <h5 style="font-family:Calibri;font-size:150%">Rating: <b><?php echo $Rating; ?>&#9733 </b></h5>
                            </span>

                        </p>

                    </div>
                </div>

                <?php
						}
				    }
				 ?>
            </div>
        </div>
    </div>

    <br>
    <br>




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



</body>

</html>

<?php include_once 'footer.php'; ?>

