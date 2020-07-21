
	
					<?php
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["idproof"]) && $_FILES["idproof"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["idproof"]["name"];
        $filetype = $_FILES["idproof"]["type"];
        $filesize = $_FILES["idproof"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("images/" . $_FILES["idproof"]["name"])){
                echo $_FILES["idproof"]["name"] . " is already exists.";
            } else{
                move_uploaded_file($_FILES["idproof"]["tmp_name"], "images/" . $_FILES["idproof"]["name"]);
                echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["idproof"]["error"];
    }
}

?>

	<?php
	 
		
//include("connect.php");
//if (isset($_POST['submit'])) {    

//$sql = "INSERT INTO `Business_Owner_Registration`(`OwnerName`, `BusinessName`, `ContactNo` , `EmailId`, `DOB`, `Gender`, `Website(URL)`, `BId`, `CId`, `UploadImage`) VALUES('{$_POST['name']}' , '{$_POST['businessname']}' , '{$_POST['contactno']}' , '{$_POST['email']}', '{$_POST['dob']}', '{$_POST['gender']}', '{$_POST['website']}', '{$_POST['businesscategories']}', '{$_POST['businessubscategories']}', '$imgContent')"; 
//mysql_query($sql) or die(mysql_error()); 
//}

?>


<?php
$image = $_FILES['idproof']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
		
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];
$capping = 500;

