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

    <title>Panels - Student Admission Program - Boston College</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

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
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
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
            <div class="row" style="maring-bottom: 0;">
                <div class="col-lg-12">
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="panels-header">Panels</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="margin-bottom: 0;">
                <div class="col-lg-12">
                    
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->

                            <ul id="here" class="nav nav-tabs">
                                <li class="active"><a href="#volunteers" data-toggle="tab">Volunteers</a>
                                </li>
                                <li><a href="#attendance" data-toggle="tab">Attendance</a>
                                </li>
                                <li><a href="#requirements" data-toggle="tab">Requirements</a>
                                </li>
                                
                                <div class="col-xs-2">
                                <select name="panel-semester" class="form-control form-control-xs" id="panel-semester" style="text-align: right;">
                                        <?php
                                            $currMonth = date("n");
                                            $currSemester = "Fall";
                                            if($currMonth < 6) {
                                                $currSemester = "Spring";
                                            }
                                            echo "<option value='Fall'";
                                            if($currSemester == "Fall") {
                                                echo "selected='selected'>Fall</option>";
                                            }
                                            else {
                                                echo ">Fall</option>";
                                            }
                                            echo "<option value='Spring'";
                                            if($currSemester == "Spring") {
                                                echo "selected='selected'>Spring</option>";
                                            }
                                            else {
                                                echo ">Spring</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-2">
                                    <select name="panel-year" class="form-control form-control-xs" id="panel-year" style="text-align: right;">
                                        <?php
                                            $currYear = date("Y");
                                            $yearHolder = $currYear;
                                            echo "<option value='".$yearHolder."' selected='selected'>".$yearHolder."</option>";
                                            $yearHolder--;
                                            while($yearHolder >= 2015) {
                                                echo "<option value='".$yearHolder."'>".$yearHolder."</option>";
                                                $yearHolder--;
                                            }
                                        ?>
                                    </select>

                                </div>
                                <a href="#" class="btn btn-primary" id="semester-submit">Go</a>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="volunteers">
                                        <table class="table table-striped table-bordered table-hover" id="panels-volunteers" style="font-size: 13px;">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Class</th>
                                                    <th>School</th>
                                                    <th>Shift Day</th>
                                                    <th>Shift Time</th>
                                                    <th>Requirements</th>
                                                </tr>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>Last Name</td>
                                                    <td>Class</td>
                                                    <td>School</td>
                                                    <td>Shift Day</td>
                                                    <td>Shift Time</td>
                                                    <td>Requirements</td>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-vols">
                                                <?php 
                                                    function connect_to_db( $dbname ){
                                                        // REMEMBER!!!
                                                        // Change the host, login, and db information
                                                        $dbc = @mysqli_connect( "localhost", "root", "root", $dbname ) or
                                                                die( "Connect failed: ". mysqli_connect_error() );
                                                        return $dbc;
                                                    }

                                                    function disconnect_from_db( $dbc, $result ){
                                                        mysqli_free_result( $result );
                                                        mysqli_close( $dbc );
                                                    }

                                                    function perform_query( $dbc, $query ){
                                                        
                                                        //echo "My query is >$query< <br />";
                                                        $result = mysqli_query($dbc, $query) or 
                                                                die( "bad query".mysqli_error( $dbc ) );
                                                        return $result;
                                                    }
                                                    $currYear = date("Y");
                                                    $currSemester = "Fall";
                                                    if($currMonth < 6) {
                                                        $currSemester = "Spring";
                                                    }
                                                    $dbc    = connect_to_db( "SAP" ); 
                                                    $query  = "select * from Program_Members, Users, Programs where user=eagle_id and program=program_id and program_name='Panels' and semester='$currSemester' and year='$currYear' order by last_name asc";
                                                    $result = perform_query( $dbc, $query );
                                                    while($row = mysqli_fetch_array( $result, MYSQLI_ASSOC )) {
                                                        echo "<tr class = odd>";
                                                        echo "<td>".$row['first_name']."</td>";
                                                        echo "<td>".$row['last_name']."</td>";
                                                        echo "<td>".$row['class']."</td>";
                                                        echo "<td>".$row['school']."</td>";
                                                        echo "<td>".$row['shift_day']."</td>";
                                                        echo "<td>".$row['shift_time']."</td>";
                                                        echo "<td>".$row['requirements_status']."</td>";
                                                        echo "</tr>";
                                                        
                                                    }
                                                    disconnect_from_db( $dbc, $result );
                                                ?>
                                            </tbody>
                                        </table>
                                    
                                </div>
                                <div class="tab-pane fade" id="attendance">
                                    <h4>Profile Tab</h4>
                                </div>
                                <div class="tab-pane fade" id="requirements">
                                    <h4>Messages Tab</h4>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    
                </div>
                <!-- /.col-lg-6 -->
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

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>



    
    <script>
    $(document).ready(function() {
    // Setup - add a text input to each footer cell
        $('#panels-volunteers thead td').each( function () {
            var title = $(this).text();
            $(this).css('text-align', 'center');
            $(this).html( '<input type="text"/>' );
            $(this).children('input').css('width', '100%');
        } );
     
        // DataTable
        var table = $('#panels-volunteers').DataTable({
            responsive: true,
            orderCellsTop: true
        });
     
        // Apply the search
        table.columns().every(function (index) {
        $('#panels-volunteers thead tr:eq(1) td:eq(' + index + ') input').on('keyup change', function () {
            table.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
            } );
        } );
    
    

        $('#semester-submit').on("click",function(e) {
            
            var s = document.getElementById("panel-semester");
            var selectedSemester = s.options[s.selectedIndex].value;
            var y = document.getElementById("panel-year");
            var selectedYear = y.options[y.selectedIndex].value;

            //document.getElementById("panels-header").innerHTML = "HELLO";
            
            
            $.getJSON("../include/getProgramVolunteers.php", 
            {
                program: "Panels",
                semester: selectedSemester,
                year: selectedYear
            }, function(data) {
                $.each(data, function(i, item) {
                    table.row.add([
                        item.first_name,
                        item.last_name,
                        item.class,
                        item.school,
                        item.shift_day,
                        item.shift_time,
                        item.requirements_status
                    ])
                    //$("<tr><td>"+item.first_name+"</td><td>"+item.last_name+"</td><td>"+item.class+"</td><td>"+item.school+"</td><td>"+item.shift_day+"</td><td>"+item.shift_time+"</td><td>"+item.requirements_status+"</td></tr>").appendTo('#tablebody-vols');
                });
            })
            .fail(function() {
                console.log("getJSON error");
            });
            table.draw();
            
            
        });
    });
    </script>

</body>

</html>
