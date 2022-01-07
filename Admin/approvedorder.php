<?php include('header.php'); ?>
<html>
<?php include('navbar.php'); ?>
<script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>

<style>
    #myTable {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
        font-size: 18px;
    }

    #myTable th,
    #myTable td {

        padding: 12px;
    }

    #myTable tr {
        border-bottom: 1px solid #ddd;
    }





    * {
        box-sizing: border-box;
    }

    form.example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
    }

    form.example button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #2196F3;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;

    }

    form.example button:hover{
        background: green;
    }
     form.example button:hover i{
         -ms-transform: scale(1.5);
        /* IE 9 */
        -webkit-transform: scale(1.5);
        /* Safari 3-8 */
        transform: scale(1.5);
       
    }

    form.example::after {
        content: "";
        clear: both;
        display: table;
    }

</style>

<body>

    <div class="container">


        <h1 class="text-center">Approved Order</h1>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <form class="pull-left example" method="post" action="approvedorder.php" style="max-width:300px">
                    <input type="text" placeholder="Search here..." required name="search" autocomplete="off">
                    <button type="submit" name="submit"><i class="fa fa-search"></i></button>
                </form>
                <select id="limitList" class="pull-right btn btn-default" style="font-size:17px">
                    <option value="0">Set Limit</option>
                    <option value="30">Last 30</option>
                    <option value="50">Last 50</option>
                    <option value="75">Last 75</option>
                    <option value="100">Last 100</option>
                </select>

            </div>
        </div>

        <h5>*** <b>Note: </b>Search by Order No, Date(YYYY-MM-DD), Customer Name, Location, Contact *** </h5><br>
        <table class="table table-hover table-bordered" id="myTable">

            <?php 
			    if(isset($_GET['limit'])){
					
					$limit=$_GET['limit'];
					
				}
				else{
					$limit=20;
				}
			    extract($_POST);  
				
				if(isset($submit)){
					$search=$_POST['search'];
					$where=  "where order_status='1' and (purchaseid='$search' or customer like '%$search%' or location like '%$search%' or contact='$search' or date_purchase like '$search%') ";
					$limit=500;
					
                    $sql="select count(purchaseid) as total from purchase $where ";
				    $result =  mysqli_query($conn,$sql);
                    $value = mysqli_fetch_assoc($result);
                    $found = $value['total'];   //Count result
					
					
					$sql1="select * from purchase where order_status='1' and purchaseid='$search' ";
				    $query1=$conn->query($sql1);
					$row1=mysqli_num_rows($query1);
					
					$sql2="select * from purchase where order_status='1' and contact='$search' ";
				    $query2=$conn->query($sql2);
					$row2=mysqli_num_rows($query2);
					
					$sql3="select * from purchase where order_status='1' and date_purchase like '$search%' ";
				    $query3=$conn->query($sql3);
					$row3=mysqli_num_rows($query3);
					
					$sql4="select * from purchase where order_status='1' and customer like '%$search%' ";
				    $query4=$conn->query($sql4);
					$row4=mysqli_num_rows($query4);
					
					$sql5="select * from purchase where order_status='1' and location like '%$search%' ";
				    $query5=$conn->query($sql5);
					$row5=mysqli_num_rows($query5);
					
					//1 Order no
					if($row1>0){
						$idstyle="background-color:#B0E0E6";
					
					}else{
						$idstyle="";			
					}
					//2 Contact
					if($row2>0){
						$contactstyle="background-color:#B0E0E6";
					
					}else{
						$contactstyle="";
					}
					//3 Date
					if($row3>0){
						$datestyle="background-color:#B0E0E6";
					
					}else{
						$datestyle="";
					}
					//4 Customer name
					if($row4>0){
						$namestyle="background-color:#B0E0E6";
					
					}else{
						$namestyle="";
					}
					//5 Location
					if($row5>0){
						$locationstyle="background-color:#B0E0E6";
					
					}else{
						$locationstyle="";
					}
						
					
					
					if($search!=""){
						
						echo "<h4 style='text-align:center'><b style='color:red'>$found</b>  results were found for the search for <b style='color:red'>$search</b></h4>";
      
					}
	
				}else{
					$where = "where order_status='1'";
									
				}
				
			
			
				$sql="select * from purchase $where order by purchaseid desc LIMIT $limit ";
				$query=$conn->query($sql);
				if(mysqli_num_rows($query)== 0 ){
												
					echo "<br><br><h3 style='color:red;text-align:center'><i class='fa fa-ban'></i><b> No approved order found</b></h3><br>";
      
			    }
				else{
					if(!isset($submit) && $limit>0){   
					
						echo "<h4 style='text-align:center'>Last $limit Approved Order</h4>";
			        
					}
					?>
            <style>
                th {
                    background: #FAEBD7;
                    position: sticky;
                    top: 0px;
                    box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
                }

            </style>
            <thead>
                <th>Order No</th>
                <th>Date</th>
                <th>Customer Name</th>
                <th>Location</th>
                <th>Contact</th>
                <th>Total Sales</th>
                <th class="text-center">Details</th>
            </thead>
            <?php
				
				    while($row=$query->fetch_array()){
						
					 ?>

            <tbody>
                <tr>
                    <td style="<?php echo $idstyle;?>"><?php echo $row['purchaseid']; ?></td>
                    <td style="<?php echo $datestyle;?>"><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
                    <td style="<?php echo $namestyle;?>"><?php echo $row['customer']; ?></td>
                    <td style="<?php echo $locationstyle;?>"><?php echo $row['location']; ?></td>
                    <td style="<?php echo $contactstyle;?>"><?php echo $row['contact']; ?></td>
                    <td> &#2547; <?php echo number_format($row['total'], 2); ?></td>
                    <td class="text-center"><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-lg btn-warning" style="color:black"><span class="fas fa-user-tag"></span> </a>
                        <?php include('sales_modal.php'); ?>

                    </td>
                </tr>
            </tbody>

            <?php
					
				    }
				}
				?>

        </table>
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        $("#limitList").on('change', function() {
            if ($(this).val() == 0) {
                window.location = 'approvedorder.php';
            } else {
                window.location = 'approvedorder.php?limit=' + $(this).val();
            }
        });
    });

</script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

</script>

</html>
