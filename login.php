<?php
if(isset($_COOKIE["u_name"])){
  header("location: index.php");
}

    function test($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

session_start();
include_once 'connection.php';
$_SESSION['message'] = '';

if (isset($_POST['enter'])) {
	  
    $u_name = test($_POST['u_name']);
    $u_pass = md5($_POST['u_pass']);
    $result = $mysqli->query("SELECT * FROM u_info where u_name = '$u_name' or u_pass='$u_pass'");
  
    $user= $result->fetch_assoc();
    if ($user['u_name']==$u_name && $user['u_pass']==$u_pass) {
        setcookie("u_name",$u_name,time()+7*24*60*60);
        header('location:index.php');
    }
    else {
        $_SESSION['message'] = "You Enter Wrong Info !!";
    }
    
}

?>



<html lang="en" dir="ltr">

<head>
    <title>login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css" />

    <!-- Stylesheets -->
    <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
    <link href="plugin-frameworks/swiper.css" rel="stylesheet">
    <link href="fonts/ionicons.css" rel="stylesheet">
    <link href="common/styles.css" rel="stylesheet">


    <style media="screen">
        body {
            background: white;
        }

        .card {
            border: 1px solid red;
            border-radius: 20px;
            -webkit-box-shadow: 10px 15px 50px -1px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 10px 15px 50px -1px rgba(0, 0, 0, 0.75);
            box-shadow: 10px 15px 50px -1px rgba(0, 0, 0, 0.75);
        }

        .card-login {
            margin-top: 130px;
            padding: 18px;
            max-width: 30rem;
        }

        .card-header {
            color: #fff;
            /*background: #ff0000;*/
            font-family: sans-serif;
            font-size: 20px;
            font-weight: 600 !important;
            margin-top: 10px;
            border-bottom: 0;
        }

        .input-group-prepend span {
            width: 50px;
            background-color: #ff0000;
            color: #fff;
            border: 0 !important;
        }

        input:focus {
            outline: 0 0 0 0 !important;
            box-shadow: 0 0 0 0 !important;
        }

        .login_btn {
            width: 130px;
        }

        .login_btn:hover {
            color: #fff;
            background-color: #ff0000;
        }

        .btn-outline-danger {
            color: #fff;
            font-size: 18px;
            background-color: #28a745;
            background-image: none;
            border-color: #28a745;
        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1.2rem;
            line-height: 1.6;
            color: #28a745;
            background-color: transparent;
            background-clip: padding-box;
            border: 1px solid #28a745;
            border-radius: 0;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .input-group-text {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding: 0.375rem 0.75rem;
            margin-bottom: 0;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.6;
            color: #495057;
            text-align: center;
            white-space: nowrap;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: 100;
        }

        #item {
            font-size: 1.1rem;
        }

    </style>
</head>

<body>





    <section class="bg-7 h-500x main-slider pos-relative" style="background-image: url('images/login.png');">
        <header>
            <div class="container">
                <a class="logo" href="index.php"><img src="images/logo-white.png" alt="Logo"></a>

                <div class="right-area">
                    <h6><a class="plr-20 color-white btn-fill-primary" href="tel:+8801914603437">Call: +8801914603437</a></h6>
                </div><!-- right-area -->

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

                <ul class="main-menu font-mountainsre" id="main-menu">
                    <li><a href="index.php" id="item">Home</a></li>
                    <li><a href="fullmenu.php" id="item">Menu</a></li>
                    <li><a href="allnews.php" id="item">News</a></li>
                    <li><a href="03_menu.html" id="item">Services</a></li>
                    <li><a href="02_about_us.html" id="item">About us</a></li>

                </ul>


                <div class="clearfix"></div>
            </div><!-- container -->
        </header>
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
            <div class="dplay-tbl">
                <div class="dplay-tbl-cell center-text color-white pt-90">

                    <h2 class="mt-30 mb-15">Login Form</h2>
                </div><!-- dplay-tbl-cell -->
            </div><!-- dplay-tbl -->
        </div><!-- container -->
    </section>








    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <div class="container">
        <div class="card card-login mx-auto text-center bg-dark">
            <div class="card-header mx-auto bg-dark">
                <span> <img src="images/logo-white.png" class="w-75" alt="Logo"> </span><br />
                <span class="logo_title mt-5"> Login Dashboard </span>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="input-group form-group">
                        <h5 class="text-center" id="change"><?php echo $_SESSION['message']; ?></h5>
                        <script type="text/javascript">
                            setTimeout("firstColor()", 500)

                            function firstColor() {
                                document.getElementById('change').style.color = "#9FFA00";
                                secondColor();
                            }

                            function secondColor() {
                                document.getElementById('change').style.color = "#FF3333";
                            }

                        </script>
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-user"></i> </span>
                        </div>
                        <input type="text" name="u_name" class="form-control" required placeholder="Enter Username">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fas fa-key"></i> </span>
                        </div>
                        <input type="password" name="u_pass" class="form-control" required placeholder="Enter Password">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="enter" value="Login" class="btn btn-outline-danger float-right login_btn">
                    </div>
                    <div class="form-group">
                        <a href="signup.php" style="color:white"> -->>>> I don't have an account.</a>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <br>
    <br>
    <br>
    <br><br><br><br>
    <script src="plugin-frameworks/bootstrap.min.js"></script>

</body>

</html>

<?php include_once 'footer.php'; ?>
