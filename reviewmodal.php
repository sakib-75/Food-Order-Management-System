<!DOCTYPE html>
<html lang="en">

<head>
    <title>Food Review</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">


    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css" />

    <!-- Stylesheets -->
    <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
    <link href="plugin-frameworks/swiper.css" rel="stylesheet">
    <link href="fonts/ionicons.css" rel="stylesheet">
    <link href="common/styles.css" rel="stylesheet">


    <link type="text/css" rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <script src="Bootstrap/js/jquery.min.js"></script>
    <script src="Bootstrap/js/bootstrap.js"></script>


</head>

<body>

    <?php 
					
	include_once 'connection.php';

    if (isset($_GET['productname'])) {  //Page info collect
        				
        $the_post_id=$_GET['productname'];
		$post_edit_query = "SELECT * FROM product WHERE productname = '$the_post_id' ";
		$post_edit_query_result = mysqli_query($mysqli,$post_edit_query);
        if (!$post_edit_query_result) {
		    die("view_add_query_result failed ".mysqli_error($mysqli));
		 }
         while ($row=mysqli_fetch_assoc($post_edit_query_result)) {
				$foodid=$row['productid'];
			    $foodname=$row['productname'];
				$foodimage=$row['photo'];
		}
    }
  
//User login info
    
    if(!isset($_COOKIE["u_name"])){	 
        $_SESSION['message'] = "Login now for share your review !!";
        $style="color:red";
        $un="";
    }
    elseif(isset($_COOKIE["u_name"])){
		
        $un = $_COOKIE["u_name"];
        $query = $mysqli->query("SELECT * FROM u_info WHERE u_name = '$un'");
        if (mysqli_num_rows($query)) {
          $data = $query->fetch_assoc();
          $user_photo= $data['image'];
		} 
        $_SESSION['message'] ="";
        $style="";
	}
	$_SESSION['id']="";
    $pid="";
    


   
//Review edit insert option 
    
extract($_POST);
function test($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($submit)){
	
	if(!isset($_COOKIE["u_name"])){		
        $_SESSION['message'] = "You have to login first !!";
        $style="color:red";
    }
	else{
		
        if(!isset($rate)){	
            $_SESSION['message'] = "Please select any rating option!";
            $style="color:red";	
        }
        else{
			
			$message=  test($review);
			$date= date('Y/m/d');
            
            $rs=mysqli_query($mysqli,"select * from user_review where  username='$un' and foodid='$foodid'");
            if (mysqli_num_rows($rs)>0)  //Update review
            {
                if($message==""){  //Update without comment
					
					$sql="update user_review set username='$un',rating='$rate',userimage='$user_photo',date='$date'  where username='$un' and foodid='$foodid'";
	                $mysqli->query($sql);
                    
                    $value = mysqli_fetch_assoc($rs);
                    $pid = $value['review_id'];	
	                $_SESSION['message'] ="Review updated successfully!";
                    $_SESSION['id']=1;
	                $style="color:green";				
				}
                else{	//Update with comment	
                    
	                $sql="update user_review set username='$un',review='$message',rating='$rate',userimage='$user_photo',date='$date'  where username='$un' and foodid='$foodid'";
	                $mysqli->query($sql);
                    
                    $value = mysqli_fetch_assoc($rs);
                    $pid = $value['review_id'];	
	                $_SESSION['message'] ="Review updated successfully!";
                    $_SESSION['id']=1;
	                $style="color:green";
				}
	        }
            else{   //Insert new review
	
	            $insert_query="insert into user_review(username,foodid,review,rating,userimage,date) values('$un','$foodid','$message','$rate','$user_photo','$date' )";    
				$stmt = $mysqli->prepare($insert_query);
       
                $stmt->execute();
                $pid = $stmt->insert_id;
	            $_SESSION['message'] ="Review added successfully!";
                $_SESSION['id']=1;
	            $style="color:green";
				
            }
        }
    }
}

    
//Delete review option
if(isset($_POST['review_delete_submit'])){
  
    $delete_query = "DELETE FROM user_review where username='$un' and foodid='$foodid' ";
    $post_delete_query = mysqli_query($mysqli,$delete_query);
    if (!$post_delete_query) {
        die("delete course query ".mysqli_error($mysqli));
    }
 	  
    $_SESSION['message'] ="Review delete successfully!!";
    $style="color:red";
 
}
    

