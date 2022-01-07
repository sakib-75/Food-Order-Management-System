<?php
session_start();
error_reporting(0);
include('conn.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } 
     ?>

<!doctype html>
<html class="no-js" lang="en">

<head>

    <title>Admin Dashboard</title>

    <link rel="apple-touch-icon" href="apple-icon.png">


    <link rel="stylesheet" href="dashboardcss/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="dashboardcss/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="dashboardcss/vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="dashboardcss/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <?php include_once('includes/header.php');?>
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Food Order System</h1>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title" style="margin-top:12px;">
                        <iframe src="http://free.timeanddate.com/clock/i7d3fsyp/n73/fs18/tct/pct/ahr/tt0/tw1/th2" frameborder="0" width="380" height="23" allowTransparency="true"></iframe>

                    </div>
                </div>
            </div>

        </div>

        <div class="content mt-3">

            <style>
                #hov:hover {

                    -webkit-box-shadow: 0px 0px 20px 0px #000000;
                    box-shadow: 0px 0px 20px 0px #000000;

                }

            </style>


            <div class="col-sm-6 col-lg-6">
                <div id="hov" class="card text-white bg-flat-color-1" style="background-Color:#D2691E;border-radius:25px;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4" style="border-radius:15px">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="foodorderstat.php">View food</a>

                                </div>
                            </div>
                        </div>
                        <?php
                             $sql1="select count(productid) as total from product  ";
                             $result1 =  mysqli_query($conn,$sql1);
                             $value1 = mysqli_fetch_assoc($result1);
                             $totalfood = $value1['total'];
                         ?>
                        <h1 class="mb-0">
                            <span class="count"><?php echo $totalfood;?></span>
                        </h1>
                        <br>
                        <div class="col-xs-3">
                            <i class="fa fa-tags fa-5x"></i>
                        </div>
                        <h4 class="text-center">Total Number of Food</h4>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-6">
                <div id="hov" class="card text-white bg-flat-color-5" style="background-Color:#228B22;border-radius:25px;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="border-radius:15px">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="approvedorder.php">View approve order</a>

                                </div>
                            </div>
                        </div>
                        <?php

                             $sql2="select count(purchaseid) as total from purchase where order_status='1' ";
                             $result =  mysqli_query($conn,$sql2);
                             $value = mysqli_fetch_assoc($result);
                             $purchase = $value['total'];
                         ?>
                        <h1 class="mb-0">
                            <span class="count"><?php echo $purchase;?></span>
                        </h1>
                        <br>
                        <div class="col-xs-3">
                            <i class="fa fa-cart-plus fa-5x"></i>

                        </div>
                        <h4 class="text-center">Total Approve Order</h4>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-lg-6">
                <div id="hov" class="card text-white bg-flat-color-4" style="background-Color:#B22222;border-radius:25px;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="border-radius:15px">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="unapprovedorder.php">View unapproved order</a>

                                </div>
                            </div>
                        </div>
                        <?php

                             $sql2="select count(purchaseid) as total from purchase where order_status='0' ";
                             $result =  mysqli_query($conn,$sql2);
                             $value = mysqli_fetch_assoc($result);
                             $purchase = $value['total'];
                         ?>

                        <h1 class="mb-0">
                            <span class="count"><?php echo $purchase;?></span>
                        </h1>
                        <br>
                        <div class="col-xs-3">
                            <i class="fa fa-cart-plus fa-5x"></i>
                        </div>
                        <h4 class="text-center">Total Unapproved Order</h4>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-lg-6">
                <div id="hov" class="card text-white bg-flat-color-4" style="background-Color:#008B8B;border-radius:25px;">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="border-radius:15px">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="yearsales.php">View year sales</a>

                                </div>
                            </div>
                        </div>

                        <?php
						
						    $year = date("Y");
	
                            $sql="select sum(total) as total from purchase where order_status='1' and date_purchase like '$year%' ";
                            $result =  mysqli_query($conn,$sql);
                            $value = mysqli_fetch_assoc($result);
                            $total = $value['total']+0;

		
                         ?>

                        <h1 class="mb-0">
                            <h1> &#2547; <span class="count"> <?php echo $total;?></span></h1>
                        </h1>
                        <br>
                        <div class="col-xs-3">
                            <i class="fa fa-usd fa-4x"></i>
                        </div>
                        <h4 class="text-center">Total Yearly Sales (<?php echo $year;?>)</h4>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>




        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="dashboardcss/vendors/jquery/dist/jquery.min.js"></script>
    <script src="dashboardcss/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="dashboardcss/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dashboardcss/assets/js/main.js"></script>


    <script src="dashboardcss/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="dashboardcss/assets/js/dashboard.js"></script>
    <script src="dashboardcss/assets/js/widgets.js"></script>
    <script src="dashboardcss/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="dashboardcss/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="dashboardcss/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);

    </script>

</body>

</html>
