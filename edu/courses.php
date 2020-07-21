<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');
$userid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PayProg - Courses</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('php-includes/menu.php'); ?>

        <!-- Page Content -->
       
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Courses</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Legality</div>
                                </div>
                            </div>
                        </div>
                        <a href="Acceptance_form.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Courses</div>
                                </div>
                            </div>
                        </div>
                        <a href="courses.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Your Profile</div>
                                </div>
                            </div>
                        </div>
                        <a href="profile.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Earnings</div>
                                </div>
                            </div>
                        </div>
                        <a href="earnings.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>                    </div>
                </div>
				<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Learning Panel
                            <div class="pull-right">
                                <div class="btn-group">                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-20">
								 <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
									<tr>
									
									
									
									</tr>
                                        <tr>
                                          
                                           <center> <img src="http://localhost/mlm/images/digital.jpg" height="200" width="300">
										                 </center>
                                          <center>  <h3>Digital Marketing</h3> </center>
																<td></td>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th><h4>Lesson1</h4></th>
											<td><h4>What is Digital Marketing?</h4></td>
                                            <h4><td><a href="http://localhost/mlm/web/viewer.html?file=What is Digital Marketing.pdf"><button class="btn btn-primary">Read</button></td></h4></a>
																
                                           
                                        </tr>
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-res
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
              </div>
            </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
