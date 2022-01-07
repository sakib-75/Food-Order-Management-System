<?php 

    include('header.php'); 
    $_SESSION['message'] = '';

if(isset($_GET['id'])){  // message color code
    $idd=$_GET['id'];
    if($idd==1){
	    $_SESSION['message'] = "...This food name already in menu!!!";
		$style="color:red";
    }
    if($idd==2){
	    $_SESSION['message'] = "...Added successfully in menu!!";
		$style="color:green";
    }
	if($idd==3){
		$_SESSION['message'] = "Update successfully !!";
		$style="color:green";
	}
    if($idd==4){
	    $_SESSION['message'] = "...Delete successfully!!";
		$style="color:red";
    }
}
else{
	 
    $_SESSION['message'] = '';
	$style="color:red";
}	


    //food name in message

    if(isset($_GET['food'])){
	
        $foodmessage=$_GET['food'];
 
    }
    else{
	 
	    $foodmessage="";
    }

if(isset($_POST['comment_id'])){
    $comment_id = $_POST['comment_id'];
    $sql_del = "DELETE FROM user_review WHERE review_id = '$comment_id' ";
    $stmt = $conn->prepare($sql_del);
    $stmt->execute();

    if (! empty($stmt)) {
        echo true;
    }
}
	 
?>
<html>

<head>
    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('navbar.php'); ?>

    <h3 style="<?php echo $style;?>" class='text-center mt-3'> <b style="font-family:Verdana;color:#ff6600"><?php echo $foodmessage; ?></b><b><?php echo $_SESSION['message']; ?></b></h3>
    <div class="container">
        <h1 class="page-header text-center">Food Maintenance</h1>
        <div class="row">
            <div class="col-md-12">
                <select id="catList" class="btn btn-default" style="font-size:17px">
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
                <a style="font-size:17px" href="#addproduct" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> <b>Add Food</b></a>

            </div>
        </div>
        <div style="margin-top:10px;">
            <style>
                th {
                    background: #FAEBD7;
                    position: sticky;
                    top: 0;
                    box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);

                }

            </style>
            <table class="table table-striped table-bordered">
                <thead>
                    <th style="font-size:17px">Photo</th>
                    <th style="font-size:17px">Food Name</th>
                    <th style="font-size:17px">Food Category</th>
                    <th style="font-size:17px">Price</th>
                    <th class="text-center" style="font-size:17px">Action</th>
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
						
						    $foodname=$row['productname'];
							$sql1="SELECT offer as total FROM product WHERE productname='$foodname' ";
                            $result1 =  mysqli_query($conn,$sql1);
                            $value1 = mysqli_fetch_assoc($result1);
                            $offer = $value1['total'];
							
							if($offer>0){
								$badge= '<span style="font-family:Calibri;background-color:#CD5C5C;font-size:17px;" class="badge badge-pill badge-danger">'.$offer.' % OFF </span>';
							   
							 
							}else{
								$badge="";
							}
						
						
						
						
						?>
                    <tr>
                        <td><a href="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>"><img src="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>" height="30px" width="40px"></a></td>
                        <td style="font-size:17px"><?php echo $row['productname']; ?></td>
                        <td style="font-size:17px"><?php echo $row['categoryname']; ?></td>
                        <td style="font-size:17px"> &#2547; <?php echo number_format($row['price']); ?> <?php echo $badge;?></td>
                        <td class="text-center">
                            <a href="#food-details<?php echo $row['productid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Details</a> ||
                            <a href="#editproduct<?php echo $row['productid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> ||
                            <a href="#deleteproduct<?php echo $row['productid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            <?php include('product_modal.php'); ?>
                            <?php include('product_details_modal.php'); ?>
                        </td>
                    </tr>
                    <?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include('modal.php'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#catList").on('change', function() {
                if ($(this).val() == 0) {
                    window.location = 'product.php';
                } else {
                    window.location = 'product.php?category=' + $(this).val();
                }
            });
        });

    </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

    </script>
</body>

</html>
