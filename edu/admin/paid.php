<?php 
include('php-includes/connect.php');

include('php-includes/check-login.php');

$SNo = $_GET['SNo'];
$query = mysqli_query($con,"select * from request where SNo='$SNo'");
$result=mysqli_fetch_array($query);
$userid= $result['userid'];
$name = $result['fullname'];
$mobile=$result['mobile'];
$amount=$result['amount'];

mysqli_query($con, "update request set status='paid' where `SNo`='$SNo'");
$income = mysqli_query($con,"select * from income where `userid` = '$userid'");
$fetch = mysqli_fetch_array($income);
$pending = $fetch['pending'];
$newpending = $pending - $amount;

mysqli_query($con, "update income set pending = '$newpending' where userid = '$userid'");

mysqli_query($con,"insert into paid(`userid`, `fullname`, `mobile`, `amount`) values('$userid', '$name', '$mobile', '$amount')");




?>

<script type="text/javascript">

window.location= "view_payment_request.php";

</script>