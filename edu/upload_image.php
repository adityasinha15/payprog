<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];

?>



	
	
					<?php
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["fname"]) && $_FILES["fname"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["fname"]["name"];
        $filetype = $_FILES["fname"]["type"];
        $filesize = $_FILES["fname"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("images/" . $_FILES["fname"]["name"])){
                echo $_FILES["fname"]["name"] . " is already exists.";
            } else{
                move_uploaded_file($_FILES["fname"]["tmp_name"], "images/" . $_FILES["fname"]["name"]);
                echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["fname"]["error"];
    }
}
?>

	<?php
	include('php-includes/connect.php');
	 $image = $_FILES['fname']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
		

if (isset($_POST['submit'])) {    

$sql = "update user set `image`= '$imgContent' where userid = '$userid'" ;
mysql_query($sql) or die(mysql_error()); 
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
                    	<form method="POST">
                           
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="file" name="fname" required>
                            </div>
							 
							                            <div class="form-group">
                        	<input type="submit" name="submit" class="btn btn-primary" value="Upload">
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
