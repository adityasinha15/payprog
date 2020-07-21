<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');
$userid = $_SESSION['userid'];
?>

<?php   
$withdraw = $_POST['withdraw'];
$query = mysqli_query($con, "select * from income where userid = '$userid'");
$user = mysqli_query($con, "select * from user where userid='$userid'");
$name = $user['name'];
$id = $user['id'];
$row = mysqli_fetch_array($query);
$current_bal = $row['current_bal'];
$status = "notpaid";
if(isset($_POST['submit'])){

if($withdraw>$current_bal)
{
echo '<script>alert("Please enter valid amount.");</script>';
}
else{
$new_current_bal = $current_bal-$withraw;

mysqli_query($con, "insert into payment_request(`id`, `userid`,`name`,`amount`,`status`) values('$id', '$userid', '$name', '$withdraw', '$status')");
mysqli_query($con , "update income set `current_bal='$new_current_bal'`");

echo '<script>alert("The side you selected is not available.");window.location.assign("earnings.php")</script>';






}



}


?>
