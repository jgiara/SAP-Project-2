<?php 
ob_start();
session_start();
require '../include/init.php';
$general->logged_out_protect();

$user     = $users->userdata($_SESSION['Eagle_Id']);
$eagleid  = $user['eagle_id'];

$groups = $users->get_roles($eagleid);


$roles = [];
foreach($groups as $group) {
    array_push($roles, $group['group_name']);
}

echo "<input type='hidden' id='userid' value='$eagleid'/>";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Student Admission Program - Boston College</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Override Bootstrap -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap-override.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Student Admission Program</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav side-scroll" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="./dashboard.php">Dashboard</a>
                        </li>
                        <li>
                            <a href="./involvement.php">My Involvement</a>
                        </li>
                        <li>
                            <a href="./profile.php">My Profile</a>
                        </li>
                        <li>
                            <a href="./applications.php">Applications</a>
                        </li>
                        <?php 
                            if(in_array('Council', $roles) || in_array('Staff', $roles) || in_array('Admin', $roles)) {
                                echo "<li>
                                        <a href='./users.php'>All Users</a>
                                    </li>
                                    <li>
                                        <a href='./panels.php'>Panels</a>
                                    </li>
                                    <li>
                                        <a href='./tours.php'>Tours</a>
                                    </li>
                                    <li>
                                        <a href='./greeting.php'>Greeting</a>
                                    </li>
                                    <li>
                                        <a href='./om.php'>Office Management</a>
                                    </li>
                                    <li>
                                        <a href='./efad.php'>Eagle for a Day</a>
                                    </li>
                                    <li>
                                        <a href='./aed.php'>Admitted Eagle Day</a>
                                    </li>
                                    <li>
                                        <a href='./outreach.php'>Outreach</a>
                                    </li>
                                    <li>
                                        <a href='./hsvisits.php'>High School Visits</a>
                                    </li>
                                    <li>
                                        <a href='./ahana.php'>AHANA Outreach</a>
                                    </li>
                                    <li>
                                        <a href='./io.php'>International Outreach</a>
                                    </li>
                                    <li>
                                        <a href='./transfer.php'>Transfer Outreach</a>
                                    </li>
                                    <li>
                                        <a href='./media.php'>Media</a>
                                    </li>
                                    <li>
                                        <a href='./summer.php'>Summer</a>
                                    </li>
                                    <li>
                                        <a href='#'>Administration<span class='fa arrow'></span></a>
                                        <ul class='nav nav-second-level'>
                                            <li>
                                                <a href='./weeks.php'>Weeks</a>
                                            </li>
                                            <li>
                                                <a href='./reports.php'>Reports</a>
                                            </li>
                                        </ul>
                                    </li>";
                            }
                            ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 style="margin-top: 60px; margin-bottom: 0;"class="page-header">Dashboard</h3>
                </div>
                <!-- /.col-lg-12 -->
                <div id="here"></div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>



</body>

</html>
