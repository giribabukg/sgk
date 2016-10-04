<?PHP
$hostname = gethostname();
if ($hostname == "SELVAMEENAK5C3E")
{
	$proj_path = "/PHP/NextWeb";
} else
{
	$proj_path = "..";
}
$filename = basename($_SERVER["REQUEST_URI"], ".php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Bootstrap Admin Theme</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/bower/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="../assets/bower/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Timeline CSS -->
    <link href="../assets/bower/startbootstrap-sb-admin-2/dist/css/timeline.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./assets/bower/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="./assets/css/sbadmin2-sidebar-toggle.css" rel="stylesheet" type="text/css">
    <!-- Morris Charts CSS -->
    <link href="./assets/bower/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="./assets/bower/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="wrapper" class="toggled">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <button id="menu-toggle" type="button" data-toggle="button" class="btn btn-default btn-xs">
                        <i class="fa fa-exchange fa-fw"></i>
                    </button>
                </li>
                <li class="dropdown">	
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
            </ul>
            <div id="sidebar-wrapper">
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav in" id="side-menu">
                            <li class="sidebar-search">
                                <div class="masked">    
                                    <div class="input-group custom-search-form">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            <!-- /input-group -->
                            </li>
                            <li>
                                <a href="index.html" class="active"><i class="fa fa-dashboard fa-fw"></i> 
                                            <span class="masked">
                                                Dashboard
                                            </span>    
                                        </a>
                            </li>
                            <li class="">
                                <a href="#">
                                    <i class="fa fa-bar-chart-o fa-fw"></i>
                                    <span class="masked">
                                                Charts
                                                <span class="fa arrow"></span>
                                    </span>
                                </a>
                                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                    <li>
                                        <a href="flot.html">Flot Charts</a>
                                    </li>
                                    <li>
                                        <a href="morris.html">Morris.js Charts</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-table fa-fw"></i> 
                                            <span class="masked">
                                                Tables
                                            </span>    
                                        </a>
                            </li>
                            <li class="">
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> 
                                            <span class="masked">
                                                Multi-Level Dropdown<span class="fa arrow"></span>
                                            </span>    
                                        </a>
                                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                                    <li>
                                        <a href="flot.html">Flot Charts</a>
                                    </li>
                                    <li class="">
                                        <a href="#">Third Level <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level collapse" aria-expanded="false" style="height: 0px;">
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                    <li>
                                        <a href="morris.html">Morris.js Charts</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                         </ul>
                    </div>
                </div>
           </div>
        </nav>
        <div id="page-wrapper" style="min-height: 158px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sidebar Toggle Demo</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
    <!-- /#wrapper div -->
    <!-- jQuery -->
    <script src="../assets/bower/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/bower/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../assets/bower/metisMenu/dist/metisMenu.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="../assets/bower/raphael/raphael-min.js"></script>
    <script src="../assets/bower/morrisjs/morris.min.js"></script>
    <!-- <script src="../js/morris-data.js"></script> -->
    <!-- Custom Theme JavaScript -->
    <script src="../assets/bower/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            $("#wrapper.toggled").find("#sidebar-wrapper").find(".collapse").collapse("hide");
        });
    });
    </script>
</body>

</html>
