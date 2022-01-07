<?php

    include('conn.php');
	$purchaseid = $_GET['PurchaseId'];
    $status = $_POST['select_status'];

    if($status=="null"){
        header("Location: unapprovedorder.php?id=1");
    }
    else{

        $query = "update purchase set delivery_status='$status' where purchaseid='$purchaseid' ";
        $conn->query($query);
        
        if( $status=="Complete Delivery"){
            $sql="update purchase set order_status='1' where purchaseid='$purchaseid'";
            $conn->query($sql);

	        $sql="update purchase_detail set order_status='1' where purchaseid='$purchaseid'";
            $conn->query($sql); 
        }
        
        header("Location: unapprovedorder.php?id=2&prcid=$purchaseid");
        
    }
?>