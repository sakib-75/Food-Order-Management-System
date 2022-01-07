<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Delivery Status</title>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/8d85c9615d.js" crossorigin="anonymous"></script>

    <style>
        body {
            color: #000;
            overflow-x: hidden;
            background-repeat: no-repeat;
            background-size: cover;
            background: -moz-linear-gradient(-45deg, #73CECC 0%, #8FA4A1 50%, #C28EC5 100%);
            background: -webkit-linear-gradient(-45deg, #73CECC 0%, #8FA4A1 50%, #C28EC5 100%);
            background: linear-gradient(135deg, #73CECC 0%, #8FA4A1 50%, #C28EC5 100%);
        }

        .card {
            z-index: 0;
            background-color: #ECEFF1;
            padding-bottom: 20px;
            margin-top: 90px;
            margin-bottom: 90px;
            border-radius: 10px;
            -webkit-box-shadow: 0px 15px 30px -10px rgba(0, 0, 0, 0.71);
            -moz-box-shadow: 0px 15px 30px -10px rgba(0, 0, 0, 0.71);
            box-shadow: 0px 15px 30px -10px rgba(0, 0, 0, 0.71);
        }

        .top {
            padding-top: 40px;
            padding-left: 13% !important;
            padding-right: 13% !important
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: #455A64;
            padding-left: 0px;
            margin-top: 30px
        }

        #progressbar li {
            list-style-type: none;
            font-size: 13px;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar .step0:before {
            font-family: FontAwesome;
            content: "\f10c";
            color: #fff
        }

        #progressbar li:before {
            width: 40px;
            height: 40px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            background: #C5CAE9;
            border-radius: 50%;
            margin: auto;
            padding: 0px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 12px;
            background: #C5CAE9;
            position: absolute;
            left: 0;
            top: 16px;
            z-index: -1
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            position: absolute;
            left: -50%
        }

        #progressbar li:nth-child(2):after,
        #progressbar li:nth-child(3):after {
            left: -50%
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            position: absolute;
            left: 50%
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #3CB371;
        }

        #progressbar li.active:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        .icon {
            width: 60px;
            height: 60px;
            margin-right: 15px
        }

        .icon-content {
            padding-bottom: 20px
        }

        @media screen and (max-width: 992px) {
            .icon-content {
                width: 50%
            }
        }

        ul li i {
            margin-top: 10px;
            padding: 5px;
            color: gray;
            font-size: 30px;
        }

        ul li {
            margin: 0;
            padding: 0;
            display: inline-block;
        }

    </style>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
    <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script type='text/javascript'></script>
</head>
<?php
    
    include_once 'connection.php';
    if(isset($_GET['deliveryid'])){
        $id=$_GET['deliveryid'];
    }
    
    $sql="select * from purchase where purchaseid='$id'";
    $result =  mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_assoc($result);
    $del_status = $row['delivery_status'];
    
    if($del_status=="Order Preparing"){
        $status2="active";
        $status3="";
        $status4="";
    }
    elseif($del_status=="Order In Route"){
        $status2="active";
        $status3="active";
        $status4="";
    }
    elseif($del_status=="Complete Delivery"){
        $status2="active";
        $status3="active";
        $status4="active";
    }
    else{
        $del_status="Pending";
    }
    
?>

<body>

    <div class="container px-1 px-md-4 py-5 mx-auto">
        <div class="card">
            <ul>
                <li><a href="profile.php" title="Profile"> <i class="fas fa-arrow-circle-left"></i></a></li>
                <li><a href="index.php" title="Home"><i class="fas fa-house-user"></i></a></li>

            </ul>

            <div class="row d-flex justify-content-between px-3 top">
                <div class="d-flex">
                    <h5>Order No <span class="text-primary font-weight-bold">#<?php echo $id;?></span></h5>
                </div>
                <div class="d-flex flex-column text-sm-right">
                    <p>Delivery Status: <span class="font-weight-bold"><?php echo $del_status;?></span></p>
                </div>
            </div> <!-- Add class 'active' to progress -->
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <ul id="progressbar" class="text-center">
                        <li class="active step0"></li>
                        <li class="<?php echo $status2;?> step0"></li>
                        <li class="<?php echo $status3;?> step0"></li>
                        <li class="<?php echo $status4;?> step0"></li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-between top">
                <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold">Order<br>Processed</p>
                    </div>
                </div>
                <div class="row d-flex icon-content"> <img class="icon" src="images/chef.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold">Order<br>Preparing</p>
                    </div>
                </div>
                <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold">Order<br>In Route</p>
                    </div>
                </div>
                <div class="row d-flex icon-content"> <img class="icon" src="images/activation.png">
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold">Order<br>Arrived</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
