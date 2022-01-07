<?php
session_start();
error_reporting( 0 );
include( 'conn.php' );

if ( isset( $_POST['submit'] ) ) {
    $contactno = $_POST['contactno'];
    $email = $_POST['email'];

    $query = mysqli_query( $conn, "select ID from tbladmin where  Email='$email' and MobileNumber='$contactno' " );
    $ret = mysqli_fetch_array( $query );
    if ( $ret>0 ) {
        $_SESSION['contactno'] = $contactno;
        $_SESSION['email'] = $email;
        header( 'location:resetpassword.php' );
    } else {
        $msg = 'Invalid Details. Please try again.';
    }
}
?>
<!doctype html>
<html class='no-js' lang='en'>

<head>

    <title> Forgot Password</title>

    <link rel='apple-touch-icon' href='apple-icon.png'>

    <link rel='stylesheet' href='dashboardcss/vendors/bootstrap/dist/css/bootstrap.min.css'>
    <link rel='stylesheet' href='dashboardcss/vendors/font-awesome/css/font-awesome.min.css'>
    <link rel='stylesheet' href='dashboardcss/vendors/themify-icons/css/themify-icons.css'>
    <link rel='stylesheet' href='dashboardcss/vendors/flag-icon-css/css/flag-icon.min.css'>
    <link rel='stylesheet' href='dashboardcss/vendors/selectFX/css/cs-skin-elastic.css'>

    <link rel='stylesheet' href='dashboardcss/assets/css/style.css'>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body class='bg-dark' style="background-size:cover; background-image: url('dashboardcss/images/czZwyp.jpg');">

    <div class='sufee-login d-flex align-content-center flex-wrap'>
        <div class='container'>
            <div class='login-content'>
                <div class='login-logo'>
                    <h3 style='color: white'>Admin Password Recovery Option</h3>
                    <hr color='red' />
                </div>
                <div class='login-form' style="box-shadow: 0px 0px 15px 4px rgba(0, 0, 0, 0.71);">
                    <form action='' method='post' name='submit'>
                        <p style='font-size:16px; color:red' align='center'> <?php if ( $msg ) {
    echo $msg;
}
?> </p>
                        <div class='form-group'>
                            <label>Email Address</label>
                            <input type='email' class='form-control' placeholder='Email' required='' name='email'>
                        </div>
                        <div class='form-group'>
                            <label>Mobile Number</label>
                            <input type='text' class='form-control' placeholder='Mobile Number' name='contactno' required=''>
                        </div>
                        <div class='checkbox'>
                            <label class='pull-left'>
                                <a href='index.php'>signin</a>
                            </label>

                        </div>
                        <button id='btn' type='submit' class='btn btn-success btn-flat m-b-30 m-t-30' name='submit'>Reset</button>

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
