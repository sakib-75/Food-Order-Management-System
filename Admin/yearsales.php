<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } else{
   

?>

<!doctype html>
<html class="no-js" lang="en">

<head>

    <title>Year Sales</title>
    <link rel="apple-touch-icon" href="apple-icon.png">


    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="dashboardcss/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="dashboardcss/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="dashboardcss/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="dashboardcss/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>




<?php


include('conn.php');

extract($_POST);  

if(isset($search)){
	
	if($design == "null"){    //Chart style
		$type = "column";
		
	}else{
		$type=$design;
	}			
	if( $yearList==0){
		$_SESSION['message'] = "Select Year!!";
		$year = "..."; 
		$total=0;
	}
    else{
		$year = $yearList;
		$_SESSION['message'] = "";
	}

}
else{
	
    $type = "column";
	$_SESSION['message'] = "";
	$year = date("Y");
	
}
	
	$sql="select sum(total) as total from purchase where order_status='1' and date_purchase like '$year%' ";
    $result =  mysqli_query($conn,$sql);
    $value = mysqli_fetch_assoc($result);
    $total = $value['total']+0;

	
    $sql1="select sum(total) as total from purchase where order_status='1' and date_purchase like '$year-01%' ";
    $result1 =  mysqli_query($conn,$sql1);
    $value1 = mysqli_fetch_assoc($result1);
    $jan_sales = $value1['total']+0;

    $sql2="select sum(total) as total from purchase where order_status='1' and date_purchase like '$year-02%' ";
    $result2 =  mysqli_query($conn,$sql2);
    $value2 = mysqli_fetch_assoc($result2);
    $feb_sales = $value2['total']+0;	

    $sql3="select sum(total) as total from purchase where order_status='1' and date_purchase like '$year-03%' ";
    $result3 =  mysqli_query($conn,$sql3);
    $value3 = mysqli_fetch_assoc($result3);
    $mar_sales = $value3['total']+0;

    $sql4="select sum(total) as total from purchase where order_status='1' and date_purchase like '$year-04%' ";
    $result4 =  mysqli_query($conn,$sql4);
    $value4 = mysqli_fetch_assoc($result4);
    $apr_sales = $value4['total']+0;

	
    $sql5="select sum(total) as total from purchase where order_status='1' and date_purchase like '$year-05%' ";
    $result5 =  mysqli_query($conn,$sql5);
    $value5 = mysqli_fetch_assoc($result5);
    $may_sales = $value5['total']+0;

	

    $sql6="select sum(total) as total from purchase where order_status='1' and date_purchase like '$year-06%' ";
    $result6 =  mysqli_query($conn,$sql6);
    $value6 = mysqli_fetch_assoc($result6);
    $jun_sales = $value6['total']+0;
	

    $sql7="select sum(total) as total from purchase where order_status='1' and date_purchase like '$year-07%' ";
    $result7 =  mysqli_query($conn,$sql7);
    $value7 = mysqli_fetch_assoc($result7);
    $jul_sales = $value7['total']+0;
	
	
    $sql8="select sum(total) as total from purchase where order_status='1' and date_purchase like '$year-08%' ";
    $result8 =  mysqli_query($conn,$sql8);
    $value8 = mysqli_fetch_assoc($result8);
    $aug_sales = $value8['total']+0;

	
    $sql9="select sum(total) as total from purchase where order_status='1' and date_purchase like '$year-09%' ";
    $result9 =  mysqli_query($conn,$sql9);
    $value9 = mysqli_fetch_assoc($result9);
    $sep_sales = $value9['total']+0;


    $sql10="select sum(total) as total from purchase where order_status='1' and date_purchase like '$year-10%' ";
    $result10 =  mysqli_query($conn,$sql10);
    $value10 = mysqli_fetch_assoc($result10);
    $oct_sales = $value10['total']+0;


    $sql11="select sum(total) as total from purchase where order_status='1' and date_purchase like '$year-11%' ";
    $result11 =  mysqli_query($conn,$sql11);
    $value11 = mysqli_fetch_assoc($result11);
    $nov_sales = $value11['total']+0;




    $sql12="select sum(total) as total from purchase where order_status='1' and date_purchase like '$year-12%' ";
    $result12 =  mysqli_query($conn,$sql12);
    $value12 = mysqli_fetch_assoc($result12);
    $dec_sales = $value12['total']+0;

	


?>




<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Company Sales by Year"
            },
            axisY: {
                prefix: "৳ "
            },
            data: [{
                type: <?php echo '"'.$type.'"';?>,
                color: "rgba(54,158,173,.7)",
                markerSize: 5,
                xValueFormatString: "MMM YYYY",
                yValueFormatString: "৳ #,##0.##",
                dataPoints: [{
                        x: new Date(<?php echo $year;?>, 0),
                        y: <?php echo $jan_sales; ?>
                    },
                    {
                        x: new Date(<?php echo $year;?>, 1),
                        y: <?php echo $feb_sales; ?>
                    },
                    {
                        x: new Date(<?php echo $year;?>, 2),
                        y: <?php echo $mar_sales; ?>
                    },
                    {
                        x: new Date(<?php echo $year;?>, 3),
                        y: <?php echo $apr_sales; ?>
                    },
                    {
                        x: new Date(<?php echo $year;?>, 4),
                        y: <?php echo $may_sales; ?>
                    },
                    {
                        x: new Date(<?php echo $year;?>, 5),
                        y: <?php echo $jun_sales; ?>
                    },
                    {
                        x: new Date(<?php echo $year;?>, 6),
                        y: <?php echo $jul_sales; ?>
                    },
                    {
                        x: new Date(<?php echo $year;?>, 7),
                        y: <?php echo $aug_sales; ?>
                    },
                    {
                        x: new Date(<?php echo $year;?>, 8),
                        y: <?php echo $sep_sales; ?>
                    },
                    {
                        x: new Date(<?php echo $year;?>, 9),
                        y: <?php echo $oct_sales; ?>
                    },
                    {
                        x: new Date(<?php echo $year;?>, 10),
                        y: <?php echo $nov_sales; ?>
                    },
                    {
                        x: new Date(<?php echo $year;?>, 11),
                        y: <?php echo $dec_sales; ?>
                    }
                ]
            }]
        });
        chart.render();

    }

