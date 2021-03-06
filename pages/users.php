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

if(!(in_array('Council', $roles)) && !(in_array('Staff', $roles)) && !(in_array('Admin', $roles))) {
    header('Location: ./dashboard.php');
    exit();
}

echo "<input type='hidden' id='userid' value='$eagleid'/>";
date_default_timezone_set('EST');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>All Users - Student Admission Program - Boston College</title>

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

        <div id="page-wrapper" style="overflow-x: auto;">
            <div class="row" style="maring-bottom: 0;">
                <div class="col-lg-12">
                    <h3 style="margin-top: 60px; margin-bottom: 0;" class="page-header" id="users-header">All Users</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" style="margin-bottom: 0;">
                <div class="col-lg-12">
                    
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                                <div class="col-xs-2">
                                    <select name="table-active" class="form-control form-control-xs" id="table-active" style="text-align: right;">
                                        <option value='Yes'>Active</option>
                                        <option value='No'>Inactive</option>
                                        <option value="Abroad">Abroad</option>
                                        <option value='Prac/Clinical'>Prac/Clinical</option>
                                        <option value="Graduated">Graduated</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary" id="semester-submit">Go</button>

                            <!-- Tab panes -->
                            <div class="tab-content" style="margin-top: 10px;">
                                <div class="tab-pane fade in active" id="volunteers">
                                        <table class="table table-striped table-bordered table-hover" id="table-volunteers" style="font-size: 13px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Class</th>
                                                    <th>School</th>
                                                    <th>Major</th>
                                                    <th>Minor</th>
                                                    <th>Hometown</th>
                                                    <th>State</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Eagle Id</th>
                                                </tr>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>Last Name</td>
                                                    <td>Class</td>
                                                    <td>School</td>
                                                    <td>Major</td>
                                                    <td>Minor</td>
                                                    <td>Hometown</td>
                                                    <td>State</td>
                                                    <td>Email</td>
                                                    <td>Phone</td>
                                                    <td>Eagle Id</td>
                                                </tr>
                                            </thead>
                                            
                                            <tbody id="tablebody-volunteers">
                                                
                                            </tbody>
                                        </table>
                                    
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
        $('#table-volunteers thead td').each( function () {
            var title = $(this).text();
            $(this).css('text-align', 'center');
            $(this).html( '<input type="text"/>' );
            $(this).children('input').css('width', '100%');
        } );
     
        // DataTable
        var tableVols = $('#table-volunteers').DataTable({
            responsive: true,
            orderCellsTop: true,
            "columnDefs": [
            {
                "targets": [10],
                "visible": false,
                "orderable": false
                
            }]
        });
        $.getJSON("../include/getAllUsers.php", 
            {
                active: "Yes"
            }, function(data) {
                $.each(data, function(i, item) {
                    tableVols.row.add([
                        item.first_name,
                        item.last_name,
                        item.class,
                        item.school,
                        item.major,
                        item.minor,
                        item.hometown,
                        item.state_country,
                        item.email,
                        item.phone,
                        item.eagle_id
                    ]);
                });
            })
            .fail(function() {
                console.log("getJSON error");
            });

            setTimeout(function() {
            tableVols.draw();
        }, 300);
     
        // Apply the search
        tableVols.columns().every(function (index) {
        $('#table-volunteers thead tr:eq(1) td:eq(' + index + ') input').on('keyup change', function () {
            tableVols.column($(this).parent().index() + ':visible')
                .search(this.value)
                .draw();
            } );
        } );
    


        $('#semester-submit').on("click", function() {
            var a = document.getElementById("table-active");
            var selectedActive = a.options[a.selectedIndex].value;
            
            tableVols.clear();
            
            
            $.getJSON("../include/getAllUsers.php", 
            {
                active: selectedActive
            }, function(data) {
                $.each(data, function(i, item) {
                    tableVols.row.add([
                        item.first_name,
                        item.last_name,
                        item.class,
                        item.school,
                        item.major,
                        item.minor,
                        item.hometown,
                        item.state_country,
                        item.email,
                        item.phone,
                        item.eagle_id
                    ]);
                });
            })
            .fail(function() {
                console.log("getJSON error");
            });

            setTimeout(function() {
            tableVols.draw();
        }, 300);
        });


        
        $('#table-volunteers tbody').on('dblclick', 'td', function(e) {
            var currentEle = $(this);
            var valueT = $(this).html();
            var row = tableVols.cell($(this)).index().row;
            var column = tableVols.cell($(this)).index().column;
            var data = tableVols.row(row).data();
            var updateField = ['first_name', 'last_name', 'class', 'school', 'major', 'minor', 'hometown', 'state_country', 'email', 'phone'];
            setTimeout(function() {
            $(currentEle).html('<input id="newvalue" class="thVal" type="text" value="' + valueT + '" />');
            $(".thVal").focus();
            $(".thVal").keyup(function (event) {
            if (event.keyCode == 13) {
               
                data[column] =  document.getElementById("newvalue").value.trim();
                tableVols.row(row).remove();
                $.post("../include/inlineUpdateTable.php",
                {
                    id : data[10],
                    field : updateField[column],
                    table : 'Users',
                    newValue : data[column],
                    whereField : 'eagle_id'
                },
              function(data){
                if(data) {
                  
                }
                });

                setTimeout( function(){
                tableVols.row.add([
                    data[0],
                    data[1],
                    data[2],
                    data[3],
                    data[4],
                    data[5],
                    data[6],
                    data[7],
                    data[8],
                    data[9], 
                    data[10]

                ]).draw();
            }, 100);
            }
        });
        },50);
            $('tbody td').not(currentEle).on('click', function() {

                $(currentEle).html(valueT);
            });
            $(currentEle).on("dblclick", function() {
                $(currentEle).html(valueT);
            });  
        });
    });
    </script>

</body>

</html>
