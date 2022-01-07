<?php

session_start();
$_SESSION['message'] = '';
include_once 'connection.php';

function test($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


    if(!isset($_COOKIE["u_name"])){
        $_SESSION['message'] = '<i class="fa fa-sign-in"></i> Login first for profile details!!';
        $_SESSION['RedirectKe'] = $_SERVER['REQUEST_URI'];
        $_SESSION['u_name'] = " ";
        $_SESSION['u_email'] =" ";
        $_SESSION['u_phone'] = " ";
        $_SESSION['u_cname'] = " ";
        $_SESSION['u_cardno'] = " ";
        $_SESSION['p_id'] = " ";
        $_SESSION['p_amount'] = " ";
        $_SESSION['p_date'] = " ";
    }
    
 ?>





<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <link href="singlefoodcss/css/bootstrap.min.css" rel="stylesheet">
    <link href="singlefoodcss/css/font-awesome.min.css" rel="stylesheet">
    <link href="singlefoodcss/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>


    <!-- Stylesheets -->
    <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
    <link href="plugin-frameworks/swiper.css" rel="stylesheet">
    <link href="fonts/ionicons.css" rel="stylesheet">
    <link href="common/styles.css" rel="stylesheet">

</head>

<body>
    <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
    <link href="plugin-frameworks/swiper.css" rel="stylesheet">
    <script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
    <script src="plugin-frameworks/bootstrap.min.js"></script>


    <header>
        <div class="container">
            <a class="logo" href="index.php"><img src="images/logo-white.png" alt="Logo"></a>
            <div class="right-area">
                <h6><a title="Profile Setting" class="plr-20 color-white btn-fill-primary ml-4" href="profile.php"> <i class="fas fa-user"></i> </a></h6>
            </div>
            <div class="right-area">
                <h6><a title="Cart" class="plr-20 color-white btn-fill-primary ml-4" href="cart.php"> <i class="ion-android-cart"></i> </a></h6>
            </div>



            <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

            <ul class="main-menu font-mountainsre" id="main-menu">
                <li><a href="index.php" id="item">Home</a></li>
                <li><a href="fullmenu.php" id="item">Menu</a></li>
                <li><a href="04_blog.html" id="item">News</a></li>
                <li><a href="03_menu.html" id="item">Services</a></li>
                <li><a href="02_about_us.html" id="item">About us</a></li>

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

    <style>
        #item {
            font-size: 1.1rem;
            color: white;
        }

        #item:hover {
            color: red;
            text-decoration: none;

        }

    </style>

    <section class="bg-8 h-500x main-slider pos-relative" style=" background-image: url('images/profile.jpg');">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
            <div class="dplay-tbl">
                <div class="dplay-tbl-cell center-text color-white">

                    <h1 class="mt-30 mb-15" style="  font-family:Segoe Script;">User Profile</h1>
                </div><!-- dplay-tbl-cell -->
            </div><!-- dplay-tbl -->
        </div><!-- container -->
    </section>

    <h1 style="margin-bottom:200px;margin-top:200px" class="text-center" id="change"><?php echo $_SESSION['message']; ?></h1>

    <?php
	
	if(isset($_COOKIE["u_name"])){
		
        $un = $_COOKIE["u_name"];
        $query = $mysqli->query("SELECT * FROM u_info WHERE u_name = '$un'");
        if (mysqli_num_rows($query)) {
			
            $data = $query->fetch_assoc();
            $_SESSION['u_name'] = $data['u_name'];
            $_SESSION['u_email'] = $data['u_email'];
            $_SESSION['u_phone'] = $data['u_phone'];
            $_SESSION['u_cname'] = $data['u_cname'];
            $_SESSION['u_cardno'] = $data['u_cardno'];
		    $user_photo= $data['image'];

            if(isset($_POST['update'])) {
			  
                $u_phone = test($_POST['u_phone']);
                $u_email = test($_POST['u_email']);
                $u_cname = test($_POST['u_cname']);
                $u_cardno = test($_POST['u_cardno']);
			
			
		        $fileinfo=PATHINFO($_FILES["image"]["name"]);  //photo upload
	            if(empty($fileinfo['filename'])){
		            $location="";
	            }
	            else{
	                $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	                move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $newFilename);
	                $location="images/" . $newFilename;
	            }
			
			
			
			    if($location==""){
						
					$set1="update u_info set u_email='$u_email', u_phone='$u_phone', u_cname='$u_cname',u_cardno='$u_cardno' where u_name='$un'";
					$mysqli->query($set1);
						
					$_SESSION['message'] = "Update succesful !!";
				}
                else{
                    
                    unlink($user_photo);  //delete previus image from device
     
					$set2="update u_info set u_email='$u_email', u_phone='$u_phone', u_cname='$u_cname',u_cardno='$u_cardno',image='$location' where u_name='$un'";
					$mysqli->query($set2);
						
					$sql3="update user_review set userimage='$location' where username='$un' ";
	                $mysqli->query($sql3);
                    
                    $sql4="update postcomment set user_image='$location' where username='$un' ";
	                $mysqli->query($sql4);
                    
						
					$_SESSION['message'] = "Update succesful !!";
					
				}
			
			  
            }
        }
    
	?>




    <div class="container" style="margin-top: 250px; margin-bottom: 250px;">
        <div>
            <script type="text/javascript">
                setTimeout("firstColor()", 1500)

                function firstColor() {
                    document.getElementById('change').style.color = "#9FFA00";
                    secondColor();
                }

                function secondColor() {
                    document.getElementById('change').style.color = "#FF3333";
                }

            </script>
        </div>
        <h1 class="text-center" id="change"><?php echo $_SESSION['message']; ?></h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">
                                            <h3>Basic Info</h3>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">
                                            <h3>Card Info</h3>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <?php if(isset($_COOKIE["u_name"])){
                                              echo '<a class="nav-link" id="updateinfo-tab" data-toggle="tab" href="#updateinfo" role="tab" aria-controls="updateinfo" aria-selected="false"><h3>Update Info</h3></a>';
                                            } ?>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="payment-tab" data-toggle="tab" href="#payment" role="tab" aria-controls="payment" aria-selected="false">
                                            <h3>Order Info</h3>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">

                                        <div class="col-md-4">
                                            <div class="profile-sidebar">
                                                <!-- SIDEBAR USERPIC -->
                                                <div class="profile-userpic text-center">
                                                    <img src="<?php echo $user_photo; ?>" style="height:200px; border-radius: 100%" class="img-responsive" alt="">
                                                </div>
                                                <!-- END SIDEBAR USERPIC -->
                                                <!-- SIDEBAR USER TITLE -->
                                                <div class="profile-usertitle">
                                                    <div class="profile-usertitle-name">
                                                        <?php echo $_SESSION['u_name'] ?>
                                                    </div>
                                                    <div class="profile-usertitle-job">
                                                        <h6 class="text-center"> <?php echo "User Name : ".$_SESSION['u_name']."</br>"; ?>
                                                            <?php echo "Email : ".$_SESSION['u_email']."</br>"; ?>
                                                            <?php echo "Contact No : ".$_SESSION['u_phone']."</br>"; ?></h6>

                                                    </div>
                                                </div>
                                                <!-- END SIDEBAR USER TITLE -->
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                        <table border="1">
                                            <tr>
                                                <th class="m-2 p-3">Card Name </th>
                                                <th class="m-2 p-3">Card Number </th>
                                            </tr>
                                            <tr>
                                                <td class="m-2 p-3"> <?php echo $_SESSION['u_cname']; ?> </td>
                                                <td class="m-2 p-3"> <?php echo $_SESSION['u_cardno']; ?> </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="updateinfo" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                        <form method="post" class="require-validation" action="<?php htmlspecialchars( $_SERVER['PHP_SELF']); ?> " enctype="multipart/form-data" autocomplete="off" method="post" id="payment-form">
                                            <table border="1">
                                                <tr>
                                                    <td class="m-2 p-3">User Name </td>
                                                    <td class="m-2 p-3"><?php echo $_SESSION['u_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="m-2 p-3">Phone Number </td>
                                                    <td class="m-2 p-3"><input type="text" name="u_phone" value="<?php echo $_SESSION['u_phone']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td class="m-2 p-3">Email </td>
                                                    <td class="m-2 p-3"><input type="text" value="<?php echo $_SESSION['u_email']; ?>" name="u_email"></td>
                                                </tr>
                                                <tr>
                                                    <td class="m-2 p-3">Card Name </td>
                                                    <td class="m-2 p-3"><input type="text" name="u_cname" value="<?php echo $_SESSION['u_cname']; ?> "></td>
                                                </tr>
                                                <tr>
                                                    <td class="m-2 p-3">Card Number </td>
                                                    <td class="m-2 p-3"><input type="text" name="u_cardno" value="<?php echo $_SESSION['u_cardno']; ?> "></td>
                                                </tr>
                                                <tr>
                                                    <td class="m-2 p-3">Profile photo </td>
                                                    <td class="m-2 p-3"><input type="file" name="image"></td>
                                                </tr>
                                            </table>
                                            <div class="form-group">
                                                <input type="submit" name="update" value="UPDATE" class="btn btn-outline-danger float-right login_btn">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                        <table border="1">
                                            <tr>
                                                <th class="m-2 p-3">Order No</th>
                                                <th class="m-2 p-3">Food Name</th>
                                                <th class="m-2 p-3">Quantity</th>
                                                <th class="m-2 p-3">Total Amount (BDT)</th>
                                                <th class="m-2 p-3">Order Date</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            <?php
                                            if(isset($_COOKIE["u_name"])){
                                              $un = $_COOKIE["u_name"];
                                                $query1 = $mysqli->query("SELECT * FROM u_pay WHERE u_name = '$un' ORDER BY p_id DESC");
                                                if ($query1-> num_rows > 0) {
                                                  while ($value = $query1-> fetch_assoc()) {
                                                    echo '<tr>';
                                                    echo '<td class="m-2 p-3">' .$value['purchase_id']. '</td>';
													echo '<td class="m-2 p-3">' .$value['food']. '</td>';
													echo '<td class="text-center">' .$value['quantity']. '</td>';
                                                    echo '<td class="text-center">' .$value['p_amount']. '</td>';
                                                    echo '<td class="m-2 p-3">' .$value['p_date']. '</td>';
                                                    echo '<td class="m-2 p-3"><a href="delivery_status.php?deliveryid='.$value['purchase_id'].'"><button type="button" class="btn btn-primary">Delivery Status</button></a></td>';                                       
                                                    echo '</tr>';
                                                  }
                                                }
                                                else {?>

                                            <h2 style="color:red" class="text-center">No Payment record available</h2><br>

                                            <?php
													
                                                }
                                              }
                                              ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php	
	}
	?>

</body>
<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/swiper.js"></script>
<script src="common/scripts.js"></script>

</html>
<?php include 'footer.php'; ?>
