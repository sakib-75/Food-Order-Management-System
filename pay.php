
 <script type="text/javascript">
    $(function() {
$('form.require-validation').bind('submit', function(e) {
  var $form         = $(e.target).closest('form'),
      inputSelector = ['input[type=email]', 'input[type=password]',
                       'input[type=text]', 'input[type=file]',
                       'textarea'].join(', '),
      $inputs       = $form.find('.required').find(inputSelector),
      $errorMessage = $form.find('div.error'),
      valid         = true;

  $errorMessage.addClass('hide');
  $('.has-error').removeClass('has-error');
  $inputs.each(function(i, el) {
    var $input = $(el);
    if ($input.val() === '') {
      $input.parent().addClass('has-error');
      $errorMessage.removeClass('hide');
      e.preventDefault(); // cancel on first error
    }
  });
});
});

$(function() {
var $form = $("#payment-form");

$form.on('submit', function(e) {
  if (!$form.data('cc-on-file')) {
    e.preventDefault();
    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
    Stripe.createToken({
      number: $('.card-number').val(),
      cvc: $('.card-cvc').val(),
      exp_month: $('.card-expiry-month').val(),
      exp_year: $('.card-expiry-year').val()
    }, stripeResponseHandler);
  }
});

function stripeResponseHandler(status, response) {
  if (response.error) {
    $('.error')
      .removeClass('hide')
      .find('.alert')
      .text(response.error.message);
  } else {
    // token contains id, last4, and card type
    var token = response['id'];
    // insert the token into the form so it gets submitted to the server
    $form.find('input[type=text]').empty();
    $form.append("<input type='hidden' name='reservation[stripe_token]' value='" + token + "'/>");
    $form.get(0).submit();
  }
}
})



</script>





<?php			//Single Order item -save database


include_once 'connection.php';
extract($_POST);
	
	if(!isset($order)){
      $foodname="";
	  $ordr_quantity="";
	  $pid="";
	}
	  
	
	if(isset($order))
    {
        $foodname=	$_POST['foodname'];
		$ordr_quantity=	$_POST['ordr_quantity'];
		
        $total=$foodprice*$ordr_quantity;     //Total price
		$date= date('Y/m/d');
		$customer=$_POST['name'];		
		$contact=$_POST['contact'];
		$location=$_POST['location'];
		
		
		$sql="select categoryname from product where productname= '$foodname' ";
        $result =  mysqli_query($mysqli,$sql);
        $cat_name1 = mysqli_fetch_assoc($result);
	    $cat_name =$cat_name1['categoryname'];          //Category name
		
		$sql="select categoryid from product where productname= '$foodname' ";
        $result =  mysqli_query($mysqli,$sql);
        $catid= mysqli_fetch_assoc($result);
	    $cat_id =$catid['categoryid'];               //Category id


        $sql="select productid from product where productname='$foodname' ";
        $result =  mysqli_query($mysqli,$sql);
        $productid1 = mysqli_fetch_assoc($result);
	    $productid2 =$productid1['productid'];         //Product id
		
		
		$sql1="insert into purchase (customer,location,contact,total, date_purchase,order_status) values ('$customer','$location','$contact','$total', NOW(),'0')";
		$mysqli->query($sql1);
		$pid=$mysqli->insert_id;
		
		$sql2="insert into purchase_detail (purchaseid, productid,category,category_id, order_quantity,order_date,order_status) values ('$pid', '$productid2','$cat_name','$cat_id', '$ordr_quantity','$date','0' )";
		$mysqli->query($sql2);
		
		$sql3="update product set quantity=quantity-'$ordr_quantity' where productname='$foodname'";
	    $mysqli->query($sql3);

	
	}
?>

