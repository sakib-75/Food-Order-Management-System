<!-- Sales Details -->
<div class="modal fade" id="details<?php echo $row['purchaseid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center style=" font-size: 16.5px;">
                    <h4 class="modal-title" id="myModalLabel">Order Full Details</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5 style=" font-size: 16.5px;"><span class="pull-left">Customer Name: <b><?php echo $row['customer']; ?></b></span>
                        <span class="pull-right">
                            <?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?>
                        </span>
                    </h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th class="text-center">Food Name</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Order Quantity</th>
                            <th class="text-center">Subtotal</th>
                        </thead>
                        <tbody>
                            <?php
                                $sql="select * from purchase_detail left join product on product.productid=purchase_detail.productid where purchaseid='".$row['purchaseid']."'";
                                $dquery=$conn->query($sql);
                                while($drow=$dquery->fetch_array()){
                                    
                                    $purchase_id=$drow['purchaseid'];
                                    $sql="select total from purchase where purchaseid='$purchase_id' ";
				                    $result =  mysqli_query($conn,$sql);
                                    $value = mysqli_fetch_assoc($result);
                                    $sub = $value['total'];   //Count result
                                    $price=($sub/$drow['order_quantity']);
					
                                    ?>
                            <tr>
                                <td class="text-center"><?php echo $drow['productname']; ?></td>
                                <td class="text-center"><?php echo $drow['categoryname']; ?></td>
                                <td class="text-center"> &#2547; <?php echo number_format($price, 2); ?> </td>
                                <td class="text-center"><?php echo $drow['order_quantity']; ?></td>
                                <td class="text-center">
                                    &#2547; <?php
                                            echo number_format($sub, 2);
                                            ?>
                                </td>
                            </tr>
                            <?php
                                    
                                }
                            ?>
                            <tr>
                                <td colspan="4" class="text-center"><b>Total</b></td>
                                <td class="text-center"> &#2547; <?php echo number_format($row['total'], 2); ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
include('conn.php');    
$pdid=$row['purchaseid'];

$sql="select * from purchase where purchaseid='$pdid'";
$result =  mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$del = $row['delivery_status'];

if($del=="" || $del=="NULL"){
    $del="Pending";
}
if($del=="Order Preparing"){
    $icon_img='<img src="../images/chef.png" alt="">';
}
elseif($del=="Order In Route"){
    $icon_img='<img src="https://i.imgur.com/TkPm63y.png">';
}
else{
   $icon_img="";
}

?>

<!--Delivery status-->
<div class="modal fade" id="delivery<?php echo $row['purchaseid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:50%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center style=" font-size: 16.5px;">
                    <h3 class="modal-title" id="myModalLabel">Delivery Status</h3>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5 style="font-size: 16.5px;"><span class="pull-left">Customer Name: <b><?php echo $row['customer']; ?></b></span>
                        <span class="pull-right">
                            <?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?>
                        </span>
                    </h5>

                    <div class="status_body">
                        <ul style="text-align:left">
                            <li>
                                <?php echo $icon_img;?>
                                <h4 style="margin-bottom:10px">Corrent Delivery Information</h4>
                                <ul>
                                    <li>Status: <h4 style="display:inline;color:green"><?php echo $del;?></h4>
                                    </li>
                                </ul>
                            </li>
                            <form method="post" action="delivery_status_update.php?PurchaseId=<?php echo $row['purchaseid']; ?>" id="delivery_form">
                               <li>
                                    <level>Delivery status:</level>
                                    <select name="select_status" id="select_status" class="dropdown-select">
                                        <option value="null">Select Status</option>
                                        <option value="Order Preparing">Order Preparing</option>
                                        <option value="Order In Route">Order In Route</option>
                                        <option value="Complete Delivery">Complete Delivery</option>
                                    </select>
                                </li>
                                <input type="submit" name="submit" id="op_submit" value="Update">
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<style>
    .status_body {
        display: inline-block;
        clear: both;
        margin-top: 40px;
        width: 100%;
    }

    .status_body img {
        height: 100px;
        width: 100px;
        float: right !important;
    }

    #op_submit {
        margin-top: 20px;
        margin-bottom: 10px;
        border-radius: 15px;
        width: 100px;
        outline: none;
        height: 40px;
        font-size: 20px;
        color: white;
        background: #f4511e;
        border: 1px solid #f4511e;
    }

    #op_submit:hover {
        background: #f4511e;
        border: 1px solid #f4511e;
        transform: scale(1.1);
    }


    #select_status {
        margin: 20px 0px;
    }

    .dropdown-select {
        width: auto;
        padding: 5px;
        font-weight: bold;
        text-align: center;
        border-radius: 7px;
        background-color: #DCDCDC;
        border: 1px solid grey;
    }

    .dropdown-select:hover {

        border: 1px solid green;
    }

</style>