</script>


<style>
    .dropdown-select {
        width: 10rem;
        height: 45px;
        padding: 0.3rem;
        font-weight: bold;
        text-align: center;
        font-size: 20px;
        border-radius: 7px;
        background-color: #DCDCDC;
        border-bottom: 0;
        border-right: 0;
        border-top: 0.5px;
        border-left: 0.5px;

    }


    .dropdown-select:hover {
        font-weight: bold;
        color: white;
        background: -moz-linear-gradient(-45deg, #73CECC 0%, #8FA4A1 50%, #C28EC5 100%);
        background: -webkit-linear-gradient(-45deg, #73CECC 0%, #8FA4A1 50%, #C28EC5 100%);
        background: linear-gradient(135deg, #73CECC 0%, #8FA4A1 50%, #C28EC5 100%);
        box-shadow: 0 7px 7px -1px rgba(0, 0, 0, 0.4);
    }

    form.example button:hover {
        font-weight: bold;
        background-color: #f4511e;
        border-color: #f4511e;
        -ms-transform: scale(1.1);
        /* IE 9 */
        -webkit-transform: scale(1.1);
        /* Safari 3-8 */
        transform: scale(1.1);
        -webkit-box-shadow: 0px 0px 15px 0px #000000;
        box-shadow: 0px 0px 15px 0px #000000;

    }

    option {
        color: black;
        background-color: aliceblue;
    }

</style>


<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="container">
            <br>
            <div class="row">
                <div class="col-md-12 ">
                    <form class="example" method="post" action="yearsales.php">
                        <select name="yearList" style="font-size:20px" class="dropdown-select">
                            <option value="0">Set Year</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <select name="design" style="font-size:20px" class="dropdown-select">
                            <option value="null">Change Style</option>
                            <option value="column">Column</option>
                            <option value="area">Area</option>
                            <option value="bar">Bar</option>
                        </select>
                        &nbsp;
                        <button type="submit" class="btn btn-success" style="font-size:20px;border-radius:20px" name="search"><i class="fa fa-search"></i> Search</button>
                    </form>
                </div>
            </div>

            <br>
            <h4>Total sales ( <i class="fa fa-calendar"></i> : <?php echo $year;?> ): <b style="color:red"> <?php echo $total; ?></b> BDT</h4><br>
            <h4 class="text-center"><b style="color:red"><?php echo $_SESSION['message'] ; ?></b></h4>
            <br>

            <div id="chartContainer" style="height: 500px; width: 100%;"></div>
            <script src="canvasjs.min.js"></script>
            <br><br>

        </div>
        <!--container-->
    </div>
    <!--right panel-->

    <script src="dashboardcss/vendors/jquery/dist/jquery.min.js"></script>
    <script src="dashboardcss/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="dashboardcss/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dashboardcss/assets/js/main.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

    </script>


</body>

</html>
<?php }  ?>