<?php
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
  elseif(isset($_COOKIE["u_name"])){
    $un = $_COOKIE["u_name"];
    $query = $mysqli->query("SELECT u_cname,u_cardno FROM u_info WHERE u_name = '$un'");
    if (mysqli_num_rows($query)) {
        $data = $query->fetch_assoc();
        $_SESSION['u_cname'] = $data['u_cname'];
        $_SESSION['u_cardno'] =$data['u_cardno'];
        if(isset($_POST['submit'])) {
		
			
          $p_amount = $_POST["p_amount"];  //Value from Post form
		  $orderno = $_POST["orderno"];
		  $quantity = $_POST["quantity"];
          $p_date=date("y-m-d");
		  
          $pay="INSERT INTO u_pay (purchase_id,u_name,food,quantity,p_amount,p_date)"."VALUES('$orderno','$un','$food','$quantity','$p_amount','$p_date')";
          if (mysqli_query($mysqli, $pay)) {
              $_SESSION['message'] = "Payment succesful !!";
			  $total="";
			  
          }else {
              $_SESSION['message'] = "Payment not succesful !!";
			  $total="";
			  
          }
        }
      }else {
        header( "refresh:3;url=login.php" );
      }
    }else {
    echo $_SESSION['message']="somthing is wrong";
  }

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Credit Card Validation</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css">
	

   

	
	
	
	
</head>

<body>
    <div class="container-fluid">
	
	    <header>
            <div class="limiter">
                <h3>Order Payment</h3>
                <a href="index.php">Home</a>
            </div>
        </header>
	
       
        <div class="creditCardForm">
            <div class="heading">
                <h1>Confirm Purchase</h1>
            </div>
            <div class="payment">
                <form method="post" name="form" action="<?php htmlspecialchars( $_SERVER['PHP_SELF']); ?> " enctype="multipart/form-data" autocomplete="off" onSubmit="return check();">
                  
				  <div class='form-row'>				   
                     <div class='col-xs-12 form-group required'>
					 
                              <h3 style='color:green'class='text-center mt-3'><b><?php echo $_SESSION['message']; ?></b></h3>
							  							 
                     </div>
                 </div>


				   <div class="form-group owner">
                        <label for="owner">Card Name</label>
                        <input autocomplete='off' type="text" class="form-control" value="<?php echo $_SESSION['u_cname']; ?>">
                    </div>
                    <div class="form-group CVV">
                        <label for="cvv">Card Number</label>
                        <input autocomplete='off' type="text" class="form-control" value="<?php echo $_SESSION['u_cardno']; ?>">
                    </div>
					<div class="form-group owner" >
                        <label for="cardNumber">Food Name</label>
                        <input autocomplete='off' name="food" type="text" class="form-control" readonly="" value="<?php echo $foodname;?>"  >
				
                    </div>
					<div class="form-group CVV">
                        <label for="cardNumber">Quantity</label>
                        <input autocomplete='off' name="quantity" type="text" class="form-control" readonly="" value="<?php echo $ordr_quantity;?>" required>
				
                    </div>
                    <div class="form-group" id="card-number-field">
                        <label for="cardNumber">Total Price (Tk)</label>
                        <input autocomplete='off' name="p_amount" type="text" class="form-control" readonly="" value="<?php echo $total;?>" required>
				
                    </div>
					<div class="form-group" id="card-number-field">
                        <label for="cardNumber">Order No</label>
                        <input autocomplete='off' name="orderno" type="text" class="form-control" readonly="" value="<?php echo $pid;?>" required>
				
                    </div><br>
                    <div class="form-group" id="expiration-date">
                        <label>Card type</label>
                        <select>
                           
                            <option value="02">Credit card </option>
							<option value="04">Debit card.</option>
                            <option value="03">Master card</option>
							<option value="01">Visa</option>                           
                            <option value="05">ATM card.</option>
                          
                            
                        </select>
                        
                    </div>
                    <div class="form-group" id="credit_cards">
                        <img src="assets/images/visa.jpg" id="visa">
                        <img src="assets/images/mastercard.jpg" id="mastercard">
                        <img src="assets/images/amex.jpg" id="amex">
                    </div>
                    <div class="form-group" id="pay-now">
                        <button type="submit" name="submit" class="btn btn-default" id="confirm-purchase">Confirm order</button>
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


