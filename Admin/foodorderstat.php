<?php 

    include('header.php'); 

    if(isset($_GET['monthyear'])){
	
        $date=$_GET['monthyear'];
    }
    else{
		
		$date= date("Y");
    }
	
	 
?>

<head>
    <link type="text/css" rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>

</head>

<style>
    .dropdown-select {
        width: 200px;
        padding: 0.3rem;
        font-weight: bold;
        text-align: center;
        font-size: 18px;
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
        background: #CE5937;
        background: -moz-linear-gradient(45deg, #CE5937 0%, #1C6EA4 50%, #C59237 100%);
        background: -webkit-linear-gradient(45deg, #CE5937 0%, #1C6EA4 50%, #C59237 100%);
        background: linear-gradient(45deg, #CE5937 0%, #1C6EA4 50%, #C59237 100%);
        box-shadow: 0 7px 7px -1px rgba(0, 0, 0, 0.4);
    }

</style>


<body>
    <?php include('navbar.php'); ?>



    <div class="container">
        <h1 class="page-header text-center">Food wise order ( <i class="far fa-calendar-alt"></i> : <?php echo $date;?>)</h1>
        <div class="row">
            <div class="col-md-12">
                <select id="catList" class="btn btn-default" style="font-size:18px">
                    <option value="0">All Category</option>
                    <?php
				$sql="select * from category";
				$catquery=$conn->query($sql);
				while($catrow=$catquery->fetch_array()){
					$catid = isset($_GET['category']) ? $_GET['category'] : 0;
					$selected = ($catid == $catrow['categoryid']) ? " selected" : "";
					echo "<option$selected value=".$catrow['categoryid'].">".$catrow['catname']."</option>";
				}
			?>
                </select>

                <div class=" pull-right " Style="font-size:18px">
                    <label for="daymonth">Month and Year:</label>
                    <input type="month" id="monthyear" name="daymonth" class="dropdown-select">
                </div>



            </div>
        </div>



        <div style="margin-top:10px;">
            <style>
                th {
                    background: #90EE90;
                    position: sticky;
                    top: 0;
                }

            </style>
            <table class="table table-striped table-bordered" style="font-size:20px">
                <thead>
                    <th>Photo</th>
                    <th>Food Name</th>
                    <th>Food Category</th>
                    <th>Price</th>
                    <th class="text-center">Number of Order</th>
                </thead>
                <tbody>
                    <?php
					$where = "";
					if(isset($_GET['category']))
					{
						$catid=$_GET['category'];
						$where = " WHERE product.categoryid = $catid";
					}
					$sql="select * from product left join category on category.categoryid=product.categoryid $where order by product.categoryid asc, productname asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
                    <tr>
                        <td><a href="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>"><img src="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>" height="30px" width="40px"></a></td>
                        <td style="font-size:17px"><?php echo $row['productname']; ?></td>
                        <td style="font-size:17px"><?php echo $row['categoryname']; ?></td>
                        <td style="font-size:17px"> &#2547; <?php echo number_format($row['price'], 2); ?> </td>
                        <td class="text-center">
                            <?php
								        $productid =  $row['productid'];
										
									    $sql="select sum(order_quantity) as total 
										from purchase_detail 
										where order_status='1' and productid='$productid' and  order_date like '$date%' ";
                                       
									    $result =  mysqli_query($conn,$sql);
                                        $value = mysqli_fetch_assoc($result);
                                        $total = $value['total'] +0;
										
										echo "<b>$total</b>";
 
								   
								   ?>
                        </td>
                    </tr>
                    <?php
					}
					
				?>
                </tbody>
            </table>
        </div>
    </div>
    <br>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#catList").on('change', function() {
                if ($(this).val() == 0) {
                    window.location = 'foodorderstat.php';
                } else {
                    window.location = 'foodorderstat.php?category=' + $(this).val();
                }
            });
        });

        $(document).ready(function() {
            $("#monthyear").on('change', function() {
                if ($(this).val() == 0) {
                    window.location = 'foodorderstat.php';
                } else {
                    window.location = 'foodorderstat.php?monthyear=' + $(this).val();
                }
            });
        });

    </script>
</body>

</html>
