<?php   // Login first alert

session_start();
include_once 'connection.php';
 $_SESSION['message'] = '';

if(!isset($_COOKIE["u_name"])){
  $_SESSION['message'] = "Login First !!";
  $_SESSION['u_cname'] = " ";
  $_SESSION['u_cardno'] =" ";
  $_SESSION['RedirectKe'] = $_SERVER['REQUEST_URI'];
  header( "refresh:3;url=index.php" );
  
  $_SESSION['u_name']="";
  $_SESSION['u_phone']="";
  
 }
    if(isset($_COOKIE["u_name"])){
        $un = $_COOKIE["u_name"];
        $query = $mysqli->query("SELECT * FROM u_info WHERE u_name = '$un'");
        if (mysqli_num_rows($query)) {
			
          $data = $query->fetch_assoc();
          $_SESSION['u_name'] = $data['u_name'];
          $_SESSION['u_email'] = $data['u_email'];
          $_SESSION['u_phone'] = $data['u_phone'];
          $_SESSION['u_cname'] = $data['u_cname'];
          $_SESSION['u_cardno'] = $data['u_cardno'];
        }
	}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food order</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">   
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css">
	<link rel="stylesheet" type="text/css" href="assets/button.css">
	
	  <link type="text/css" rel="stylesheet" href="Admin/fontawesome-free-5.13.0-web/css/all.css">
	 
       <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css"/>

        <!-- Stylesheets -->
        <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
        <link href="plugin-frameworks/swiper.css" rel="stylesheet">
        <link href="fonts/ionicons.css" rel="stylesheet">
        <link href="common/styles.css" rel="stylesheet">
	
	
</head>





<body>



<?php   //Menu -selected item
				   
include_once 'connection.php';


    if (isset($_GET['productname'])) {
							
		$the_post_id=$_GET['productname'];
		$post_edit_query = "SELECT * FROM product WHERE productname = '$the_post_id' ";
		$post_edit_query_result = mysqli_query($mysqli,$post_edit_query);
		if (!$post_edit_query_result) {
			die("view_add_query_result failed ".mysqli_error($mysqli));
		}

		while ($row=mysqli_fetch_assoc($post_edit_query_result)) {
								
			$productname=$row['productname'];
			$price=$row['price'];
			$quantity=$row['quantity'];
			$offer=$row['offer'];
			
			if($offer>0){
				$cut=$price*($offer/100);
				$final_price=($price-$cut);
			}
			else{
				$final_price=$price;
			}						
        }
	}

?>
	



    <div class="container-fluid">
	
	    <header>
            <div class="limiter">
                <h3>Order Food</h3>
                <a href="index.php"><i class="fas fa-home"></i> Home</a>
				
            </div>
        </header>
		
        <div class="creditCardForm">
            <div class="heading">
                <h2>Food Order Details </h2>
            </div>
            <div class="payment">
			 			
                <h4 style='color:green'class='text-center mt-3'><b><?php echo $_SESSION['message']; ?></b></h4>
		
                <form method="post" name="form" action="pay.php" >
                 
				 
				    <div class="form-group" id="card-number-field">
                        <label for="cardNumber">User name</label>
                        <input autocomplete='off' name="name" type="text" class="form-control"  value="<?php echo $_SESSION['u_name']; ?>">				
                    </div>
					
					<div class="form-group" id="card-number-field">
                        <label for="cardNumber">Contact</label>
                        <input autocomplete='off' name="contact" type="text" class="form-control"  value="<?php echo $_SESSION['u_phone']; ?>" >				
                    </div>
					
					<div class="form-group" id="card-number-field">
                        <label for="cardNumber">Food name</label>
                        <input autocomplete='off' name="foodname" type="text"readonly="" class="form-control" value="<?php echo $productname; ?>">				
                    </div>
					
					<div class="form-group" id="card-number-field">
                        <label for="cardNumber">Food price (Tk)</label>
                        <input autocomplete='off' name="foodprice" type="text" readonly="" class="form-control" value="<?php echo $final_price; ?>">				
                    </div>
					
					
					<div class="form-group" id="card-number-field">
                        <label for="cardNumber">Quantity (<b style="color:#ff0000"><?php echo  $quantity,' item available';?></b>)</label>
                        <input autocomplete='on' name="ordr_quantity" type="text" class="form-control" placeholder="Enter Food Quantity" required >				
                    </div>
					
					<div class="form-group" id="card-number-field">
                        <label for="cardNumber">Location</label>
                        <input autocomplete='on' required name="location" type="text" placeholder="Enter your location" class="form-control" >				
                    </div>
					
					<div class="form-group" id="pay-now"> 
					
				       	<button  type="submit"  name="order" class="button" >Order now</button>
							
                    </div>
					
					

                </form>
            </div>
			
        </div>

      
    </div>
               
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.payform.min.js" charset="utf-8"></script>
    <script src="assets/js/script.js"></script>	
	<script src="plugin-frameworks/bootstrap.min.js"></script>
	
	
	
	
</body>

</html>



