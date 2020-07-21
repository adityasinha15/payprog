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

    <title>PayProg - Profile</title>

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
                    <h1 class="page-header">Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                				<div class="panel panel-default"><a href="file:///C|/Program Files (x86)/Ampps/www/mlm/home.php"></a>
                				  <!-- /.panel-heading -->
                                  <div class="panel-body">
								  
								  <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> 
                        </div>
                        <div class="panel-body">
						
                           
						<div class="col-lg-20">
                     <div class="row">
                <div class="col-lg-20">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <center><h3> User Profile</h3></center>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
									<tr>
									
									<center><img src="<?php  $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['image'];    ?>" height="100" width="100"></center>
																<center><a href="£">Change Picture</a></center>
									
									</tr>
                                        <tr>
                                          
                                            <th>Name</th>
                                          <center>  <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['fullname'];      ?>  </td></center>
																<td></td>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Username</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['email'];      ?></td>
																<td></td>
                                           
                                        </tr>
                                        <tr>
                                            <th>Password</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['password'];      ?></td>
                                          <td> <a href="reset_password.php"> Change Password</a></td>
                                        </tr>
                                        <tr>
                                            
                                            <th>Date Of Birth</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['dob'];      ?></td>
																<td></td>
                                           
                                        </tr>
										 <tr>
                                            
                                            <th>Gender</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['gender'];      ?></td>
																<td></td>
                                           
                                        </tr> <tr>
                                            
                                            <th>Mobile</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['mobile'];      ?></td>
																<td></td>
                                           
                                        </tr> <tr>
                                            
                                            <th>Country</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['country'];      ?></td>
																<td></td>
                                           
                                        </tr>
										 <tr>
                                            
                                            <th>Address</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['address'];      ?></td>
																<td></td>
                                           
                                        </tr> <tr>
                                            
                                            <th>Trainer's Id</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['sponsor'];      ?></td>
																<td></td>
                                           
                                        </tr>
										 <tr>
                                            
                                            <th>Position</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['position'];      ?></td>
																<td></td>
                                           
                                        </tr> <tr>
                                            
                                            <th>Status</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['status'];      ?></td>
																<td></td>
                                           
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
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