if(isset($_POST['join_user'])){
	$side='';
	$pin = mysqli_real_escape_string($con,$_POST['pin']);
	$name = mysqli_real_escape_string($con,$_POST['name']);
	$dob = mysqli_real_escape_string($con,$_POST['dob']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$mobile = mysqli_real_escape_string($con,$_POST['mobile']);
	$address = mysqli_real_escape_string($con,$_POST['address']);
	$account = mysqli_real_escape_string($con,$_POST['account']);
	$under_userid = mysqli_real_escape_string($con,$_POST['under_userid']); 
	$side = mysqli_real_escape_string($con,$_POST['side']);
	$password = "123456";
	
	$flag = 0;
	
	if($email!='' && $mobile!='' && $address!='' && $account!='' && $under_userid!='' && $side!=''){
		
		//if(pin_check($pin)){
			
			if(email_check($email)){
				
				if(!email_check($under_userid)){
					
					if(side_check($under_userid,$side)){
						
						$flag=1;
					}
					else{
						echo '<script>alert("The side you selected is not available.");</script>';
					}
				}
				else{
					
					echo '<script>alert("Invalid Under userid.");</script>';
				}
			}
			else{
				
				echo '<script>alert("This user id already availble.");</script>';
			}
		/*}
		else{
			
			echo '<script>alert("Invalid pin");</script>';
		}*/
	}
	else{
		
		echo '<script>alert("Please fill all the fields.");</script>';
	}
	
	
	if($flag==1){
	
		
		//$query = mysqli_query($con,"insert into user(`email`,`password`,`mobile`,`address`,`account`,`under_userid`,`side`) values('$email','$password','$mobile','$address','$account','$under_userid','$side')");
		$query = mysqli_query($con, "insert into user(`email`, `password` ,`mobile`, `address`, `account`, `under_userid`, `side`, `image`) values('$email', '$password', '$mobile', '$address', '$account', '$under_userid', '$side','$imgContent')");
		
		
		$query = mysqli_query($con,"insert into tree(`userid`) values('$email')");
		
		
		$query = mysqli_query($con,"update tree set `$side`='$email' where userid='$under_userid'");
		
		
		//$query = mysqli_query($con,"update pin_list set status='close' where pin='$pin'");
		
		
		$query = mysqli_query($con,"insert into income (`userid`) values('$email')");
		echo mysqli_error($con);
		
		$temp_under_userid = $under_userid;
		$temp_side_count = $side.'count';
		
		$temp_side = $side;
		$total_count=1;
		$i=0;
		while($total_count>0){
			$i;
			$q = mysqli_query($con,"select * from tree where userid='$temp_under_userid'");
			$r = mysqli_fetch_array($q);
			$current_temp_side_count = $r[$temp_side_count]+1;
			$temp_under_userid;
			$temp_side_count;
			mysqli_query($con,"update tree set `$temp_side_count`=$current_temp_side_count where userid='$temp_under_userid'");
			
			
			if($temp_under_userid!=""){
				$income_data = income($temp_under_userid);
				$temp_left_count = $tree_data['leftcount'];
					$temp_center_count = $tree_data['centercount'];
					$temp_right_count = $tree_data['rightcount'];
					$new_current_bal = $income_data['current_bal']+(15-$i);
					mysqli_query($con,"update income set current_bal='$new_current_bal' where userid='$temp_under_userid' limit 1");	
					//$new_total_bal = $income_data['total_bal']+100;
				//check capping
				//$income_data['day_bal'];
				/*if($income_data['day_bal']<$capping){
					$tree_data = tree($temp_under_userid);
					
					//check leftplusright
					//$tree_data['leftcount'];
					//$tree_data['rightcount'];
					//$leftplusright;
					
					$temp_left_count = $tree_data['leftcount'];
					$temp_center_count = $tree_data['centercount'];
					$temp_right_count = $tree_data['rightcount'];
				
					//Both left and right side should at least 1 user
			/*		if($temp_left_count>0 && $temp_right_count>0){
						if($temp_side=='left'){
							$temp_left_count;
							$temp_right_count;
							if($temp_left_count<=$temp_right_count){
								
								$new_day_bal = $income_data['day_bal']+100;
								$new_current_bal = $income_data['current_bal']+100;
								$new_total_bal = $income_data['total_bal']+100;
								
								//update income
								mysqli_query($con,"update income set day_bal='$new_day_bal', current_bal='$new_current_bal', total_bal='$new_total_bal' where userid='$temp_under_userid' limit 1");	
							
							}
						}
						else{
							if($temp_right_count<=$temp_left_count){
						
								$new_day_bal = $income_data['day_bal']+100;
								$new_current_bal = $income_data['current_bal']+100;
								$new_total_bal = $income_data['total_bal']+100;
								$temp_under_userid;
								//update income
								if(mysqli_query($con,"update income set day_bal='$new_day_bal', current_bal='$new_current_bal', total_bal='$new_total_bal' where userid='$temp_under_userid'")){
									
								}
							}
						}
					}//Both left and right side should at least 1 user
					
				}*/
				//change under_userid
			    $next_under_userid = getUnderId($temp_under_userid);
				
				$temp_side = getUnderIdPlace($temp_under_userid);
				$temp_side_count = $temp_side.'count';
				
				$temp_under_userid = $next_under_userid;
					
				
				$i++;
	
			}
			
			//Chaeck for the last user
			if($temp_under_userid==""){
				$total_count=0;
			}
			
			
		}//Loop
		
		
		
		
		echo mysqli_error($con);
		
		echo '<script>alert("Testing success.");</script>';
	}
	
}
/*$query = mysqli_query($con, "select * from tree where userid = '$userid'");
$result = mysqli_fetch_array($query);
$leftc = $result['left'];
$rightc = $result['right'];
$centerc = $result['center'];
for(i=0;i<=$leftc;i++){
$sum=0;
$leftsum=15-i;
$sum= $leftsum+$sum;

}*/

?><!--/join user-->
<?php 
//functions
function pin_check($pin){
	global $con,$userid;
	
	$query = mysqli_query($con,"select * from pin_list where pin='$pin' and userid='$userid' and status='open'");
	if(mysqli_num_rows($query)>0){
		return true;
	}
	else{
		return false;
	}
}
function email_check($email){
	global $con;
	
	$query =mysqli_query($con,"select * from user where email='$email'");
	if(mysqli_num_rows($query)>0){
		return false;
	}
	else{
		return true;
	}
}
function side_check($email,$side){
	global $con;
	
	$query =mysqli_query($con,"select * from tree where userid='$email'");
	$result = mysqli_fetch_array($query);
	$side_value = $result[$side];
	if($side_value==''){
		return true;
	}
	else{
		return false;
	}
}
function income($userid){
	global $con;
	$data = array();
	$query = mysqli_query($con,"select * from income where userid='$userid'");
	$result = mysqli_fetch_array($query);
	//$data['day_bal'] = $result['day_bal'];
	$data['current_bal'] = $result['current_bal'];
	$data['total_bal'] = $result['total_bal'];
	
	return $data;
}
function tree($userid){
	global $con;
	$data = array();
	$query = mysqli_query($con,"select * from tree where userid='$userid'");
	$result = mysqli_fetch_array($query);
	$data['left'] = $result['left'];
	$data['center'] = $result['center'];
	$data['right'] = $result['right'];
	$data['leftcount'] = $result['leftcount'];
	$data['centercount'] = $result['centercount'];
	$data['rightcount'] = $result['rightcount'];
	
	return $data;
}
function getUnderId($userid){
	global $con;
	$query = mysqli_query($con,"select * from user where email='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['under_userid'];
}
function getUnderIdPlace($userid){
	global $con;
	$query = mysqli_query($con,"select * from user where email='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['side'];
	
	
}
function underid_place($next_under_userid){
global $con;
$query = mysqli_query($con, "select * from tree where userid = '$next_under_userid'");
$result = mysqli_fetch_array($query);
if(left=='$temp_under_userid')
{
return $result[`left`];
}
if(right == '$temp_under_userid'){

return $result[`right`];
}
else
{
return $result[`center`];
}


}



?>