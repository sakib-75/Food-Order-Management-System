<?php
include('conn.php');

	$id = $_GET['removeorder'];
	
	
	$sql="delete from purchase where purchaseid='$id'";
	$conn->query($sql);
	

	$sql2="delete from purchase_detail where purchaseid='$id'";
	$conn->query($sql2);
	
	
	
	header('location:unapprovedorder.php?id=1');
	
	
?>	
	