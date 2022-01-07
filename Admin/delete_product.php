<?php
	include('conn.php');

	$id = $_GET['product'];
	
	$sql1="select * from product where productid='$id' ";
    $resultquery =  mysqli_query($conn,$sql1);
    $result = mysqli_fetch_assoc($resultquery);
	$productname =$result['productname'];       //Product name
	$photo =$result['photo'];                  //Product image

    unlink($photo);
                                                
	$sql="delete from product where productid='$id'";
	$conn->query($sql);
	
	$sql2="delete from cart where food='$productname'";
	$conn->query($sql2);
	
	$sql3="delete from user_review where foodname='$productname'";
	$conn->query($sql3);
	
	

	header("Location: product.php?id=4&food=$productname");
?>