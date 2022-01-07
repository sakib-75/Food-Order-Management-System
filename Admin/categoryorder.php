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

    <title>Category order</title>
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


//Category wise order
extract($_POST);  

if(isset($search)){
	
	
	if($design == "null"){    //Chart style
		$type = "area";
		
	}else{
		$type=$design;
	}	
	
	$date = $monthyear;
	
	
}
else{
	
	$date = date("Y");
	$type = "area";
	
}

        $sql="select sum(order_quantity) as total from purchase_detail where order_status='1' and order_date like '$date%'";
        $result =  mysqli_query($conn,$sql);
        $value = mysqli_fetch_assoc($result);
        $total_ordr = $value['total'] +0;

		
        $sql1="select sum(order_quantity) as total from purchase_detail where order_status='1' and category='Pizza' and order_date like '$date%'";
        $result1 =  mysqli_query($conn,$sql1);
        $value1 = mysqli_fetch_assoc($result1);
        $pizza_ordr = $value1['total'] +0;


        $sql2="select sum(order_quantity) as total from purchase_detail where order_status='1' and category='Pasta' and  order_date like '$date%' ";
        $result2 =  mysqli_query($conn,$sql2);
        $value2 = mysqli_fetch_assoc($result2);
        $pasta_ordr = $value2['total'] +0;
 

        $sql3="select sum(order_quantity) as total from purchase_detail where order_status='1' and category='Salad' and  order_date like '$date%' ";
        $result3 =  mysqli_query($conn,$sql3);
        $value3 = mysqli_fetch_assoc($result3);
        $salad_ordr = $value3['total'] +0;			

        $sql4="select sum(order_quantity) as total from purchase_detail where order_status='1' and category='Dessert' and  order_date like '$date%' ";
        $result4 =  mysqli_query($conn,$sql4);
        $value4 = mysqli_fetch_assoc($result4);
        $dessert_ordr = $value4['total'] +0;


        $sql5="select sum(order_quantity) as total from purchase_detail where order_status='1' and category='Burger' and  order_date like '$date%' ";
        $result5 =  mysqli_query($conn,$sql5);
        $value5 = mysqli_fetch_assoc($result5);
        $burger_ordr = $value5['total'] +0;

    
        $sql6="select sum(order_quantity) as total from purchase_detail where order_status='1' and category='Beverage' and  order_date like '$date%' ";
        $result6 =  mysqli_query($conn,$sql6);
        $value6 = mysqli_fetch_assoc($result6);
        $beverage_ordr = $value6['total'] +0;
    
    
        $sql7="select sum(order_quantity) as total from purchase_detail where order_status='1' and category='Noodles' and  order_date like '$date%' ";
        $result7 =  mysqli_query($conn,$sql7);
        $value7 = mysqli_fetch_assoc($result7);
        $noodles_ordr = $value7['total'] +0;

?>





<script type="text/javascript">
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2", // "light2", "dark1", "dark2"
            animationEnabled: false, // change to true		
            title: {
                text: "Category wise order "
            },
            data: [{
                // Change type to "bar", "area", "spline", "pie",etc.
                type: <?php echo '"'.$type.'"';?>,
                dataPoints: [{
                        label: "Pizza",
                        y: <?php echo $pizza_ordr;?>
                    },
                    {
                        label: "Pasta",
                        y: <?php echo $pasta_ordr;?>
                    },
                    {
                        label: "Salads",
                        y: <?php echo $salad_ordr;?>
                    },
                    {
                        label: "Dessert",
                        y: <?php echo $dessert_ordr;?>
                    },
                    {
                        label: "Burger",
                        y: <?php echo $burger_ordr;?>
                    },
                    {
                        label: "Beverage",
                        y: <?php echo $beverage_ordr;?>
                    },
                    {
                        label: "Noodlese",
                        y: <?php echo $noodles_ordr;?>
                    }
                ]
            }]
        });
        chart.render();
    }

</script>

<style>
    .dropdown-select {
        width: 12rem;
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

    .date {
        width: 230px;
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

    .date:hover {
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

    .dropdown-select:hover {
        font-weight: bold;
        color: white;
        background: -moz-linear-gradient(-45deg, #73CECC 0%, #8FA4A1 50%, #C28EC5 100%);
        background: -webkit-linear-gradient(-45deg, #73CECC 0%, #8FA4A1 50%, #C28EC5 100%);
        background: linear-gradient(135deg, #73CECC 0%, #8FA4A1 50%, #C28EC5 100%);
        box-shadow: 0 7px 7px -1px rgba(0, 0, 0, 0.4);
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
            <div class="row">
                <div class="col-md-12 ">
                    <form class="example" method="post" action="categoryorder.php" style="font-size:20px">
                        <label><b>Select Month and Year:</b></label><br>
                        <input required type="month" id="monthyear" name="monthyear" class="date">
                        <select name="design" style="font-size:20px" class="dropdown-select">
                            <option value="null">Change Style</option>
                            <option value="spline">Spline</option>
                            <option value="column">Column</option>
                            <option value="area">Area</option>
                            <option value="pie">Pie</option>
                            <option value="bar">Bar</option>
                        </select>
                        &nbsp;
                        <button type="submit" class="btn btn-success" style="font-size:20px;border-radius:25px" name="search"><i class="fa fa-search"></i> Search</button>
                    </form>
                </div>
            </div>

            <br>
            <h4>Total order ( <i class="far fa-calendar-alt"></i> : <?php echo $date;?> ): <b style="color:red"><?php echo $total_ordr; ?></b></h4>
            <br>

            <div id="chartContainer" style="height:500px; width: 100%;"></div>
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