//counter part

$sql1="select count(rating) as total from user_review where foodid='$foodid' and rating='1' ";
$result1 =  mysqli_query($mysqli,$sql1);
$value1 = mysqli_fetch_assoc($result1);
$onestar = $value1['total'];

$sql2="select count(rating) as total from user_review where foodid='$foodid' and rating='2' ";
$result2 =  mysqli_query($mysqli,$sql2);
$value2 = mysqli_fetch_assoc($result2);
$twostar = $value2['total'];

$sql3="select count(rating) as total from user_review where foodid='$foodid' and rating='3' ";
$result3 =  mysqli_query($mysqli,$sql3);
$value3 = mysqli_fetch_assoc($result3);
$threestar = $value3['total'];

$sql4="select count(rating) as total from user_review where foodid='$foodid' and rating='4' ";
$result4 =  mysqli_query($mysqli,$sql4);
$value4 = mysqli_fetch_assoc($result4);
$fourstar = $value4['total'];

$sql5="select count(rating) as total from user_review where foodid='$foodid' and rating='5' ";
$result5 =  mysqli_query($mysqli,$sql5);
$value5 = mysqli_fetch_assoc($result5);
$fivestar = $value5['total'];


//Percent section
$sql6="select count(rating) as total from user_review where foodid='$foodid'";
$result6 =  mysqli_query($mysqli,$sql6);
$value6 = mysqli_fetch_assoc($result6);
$total_rating = $value6['total'];

if($total_rating==0){
    $percent_1star=0;    
    $percent_2star=0;
    $percent_3star=0;
    $percent_4star=0;
    $percent_5star=0;   
}
else{
    $percent_1star=number_format(($onestar/$total_rating)*100);
    $percent_2star=number_format(($twostar/$total_rating)*100);
    $percent_3star=number_format(($threestar/$total_rating)*100);
    $percent_4star=number_format(($fourstar/$total_rating)*100);
    $percent_5star=number_format(($fivestar/$total_rating)*100); 
}
 
//Total rating part
$sql1="SELECT count(username) as total FROM user_review WHERE foodid='$foodid' ";
$result1 =  mysqli_query($mysqli,$sql1);
$value1 = mysqli_fetch_assoc($result1);
$total = $value1['total'];


$sql1="SELECT sum(rating) as total FROM user_review WHERE foodid='$foodid' ";
$result2 =  mysqli_query($mysqli,$sql1);
$value2 = mysqli_fetch_assoc($result2);
$totalrate = $value2['total']+0;

if($totalrate==0){
    $Rating=0;
}else{   
   $Rate=$totalrate/$total;
   $Rating=number_format($Rate, 1, '.', '');   
} 
    

