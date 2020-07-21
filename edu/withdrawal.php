<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');
$userid = $_SESSION['userid'];
?>

<?php   
$withdraw = $_POST['withdraw'];
$query = mysqli_query($con, "select * from income where userid = '$userid'");
$users = mysqli_query($con, "select * from usr where email='$userid'");
$request = mysqli_query($con, "select * from request where userid='$userid'");
$result = mysqli_fetch_array($users);
$name = $result['fullname'];
$id = $result['id'];
$mobile = $result['mobile'];
$row = mysqli_fetch_array($query);
$current_bal = $row['current_bal'];
$pending = $row['pending'];
$status = "notpaid";

$request_data = mysqli_num_rows($request);
if(isset($_POST['submit'])){

if($withdraw>$current_bal)
{ 

echo '<script>alert("Please enter valid amount."); window.location.assign("earnings.php")</script>';
}
else{

$new_current_bal = $current_bal - $withdraw;
$new_pending = $pending+$withdraw;


mysqli_query($con, "insert into request( `userid`,`fullname`,`amount`,`status`, `mobile`) values('$userid', '$name', '$withdraw', '$status', '$mobile')");
mysqli_query($con, "update income set `current_bal`='$new_current_bal' where userid='$userid'");
mysqli_query($con,"update income set `pending` ='$new_pending' where userid = '$userid' ");

echo '<script>alert("You have succesfully applied for payout.");window.location.assign("earnings.php")</script>';

}




}






?>
