
<?php
include_once 'connection.php';
session_start(); 
 if(isset($_GET['delete'])) {
	 
  $name = $_GET['delete'];
  $username=$_COOKIE['u_name'];
  
 $query = "DELETE FROM cart WHERE food = '$name' and user='$username' ";
 $post_delete_query = mysqli_query($mysqli,$query);
 if (!$post_delete_query) {
   die("delete course query ".mysqli_error($mysqli));
 }else{
 	 header("Location: cart.php?id=3&food=$name");
 }

}


?>