<?php
include('php-includes/connect.php');

$userid = $_SESSION['userid'];
$capping = 500;
$date =  date(" jS \of F Y");

?>
<?php
if(isset($_POST['join_user'])){
	$side='';
	$pin = mysqli_real_escape_string($con,$_POST['pin']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$mobile = mysqli_real_escape_string($con,$_POST['mobile']);
	$address = mysqli_real_escape_string($con,$_POST['address']);
	$name = mysqli_real_escape_string($con,$_POST['name']);
	$dob = mysqli_real_escape_string($con,$_POST['dob']);
	$account = mysqli_real_escape_string($con,$_POST['gender']);
	$under_userid = mysqli_real_escape_string($con,$_POST['under_userid']); 
	$side = mysqli_real_escape_string($con,$_POST['side']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
	$country = mysqli_real_escape_string($con,$_POST['country']);
	$gender = mysqli_real_escape_string($con,$_POST['gender']);
	$document = mysqli_real_escape_string($con,$_POST['document']);
	$tc = mysqli_real_escape_string($con,$_POST['tc']);
	$course = mysqli_real_escape_string($con,$_POST['course']);
	$status= "not approved";
	$image = "http://localhost/mlm/images/profile.png";
	
	
	$flag = 0;
	
	if($email!='' && $mobile!='' && $address!='' && $under_userid!='' && $side!='' && $password!=''){
	if($tc!=''){
	 if($password == $cpassword)
	 {
		
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
					
					echo '<script>alert("Invalid TrainerId.");</script>';
				}
			}
			else{
				
				echo '<script>alert("This Email is already used.");</script>';
			}
			}
			else{
			  echo '<script>alert("Password and Confirm password should be same");</script>';
			}
			}
			else{
			  echo '<script>alert("Please accept terms and conditions to proceed");</script>';
			}
		
	}
	else{
		
		echo '<script>alert("Please fill all the fields.");</script>';
	}
	
	
	if($flag==1){
		
		
		//$query = mysqli_query($con,"insert into user(`email`,`password`,`mobile`,`address`,`account`,`under_userid`,`side`) values('$email','$password','$mobile','$address','$account','$under_userid','$side')");
		$query = mysqli_query($con, "insert into usr(`fullname`, `dob`, `gender`,`country`, `email`, `password` ,`mobile`, `address`, `sponsor`, `position`,`status`, `image`, `doj`, `document_no`, `tc`, `course`) values('$name', '$dob', '$gender','$country' , '$email', '$password', '$mobile', '$address', '$under_userid', '$side','$status','$image', '$date', '$document', '$tc', '$course')");
		
		
		$query = mysqli_query($con,"insert into tree(`userid`) values('$email')");
		
		
		$query = mysqli_query($con,"update tree set `$side`='$email' where userid='$under_userid'");
		
		
		//$query = mysqli_query($con,"update pin_list set status='close' where pin='$pin'");
		
		
		//$query = mysqli_query($con,"insert into income (`userid`) values('$email')");
		$query = mysqli_query($con,"insert into income(`userid`) values('$email')");
		echo mysqli_error($con);
		
		$temp_under_userid = $under_userid;
		$temp_side_count = $side.'count';
		
		$temp_side = $side;
		$total_count=1;
		$i=0;
		while($total_count==1){
			$i;
			$q = mysqli_query($con,"select * from tree where userid='$temp_under_userid'");
			$r = mysqli_fetch_array($q);
			$current_temp_side_count = $r[$temp_side_count]+1;
			$temp_under_userid;
			$temp_side_count;
			mysqli_query($con,"update tree set `$temp_side_count`=$current_temp_side_count where userid='$temp_under_userid'");
	//		$countone = $r['onecount'];
		//	$counttwo = $r['twocount'];
		//	$countthree = $r['threecount'];
		//	$countfour = $r['fourcount'];
			//$countfive = $r['fivecount'];
			//$countsix = $r['sixcount'];
			//$countseven = $r['sevencount'];
			//$counteight = $r['eightcount'];
			//$countnine = $r['ninecount'];
			//$countten = $r['tencount'];
		//$totalcount = $countone + $counttwo + $countthree + $countfour + $countfive + $countsix + $countseven + $counteight + $countnine +$countten;
		//mysqli_query($con,"update tree set totalcount = '$totalcount' where  userid = '$temp_under_userid'");
			
			
			if($temp_under_userid!="" && $i<10){
				$income_data = income($temp_under_userid);
				$temp_one_count = $tree_data['onecount'];
					$temp_two_count = $tree_data['twocount'];
					$temp_three_count = $tree_data['threecount'];
					$temp_four_count = $tree_data['fourcount'];
					$temp_five_count = $tree_data['fivecount'];
					$temp_six_count = $tree_data['sixcount'];
					$temp_seven_count = $tree_data['sevencount'];
					$temp_eight_count = $tree_data['eightcount'];
					$temp_nine_count = $tree_data['ninecount'];
					$temp_ten_count = $tree_data['tencount'];
					if($i==0){
					$new_current_bal = $income_data['current_bal']+5;
					$new_total_bal = $income_data['total_bal']+5;
					mysqli_query($con,"update income set current_bal='$new_current_bal', total_bal='$new_total_bal' where userid='$temp_under_userid' limit 1");	
					}
					else{
					$new_current_bal = $income_data['current_bal']+1;
					$new_total_bal = $income_data['total_bal']+1;
					mysqli_query($con,"update income set current_bal='$new_current_bal', total_bal='$new_total_bal' where userid='$temp_under_userid' limit 1");	}
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
			  
					
				
				$i++;
	
			}
			  $next_under_userid = getUnderId($temp_under_userid);
				
				$temp_side = getUnderIdPlace($temp_under_userid);
				$temp_side_count = $temp_side.'count';
				
				$temp_under_userid = $next_under_userid;
			
			
	//Chaeck for the last user
			if($temp_under_userid==""){
				$total_count=0;
		}
			
			
		}//Loop
		
		
		
		
		
		echo mysqli_error($con);
		
		echo '<script>alert("Joined Successfully. Your account will be approved within 24hrs.");</script>';
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
	
	$query =mysqli_query($con,"select * from usr where email='$email'");
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
function getUnderId($userid){
	global $con;
	$query = mysqli_query($con,"select * from usr where email='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['sponsor'];
}
function getUnderIdPlace($userid){
	global $con;
	$query = mysqli_query($con,"select * from usr where email='$userid'");
	$result = mysqli_fetch_array($query);
	return $result['position'];
	
	
}
function underid_place($next_under_userid){
global $con;
$query = mysqli_query($con, "select * from tree where userid = '$next_under_userid'");
$result = mysqli_fetch_array($query);
if(one=='$temp_under_userid')
{
return $result[`one`];
}
if(two == '$temp_under_userid'){

return $result[`two`];
}
if(three == '$temp_under_userid'){

return $result[`three`];
}if(four == '$temp_under_userid'){

return $result[`four`];
}
if(five == '$temp_under_userid'){

return $result[`five`];
}
if(six == '$temp_under_userid'){

return $result[`six`];
}
if(seven == '$temp_under_userid'){

return $result[`seven`];
}
if(eight == '$temp_under_userid'){

return $result[`eight`];
}
if(nine == '$temp_under_userid'){

return $result[`nine`];
}
else
{
return $result[`ten`];
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

    <title>PayProg- Registration</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 
 <link rel='stylesheet' type='text/css' href='stylesheet.css'/>
        <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css'/>
        
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
		<script language="javascript" type="text/javascript" src="datetimepicker.js">
</script>
<script src="https:ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http:code.jquery.com/jquery.js"></script>
<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>



<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sign Up</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-4">
                    	<form method="post">
                           
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="FullName"required>
                            </div>
							 <div class="form-group">
                                <label>Date Of Birth</label>
                                <input type="text" name="dob" class="form-control" id="" placeholder="dd/mm/yyyy" required>   
                            </div>
							<div class="form-group">
                                <label>Gender</label>
                                <input type="radio" name="gender" value="male" >Male
								 <input type="radio" name="gender" value="female">Female
								  <input type="radio" name="gender" value="Other">Other
                            </div>
							 <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email Address"required>
                            </div>
							 <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
							 <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required>
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" class="form-control" placeholder="Contact Number" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address" required>
                            </div>
							 <div class="form-group">
                                <label>Country</label>
                               <select class="form-control" name="country" >
							   <option value="none">Select</option>
	<option value="AFG">Afghanistan</option>
	<option value="ALA">Åland Islands</option>
	<option value="ALB">Albania</option>
	<option value="DZA">Algeria</option>
	<option value="ASM">American Samoa</option>
	<option value="AND">Andorra</option>
	<option value="AGO">Angola</option>
	<option value="AIA">Anguilla</option>
	<option value="ATA">Antarctica</option>
	<option value="ATG">Antigua and Barbuda</option>
	<option value="ARG">Argentina</option>
	<option value="ARM">Armenia</option>
	<option value="ABW">Aruba</option>
	<option value="AUS">Australia</option>
	<option value="AUT">Austria</option>
	<option value="AZE">Azerbaijan</option>
	<option value="BHS">Bahamas</option>
	<option value="BHR">Bahrain</option>
	<option value="BGD">Bangladesh</option>
	<option value="BRB">Barbados</option>
	<option value="BLR">Belarus</option>
	<option value="BEL">Belgium</option>
	<option value="BLZ">Belize</option>
	<option value="BEN">Benin</option>
	<option value="BMU">Bermuda</option>
	<option value="BTN">Bhutan</option>
	<option value="BOL">Bolivia, Plurinational State of</option>
	<option value="BES">Bonaire, Sint Eustatius and Saba</option>
	<option value="BIH">Bosnia and Herzegovina</option>
	<option value="BWA">Botswana</option>
	<option value="BVT">Bouvet Island</option>
	<option value="BRA">Brazil</option>
	<option value="IOT">British Indian Ocean Territory</option>
	<option value="BRN">Brunei Darussalam</option>
	<option value="BGR">Bulgaria</option>
	<option value="BFA">Burkina Faso</option>
	<option value="BDI">Burundi</option>
	<option value="KHM">Cambodia</option>
	<option value="CMR">Cameroon</option>
	<option value="CAN">Canada</option>
	<option value="CPV">Cape Verde</option>
	<option value="CYM">Cayman Islands</option>
	<option value="CAF">Central African Republic</option>
	<option value="TCD">Chad</option>
	<option value="CHL">Chile</option>
	<option value="CHN">China</option>
	<option value="CXR">Christmas Island</option>
	<option value="CCK">Cocos (Keeling) Islands</option>
	<option value="COL">Colombia</option>
	<option value="COM">Comoros</option>
	<option value="COG">Congo</option>
	<option value="COD">Congo, the Democratic Republic of the</option>
	<option value="COK">Cook Islands</option>
	<option value="CRI">Costa Rica</option>
	<option value="CIV">Côte d'Ivoire</option>
	<option value="HRV">Croatia</option>
	<option value="CUB">Cuba</option>
	<option value="CUW">Curaçao</option>
	<option value="CYP">Cyprus</option>
	<option value="CZE">Czech Republic</option>
	<option value="DNK">Denmark</option>
	<option value="DJI">Djibouti</option>
	<option value="DMA">Dominica</option>
	<option value="DOM">Dominican Republic</option>
	<option value="ECU">Ecuador</option>
	<option value="EGY">Egypt</option>
	<option value="SLV">El Salvador</option>
	<option value="GNQ">Equatorial Guinea</option>
	<option value="ERI">Eritrea</option>
	<option value="EST">Estonia</option>
	<option value="ETH">Ethiopia</option>
	<option value="FLK">Falkland Islands (Malvinas)</option>
	<option value="FRO">Faroe Islands</option>
	<option value="FJI">Fiji</option>
	<option value="FIN">Finland</option>
	<option value="FRA">France</option>
	<option value="GUF">French Guiana</option>
	<option value="PYF">French Polynesia</option>
	<option value="ATF">French Southern Territories</option>
	<option value="GAB">Gabon</option>
	<option value="GMB">Gambia</option>
	<option value="GEO">Georgia</option>
	<option value="DEU">Germany</option>
	<option value="GHA">Ghana</option>
	<option value="GIB">Gibraltar</option>
	<option value="GRC">Greece</option>
	<option value="GRL">Greenland</option>
	<option value="GRD">Grenada</option>
	<option value="GLP">Guadeloupe</option>
	<option value="GUM">Guam</option>
	<option value="GTM">Guatemala</option>
	<option value="GGY">Guernsey</option>
	<option value="GIN">Guinea</option>
	<option value="GNB">Guinea-Bissau</option>
	<option value="GUY">Guyana</option>
	<option value="HTI">Haiti</option>
	<option value="HMD">Heard Island and McDonald Islands</option>
	<option value="VAT">Holy See (Vatican City State)</option>
	<option value="HND">Honduras</option>
	<option value="HKG">Hong Kong</option>
	<option value="HUN">Hungary</option>
	<option value="ISL">Iceland</option>
	<option value="IND">India</option>
	<option value="IDN">Indonesia</option>
	<option value="IRN">Iran, Islamic Republic of</option>
	<option value="IRQ">Iraq</option>
	<option value="IRL">Ireland</option>
	<option value="IMN">Isle of Man</option>
	<option value="ISR">Israel</option>
	<option value="ITA">Italy</option>
	<option value="JAM">Jamaica</option>
	<option value="JPN">Japan</option>
	<option value="JEY">Jersey</option>
	<option value="JOR">Jordan</option>
	<option value="KAZ">Kazakhstan</option>
	<option value="KEN">Kenya</option>
	<option value="KIR">Kiribati</option>
	<option value="PRK">Korea, Democratic People's Republic of</option>
	<option value="KOR">Korea, Republic of</option>
	<option value="KWT">Kuwait</option>
	<option value="KGZ">Kyrgyzstan</option>
	<option value="LAO">Lao People's Democratic Republic</option>
	<option value="LVA">Latvia</option>
	<option value="LBN">Lebanon</option>
	<option value="LSO">Lesotho</option>
	<option value="LBR">Liberia</option>
	<option value="LBY">Libya</option>
	<option value="LIE">Liechtenstein</option>
	<option value="LTU">Lithuania</option>
	<option value="LUX">Luxembourg</option>
	<option value="MAC">Macao</option>
	<option value="MKD">Macedonia, the former Yugoslav Republic of</option>
	<option value="MDG">Madagascar</option>
	<option value="MWI">Malawi</option>
	<option value="MYS">Malaysia</option>
	<option value="MDV">Maldives</option>
	<option value="MLI">Mali</option>
	<option value="MLT">Malta</option>
	<option value="MHL">Marshall Islands</option>
	<option value="MTQ">Martinique</option>
	<option value="MRT">Mauritania</option>
	<option value="MUS">Mauritius</option>
	<option value="MYT">Mayotte</option>
	<option value="MEX">Mexico</option>
	<option value="FSM">Micronesia, Federated States of</option>
	<option value="MDA">Moldova, Republic of</option>
	<option value="MCO">Monaco</option>
	<option value="MNG">Mongolia</option>
	<option value="MNE">Montenegro</option>
	<option value="MSR">Montserrat</option>
	<option value="MAR">Morocco</option>
	<option value="MOZ">Mozambique</option>
	<option value="MMR">Myanmar</option>
	<option value="NAM">Namibia</option>
	<option value="NRU">Nauru</option>
	<option value="NPL">Nepal</option>
	<option value="NLD">Netherlands</option>
	<option value="NCL">New Caledonia</option>
	<option value="NZL">New Zealand</option>
	<option value="NIC">Nicaragua</option>
	<option value="NER">Niger</option>
	<option value="NGA">Nigeria</option>
	<option value="NIU">Niue</option>
	<option value="NFK">Norfolk Island</option>
	<option value="MNP">Northern Mariana Islands</option>
	<option value="NOR">Norway</option>
	<option value="OMN">Oman</option>
	<option value="PAK">Pakistan</option>
	<option value="PLW">Palau</option>
	<option value="PSE">Palestinian Territory, Occupied</option>
	<option value="PAN">Panama</option>
	<option value="PNG">Papua New Guinea</option>
	<option value="PRY">Paraguay</option>
	<option value="PER">Peru</option>
	<option value="PHL">Philippines</option>
	<option value="PCN">Pitcairn</option>
	<option value="POL">Poland</option>
	<option value="PRT">Portugal</option>
	<option value="PRI">Puerto Rico</option>
	<option value="QAT">Qatar</option>
	<option value="REU">Réunion</option>
	<option value="ROU">Romania</option>
	<option value="RUS">Russian Federation</option>
	<option value="RWA">Rwanda</option>
	<option value="BLM">Saint Barthélemy</option>
	<option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
	<option value="KNA">Saint Kitts and Nevis</option>
	<option value="LCA">Saint Lucia</option>
	<option value="MAF">Saint Martin (French part)</option>
	<option value="SPM">Saint Pierre and Miquelon</option>
	<option value="VCT">Saint Vincent and the Grenadines</option>
	<option value="WSM">Samoa</option>
	<option value="SMR">San Marino</option>
	<option value="STP">Sao Tome and Principe</option>
	<option value="SAU">Saudi Arabia</option>
	<option value="SEN">Senegal</option>
	<option value="SRB">Serbia</option>
	<option value="SYC">Seychelles</option>
	<option value="SLE">Sierra Leone</option>
	<option value="SGP">Singapore</option>
	<option value="SXM">Sint Maarten (Dutch part)</option>
	<option value="SVK">Slovakia</option>
	<option value="SVN">Slovenia</option>
	<option value="SLB">Solomon Islands</option>
	<option value="SOM">Somalia</option>
	<option value="ZAF">South Africa</option>
	<option value="SGS">South Georgia and the South Sandwich Islands</option>
	<option value="SSD">South Sudan</option>
	<option value="ESP">Spain</option>
	<option value="LKA">Sri Lanka</option>
	<option value="SDN">Sudan</option>
	<option value="SUR">Suriname</option>
	<option value="SJM">Svalbard and Jan Mayen</option>
	<option value="SWZ">Swaziland</option>
	<option value="SWE">Sweden</option>
	<option value="CHE">Switzerland</option>
	<option value="SYR">Syrian Arab Republic</option>
	<option value="TWN">Taiwan, Province of China</option>
	<option value="TJK">Tajikistan</option>
	<option value="TZA">Tanzania, United Republic of</option>
	<option value="THA">Thailand</option>
	<option value="TLS">Timor-Leste</option>
	<option value="TGO">Togo</option>
	<option value="TKL">Tokelau</option>
	<option value="TON">Tonga</option>
	<option value="TTO">Trinidad and Tobago</option>
	<option value="TUN">Tunisia</option>
	<option value="TUR">Turkey</option>
	<option value="TKM">Turkmenistan</option>
	<option value="TCA">Turks and Caicos Islands</option>
	<option value="TUV">Tuvalu</option>
	<option value="UGA">Uganda</option>
	<option value="UKR">Ukraine</option>
	<option value="ARE">United Arab Emirates</option>
	<option value="GBR">United Kingdom</option>
	<option value="USA">United States</option>
	<option value="UMI">United States Minor Outlying Islands</option>
	<option value="URY">Uruguay</option>
	<option value="UZB">Uzbekistan</option>
	<option value="VUT">Vanuatu</option>
	<option value="VEN">Venezuela, Bolivarian Republic of</option>
	<option value="VNM">Viet Nam</option>
	<option value="VGB">Virgin Islands, British</option>
	<option value="VIR">Virgin Islands, U.S.</option>
	<option value="WLF">Wallis and Futuna</option>
	<option value="ESH">Western Sahara</option>
	<option value="YEM">Yemen</option>
	<option value="ZMB">Zambia</option>
	<option value="ZWE">Zimbabwe</option>
	<option value="other">other</option>
</select>
                            </div>
							 <div class="form-group">
                                <label>Course</label>
                               <select class="form-control" name="course" >
							   <option value="none">Select</option>
	<option value="DIGITAL MARKETING">Digital Marketing</option></select></div>
							
                           
                            <div class="form-group">
							
							
                                <label>Trainer's UserId</label>
                                <input type="text" name="under_userid" class="form-control" placeholder="Trainer's Id (Sponsor)" required>
								**If you don't have Trainer's Id use this** 
								<?PHP
							$query = mysqli_query($con, "select * from tree");
							$result = mysqli_fetch_array($query);
							while($query)
							{
							$sum = $result['onecount']+ $result['twocount']+$result['threecount']+$result['fourcount']+$result['fivecount']+$result['sixcount']+$result['sevencount']+$result['eightcount']+$result['ninecount']+$result['tencount'];
							if($sum == 0)
							{
							echo $result['userid'];
							break;
							}
							}
							
							?>
                            </div>
							 
                            <div class="form-group">
                                <label>Position</label><br>
                                <input type="radio" name="side" value="one"> 1
								 <input type="radio" name="side" value="two"> 2
                                <input type="radio" name="side" value="three"> 3
								<input type="radio" name="side" value="four"> 4
								 <input type="radio" name="side" value="five"> 5
                                <input type="radio" name="side" value="six"> 6
								<input type="radio" name="side" value="seven"> 7
								 <input type="radio" name="side" value="eight"> 8
                                <input type="radio" name="side" value="nine"> 9
								<input type="radio" name="side" value="ten"> 10
                            </div>
							
							 <div class="form-group">
							
                        	<input type="checkbox" name="tc" class="btn btn-primary" value="T&C Accepted"> <label>I have read carefully and agree with all Terms & Condition associated with PayProg.com</label>
                        </div>
                            
                            <div class="form-group">
                        	<input type="submit" name="join_user" class="btn btn-primary" value="Register">
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
