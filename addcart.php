<?php 
session_start(); 
include_once 'connection.php';
$_SESSION['message'] = '';

if(!isset($_COOKIE["u_name"])){
	
    $_SESSION['message'] = "Login First !!";
    $_SESSION['RedirectKe'] = $_SERVER['REQUEST_URI'];
    ?> <script type="text/javascript">
    window.alert("Login First!");
    window.location.href = 'index.php';

</script>
<?php	
  
    $_COOKIE['u_name']="";
   
}
else{

    if (isset($_GET['insert'])) {		
							
		$food=$_GET['insert'];
		$query = "SELECT * FROM product WHERE productname = '$food' ";
		$query_result = mysqli_query($mysqli,$query);
		if (!$query_result) {
		    die("view_add_query_result failed ".mysqli_error($mysqli));
		}

		while ($row=mysqli_fetch_assoc($query_result)) {
								
			$foodname=$row['productname'];
			$price=$row['price'];
			$image=$row['photo'];
			
			
			$username=$_COOKIE['u_name'];
            $rs=mysqli_query($mysqli,"select * from cart where food='$foodname' and user='$username'");
			if (mysqli_num_rows($rs)>0){
				
				header("Location: cart.php?id=1&food=$foodname");
				
            }	
            else{
            							   
	            $query="insert into cart(user,food,price,photo) values('$username','$foodname','$price','$image')";                            								
                $post_create_query_result = mysqli_query($mysqli,$query);
                if (!$post_create_query_result) {
	                die('post_create_query_result failed '.mysqli_error($mysqli));
                }
				else{
					
					header("Location: cart.php?id=2&food=$foodname");	
                }
            }								
		}
	}							
}
?>
