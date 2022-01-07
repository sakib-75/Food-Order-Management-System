<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>

    <!-- Font Icon -->
    <link rel="stylesheet" href="signupcss/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="signupcss/css/style.css">
</head>


<?php
include("conn.php");
extract($_POST);

if(isset($submit))
{
$rs=mysqli_query($conn,"select * from tbladmin where Email='$email' or UserName='$username' ");
if (mysqli_num_rows($rs)>0)
{
	 ?><script type="text/javascript">
    window.alert("Username or Email already exist!");
    window.location.href = 'signup.php';

</script>
<?php	
}
else{
	
	$pass=md5($password);
	
$query="insert into tbladmin(AdminName,UserName,MobileNumber,Email,Password) values('$adminname','$username','$phone','$email','$pass')";

$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");

echo "<br><br><br><h3>Your Account Has been created Succesfully</h3>";
echo "<br><h3>Please Login using your Email </h3>";
echo "<br><h3><a href=index.php>Login</a></h3>";
}
}
?>



<script language="javascript">
    function check() {

        e = document.form2.email.value;
        f1 = e.indexOf('@');
        f2 = e.indexOf('@', f1 + 1);
        e1 = e.indexOf('.');
        e2 = e.indexOf('.', e1 + 1);
        n = e.length;

        if (!(f1 > 0 && f2 == -1 && e1 > 0 && e2 == -1 && f1 != e1 + 1 && e1 != f1 + 1 && f1 != n - 1 && e1 != n - 1)) {
            alert("Please Enter valid Email");
            document.form2.email.focus();
            return false;
        }

        if (document.form2.password.value != document.form2.re_pass.value) {
            Swal.fire({
                icon: 'error',
                title: 'Something went wrong...',
                text: 'Password does not matched!',

            })
            document.form2.re_pass.focus();
            return false;
        }


        return true;
    }

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>










<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Admin signup</h2>
                        <form method="POST" action="" name="form2" class="register-form" id="register-form" onSubmit="return check();">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="adminname" id="username" placeholder="Admin Name" required>
                            </div>


                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="User Name" required>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="phone" id="username" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term">
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signup" class="form-submit" value="Register">
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="signupcss/images/signup-image.jpg" alt="sing up image"></figure>

                    </div>

                </div>

            </div>
        </section>


    </div>

    <!-- JS -->
    <script src="signupcss/vendor/jquery/jquery.min.js"></script>
    <script src="signupcss/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
