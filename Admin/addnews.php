<?php // Add new post

include('conn.php');

	$title=$_POST['title'];
	$food=$_POST['food'];
	$news=$_POST['news'];
	$date= date("M d, Y");
  

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);     //photo
	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}
	
	
	$sql="insert into postnews(food,title, news, image,date) values ('$food','$title','$news','$location','$date')";
	$conn->query($sql);
	header("Location: blogpost.php?id=2");
	

    
?>

