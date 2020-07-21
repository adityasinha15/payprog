<?php 
include('php-includes/connect.php');

include('php-includes/check-login.php');

$id = $_GET['id'];
mysqli_query($con, "update usr set status='not approved' where id='$id'");






?>

<script type="text/javascript">

window.location= "home.php";

</script>