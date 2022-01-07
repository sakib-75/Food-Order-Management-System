<?php
session_start();
error_reporting(0);
include('conn.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['ccmsaid'];
    $AName=$_POST['adminname'];
    $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $username=$_POST['username'];
  
     $query=mysqli_query($conn, "update tbladmin set AdminName='$AName',UserName='$username', MobileNumber ='$mobno', Email= '$email' where ID='$adminid'");
    if ($query) {
    $msg="Admin profile has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again.";
    }
  }
  ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title> Admin Profile</title>
   

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel="stylesheet" href="dashboardcss/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="dashboardcss/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="dashboardcss/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<style>
form.example button:hover {
	font-weight: bold;
    background-color: #f4511e;
    border-color:  #f4511e;
    padding-right: 20px;
    padding-left: 20px;
	-webkit-box-shadow: 0px 0px 15px 0px #000000; 
    box-shadow: 0px 0px 15px 0px #000000;

   }
</style>
   
<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Admin Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="adminprofile.php">Admin Profile</a></li>
                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                       <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
							    <h3 class="text-center"> Admin Profile Setting <i class="fa fa-cog" aria-hidden="true"></i></h3>
							</div>
                            
							<form class="example" name="profile" method="post" action="">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 <?php
$adminid=$_SESSION['ccmsaid'];
$ret=mysqli_query($conn,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="form-group"><label for="company" class=" form-control-label">Admin Name</label><input type="text" name="adminname" value="<?php  echo $row['AdminName'];?>" class="form-control" required='true'></div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">User Name</label><input type="text" name="username" value="<?php  echo $row['UserName'];?>"  class="form-control" required></div>
                                        <div class="form-group"><label for="street" class=" form-control-label">Contact Number</label><input type="text" name="mobilenumber" value="<?php  echo $row['MobileNumber'];?>"  class="form-control" maxlength='10' required='true'></div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Email</label><input type="email" name="email" value="<?php  echo $row['Email'];?>" class="form-control" required='true'></div>
                                                    </div>
                                                    </div>
                                                    
                                                    </div>
                                                    <?php } ?>
                                                     <div class="card-footer">
                                                       <p style="text-align: center;">
													    <button type="submit" style="border-radius:15px;" class="btn btn-success btn-lg" name="submit" id="submit">
                                                           <i class="fa fa-check-circle" aria-hidden="true"></i> Update
                                                        </button></p>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="dashboardcss/vendors/jquery/dist/jquery.min.js"></script>
                            <script src="dashboardcss/vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="dashboardcss/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="dashboardcss/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="dashboardcss/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="dashboardcss/assets/js/main.js"></script>
</body>
</html>
<?php }  ?>