<?php include('header.php'); ?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="../jquery-3.2.1.min.js"></script>

<script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>
<style>
    #myTable {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid #ddd;
        font-size: 18px;
    }

    #myTable th,
    #myTable td {

        padding: 12px;
    }

    #myTable tr {
        border-bottom: 1px solid #ddd;
    }


    .filterable {
        margin-top: 15px;
    }

    .filterable .panel-heading .pull-right {
        margin-top: -20px;
    }

    .filterable .filters input[disabled] {
        background-color: transparent;
        border: none;
        cursor: auto;
        box-shadow: none;
        padding: 0;
        height: auto;
    }

    .filterable .filters input[disabled]::-webkit-input-placeholder {
        color: #333;
    }

    .filterable .filters input[disabled]::-moz-placeholder {
        color: #333;
    }

    .filterable .filters input[disabled]:-ms-input-placeholder {
        color: #333;
    }

</style>
<?php include('navbar.php'); 
	
	//Result limit
	if(isset($_GET['limit'])){				
		$limit=$_GET['limit'];
	}else{
		$limit=20;
	}			

    if(isset($_GET['id'])){
        $msg_id=$_GET['id'];
        if($msg_id==1){
            $_SESSION['message'] = "Select delivery option!";
		    $style="color:green";    
        }
        elseif($msg_id==2){  
            $_SESSION['message'] = "Updated successfully!";
		    $style="color:green";
        }
    }else{
        $_SESSION['message'] = "";
		$style="color:red";
    }
    if(isset($_GET['prcid'])){
        $prc_id=$_GET['prcid'];
        
    }else{
        $prc_id="";
    }
    
   
?>




<body>

    <div class="container">


        <h1 class="text-center">Unapproved Order</h1>
        <hr>


        <select id="limitList" class="pull-right btn btn-default" style="font-size:18px">
            <option value="0">Set Limit</option>
            <option value="15">Last 15</option>
            <option value="20">Last 20</option>
            <option value="25">Last 25</option>
            <option value="50">Last 50</option>
        </select>

        <br><br>

        <div class="row">
            <h4 style="<?php echo $style;?>" class='text-center mt-3'> <b><?php echo $_SESSION['message']; ?></b></h4>

            <div class="panel panel-primary filterable">
                <div class="panel-heading" style="height:50px">
                    <h3 class="panel-title" style="font-size:18px">Last <?php echo $limit;?> Order Details</h3>
                    <div class="pull-right">
                        <button style="font-size:17px" class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                    </div>
                </div>

                <table class="table table-hover table-bordered" id="myTable">

                    <?php
              
			
				$sql="select * from purchase where order_status='0' order by purchaseid desc LIMIT $limit ";
				$query=$conn->query($sql);
				if(mysqli_num_rows($query)== 0 ){
												
					echo "<br><br><h3 style='color:red;text-align:center'><i class='fa fa-ban'></i><b> No unapproved order found</b></h3><br><br>";
      
				}
				else{
					?>

                    <thead>
                        <tr class="filters" style="background-color:#FAEBD7">
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Order No" disabled></th>
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Date" disabled></th>
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Customer" disabled></th>
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="location" disabled></th>
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Contact" disabled></th>
                            <th><input style="font-size:18px" type="text" class="form-control" placeholder="Total Price" disabled></th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <?php
					
					while($row=$query->fetch_array()){
                        
                        if($prc_id==$row['purchaseid']){
                            $style="background:#B0E0E6";
                        }
                        else{
                            $style="";
                        }
						
					 ?>

                    <tbody>
                        <tr>
                            <td style="<?php echo $style; ?>"><?php echo $row['purchaseid']; ?></td>
                            <td style="<?php echo $style; ?>"><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
                            <td style="<?php echo $style; ?>"><?php echo $row['customer']; ?></td>
                            <td style="<?php echo $style; ?>"><?php echo $row['location']; ?></td>
                            <td style="<?php echo $style; ?>"><?php echo $row['contact']; ?></td>
                            <td style="<?php echo $style; ?>"> &#2547; <?php echo number_format($row['total'], 2); ?></td>
                            <td class="text-center" style="<?php echo $style; ?>;width:200px"><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Details </a> ||
                                <?php include('sales_modal.php'); ?>
                                <a href="#delivery<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search"></span> Status </a>
                            </td>
                        </tr>
                    </tbody>

                    <?php					
				    }				
				}				
			?>

                </table>
            </div>
        </div>
    </div>

    <br>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.filterable .btn-filter').click(function() {
                var $panel = $(this).parents('.filterable'),
                    $filters = $panel.find('.filters input'),
                    $tbody = $panel.find('.table tbody');
                if ($filters.prop('disabled') == true) {
                    $filters.prop('disabled', false);
                    $filters.first().focus();
                } else {
                    $filters.val('').prop('disabled', true);
                    $tbody.find('.no-result').remove();
                    $tbody.find('tr').show();
                }
            });

            $('.filterable .filters input').keyup(function(e) {
                /* Ignore tab key */
                var code = e.keyCode || e.which;
                if (code == '9') return;
                /* Useful DOM data and selectors */
                var $input = $(this),
                    inputContent = $input.val().toLowerCase(),
                    $panel = $input.parents('.filterable'),
                    column = $panel.find('.filters th').index($input.parents('th')),
                    $table = $panel.find('.table'),
                    $rows = $table.find('tbody tr');
                /* Dirtiest filter function ever ;) */
                var $filteredRows = $rows.filter(function() {
                    var value = $(this).find('td').eq(column).text().toLowerCase();
                    return value.indexOf(inputContent) === -1;
                });
                /* Clean previous no-result if exist */
                $table.find('tbody .no-result').remove();
                /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
                $rows.show();
                $filteredRows.hide();
                /* Prepend no-result row if all rows are filtered */
                if ($filteredRows.length === $rows.length) {
                    $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No result found</td></tr>'));
                }
            });
        });

        //Set limit value

        $(document).ready(function() {
            $("#limitList").on('change', function() {
                if ($(this).val() == 0) {
                    window.location = 'unapprovedorder.php';
                } else {
                    window.location = 'unapprovedorder.php?limit=' + $(this).val();
                }
            });
        });

    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

    </script>

</body>
