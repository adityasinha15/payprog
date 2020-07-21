<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');
$userid = $_SESSION['userid'];
?>
<?php  

echo date(" jS \of F Y") . "<br>";

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PayProg - Acceptance Form</title>

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

  
           
                        <div class="panel-body">
						
						
                           
						<div class="col-lg-20">
                     <div class="row">
                <div class="col-lg-20">
                    <div class="panel panel-default">
                        <frame>  <div class="panel-heading">
						  <h3> </h3>
						  
                          
                        </div>
						 <center>
                            <b> <u><strong><h4>Acceptance Form</h4></strong> </u></b><br>
							<B><u><p> <h4>Acceptance of ONLINE AGREEMENT / CONTRACT with PayProg.com</h4></p></u></B>
                           </center>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive" style="font-size:12px">
                              <table class="table table-hover">
                                      <tbody>
									<tr>
									
									<center><p> <textarea rows="6" cols="15" disabled="disabled"> Affix your 
									                                                          photograph here  </textarea></p></center>
																
									
									</tr>
                                        <tr>
                                          
                                         <center>   <th>Name</th> 
                                          <center>  <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['fullname'];      ?>  </td></center>
																<td></td></center>
                                            
                                        </tr>
										  <tr>
                                            <th>Id</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['id'];      ?></td>
																<td></td>
                                           
                                        </tr>
                                   
                                  
                                        <tr>
                                            <th>Username</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['email'];      ?></td>
																<td></td>
                                           
                                        </tr>
                                      
                                        <tr>
                                            
                                            <th>Date Of Birth</th>
											
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['dob'];      ?></td>
																<td></td>
                                           
                                        </tr>
										 <tr>
                                            
                                            <th>Mobile</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['mobile'];      ?></td>
																<td></td>
                                           
                                        </tr> 
										 <tr>
                                            
                                            <th>Address</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['address'];      ?></td>
																<td></td>
                                           
                                        </tr>
																				 <tr>
                                            
                                            <th>Date Of Joining</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['doj'];      ?></td>
																<td></td>
                                           
                                        </tr> 
										
										 <tr>
                                            
                                            <th>Trainer's Id</th>
                                            <td><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['sponsor'];      ?> </td>
																<td></td>
                                           
                                        </tr></tbody></table>
										
					<div style="font-size:10px">					
										<div style="font-size:14px"><strong><center>DECLARATION:</center></strong></div>

I solemnly declare and affirm as under –<br>
1.	I declare that I am of the age of 18 years or more and competent to contract.<br>

2.	That I have read and understood the terms and conditions for appointment of PayProg.com Retailer / Representative (Direct Seller) of the PayProg.com, and accept to them.<br>

3.	I have also gone through the PayProg.com official website including FAQs. I agree to the contents of the website and convinced about the business and I have applied to appoint me as a Direct Seller on my own volition.<br>
4.	I declare that I have not been given any assurance or promise or inducement by the PayProg.com or its Directors in regard to any fixed income incentive, prize or benefit on account of the products purchased by me.<br>

5.	I have clearly understood that eligibility of income exclusively depends on my performance as per the Business Plan of the PayProg.com. I further agree that PayProg.com reserves the right to change the Business Plan at any point of time without any prior notice.<br>
6.	I undertake not to misguide or induce dishonestly anybody to join the Program.<br>

7.	I hereby agree to submit all disputes to Dispute Redressal cell / Arbitration as provided in the terms and conditions of the PayProg.com.</p><br>
8.	I hereby declare that I am signing this “DECLARATION” with complete understanding and with my FREE WILL, without any PRESSURE / UNDUE INFLUENCE or INDUCEMENT.<br>

9.	I hereby agree and adhere to the terms and conditions / terms of use as given on the website PayProg.com and as mentioned above to purchase the product and to do the Direct Seller activities.<br></div>







										
										
									<table><tbody>	<tr>
										
									<textarea rows="4" cols="55" disabled="disabled"> 
		 							                                 
		            
	Signatures of Joining Direct Seller</textarea>								
									<textarea rows="4" cols="55" disabled="disabled">
									
									                                
	               
	 Signatures of Joining Direct Seller</textarea></tr>
										
										
										                                    </tbody>
                                </table>
								
                            </div>
                            <!-- /.table-responsive --
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
