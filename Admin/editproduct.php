<?php
	include('conn.php');

	$id=$_GET['product'];

	$pname=$_POST['pname'];
	$category=$_POST['category'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	$offer=$_POST['offer'];
	$offer_title=$_POST['offer_title'];

	$sql="select * from product where productid='$id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();
	$productname =$row['productname'];       //Product name
	$product_image=$row['photo'];           //Image
	
	$sq="select catname from category where categoryid=$category ";
    $result1 =  mysqli_query($conn,$sq);
    $cat_name1 = mysqli_fetch_assoc($result1);
	$catname =$cat_name1['catname'];          //Category name

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		$location = $row['photo'];
	}
	else{
		unlink($product_image);  //delete previus image from device
		
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
	}
	
	
	//Update food 
	
	$rs=mysqli_query($conn,"select * from product where productname='$pname' and productid !='$id'");
	if (mysqli_num_rows($rs)>0)
    {
		header("Location: product.php?id=1&food=$pname");
    }	
    else{
		
	    $sql="update product set productname='$pname', categoryid='$category',categoryname='$catname', price='$price',offer_title='$offer_title' , offer='$offer', photo='$location',quantity='$quantity' where productid='$id'";
	    $conn->query($sql);
	
     	$sql2="update cart set food='$pname', price='$price', photo='$location' where food='$productname'";
	    $conn->query($sql2);
	
	    $sql3="update user_review set foodname='$pname' where foodid='$id'";
	    $conn->query($sql3);
		header("Location: product.php?id=3");
    }
	
	
?>