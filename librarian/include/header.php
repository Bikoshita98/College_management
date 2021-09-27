<?php 
require_once "include/sessions.php";
require_once "include/db.php";
$tot=0;
$res=mysqli_query($connection,"select * from messages where dusername='$_SESSION[librarian]' && read1='no'");
$tot=mysqli_num_rows($res);

	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Librarian | CMS </title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>CMS</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>

                        <?php  $ProfileName=$_SESSION["librarian"];	?>
                        <h2><?php echo $ProfileName; ?></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="lib_dashboard.php"><i class="fa fa-home"></i> Home </a> </li>

                           
                            <li><a href="add_books.php"><i class="fa fa-edit"></i> Add Books </a> </li>

                           
                            <li><a href="all_books.php"><i class="fa fa-desktop"></i> Display Books </a> </li>
                            

							
                            <li><a href="issue_books1.php"><i class="fa fa-table"></i> Issue Books </a> </li>
							
							<li><a href="return_books.php"><i class="fa fa-table"></i> Return Books </a> </li>
							
							<li><a href="view_records.php"><i class="fa fa-table"></i> View records </a> </li>
							
							
							<li><a href="send_notification.php"><i class="fa fa-table"></i> Send Message to Students </a> </li>
							<li><a href="display_messages_librarian.php"><i class="fa fa-table"></i> Display Messages  </a> </li>
							

                           

                        </ul>
                    </div>


                </div>

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="images/img.jpg" alt=""><?php echo $ProfileName; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="lib_logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                               aria-expanded="false">
                                <!--<i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green" onclick="window.location='display_messages_librarian.php';"> <?php echo $tot; ?></span>-->
                            </a>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->