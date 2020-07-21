<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];
$search = $userid;
?>
<?php
function tree_data($userid){
global $con;
$data = array();
$query = mysqli_query($con,"select * from tree where userid='$userid'");
$result = mysqli_fetch_array($query);
$data['one'] = $result['one'];
$data['two'] = $result['two'];
$data['three'] = $result['three'];
$data['four'] = $result['four'];
$data['five'] = $result['five'];
$data['six'] = $result['six'];
$data['seven'] = $result['seven'];
$data['eight'] = $result['eight'];
$data['nine'] = $result['nine'];
$data['ten'] = $result['ten'];
$data['onecount'] = $result['onecount'];
$data['twocount'] = $result['twocount'];
$data['threecount'] = $result['threecount'];
$data['fourcount'] = $result['fourcount'];
$data['fivecount'] = $result['fivecount'];
$data['sixcount'] = $result['sixcount'];
$data['sevencount'] = $result['sevencount'];
$data['eightcount'] = $result['eightcount'];
$data['ninecount'] = $result['ninecount'];
$data['tencount'] = $result['tencount'];
return $data;
}
?>
<?php 
if(isset($_GET['search-id'])){
$search_id = mysqli_real_escape_string($con,$_GET['search-id']);
if($search_id!=""){
$query_check = mysqli_query($con,"select * from usr where email='$search_id'");
if(mysqli_num_rows($query_check)>0){
$search = $search_id;
}
else{
echo '<script>alert("Access Denied");window.location.assign("tree.php");</script>';
}
}
else{
echo '<script>alert("Access Denied");window.location.assign("tree.php");</script>';
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
<title>PayProg - Network</title>
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
<h1 class="page-header">Network</h1>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th><center>1st Position</center></th>
                                                    <th><center>2nd Position</center></th>
                                                   
                                                    <th><center>3rd Position</center></th>
													<th><center>4th Positon </center></th>
													<th><center>5th Positon </center></th>
													<th><center>6th Positon </center></th>
													<th><center>7th Positon </center></th>
													<th><center>8th Positon </center></th>
													<th><center>9th Positon </center></th>
													<th><center>10th Positon </center></th>
													<th style=" font-size:10px"><center> Total </center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> <center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['onecount'];      ?> </center></td>
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['twocount'];      ?></center></td>
                                                    
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['threecount'];      ?></center></td>
													<td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['fourcount'];      ?></center></td>
													<td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['fivecount'];      ?></center></td>
													<td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['sixcount'];      ?></center></td>
													<td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['sevencount'];      ?></center></td>
					   							<td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
					 										echo $result['eightcount'];      ?></center></td>
													<td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['ninecount'];      ?></center>
													</td>  							
													<td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['tencount'];      ?></center></td>
																
												    <td><center><?php echo $sum = $result['onecount']+ $result['twocount']+$result['threecount']+$result['fourcount']+$result['fivecount']+$result['sixcount']+$result['sevencount']+$result['eightcount']+$result['ninecount']+$result['tencount'];
													         ?></center></td>		
															 
																									 
															 		
                                                </tr>
                                              
                                            </tbody>
											
											
                                        </table>
										<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th><center>Name</center></th>
                                                    <th><center>Email</center></th>
                                                   
                                                    <th><center>Position</center></th>
													
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> <center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																$downid = $result['one'];  
																//echo $downid; 
																if(!$downid){
																echo ' <a href="join.php">Refer </a';
																} 
																else{ 
																$query1 = mysqli_query($con, "select * from usr where email = '$downid'"); 
																 $result1 = mysqli_fetch_array($query1);
																 echo  $result1['fullname'];?> </center></td>
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['one'];      ?></center></td>
                                                    
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result1['position'];  }    ?></center></td>
												   	 
															 		
                                                </tr>
                                                  <tr>
                                                    <td> <center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																$downid = $result['two'];  
																//echo $downid;  
																if(!$downid){
																echo ' <a href="join.php">Refer </a';
																} 
																else{
																$query1 = mysqli_query($con, "select * from usr where email = '$downid'"); 
																 $result1 = mysqli_fetch_array($query1);
																 echo  $result1['fullname'];?> </center></td>
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['two'];      ?></center></td>
                                                    
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result1['position'];   }   ?></center></td>
												   	 
															 		
                                                </tr>
                                                  <tr>
                                                    <td> <center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																$downid = $result['three'];  
																//echo $downid; 
																if(!$downid){
																echo ' <a href="join.php">Refer </a';
																} 
																else{ 
																$query1 = mysqli_query($con, "select * from usr where email = '$downid'"); 
																 $result1 = mysqli_fetch_array($query1);
																 echo  $result1['fullname'];?> </center></td>
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['three'];      ?></center></td>
                                                    
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result1['position'];  }    ?></center></td>
												   	 
															 		
                                                </tr>
                                                  <tr>
                                                    <td> <center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																$downid = $result['four'];  
																//echo $downid;  
																if(!$downid){
																echo ' <a href="join.php">Refer </a';
																} 
																else{
																$query1 = mysqli_query($con, "select * from usr where email = '$downid'"); 
																 $result1 = mysqli_fetch_array($query1);
																 echo  $result1['fullname'];?> </center></td>
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['four'];      ?></center></td>
                                                    
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result1['position'];  }    ?></center></td>
												   	 
															 		
                                                </tr>
                                                  <tr>
                                                    <td> <center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																$downid = $result['five'];  
																//echo $downid; 
																if(!$downid){
																echo ' <a href="join.php">Refer </a';
																} 
																else{ 
																$query1 = mysqli_query($con, "select * from usr where email = '$downid'"); 
																 $result1 = mysqli_fetch_array($query1);
																 echo  $result1['fullname'];?> </center></td>
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['five'];      ?></center></td>
                                                    
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result1['position'];    }  ?></center></td>
												   	 
															 		
                                                </tr>
                                                  <tr>
                                                    <td> <center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																$downid = $result['six'];  
																//echo $downid; 
																if(!$downid){
																echo ' <a href="join.php">Refer </a';
																} 
																else{ 
																$query1 = mysqli_query($con, "select * from usr where email = '$downid'"); 
																 $result1 = mysqli_fetch_array($query1);
																 echo  $result1['fullname'];?> </center></td>
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['six'];      ?></center></td>
                                                    
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result1['position']; }     ?></center></td>
												   	 
															 		
                                                </tr>
                                                  <tr>
                                                    <td> <center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																$downid = $result['seven'];  
																//echo $downid; 
																if(!$downid){
																echo ' <a href="join.php">Refer </a';
																} 
																else{
																$query1 = mysqli_query($con, "select * from usr where email = '$downid'"); 
																 $result1 = mysqli_fetch_array($query1);
																 echo  $result1['fullname'];?> </center></td>
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['seven'];      ?></center></td>
                                                    
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result1['position']; }     ?></center></td>
												   	 
															 		
                                                </tr>
                                                  <tr>
                                                    <td> <center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																$downid = $result['eight'];  
																//echo $downid; 
																if(!$downid){
																echo ' <a href="join.php">Refer </a';
																} 
																else{ 
																$query1 = mysqli_query($con, "select * from usr where email = '$downid'"); 
																 $result1 = mysqli_fetch_array($query1);
																 echo  $result1['fullname'];?> </center></td>
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['eight'];      ?></center></td>
                                                    
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result1['position']; }     ?></center></td>
												   	 
															 		
                                                </tr>
                                                  <tr>
                                                    <td> <center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																$downid = $result['nine'];  
																//echo $downid;  
																if(!$downid){
																echo ' <a href="join.php">Refer </a';
																} 
																else{
																$query1 = mysqli_query($con, "select * from usr where email = '$downid'"); 
																 $result1 = mysqli_fetch_array($query1);
																 echo  $result1['fullname'];?> </center></td>
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['nine'];      ?></center></td>
                                                    
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result1['position'];  }    ?></center></td>
												   	 
															 		
                                                </tr>
                                                  <tr>
                                                    <td> <center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																$downid = $result['ten'];  
																//echo $downid;  
																if(!$downid){
																echo ' <a href="join.php">Refer </a';
																} 
																else{
																$query1 = mysqli_query($con, "select * from usr where email = '$downid'"); 
																 $result1 = mysqli_fetch_array($query1);
																 echo  $result1['fullname'];?> </center></td>
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['ten'];      ?></center></td>
                                                    
                                                    <td><center><?php $query = mysqli_query($con, "select * from tree where userid = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result1['position'];  }    ?></center></td>
												   	 
															 		
                                                </tr>
                                              
                                            </tbody>
											
											
                                        </table>
<table class="table" align="center" border="0" style="text-align:center">
<tr height="150">



</tr>
</table>
</div>
</div>
</div>
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