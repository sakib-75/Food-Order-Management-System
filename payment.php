<?php
session_start();
include_once 'connection.php';
 $_SESSION['message'] = '';

if(!isset($_COOKIE["u_name"])){
  $_SESSION['message'] = "Login First !!";
  $_SESSION['u_cname'] = " ";
  $_SESSION['u_cardno'] =" ";
  $_SESSION['RedirectKe'] = $_SERVER['REQUEST_URI'];
  header( "refresh:3;url=login.php" );

  }
  elseif(isset($_COOKIE["u_name"])){
    $un = $_COOKIE["u_name"];
    $query = $mysqli->query("SELECT u_cname,u_cardno FROM u_info WHERE u_name = '$un'");
    if (mysqli_num_rows($query)) {
        $data = $query->fetch_assoc();
        $_SESSION['u_cname'] = $data['u_cname'];
        $_SESSION['u_cardno'] =$data['u_cardno'];
        if(isset($_POST['submit'])) {
          $p_amount = $_POST["p_amount"];
          $p_date=date("y-m-d");
          $pay="INSERT INTO u_pay (u_name,p_amount,p_date)"."VALUES('$un','$p_amount','$p_date')";
          if (mysqli_query($mysqli, $pay)) {
              $_SESSION['message'] = "Payment succesful !!";
          }else {
              $_SESSION['message'] = "Payment not succesful !!";
          }
        }
      }else {
        header( "refresh:3;url=login.php" );
      }
    }else {
    echo $_SESSION['message']="somthing is wrong";
  }

?>


<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Payment</title>
    <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style media="screen">
    .submit-button {
margin-top: 10px;
}
    </style>
  </head>
  <body style="margin-top: 250px;">

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

<div class="container" style="margin-bottom: 200px;">
    <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-4 mt-5'>
          <!-- <form accept-charset="UTF-8" action="/" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj"  > -->
          <form method="post" class="require-validation" action="<?php htmlspecialchars( $_SERVER['PHP_SELF']); ?> "  enctype="multipart/form-data" autocomplete="off" method="post" id="payment-form">
            <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓" /><input name="_method" type="hidden" value="PUT" /><input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" /></div>
            <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <h2><?php echo $_SESSION['message']; ?></h2>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'>Name on Card</label>
                <input autocomplete='off' class='form-control card-number' size='43' placeholder="<?php echo $_SESSION['u_cname']; ?>" type='text'>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'>Card Number</label>
                <input autocomplete='off' class='form-control card-number' size='43' placeholder="<?php echo $_SESSION['u_cardno']; ?>" type='text'>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <label class='control-label'>taka</label>
                <input autocomplete='off' class='form-control card-number' name="p_amount" size='43' type='text' value="1190 ">
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group card required'>
                <button type="submit" class="btn btn-success btn-block" name="submit" size='43'>Pay</button>
              </div>
            </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 form-group'>

              </div>
            </div>

          </form>
        </div>
        <div class='col-md-4'></div>
    </div>
</div>

    <script src="plugin-frameworks/bootstrap.min.js"></script>

  </body>
</html>

<?php include 'footer.php'; ?>
