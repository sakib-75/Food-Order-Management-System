<?php
	include('conn.php');


	$pname=$_POST['pname'];
	$price=$_POST['price'];
	$category=$_POST['category'];
	$quantity=$_POST['quantity'];
	$offer=$_POST['offer'];
	$offer_title=$_POST['offer_title'];
		
    $sql1="select catname from category where categoryid=$category ";
    $result1 =  mysqli_query($conn,$sql1);
    $cat_name1 = mysqli_fetch_assoc($result1);
	$cat_name2 =$cat_name1['catname'];          //Category name


	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}
	
	$rs=mysqli_query($conn,"select * from product where productname='$pname' ");
	if (mysqli_num_rows($rs)>0)
    {
		header("Location: product.php?id=1&food=$pname");
    }	
    else{
	
	    $sql="insert into product (productname, categoryid,categoryname, price,offer_title, offer, photo,quantity) values ('$pname', '$category','$cat_name2', '$price','$offer_title','$offer', '$location','$quantity')";
	    $conn->query($sql);
		header("Location: product.php?id=2&food=$pname");
    }
?>