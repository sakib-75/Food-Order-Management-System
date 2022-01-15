<?php

$postid= $row['postid'];
//Comment counter
 $sql = "select COUNT(comment_id) as total from postcomment where post_id='$postid'";
 $result =  mysqli_query( $conn, $sql );
 $value = mysqli_fetch_assoc( $result );
 $totalcomment = $value['total'] +0;


?>

<!-- View news -->
<div class="modal fade" id="viewnews<?php echo $row['postid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">View News Details</h4>
                </center>
            </div>

            <div class="modal-body">
                <div class="container-fluid">


                    <div class="col-md-7 col-lg-12" style="margin:auto">
                        <div class="mb-50 mb-sm-30">
                            <div style="margin:auto">
                                <!-- post image-->
                                <img src="<?php echo $row['image']; ?>" id="img" alt="food image">
                            </div>
                            <div class="brdr">
                                <h4><b><?php echo $row['title'];; ?></b></h4>
                                <h5 class="mt-10 bg-lite-blue dplay-inl-block">

                                    <i class="far fa-comment-dots"></i> <span id="count-number"><?php echo $totalcomment; ?> </span> Comments |
                                    <i class="far fa-calendar-alt"></i> Date: <?php echo $row['date']; ?>

                                </h5>
                                <p style="text-align:justify" class="mt-30"><?php echo $row['news'];; ?></p>

                                <div id="response">

                                    <?php        
                                    $post_query = "SELECT * FROM postcomment where post_id='$postid' ORDER BY comment_id DESC ";
		                            $post_query_result = mysqli_query($conn,$post_query);
		                            if (!$post_query_result) {
		                                die("view_add_query_result failed ".mysqli_error($mysqli));
		                            }
                    
		                            while ($row=mysqli_fetch_assoc($post_query_result)) {
                                
                                       $commentid=$row['comment_id'];
								       $user_name=$row['username'];
			                           $comment=$row['comment'];
								       $date=$row['date'];
                                       $image=$row['user_image'];
								
                                
                                     ?>
                                    <div id="comment-<?php echo $commentid;?>" class="grid-container">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="../<?php echo $image; ?>" id="comment_img" alt="">
                                            </div>
                                            <div class="col-10">
                                                <a onclick="deletecomment(<?php echo $commentid;?>)" id="delete_icon" title="Delete">
                                                    <button type="submit" name="comment_delete_submit" style="outline:none;"> <span class="glyphicon glyphicon-trash"></span> </button>
                                                </a>
                                                <h5 style="text-align:left"><i class="fas fa-user"></i> <?php echo $user_name; ?></h5>
                                                <h5 style="text-align:left"><i class="far fa-calendar-alt"></i> <?php echo $date;?></h5>
                                                <h5 style="text-align:left"><i class="far fa-comment-dots"></i> <?php echo $comment;?></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        }
                                    ?>
                                </div><!-- response -->
                            </div>
                            <!--brdr-->
                        </div>
                        <!--mb-30-->
                    </div>
                    <!--col-md-8-->

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
        font-size: 16px;
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
    }

    .grid-container {
        height: auto;
        width: 100%;
        margin-top: 20px;
        margin-bottom: 20px;
        padding: 5px;
        border-radius: 20px;
        border: 1px solid #d3d3d3;
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
        border-radius: 20px;
        padding: 15px;
        margin-top: 30px;
        -webkit-box-shadow: 0px 0px 8px 0px #d3d3d3;
        box-shadow: 0px 0px 8px 0px #d3d3d3;
    }

</style>

<script>
    function deletecomment(id) {

        if (confirm("Are you sure you want to delete this comment?")) {

            $.ajax({
                url: "blogpost.php",
                type: "POST",
                data: 'comment_id=' + id,
                success: function(data) {
                    if (data) {
                        $("#comment-" + id).remove();

                    }
                    alert("Deleted successfully!");
                }
            });
        }
    }

</script>
