<?php 

include('header.php'); 
$_SESSION['message'] = '';

if(isset($_GET['id'])){  // message color code
    $idd=$_GET['id'];
  
    if($idd==2){
	    $_SESSION['message'] = "News Added successfully !!";
		$style="color:green";
    }
	if($idd==3){
		$_SESSION['message'] = "News Update successfully !!";
		$style="color:green";
	}
    if($idd==4){
	    $_SESSION['message'] = "News Delete successfully!!";
		$style="color:red";
    }
}
else{
	 
    $_SESSION['message'] = '';
	$style="color:red";
}	


if(isset($_POST['comment_id'])){
    $comment_id = $_POST['comment_id'];

    $sql_del = "DELETE FROM postcomment WHERE comment_id = '$comment_id' ";
    $stmt = $conn->prepare($sql_del);
    $stmt->execute();

    if (! empty($stmt)) {
        echo true;
    }
}

?>


<script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>


<body>
    <?php include('navbar.php'); ?>

    <h3 style="<?php echo $style;?>" class='text-center mt-3'> <b><?php echo $_SESSION['message']; ?></b></h3>


    <div class="container">
        <h1 class="page-header text-center">Post News</h1>
        <div class="row">
            <div class="col-md-12">
                <select id="foodList" class="btn btn-default" style="font-size:17px">
                    <option value="Null">All Food</option>
                    <?php
				$sql="select * from product";
				$catquery=$conn->query($sql);
				while($catrow=$catquery->fetch_assoc()){
					echo "<option value=".$catrow['productname'].">".$catrow['productname']."</option>";
				}
			?>
                </select>
                <a style="font-size:17px" href="#addpost" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span><b> New Post</b></a>

            </div>
        </div>
        <div style="margin-top:10px;">
            <style>
                th {
                    background: #FAEBD7;
                    position: sticky;
                    top: 0;
                    box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);

                }

            </style>
            <table class="table table-hover table-bordered">
                <thead>
                    <th style="font-size:17px;">Photo</th>
                    <th style="font-size:17px;">Food Name</th>
                    <th style="font-size:17px;">Title</th>
                    <th class="text-center" style="font-size:17px;">Action</th>
                </thead>
                <tbody>
                    <?php
					if(isset($_GET['food']))
					{
						$foodname=$_GET['food'];
						$where = " WHERE food like'$foodname%'";
						if($foodname=""){
							$where="";
						}
						
					}else{
					    $where="";
					}
					
					$sql="select * from postnews $where";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
                    <tr>
                        <td><a href="<?php if(empty($row['image'])){echo "upload/noimage.jpg";} else{echo $row['image'];} ?>"><img src="<?php if(empty($row['image'])){echo "upload/noimage.jpg";} else{echo $row['image'];} ?>" height="30px" width="40px"></a></td>
                        <td style="font-size:17px"><?php echo $row['food']; ?></td>
                        <td style="font-size:17px"><?php echo $row['title']; ?></td>
                        <td class="text-center">

                            <a href="#viewnews<?php echo $row['postid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View</a> ||
                            <a href="#editnews<?php echo $row['postid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> ||
                            <a href="#deletenews<?php echo $row['postid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                            <?php include('post_edit_delete_modal.php'); ?>
                            <?php include('post_view_modal.php');?>

                        </td>
                    </tr>
                    <?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#foodList").on('change', function() {
                if ($(this).val() == 0) {
                    window.location = 'blogpost.php';
                } else {
                    window.location = 'blogpost.php?food=' + $(this).val();
                }
            });
        });

    </script>


    <!-- Add news -->
    <div class="modal fade" id="addpost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center>
                        <h3 class="modal-title" id="myModalLabel">Add New Post</h3>
                    </center>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="POST" action="addnews.php" enctype="multipart/form-data">
                            <div class="form-group" style="margin-top:10px;">
                                <div class="row">
                                    <div class="col-md-3" style="margin-top:7px;">
                                        <label class="control-label">Title:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="title" required placeholder="News Title">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3" style="margin-top:7px;">
                                        <label class="control-label">Food Name:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control" name="food">
                                            <?php
                                        $sql="select * from product order by productid asc";
                                        $query=$conn->query($sql);
                                        while($row=$query->fetch_array()){
                                            ?>
                                            <option value="<?php echo $row['productname']; ?>"><?php echo $row['productname']; ?></option>
                                            <?php
                                        }
                                    ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3" style="margin-top:7px;">
                                        <label class="control-label">Photo:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" name="photo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="margin-top:10px;">
                                <div class="row">
                                    <div class="col-md-3" style="margin-top:7px;">
                                        <label class="control-label">News:</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea maxlength="1000" required style="resize:none;height:150px;" class="form-control" id="custom_format_2" name="news" placeholder="write news here..."></textarea>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script type="text/javascript" src="jquery.charactercounter.js"></script>
    <script>
        $(function() {
            $("#custom_format_2").characterCounter({
                counterFormat: 'Characters Remaining: %1'
            });
        });

    </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

    </script>

</body>
