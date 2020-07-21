<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];
$capping = 500;
?>
<?php

$query=mysqli_query($con,"select * from user where email='$userid'");
$result = mysqli_fetch_array($query);
$password = $result['password'];
if(isset($_GET['reset'])){
	
	$password_new = mysqli_real_escape_string($con,$_GET['password_new']);
	$confirm_password = mysqli_real_escape_string($con,$_GET['confirm_password']);
	
	$flag = 0;
	
	if($password_new!='' && $confirm_password!=''){
		if($password_new==$confirm_password){
		mysqli_query($con, "update user set `password`='$password_new' where email='$userid'");
		echo  '<script>alert("Password updated successfully");window.location.assign("profile.php");</script>';
		
		}
		else{
		echo  '<script>alert("Password and confirm password must be same");window.location.assign("reset_password.php");</script>';
		}
		}
		else {
		
		echo  '<script>alert("Please enter new password");window.location.assign("reset_password.php");</script>';
		}
		}
			
	?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mlml Website  - Join</title>

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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Join</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-4">
                    	<form method="get">
                           
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" name="password_new" class="form-control" required>
                            </div>
							 <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>
							                            <div class="form-group">
                        	<input type="submit" name="reset" class="btn btn-primary" value="Reset">
                        </div>
                        </form>
                    </div>
                </div><!--/.row-->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

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
