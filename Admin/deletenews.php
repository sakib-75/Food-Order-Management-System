<?php
	include('conn.php');

	$id = $_GET['newsid'];
	
	
	$sql="select * from postnews where postid='$id'  ";
    $result =  mysqli_query($conn,$sql);
    $value = mysqli_fetch_assoc($result);
    $news_image = $value['image'];
    $food = $value['food'];
    $title = $value['title'];


    unlink($news_image);  //delete image device
     
	
	$sql="delete from postnews where postid='$id'";  //delete from database
	$conn->query($sql);
	
    $sql2="delete from postcomment where foodname='$food' and title='$title' ";  //delete from database
	$conn->query($sql2);

	header("Location: blogpost.php?id=4");
?>