<?php //Comment part

include_once 'connection.php';

if (isset($_POST['add'])) {

        $comment_date = date( 'M d, Y' );
        $post_id= $_POST['postid'];
        $message = $_POST['comment'];

        $username = $_COOKIE['u_name'];
        $sql1 = "select image from u_info where u_name='$username'";
        $result1 =  mysqli_query( $mysqli, $sql1 );
        $row = mysqli_fetch_assoc( $result1 );
        $userimage = $row['image'];

        $query = "insert into postcomment(username,post_id,comment,user_image,date) values('$username','$post_id','$message','$userimage','$comment_date' )";
        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $comment_id = $stmt->insert_id;
    
            
    $post_query = "SELECT * FROM postcomment where comment_id='$comment_id'";
    $post_query_result = mysqli_query($mysqli,$post_query);
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

<div class="grid-container" id="comment-<?php echo $commentid;?>">
    <div class="row">
        <div class="col-2">
            <img src="<?php echo $image; ?>" id="comment_img" alt="">
        </div>
        <div class="col-10">
            <?php if($user_name == $username){
                                ?>
            <a onclick="deletecomment(<?php echo $commentid;?>)" id="delete_icon" title="Delete">
                <button type="submit" name="comment_delete_submit" style="outline:none;"><i class="fa fa-trash"></i></button>
            </a>

            <?php
               }
              ?>
            <h5 style="text-align:left"><i class="fas fa-user"></i> <?php echo $user_name; ?></h5>
            <h5 style="text-align:left"><i class="far fa-calendar-alt"></i> <?php echo $date;?></h5>
            <h5 style="text-align:left"><i class="far fa-comment-dots"></i> <?php echo $comment;?></h5>
        </div>
    </div>
</div>
<?php
    }
        
}

?>
