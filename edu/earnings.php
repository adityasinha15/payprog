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

    <title>PayProg- Earnings</title>

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
                    <h1 class="page-header">Earnings Report</h1>
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
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Your Network</div>
                                </div>
                            </div>
                        </div>
                        <a href="tree.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Courses</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
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
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
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
                        </a>
                    </div>
                </div>
				<div class="panel panel-default">
				  <!-- /.panel-heading -->
<div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                         <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><center><h3>Your Earnings Detail</h3></center></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="success">
                                            <th>Available Amount</th>
                                            <td><?php  $query = mysqli_query($con, "select * from income where userid = '$userid'");
											            $result = mysqli_fetch_array($query);
														echo "Rs"." " ."".$result['current_bal'] ;       ?></td>
                                           
                                        </tr>
										 <tr class="success">
                                            <th>Pending Amount</th>
                                            <td><?php  $query = mysqli_query($con, "select * from income where userid = '$userid'");
											            $result = mysqli_fetch_array($query);
														echo "Rs"." " ."".$result['pending'] ;       ?></td>
                                           
                                        </tr>
                                        <tr class="info">
                                            <th>Total Earning</th>
                                            <td><?php  $query = mysqli_query($con, "select * from income where userid = '$userid'");
											            $result = mysqli_fetch_array($query);
														echo "Rs"." ".$result['total_bal'] ;       ?></td>
														
                                            
                                        </tr>
										<tr class="warning">
										
                                          <form method="POST" action="withdrawal.php">
                           
                            <div class="form-group">
                                <th><label>Amount</label></th>
								<td>
                                <input type="text" name="withdraw" class="form-control"  placeholder="Enter amount to withdraw"required></td>
                            </div>
                                        </tr>
										  <tr class="danger">
                                            <th></th>
                                            <td><input type="submit" name="submit" value="Withdraw Amount"></td>
                                        </tr>
                                                     </tbody>
                                </table></form>
                            </div> <!-- /.panel-body -->
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
