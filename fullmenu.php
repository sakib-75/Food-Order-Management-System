<head>

    <title>Food Order System</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <link type="text/css" rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <script src="Bootstrap/js/jquery.min.js"></script>
    <script src="Bootstrap/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css" />

    <!-- Stylesheets -->
    <link href="plugin-frameworks/swiper.css" rel="stylesheet">
    <link href="fonts/ionicons.css" rel="stylesheet">
    <link href="common/styles.css" rel="stylesheet">

</head>

<html>

<body>

    <section class="bg-7 h-500x main-slider pos-relative"
        style=" background-image: url('images/slider_5_1920_600.jpg');">
        <header>
            <div class="container">
                <a class="logo" href="index.php"><img src="images/logo-white.png" alt="Logo"></a>

                <div class="right-area">
                    <h6><a class="plr-20 color-white btn-fill-primary" href="tel:+8801914603437 ">Call:
                            +8801914603437</a></h6>
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

                    <h2 class="mt-30 mb-15" style="font-family:Segoe Script"><b>Food Menu</b></h2>
                </div><!-- dplay-tbl-cell -->
            </div><!-- dplay-tbl -->
        </div><!-- container -->
    </section>

    <style>
        #select{
            transition: 0.5s;
        }
        #select:hover {
            -webkit-box-shadow: 0 10px 20px #d3d3d3;
            -moz-box-shadow: 0 10px 20px #d3d3d3;
            box-shadow: 0 10px 20px #d3d3d3;
        }

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

        .image-body {
            height: auto;
            width: 100%;
            overflow: hidden;
        }
        .image-body a{
            display: block;
            width: 100%;
        }

        #select:hover .image-body img{
            transition: 0.50s;
            transform: scale(1.1);
        }
    </style>

    <div class="container">

        <h1 class="page-header text-center"></h1>
        <ul class="nav nav-tabs">
            <?php
            session_start();
            include_once 'connection.php';
			
			$sql="select * from category order by categoryid asc limit 1";
			$fquery=$mysqli->query($sql);
			$frow=$fquery->fetch_array();
			?>
            <li class="active">
                <a data-toggle="tab" href="#<?php echo $frow['catname'] ?>">
                    <h5><b><?php echo $frow['catname'] ?></b></h5>
                </a>
            </li>
            <?php

			$sql="select * from category order by categoryid asc";
			$nquery=$mysqli->query($sql);
			$num=$nquery->num_rows-1;

			$sql="select * from category order by categoryid asc limit 1, $num";
			$query=$mysqli->query($sql);
			while($row=$query->fetch_array()){
				?>
            <li>
                <a data-toggle="tab" href="#<?php echo $row['catname'] ?>">
                    <h5><b><?php echo $row['catname'] ?></b></h5>
                </a>
            </li>
            <?php
			}
		?>
        </ul>

        <div class="tab-content">
            <?php
			$sql="select * from category order by categoryid asc limit 1";
			$fquery=$mysqli->query($sql);
			$ftrow=$fquery->fetch_array();
			?>
            <div id="<?php echo $ftrow['catname']; ?>" class="tab-pane fade in active" style="margin-top:20px;">
                <?php

				$sql="select * from product where categoryid='".$ftrow['categoryid']."'";
				$pfquery=$mysqli->query($sql);
				$inc=4;
				while($pfrow=$pfquery->fetch_array()){
					$inc = ($inc == 4) ? 1 : $inc+1; 
					if($inc == 1) echo "<div class='row'>"; 
							
					$foodname=$pfrow['productname'];
					$sql1="SELECT offer as total FROM product WHERE productname='$foodname' ";
                    $result1 =  mysqli_query($mysqli,$sql1);
                    $value1 = mysqli_fetch_assoc($result1);
                    $offer = $value1['total'];
							
					if($offer>0){
						$badge= '<span style="font-family:Calibri;background-color:#CD5C5C;font-size:18px" class="badge badge-pill badge-danger">'.$offer.' % OFF </span>';
							   
						$price=$pfrow['price'];
						$cut=$price*($offer/100);
						$final_price=($price-$cut);
							 
					}else{
						$badge="";
						$final_price=$pfrow['price'];
					}

					?>

                <div class="col-md-3">
                    <div class="panel panel-default" id="select">
                        <div class="panel-heading text-center">
                            <?php echo"<a href='singlefood.php?productname=$foodname' ><h5><b> $foodname</b> </h5></a>" ?>
                        </div>
                        <div class="panel-body">
                            <div class="image-body">
                                <a href='singlefood.php?productname=<?php echo $foodname?>'> 
                                    <img src="Admin/<?php if(empty($pfrow['photo'])){echo "upload/noimage.jpg";} else{echo $pfrow['photo'];} ?>" height="225px;" width="100%">
                                </a>
                            </div>
                        </div>

                        <div class="panel-footer text-center">
                            <h5> &#2547; <?php echo number_format($final_price);?> <?php echo $badge;?></h5>
                        </div>
                    </div>
                </div>
                <?php
				if($inc == 4) echo "</div>";
				}
				if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
				if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
				if($inc == 3) echo "<div class='col-md-3'></div></div>"; 
				?>

            </div>
            <?php

			$sql="select * from category order by categoryid asc";
			$tquery=$mysqli->query($sql);
			$tnum=$tquery->num_rows-1;
			$sql="select * from category order by categoryid asc limit 1, $tnum";
			$cquery=$mysqli->query($sql);

			while($trow=$cquery->fetch_array()){
				?>

            <div id="<?php echo $trow['catname']; ?>" class="tab-pane fade" style="margin-top:20px;">

                <?php
				$sql="select * from product where categoryid='".$trow['categoryid']."'";
				$pquery=$mysqli->query($sql);
				$inc=4;
				while($prow=$pquery->fetch_array()){
					$inc = ($inc == 4) ? 1 : $inc+1; 
					if($inc == 1) echo "<div class='row'>"; 
							
					$foodname=$prow['productname'];
					$sql1="SELECT offer as total FROM product WHERE productname='$foodname' ";
                    $result1 =  mysqli_query($mysqli,$sql1);
                    $value1 = mysqli_fetch_assoc($result1);
                    $offer = $value1['total'];
							
					if($offer>0){
							$badge= '<span style="font-family:Calibri;background-color:#CD5C5C;font-size:18px" class="badge badge-pill badge-danger">'.$offer.' % OFF </span>';
							    
						$price=$prow['price'];
						$cut=$price*($offer/100);
						$final_price=($price-$cut);
							 
					}else{
						$badge="";
						$final_price=$prow['price'];
					}
							
					?>

                <div class="col-md-3">
                    <div class="panel panel-default" id="select">
                        <div class="panel-heading text-center">
                            <?php echo"<a href='singlefood.php?productname=$foodname' ><h5><b> $foodname</b></h5></a>" ?>
                        </div>

                        <div class="panel-body">
                            <div class="image-body">
                                <a href='singlefood.php?productname=<?php echo $foodname?>'>
                                    <img src="Admin/<?php if($prow['photo']==''){echo "upload/noimage.jpg";} else{echo $prow['photo'];} ?>" height="225px;" width="100%">
                                </a>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <h5> &#2547; <?php echo number_format($final_price); ?> <?php echo $badge;?></h5>
                        </div>
                    </div>
                </div>
                <?php
				if($inc == 4) echo "</div>";
				}
				if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
				if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
				if($inc == 3) echo "<div class='col-md-3'></div></div>"; 
				?>

            </div>
            <?php
			}
		    ?>
        </div>
    </div>




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



</body>

</html>

<?php include_once 'footer.php'; ?>