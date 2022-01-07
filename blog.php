<!DOCTYPE HTML>
<html lang='en'>

<head>
    <title>Luigi's</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <script src="assets/jquery-3.2.1.min.js"></script>

    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css" />

    <!-- Stylesheets -->
    <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
    <link href="plugin-frameworks/swiper.css" rel="stylesheet">
    <link href="fonts/ionicons.css" rel="stylesheet">
    <link href="common/styles.css" rel="stylesheet">

</head>

<body>

    <header>
        <div class="container">
            <a class="logo" href="index.php"><img src="images/logo-white.png" alt="Logo"></a>

            <div class="right-area">
                <h6><a class="plr-20 color-white btn-fill-primary" href="tel:+8801914603437"> Order: +8801914603437</a></h6>
            </div><!-- right-area -->

            <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

            <ul class="main-menu font-mountainsre" id="main-menu">
                <li id="item"><a href="index.php">Home</a></li>
                <li id="item"><a href="fullmenu.php">Menu</a></li>
                <li id="item"><a href="allnews.php">News</a></li>
                <li id="item"><a href="services.php">Services</a></li>
                <li id="item"><a href="about_us.php">About us</a></li>
            </ul>

            <div class="clearfix"></div>
        </div><!-- container -->
    </header>
    <section class="bg-7 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
            <div class="dplay-tbl">
                <div class="dplay-tbl-cell center-text color-white pt-90">
                    <h5><b>The Best In Town</b></h5>
                    <h2>Blog and News</h2>
                </div><!-- dplay-tbl-cell -->
            </div><!-- dplay-tbl -->
        </div><!-- container -->
    </section>

    <style>
        html {
            font-size: 100%;
            /* 16px */
        }

        body {
            text-rendering: optimizeLegibility;

        }

        #item {
            font-size: 1.1rem;
        }

    </style>


    <?php
    
include_once 'connection.php';
if ( isset( $_COOKIE['u_name'] ) ) {  //User Login 
    $username = $_COOKIE['u_name'];        
}else{
    $username = "";
}
    
 //Main news part   
    
if ( isset( $_GET['newsid'] ) ) {
    $articleid = $_GET['newsid'];
}

$post_query = "SELECT * FROM postnews where postid='$articleid'";
$post_query_result = mysqli_query( $mysqli, $post_query );
if ( !$post_query_result ) {
    die( 'view_add_query_result failed '.mysqli_error( $mysqli ) );
}

while ( $row = mysqli_fetch_assoc( $post_query_result ) ) {

    $postid = $row['postid'];
    $foodname = $row['food'];
    $title = $row['title'];
    $news = $row['news'];
    $image = $row['image'];
    $date = $row['date'];

}
    
  //Comment counter
 $sql = "select COUNT(comment_id) as total from postcomment where post_id='$postid'";
 $result =  mysqli_query( $mysqli, $sql );
 $value = mysqli_fetch_assoc( $result );
 $totalcomment = $value['total'] +0;



