	<?php	
	include('conn.php');
	extract($_POST);  

	if(isset($search)){
	
        $year = $yearList;
		if($yearList==0){
			$year = date("Y");
		}
    }
    else{
		$year = date("Y");
    }
	
	
	

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


//Category wise sales


$sql1="select sum(order_quantity) as total from purchase_detail where order_status='1' and category='Pizza' and order_date like '$year%' ";
$result1 =  mysqli_query($conn,$sql1);
$value1 = mysqli_fetch_assoc($result1);
$pizza_ordr = $value1['total']+0;


$sql2="select sum(order_quantity) as total from purchase_detail where order_status='1' and category='Pasta' and order_date like '$year%' ";
$result2 =  mysqli_query($conn,$sql2);
$value2 = mysqli_fetch_assoc($result2);
$pasta_ordr = $value2['total']+0;


$sql3="select sum(order_quantity) as total from purchase_detail where order_status='1' and category='Salad' and order_date like '$year%' ";
$result3 =  mysqli_query($conn,$sql3);
$value3 = mysqli_fetch_assoc($result3);
$salad_ordr = $value3['total']+0;

			

$sql4="select sum(order_quantity) as total from purchase_detail where order_status='1' and category='Dessert' and order_date like '$year%' ";
$result4 =  mysqli_query($conn,$sql4);
$value4 = mysqli_fetch_assoc($result4);
$dessert_ordr = $value4['total']+0;


$sql5="select sum(order_quantity) as total from purchase_detail where order_status='1' and category='Burger' and order_date like '$year%' ";
$result5 =  mysqli_query($conn,$sql5);
$value5 = mysqli_fetch_assoc($result5);
$burger_ordr = $value5['total']+0;


$sql6="select sum(order_quantity) as total from purchase_detail where order_status='1' and category='Beverage' and order_date like '$year%' ";
$result6 =  mysqli_query($conn,$sql6);
$value6 = mysqli_fetch_assoc($result6);
$beverage_ordr = $value6['total']+0;

$sql7="select sum(order_quantity) as total from purchase_detail where order_status='1' and category='Noodles' and order_date like '$year%' ";
$result7 =  mysqli_query($conn,$sql7);
$value7 = mysqli_fetch_assoc($result7);
$noodles_ordr = $value7['total']+0;


//Monthly order

	
$sql="select sum(order_quantity) as total from purchase_detail where order_status='1' and order_date like '$year-01%'";
$result =  mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$jan_ordr = $value['total']+0;

		
$sql="select sum(order_quantity) as total from purchase_detail where order_status='1' and order_date like '$year-02%'";
$result =  mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$feb_ordr = $value['total']+0;

		
$sql="select sum(order_quantity) as total from purchase_detail where order_status='1' and order_date like '$year-03%'";
$result =  mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$mar_ordr = $value['total']+0;

	
$sql="select sum(order_quantity) as total from purchase_detail where order_status='1' and order_date like '$year-04%'";
$result =  mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$apr_ordr = $value['total']+0;

		
	
$sql="select sum(order_quantity) as total from purchase_detail where order_status='1' and order_date like '$year-05%'";
$result =  mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$may_ordr = $value['total']+0;

	
$sql="select sum(order_quantity) as total from purchase_detail where order_status='1' and order_date like '$year-06%'";
$result =  mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$jun_ordr = $value['total']+0;

	
$sql="select sum(order_quantity) as total from purchase_detail where order_status='1' and order_date like '$year-07%'";
$result =  mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$jul_ordr = $value['total']+0;

		
$sql="select sum(order_quantity) as total from purchase_detail where order_status='1' and order_date like '$year-08%'";
$result =  mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$aug_ordr = $value['total']+0;

		
$sql="select sum(order_quantity) as total from purchase_detail where order_status='1' and order_date like '$year-09%'";
$result =  mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$sep_ordr = $value['total']+0;

		
$sql="select sum(order_quantity) as total from purchase_detail where order_status='1' and order_date like '$year-10%'";
$result =  mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$oct_ordr = $value['total']+0;

	
$sql="select sum(order_quantity) as total from purchase_detail where order_status='1' and order_date like '$year-11%'";
$result =  mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$nov_ordr = $value['total']+0;

	
$sql="select sum(order_quantity) as total from purchase_detail where order_status='1' and order_date like '$year-12%'";
$result =  mysqli_query($conn,$sql);
$value = mysqli_fetch_assoc($result);
$dec_ordr = $value['total']+0;

	
	
