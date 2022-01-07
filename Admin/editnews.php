<?php
	include('conn.php');

	$id=$_GET['newsid'];

	$food=$_POST['food'];
	$title=$_POST['title'];
	$news=$_POST['news'];
	$date= date("M d, Y");

	$sql="select * from postnews where postid='$id'";
	$query=$conn->query($sql);
	$row=$query->fetch_array();
	

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if (empty($fileinfo['filename'])){
		$location = $row['image'];
	}
	else{
        
        unlink($row['image']);  //Delete previous image from device
        
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
		$location="upload/" . $newFilename;
	}
	
	
	//Update food 
	

	$sql="update postnews set food='$food', title='$title',news='$news', image='$location',date='$date' where postid='$id' ";
	$conn->query($sql);
	
    header("Location: blogpost.php?id=3");
	
	
?>