?>

    <section class="story-area left-text center-sm-text">
        <div class="container">


            <div class=" col-lg-10" style="margin:auto">
                <div class="mb-50 mb-sm-30">

                    <div style="margin:auto">
                        <div class="font-8 abs-tl p-20 bg-primary color-white" style="border-radius: 0px 20px 0px 0px;box-shadow: 0px 0px 20px 5px rgba(0,0,0,0.4);">
                            <h4><b><i class="fa fa-calendar-check-o"></i> : <?php echo $date; ?></b></h4>

                            <div class="brdr-style-1"></div>
                        </div>
                        <img src="Admin/<?php echo $image; ?>" id="img" alt="<?php echo $foodname; ?>">

                    </div>
                </div>
                <!--col-md-8-->

                <div class="brdr">
                    <h4><b><?php echo $title; ?></b></h4>
                    <h5 class="mt-10 bg-lite-blue dplay-inl-block">
                        <b class="plr-20 mtb-10"><i class="fas fa-user-cog"></i> By Admin</b>
                        <a href='singlefood.php?productname=<?php echo $foodname ;?>' class="plr-20 mtb-10 brder-lr-lite-black-2"><i class="fas fa-utensils"></i> <b><?php echo $foodname; ?></b></a>
                        <b class="plr-20 mtb-10"><i class="fa fa-comments"></i> <span id="count-number"><?php echo $totalcomment; ?> </span> Comments</b>
                    </h5>
                    <p style="font-size:18px;text-align:justify" class="mt-30"><?php echo $news; ?></p>

                    <!--mb-30-->

                    <form action="" method="post" id="comment-form">
                        <input type="hidden" name="user_name" id="user_name" value="<?php echo $username;?>">
                        <input type="hidden" name="postid" id="postid" value="<?php echo $postid;?>">
                        <textarea type="text" class="msg_box" id="comment" name="comment" placeholder="write your comment here..."></textarea><br>
                        <input type="hidden" name="add" value="post" />
                        <input name="msg_submit" id="msg_submit" class="submit_button" type="submit" value="Comment">
                        <img src="images/load.gif" id="loader" />
                    </form>
                    <h5 style="font-weight:bold;color:red" id="message-info"></h5>
                    <div id="response">

                        <?php        
                            $post_query = "SELECT * FROM postcomment where post_id='$postid' ORDER BY comment_id DESC ";
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
                        <div id="comment-<?php echo $commentid;?>" class="grid-container">
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
                        ?>
                    </div><!-- response -->
                </div><!-- brdr -->
            </div>

        </div><!-- container -->
    </section>


    <style>
        img#loader {
            vertical-align: middle;
            width: 60px;
            display: none;
            margin: auto;
        }

        .msg_box {
            /* Comment Box  */
            margin-top: 30px;
            font-size: 18px;
            height: 100px;
            width: 480px;
            resize: none;
            border-radius: 15px;
            border: 3px solid grey;
            padding: 15px;
            outline: none;
        }

        .msg_box:focus {
            border: 3px solid #CE5937;
        }

        textarea::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
            border-radius: 15px;
        }

        textarea::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: #4285F4;
        }

        .submit_button {
            /* Comment submit button   */
            margin-top: 10px;
            margin-bottom: 30px;
            border-radius: 10px;
            height: 50px;
            width: 130px;
            font-size: 20px;
            border: 2px solid #CE5937;
            color: white;
            background-color: #CE5937;
            outline: none;
            font-weight: bold;
            text-align: center;

        }

        .submit_button:hover {
            cursor: pointer;
            color: white;
            border: 2px solid #556B2F;
            background-color: #556B2F;
            -webkit-box-shadow: 0px 0px 15px 0px #556B2F;
            box-shadow: 5px 5px 5px 0px rgba(0, 0, 0, 0.4);
        }

        #img {
            /* Post main image   */
            height: 650px;
            border-radius: 20px;
        }

        #comment_img {
            /* Comment user profile photo   */
            height: 100px;
            width: 100px;
            border-radius: 50%;
            border: 2px solid rgba(0, 0, 0, 0.4);
            box-shadow: 2px 12px 12px 0px rgba(0, 0, 0, 0.4);
        }


        .fa-user:after {
            content: " User name: ";
            font-weight: normal;
        }

        .fa-calendar-alt:after {
            content: " Date: ";
            font-weight: normal;
        }

        .fa-comment-dots:after {
            content: " Comment: ";
            font-weight: normal;
        }

        #delete_icon {
            float: right;
            font-size: 25px;
            padding: 5px;
        }


        @media only screen and (max-width: 600px) {
            .fa-user:after {
                content: "";
            }

            .fa-calendar-alt:after {
                content: "";
            }

            .fa-comment-dots:after {
                content: "";
            }

            .fa-trash {
                font-size: 100%;
            }


            #delete_icon {
                font-size: 100%;
            }

            .grid-container {
                font-size: 100%;
            }

            .msg_box {
                margin-top: 30px;
                font-size: 18px;
                height: auto;
                width: 100%;
            }

            #img {
                height: auto;
                width: 100%;
            }

            #comment_img {
                height: 50px;
                width: 50px;
                border-radius: 100%;
            }

            .col-10 {
                left: 15px;
            }

            h5 {
                font-size: 100%;
            }

            .submit_button {
                font-size: 100%;
                width: auto;
                height: 30px;
            }

        }

        .brdr {
            height: 100%;
            border: 5px solid;
            border-color: #CE5937;
            border-radius: 20px;
            padding: 30px;
            margin-top: 30px;
            -webkit-box-shadow: 0px 32px 67px -11px rgba(0, 0, 0, 0.71);
            -moz-box-shadow: 0px 32px 67px -11px rgba(0, 0, 0, 0.71);
            box-shadow: 0px 32px 67px -11px rgba(0, 0, 0, 0.71);
        }

        .grid-container {
            height: auto;
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 20px;
            border: 1px solid rgba(0, 0, 0, 0.4);
        }

    </style>

    <br><br><br><br>


    <script type="text/javascript">
        function deletecomment(id) {

            if (confirm("Are you sure you want to delete this comment?")) {

                $.ajax({
                    url: "comment-delete.php",
                    type: "POST",
                    data: 'comment_id=' + id,
                    success: function(data) {
                        if (data) {
                            $("#comment-" + id).remove();
                            if ($("#count-number").length > 0) {
                                var currentCount = parseInt($("#count-number").text());
                                var newCount = currentCount - 1;
                                $("#count-number").text(newCount)
                            }
                        }
                        $('#message-info').addClass("success");
                        $(".success").text("Delete successfully!");
                    }
                });
            }
        }




        $(document).ready(function() {

            $("#comment-form").on("submit", function(e) {
                $(".error").text("");
                $('#message-info').removeClass("error");
                e.preventDefault();
                var user_name = $('#user_name').val();
                var postid = $('#postid').val();
                var comment = $('#comment').val();


                if (comment == "") {
                    $('#message-info').addClass("error1");
                }
                $(".error1").text("Write your comment first !!");
                if (user_name == "") {
                    $('#message-info').addClass("error2");
                }
                $(".error2").text("Login first !!");


                if (comment && user_name) {
                    $("#loader").show();
                    $("#msg_submit").hide();
                    $.ajax({

                        type: 'POST',
                        url: 'post_comment_core.php',
                        data: $(this).serialize(),
                        success: function(response) {
                            $("#comment-form textarea").val("");
                            $('#response').prepend(response);

                            if ($("#count-number").length > 0) {
                                var currentCount = parseInt($("#count-number").text());
                                var newCount = currentCount + 1;
                                $("#count-number").text(newCount)
                            }
                            $("#loader").hide();
                            $("#msg_submit").show();

                            $('#message-info').addClass("success");
                            $(".success").text("Comment added successfully!");

                        }
                    });
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

</html>

<?php include_once 'footer.php'; ?>
