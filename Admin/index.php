<?php
session_start();
error_reporting( 0 );
include( 'conn.php' );

if ( isset( $_POST['login'] ) ) {
    $adminuser = $_POST['username'];
    $password = md5( $_POST['password'] );
    $query = mysqli_query( $conn, "select ID from tbladmin where  UserName='$adminuser' && Password='$password' " );
    $ret = mysqli_fetch_array( $query );
    if ( $ret>0 ) {
        $_SESSION['ccmsaid'] = $ret['ID'];
        header( 'location:dashboard.php' );
    } else {
        $msg = 'Invalid Details.';
    }
}
?>

<!doctype html>
<html class='no-js' lang='en'>

<head>

    <title>Admin Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
   
    <link rel='apple-touch-icon' href='apple-icon.png'>

    <link rel='stylesheet' href='dashboardcss/vendors/bootstrap/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='dashboardcss/vendors/font-awesome/css/font-awesome.min.css'>
    <link rel='stylesheet' href='dashboardcss/vendors/themify-icons/css/themify-icons.css'>
    <link rel='stylesheet' href='dashboardcss/vendors/flag-icon-css/css/flag-icon.min.css'>
    <link rel='stylesheet' href='dashboardcss/vendors/selectFX/css/cs-skin-elastic.css'>

    <link rel='stylesheet' href='dashboardcss/assets/css/style.css'>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body class='bg-dark' style="background-size:cover; background-image: url('dashboardcss/images/back.jpg');">

    <div class='sufee-login d-flex align-content-center flex-wrap' >
        <div class='container'>
            <div class='login-content'>
                <div class='login-logo'>
                    <h3>Food Order System Admin Login </h3>
                    <hr color='red' />
                </div>
                <div class='login-form' style="box-shadow: 0px 0px 15px 4px rgba(0, 0, 0, 0.71);">
                    <form action='' method='post' name='login'>
                        <p style='font-size:18px; color:red' align='center'> <?php if ( $msg ) {
    echo $msg;
}
?> </p>
                        <div class='form-group'>
                            <label>User Name</label>
                            <input type='text' class='form-control' placeholder='User Name' required='true' name='username'>
                        </div>
                        <div class='form-group'>
                            <label>Password</label>
                            <input type='password' class='form-control' placeholder='Password' name='password' required='true'>
                        </div>
                        <div class='checkbox'>
                            <label class='pull-left'>
                                <a href='forgot-password.php'>Forgot Password?</a>
                            </label>
                            <label class='pull-right'>
                                <a href='signup.php' style='color:green'>New user?Register..</a>
                            </label>

                        </div>
                        <button id='btn' style='border-radius:25px' type='submit' class='btn btn-success btn-flat m-b-30 m-t-30' name='login'>Log in</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        #btn {
            border-radius: 25px;
            font-size: 20px;
            text-transform: capitalize;

        }

        #btn:hover {
            background-color: darkolivegreen;
            text-transform: capitalize;

            -webkit-box-shadow: 0px 0px 15px 1px rgba(0, 0, 0, 0.61);
            box-shadow: 0px 0px 15px 1px rgba(0, 0, 0, 0.61);
        }

    </style>

    <script src='dashboardcss/vendors/jquery/dist/jquery.min.js'></script>
    <script src='dashboardcss/vendors/popper.js/dist/umd/popper.min.js'></script>
    <script src='dashboardcss/vendors/bootstrap/dist/js/bootstrap.min.js'></script>
    <script src='dashboardcss/assets/js/main.js'></script>

</body>

</html>