?>








	<!DOCTYPE html>
	<html lang="en">

	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta http-equiv="x-ua-compatible" content="ie=edge">

	    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>

	    <title>Annual Sales</title>
	    <link type="text/css" rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="assets/bootstrap/bootstrap4-alpha3.min.css">



	    <style>
	        body {
	            background-color: #fafafa;
	            font-size: 16px;
	            line-height: 1.5;
	        }

	        h1,
	        h2,
	        h3,
	        h4,
	        h5,
	        h6 {
	            font-weight: 400;
	        }

	        #header {
	            border-bottom: 5px solid #37474F;
	            color: #37474F;
	            margin-bottom: 1.5rem;
	            padding: 1rem 0;
	        }

	        #revenue-tag {
	            font-weight: inherit !important;
	            border-radius: 0px !important;
	        }

	        .card {
	            border: 0rem;
	            border-radius: 0rem;
	        }

	        .card-header {
	            background-color: #37474F;
	            border-radius: 0 !important;
	            color: white;
	            margin-bottom: 0;
	            padding: 1rem;
	        }

	        .card-block {
	            border: 1px solid #cccccc;
	        }

	        .shadow {
	            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14),
	                0 1px 18px 0 rgba(0, 0, 0, 0.12),
	                0 3px 5px -1px rgba(0, 0, 0, 0.2);
	        }

	        #revenue-column-chart,
	        #products-revenue-pie-chart,
	        #orders-spline-chart {
	            height: 300px;
	            width: 100%;
	        }




	        .dropdown-select {
	            width: 10rem;
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
	            align-items: center;

	        }

	        .dropdown-select:hover {
	            font-weight: bold;
	            color: white;
	            background: #CE5937;
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

	    <!-- Scripts -->
	    <script src="assets/jquery/jquery-3.1.0.min.js"></script>
	    <script src="assets/tether/tether.min.js"></script>
	    <script src="assets/bootstrap/bootstrap4-alpha3.min.js"></script>
	    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


	    <script>
	        $(function() {

	            var revenueColumnChart = new CanvasJS.Chart("revenue-column-chart", {
	                animationEnabled: true,
	                backgroundColor: "transparent",
	                theme: "theme2",
	                axisX: {
	                    labelFontSize: 16,
	                    valueFormatString: "MMM YYYY"
	                },
	                axisY: {
	                    labelFontSize: 16,
	                    prefix: " ৳ "
	                },
	                toolTip: {
	                    borderThickness: 0,
	                    cornerRadius: 0
	                },
	                data: [{
	                    type: "column",
	                    yValueFormatString: " ৳ ###,###.##  ",
	                    dataPoints: [{
	                            x: new Date(<?php echo $year;?>, 0),
	                            y: <?php echo $jan_sales;?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 1),
	                            y: <?php echo $feb_sales;?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 2),
	                            y: <?php echo $mar_sales;?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 3),
	                            y: <?php echo $apr_sales;?>
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
	                            y: <?php echo $jul_sales;?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 7),
	                            y: <?php echo $aug_sales;?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 8),
	                            y: <?php echo $sep_sales;?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 9),
	                            y: <?php echo $oct_sales;?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 10),
	                            y: <?php echo $nov_sales;?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 11),
	                            y: <?php echo $dec_sales;?>
	                        }
	                    ]
	                }]
	            });

	            revenueColumnChart.render();


	            var productsRevenuePieChart = new CanvasJS.Chart("products-revenue-pie-chart", {
	                animationEnabled: true,
	                theme: "theme1",
	                legend: {
	                    fontSize: 16
	                },
	                toolTip: {
	                    borderThickness: 0,
	                    content: "<span style='\"'color: {color};'\"'>{name}</span>: {y} (#percent%)",
	                    cornerRadius: 0
	                },
	                data: [{
	                    indexLabelFontColor: "#676464",
	                    indexLabelFontSize: 16,
	                    legendMarkerType: "square",
	                    legendText: "{indexLabel}",
	                    showInLegend: true,
	                    startAngle: 90,
	                    type: "pie",
	                    dataPoints: [{
	                            y: <?php echo $pizza_ordr;?>,
	                            name: "Pizza",
	                            indexLabel: "Pizza",
	                            legendText: "Pizza",
	                            exploded: true
	                        },
	                        {
	                            y: <?php echo $pasta_ordr;?>,
	                            name: "Pasta",
	                            indexLabel: "Pasta",
	                            legendText: "Pasta"
	                        },
	                        {
	                            y: <?php echo $salad_ordr;?>,
	                            name: "Salad",
	                            indexLabel: "Salad",
	                            legendText: "Salad"
	                        },
	                        {
	                            y: <?php echo $dessert_ordr;?>,
	                            name: "Dessert",
	                            indexLabel: "Dessert",
	                            legendText: "Dessert",
	                            color: "#E9967A"
	                        },
	                        {
	                            y: <?php echo $burger_ordr;?>,
	                            name: "Burger",
	                            indexLabel: "Burger",
	                            legendText: "Burger"
	                        },
	                        {
	                            y: <?php echo $beverage_ordr;?>,
	                            name: "Beverage",
	                            indexLabel: "Beverage",
	                            legendText: "Beverage",
	                            color: "pink"
	                        },
	                        {
	                            y: <?php echo $noodles_ordr;?>,
	                            name: "Noodles",
	                            indexLabel: "Noodles",
	                            legendText: "Noodles",
	                            color: "grey"
	                        }
	                    ]
	                }]
	            });

	            productsRevenuePieChart.render();


	            var ordersSplineChart = new CanvasJS.Chart("orders-spline-chart", {
	                animationEnabled: true,
	                backgroundColor: "transparent",
	                theme: "theme1",
	                toolTip: {
	                    borderThickness: 0,
	                    cornerRadius: 0
	                },
	                axisX: {
	                    labelFontSize: 16,
	                    valueFormatString: "MMM YYYY"
	                },
	                axisY: {
	                    gridThickness: 0,
	                    labelFontSize: 16,
	                    lineThickness: 2
	                },
	                data: [{
	                    type: "area",
	                    dataPoints: [{
	                            x: new Date(<?php echo $year;?>, 0),
	                            y: <?php echo $jan_ordr; ?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 1),
	                            y: <?php echo $feb_ordr; ?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 2),
	                            y: <?php echo $mar_ordr; ?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 3),
	                            y: <?php echo $apr_ordr; ?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 4),
	                            y: <?php echo $may_ordr; ?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 5),
	                            y: <?php echo $jun_ordr; ?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 6),
	                            y: <?php echo $jul_ordr; ?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 7),
	                            y: <?php echo $aug_ordr; ?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 8),
	                            y: <?php echo $sep_ordr; ?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 9),
	                            y: <?php echo $oct_ordr; ?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 10),
	                            y: <?php echo $nov_ordr; ?>
	                        },
	                        {
	                            x: new Date(<?php echo $year;?>, 11),
	                            y: <?php echo $dec_ordr; ?>
	                        }
	                    ]
	                }]
	            });

	            ordersSplineChart.render();

	        });

	    </script>

	</head>


	<body>
	    <div class="container">
	        <a class="navbar-brand" href="dashboard.php"><span class="fas fa-home"></span> &nbsp<b>Dashboard</b></a>
	    </div>

	    <div class="container">
	        <br>
	        <form class="example" method="post" action="annualsales.php">

	            <select name="yearList" style="font-size:20px" class="dropdown-select">
	                <option value="0">Set Year</option>
	                <option value="2020">2020</option>
	                <option value="2021">2021</option>
	                <option value="2022">2022</option>
	                <option value="2023">2023</option>
	            </select>
	            &nbsp;
	            <button type="submit" class="btn btn-success" style="outline:none;font-size:20px;border-radius:20px" name="search"><i class="fa fa-search"></i> Search</button>

	        </form>

	        <h2 id="header">
	            <strong>Annual Sales</strong>
	            <small class="text-muted">Jan <?php echo $year;?> - Dec <?php echo $year;?> </small>
	        </h2>

	        <div class="row m-b-1">
	            <div class="col-xs-12">
	                <div class="card shadow">
	                    <h4 class="card-header">Monthly Sales</h4>
	                    <div class="card-block">
	                        <div id="revenue-column-chart"></div>
	                    </div>
	                </div>
	            </div>
	        </div> <!-- row -->

	        <div class="row m-b-1">
	            <div class="col-lg-6">
	                <div class="card shadow">
	                    <h4 class="card-header">Category Wise Order Year-<?php echo $year;?></h4>
	                    <div class="card-block">
	                        <div id="products-revenue-pie-chart"></div>
	                    </div>
	                </div>
	            </div>

	            <div class="col-lg-6">
	                <div class="card shadow">
	                    <h4 class="card-header">Monthly Orders </h4>
	                    <div class="card-block">
	                        <div id="orders-spline-chart"></div>
	                    </div>
	                </div>
	            </div>
	        </div> <!-- row -->
	    </div> <!-- container -->
	</body>
	<script>
	    if (window.history.replaceState) {
	        window.history.replaceState(null, null, window.location.href);
	    }

	</script>

	</html>
