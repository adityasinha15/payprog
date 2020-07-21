<?php 
include('php-includes/connect.php');

include('php-includes/check-login.php');
?>

<!DOCTYPE html>


<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>welcome</title>

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
       <?php 
	   include('PHP includes/menu.php');
	   ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">HOME</h1>
						<div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<?php   $query = mysqli_query($con,"select * from usr");
						        // $result = mysqli_fetch_array($query);
								    ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
									<th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Address</th>
                                        <th>Trainer's Id</th>
										<th>Position</th>
										<th>Status</th>
										<th>Approve</th>
										<th>Not Approve</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                       <?php  while($result= mysqli_fetch_array($query)){
									   
									  echo '<tr class="odd gradeX">';
									   echo "<td>"; echo $result['id']; echo "</td>";
									  echo "<td>"; echo $result['fullname']; echo "</td>";
									   echo "<td>"; echo $result['email']; echo "</td>";
									    echo "<td>"; echo $result['mobile']; echo "</td>";
										 echo "<td>"; echo $result['address']; echo "</td>";
										  echo "<td>"; echo $result['sponsor']; echo "</td>";
										   echo "<td>"; echo $result['position']; echo "</td>";
										    echo "<td>"; echo $result['status']; echo "</td>";
											 echo "<td>";?>  <a href="approve.php?id=<?php echo $result['id'];?>"> Approve</a>  <?php echo "</td>";
											   echo "<td>";?>  <a href="notapprove.php?id=<?php echo $result['id'];?>"> Not Approve</a>  <?php echo "</td>";
									   
									   
									   
									   }
									   
									   
									   echo "</tr>";
								 ?>
                                   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
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
