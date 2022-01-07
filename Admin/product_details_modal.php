<?php
$food_id= $row['productid'];
?>

<!-- View news -->
<div class="modal fade" id="food-details<?php echo $row['productid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">User Review Details</h4>
                </center>
            </div>

            <div class="modal-body">
                <div class="container-fluid">

                    <div id="response">

                        <?php        
                            $post_query = "SELECT * FROM user_review where foodid='$food_id' ORDER BY review_id DESC";
		                    $post_query_result = mysqli_query($conn,$post_query);
		                    if (!$post_query_result) {
		                        die("view_add_query_result failed ".mysqli_error($mysqli));
		                    }
                            if(mysqli_num_rows($post_query_result)==0){
                                echo "<h4>No user review available</h4>";
                            }
                    
		                    while ($row=mysqli_fetch_assoc($post_query_result)) {
                                
                                $review_id=$row['review_id'];
								$user_name=$row['username'];
                                $rating=$row['rating'];
			                    $comment=$row['review'];
								$date=$row['date'];
                                $userimage=$row['userimage'];
								
                                
                                ?>
                       
                        <div id="comment-<?php echo $review_id;?>" class="grid-container">
                            <div class="row">
                                <div class="col-2">
                                    <img src="../<?php echo $userimage; ?>" id="comment_img" alt="">
                                </div>
                                <div class="col-10">
                                    <a onclick="deletecomment(<?php echo $review_id;?>)" id="delete_icon" title="Delete">
                                        <button type="submit" name="comment_delete_submit" style="outline:none;"> <span class="glyphicon glyphicon-trash"></span> </button>
                                    </a>
                                    <h5 style="text-align:left"><i class="fas fa-user"></i> <?php echo $user_name; ?></h5>
                                    <h5 style="text-align:left"><i class="far fa-calendar-alt"></i> <?php echo $date;?></h5>
                                    <h5 style="text-align:left"><i class="fas fa-star"></i> <?php echo $rating; ?> </h5>
                                    <h5 style="text-align:left"><i class="far fa-comment-dots"></i> <?php echo $comment;?></h5>
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                        ?>
                    </div><!-- response -->


                </div>
            </div><!-- modal body-->

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<style>
    .row {
        height: auto;
        width: 100%;
    }

    .col-2 {
        height: auto;
        width: 25%;
        float: left;
    }

    .col-10 {
        height: auto;
        width: 75%;
        float: right;
    }

    #delete_icon {
        color: black;
        float: right;
        padding: 10px;
    }

    #delete_icon:hover {
        color: red;
    }

    #img {
        height: 350px;
        width: 480px;
        border-radius: 20px;
    }

    #comment_img {
        /* Comment user profile photo   */
        margin-top: 5px;
        height: 70px;
        width: 70px;
        border-radius: 50%;
        border: 2px solid rgba(0, 0, 0, 0.4);

    }

    .grid-container {
        height: auto;
        width: 100%;
        margin-top: 20px;
        margin-bottom: 20px;
        padding: 5px;
        border-radius: 20px;
        border: 1px solid rgba(0, 0, 0, 0.4);
    }


    @media only screen and (max-width: 600px) {
        #form {
            font-size: 16px;
        }

        #img {
            height: auto;
            width: 100%;
        }

        #brdr {
            width: 100%;

        }
    }

    .brdr {
        border: 2px solid;
        border-color: #CE5937;
        border-radius: 20px;
        padding: 15px;
        margin-top: 30px;

        -webkit-box-shadow: 0px 0px 15px 0px blue;
        box-shadow: 0px 0px 15px 0px blue;
    }

</style>

<script>
    function deletecomment(id) {

        if (confirm("Are you sure you want to delete this comment?")) {

            $.ajax({
                url: "product.php",
                type: "POST",
                data: 'comment_id=' + id,
                success: function(data) {
                    if (data) {
                        $("#comment-" + id).remove();
                    }
                    alert("Deleted Successfullt!");
                }
            });
        }
    }

</script>