?>

    <style>
        html {
            font-size: 100%;
            /* 16px */
        }

        body {
            text-rendering: optimizeLegibility;

        }

        @media only screen and (min-width: 600px) {
            .main-menu li a {
                font-size: 1.1rem;
                color: white;
            }
        }

        .main-menu li a:hover {
            color: red;
            text-decoration: none;

        }

        .review-body {
            width: 30%;
            background-color: aliceblue;
            border: 2px solid grey;
            padding: 10px;
            margin-top: 10px;
            float: left;
            border-radius: 30px;
            -webkit-box-shadow: 0px 32px 67px -11px rgba(0, 0, 0, 0.71);
            -moz-box-shadow: 0px 32px 67px -11px rgba(0, 0, 0, 0.71);
            box-shadow: 0px 32px 67px -11px rgba(0, 0, 0, 0.71);
        }

        .review-body h4 {
            text-align: center;

        }

        #review-btn {
            margin: 15px auto;
            outline: none;
            display: block;
        }

        #review-btn:hover {
            background-color: darkolivegreen;
        }

        .progress-body {
            float: right;
            width: 60%;
            margin-top: 10px;
        }

        .checked {
            color: orange;
        }

    </style>


    <section class="bg-7 h-500x main-slider pos-relative" style="background-image: url('Admin/<?php echo $foodimage; ?>');">
        <header>
            <div class="container">
                <a class="logo" href="index.php"><img src="images/logo-white.png" alt="Logo"></a>

                <div class="right-area">
                    <h6><a class="plr-20 color-white btn-fill-primary" href="tel:+8801914603437">Call: +8801914603437</a></h6>
                </div><!-- right-area -->

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

                <ul class="main-menu font-mountainsre" id="main-menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="fullmenu.php">Menu</a></li>
                    <li><a href="allnews.php">News</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="about_us.php">About us</a></li>
                </ul>

                <div class="clearfix"></div>
            </div><!-- container -->
        </header>
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
            <div class="dplay-tbl">
                <div class="dplay-tbl-cell center-text color-white pt-90">

                    <h2 style="font-family:Lucida Console">User Review</h2>
                    <h1 style="font-family:Segoe Script"><b><?php  echo $foodname; ?></b></h1>
                </div><!-- dplay-tbl-cell -->
            </div><!-- dplay-tbl -->
        </div><!-- container -->
    </section>
    <br><br>

    <div class="container">
        <div class="review-body">
            <h4><b>Rate and Reviews</b></h4>
            <h4><?php echo $Rating;?> <i class="fa fa-star"></i></h4>
            <h4><i class="fas fa-user"></i> <?php echo $total;?> total reviews</h4>
            <button id="review-btn" type="button" class=" btn btn-primary btn-lg" data-toggle="modal" data-target="#reviewmodal">Write review </button>

        </div>
        <div class="progress-body">

            <span>1 star (<?php echo $onestar;?>)</span>
            <span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star "></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
            <div class="progress">
                <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $percent_1star;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percent_1star;?>%">
                    <?php echo $percent_1star;?>%
                </div>
            </div>

            <span>2 star (<?php echo $twostar;?>)</span>
            <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
            <div class="progress">
                <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $percent_2star;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percent_2star;?>%">
                    <?php echo $percent_2star;?>%
                </div>
            </div>

            <span>3 star (<?php echo $threestar;?>)</span>
            <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
            <div class="progress">
                <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $percent_3star;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percent_3star;?>%">
                    <?php echo $percent_3star;?>%
                </div>
            </div>

            <span>4 star (<?php echo $fourstar;?>)</span>
            <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span>
            <div class="progress">
                <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $percent_4star;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percent_4star;?>%">
                    <?php echo $percent_4star;?>%
                </div>
            </div>

            <span>5 star (<?php echo $fivestar;?>)</span>
            <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>
            <div class="progress">
                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $percent_5star;?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percent_5star;?>%">
                    <?php echo $percent_5star;?>%
                </div>
            </div>
        </div>
    </div>
    <br>
    <h3 style="<?php echo $style;?>;text-align:center"> <b><?php echo $_SESSION['message']; ?></b></h3>



    <!-- Modal -->
    <div class="modal fade" id="reviewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-center">Share Your Food Review!!</h4>

                </div>

                <div class="modal-body">

                    <h4 style="<?php echo $style;?>;text-align:center"> <b><?php echo $_SESSION['message']; ?></b></h4>

                    <div class="form-group">
                        <form method="post" name="form" action="">

                            <label><i class="far fa-comment"></i> Review </label>
                            <textarea rows="5" class="form-control" name="review" placeholder="Write Your Review"></textarea>
                            <br>

                            <label><b>&nbsp Rating</b></label>

                            <div class="col-sm-12 col-xs-12">

                                <div class="col-sm-8 col-xs-8">
                                    <div class="rate">

                                        <input type="radio" id="star5" name="rate" value="5">

                                        <label for="star5" title="5 star">5 stars</label>

                                        <input type="radio" id="star4" name="rate" value="4">

                                        <label for="star4" title="4 star">4 stars</label>

                                        <input type="radio" id="star3" name="rate" value="3">

                                        <label for="star3" title="3 star">3 stars</label>

                                        <input type="radio" id="star2" name="rate" value="2">

                                        <label for="star2" title="2 star">2 stars</label>

                                        <input type="radio" id="star1" name="rate" value="1">

                                        <label for="star1" title="1 star">1 star</label>

                                    </div>
                                </div>
                                <br><br><br>
                            </div>
                            <input style="font-size:20px" type="submit" name="submit" class="btn-me" value="Submit">

                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <butto type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>

                </div>
            </div>

        </div>
    </div>




    <br><br>




    <div class="container">
        <div class="content col-sm-12 col-xs-12" style=" background-color:#f6f5f3;">
            <?php
				//query for view review 
				        $foodname= $_GET['productname'];
						
				 	    $view_post_query = "SELECT * FROM user_review WHERE foodid= '$foodid' ORDER BY review_id DESC";
						$view_post_query_result = mysqli_query($mysqli,$view_post_query);
						if (!$view_post_query_result) {
							die("view_add_query_result failed ".mysqli_error($mysqli));
						}
					if (mysqli_num_rows($view_post_query_result)==0){?>

            <br>
            <h3 style='color:red' class="text-center"><b>No Review Available</b></h3><br>

            <?php
					}
                    else{					
		
                        ?><h2 class="text-center">All user review <b style="color:#ff6600">(<?php echo $foodname?>)</b></h2><br><?php
						while ($row=mysqli_fetch_assoc($view_post_query_result)) {
                            
							    $review_id=$row['review_id'];
							    $username=$row['username'];
								$review=$row['review'];
								$rate=$row['rating'];
								$rating=number_format($rate, 1, '.', '');
								
								$user_photo= $row['userimage'];
								$date= $row['date'];
								
								if($rating<3){
									$style="color:red"; 
								}
                                else{ 
									$style="color:green";												
								}
                                
                                if($review_id==$pid){
                                    if($_SESSION['id']==1){
                                        $select='id="select-update"';
                                        $img_select='id="img_select"';
                                    }else{
                                        $select="";
                                        $img_select="";
                                    }
                                    
                                }else{
                                    $select="";
                                    $img_select="";
                                }
                            

								
								

							?>
            <div class="sided-90x mb-30" <?php echo $select;?>>

                <div class="s-left" <?php echo $img_select;?>>
                    <img class="br-3" src="<?php echo $user_photo; ?> " id="userimg" alt="User Image">
                </div>
                <!--s-left-->

                <div class="s-right">
                    <?php if($username == $un){
                    ?>
                    <form action="" method="post">
                        <a onclick="return confirm('Are you sure to delete your review?')" id="delete_icon" title="Delete">
                            <button type="submit" name="review_delete_submit" style="outline:none;"><i class="fa fa-trash"></i></button>
                        </a>
                    </form>
                    <?php
                        }
                    ?>
                    <h4 id="userbody" class="mb-10"><i class="fas fa-user"></i> User name: <b style="color:#1E90FF"><?php echo $username;?></b></h4>
                    <h4 id="userbody" class="mb-10"><i class="fas fa-award"></i> Rating: &nbsp <b style=<?php echo $style;?>><?php echo $rating; ?>&#9733 </b> </h4>
                    <h4 id="userbody" class="mb-10"><i class="far fa-calendar-alt"></i> Date:<b> <?php echo date('M d, Y ', strtotime($date))?></b> </h4>

                    <h4 id="userbody"><i class="far fa-comment-dots"></i> Review: <?php echo $review; ?> </h4>
                </div>
                <!--s-right-->

            </div><!-- sided-90x --><br>
            <hr /><br>

            <?php
						}
					}
				    
				 ?>

        </div>
    </div><!-- container -->



    <br><br><br>

    <style>
        #select-update {
            border-radius: 20px;
            -webkit-box-shadow: 0px 0px 15px 0px green;
            box-shadow: 0px 0px 15px 0px green;
            padding: 10px;
        }

        #img_select {
            margin: 15px;
            margin-left: 15px;
        }

        #userbody {
            font-family: Calibri;
            font-size: 1.3rem;
            text-align: justify;
        }

        #userimg {
            height: 100px;
            width: 100px;
            border-radius: 100%;
        }

        @media only screen and (max-width: 600px) {

            h2,
            h4 {
                font-size: 100%;
            }

            #review-btn {
                font-size: 100%;
            }

            .review-body {
                width: 40%;
            }

            .progress-body {
                width: 55%;
            }


            #userimg {
                height: 70px;
                width: 70px;
                border-radius: 100%;
            }

            #userbody {
                font-family: Calibri;
                font-size: 100%;
                text-align: justify;
            }

            #delete_icon {
                float: right;
                font-size: 100%;
            }

        }

        #delete_icon {
            float: right;
            font-size: 25px;
            margin-right: 25px;
        }


        hr {
            display: grey;
            height: 2px;
            border: 0;
            border-top: 1px solid #ccc;
            margin: 1em 0;
            padding: 0;
        }

    </style>


</body>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

</script>

</html>

<?php include_once 'footer.php'; ?>
