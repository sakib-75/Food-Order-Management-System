<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <?php
$adminid=$_SESSION['ccmsaid'];
$ret=mysqli_query($conn,"select AdminName from tbladmin where ID='$adminid'");
$row=mysqli_fetch_array($ret);
$name=$row['AdminName'];

?>
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="dashboard.php">Admin | <?php echo $name; ?></a>

        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse" style="width:280px;">
            <ul class="nav navbar-nav">
                <li>
                    <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard fa-2x"></i>
                        <h5 style="margin-top:10px"> Dashboard </h5>
                    </a>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-edit fa-2x"></i>
                        <h5 style="margin-top:10px"> Maintenance </h5>
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-tags"></i><a href="product.php">
                                <h6 style="margin-top:4px">Food </h6>
                            </a></li>
                        <li><i class="menu-icon fa fa-tags"></i><a href="category.php">
                                <h6 style="margin-top:4px">Category </h6>
                            </a></li>
                        <li><i class="menu-icon fa fa-tags"></i><a href="blogpost.php">
                                <h6 style="margin-top:4px">Post News </h6>
                            </a></li>

                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart fa-2x"></i>
                        <h5 style="margin-top:10px">Statistical Record </h5>
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-pie-chart "></i><a href="categoryorder.php">
                                <h6 style="margin-top:4px">Category wise order </h6>
                            </a></li>
                        <li><i class="menu-icon fa fa-line-chart "></i><a href="yearsales.php">
                                <h6 style="margin-top:4px">Sales by year </h6>
                            </a></li>
                        <li><i class="menu-icon fa fa-area-chart "></i><a href="annualsales.php">
                                <h6 style="margin-top:4px">Annual record </h6>
                            </a></li>

                    </ul>
                </li>




                <li class="menu-item-has-children dropdown">
                    <a href="add-users.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user fa-2x"></i>
                        <h5 style="margin-top:10px">Order </h5>
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-user "></i><a href="approvedorder.php">
                                <h6 style="margin-top:4px">Approve Order </h6>
                            </a></li>
                        <li><i class="fa fa-user "></i><a href="unapprovedorder.php">
                                <h6 style="margin-top:4px">Unapprove Order </h6>
                            </a></li>


                    </ul>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="add-users.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-wrench fa-2x"></i>
                        <h5 style="margin-top:10px">Settings </h5>
                    </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-user-circle "></i><a href="adminprofile.php">
                                <h6 style="margin-top:4px">Admin Profile </h6>
                            </a></li>
                        <li><i class="fa fa-key "></i><a href="change-password.php">
                                <h6 style="margin-top:4px">Change Password </h6>
                            </a></li>


                    </ul>
                </li>





                <li>
                    <a href="menu.php"> <i class="menu-icon fa fa-list fa-2x"></i>
                        <h5 style="margin-top:10px"> Menu </h5>
                    </a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
