<?php
include('php-includes/check-login.php');
include('php-includes/connect.php');
$userid = $_SESSION['userid'];
?>


<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">PayProg</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-message">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                       
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
				
				
                    <ul class="nav" id="side-menu">
				  	<center><img src="<?php  $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['image'];    ?>" height="100" width="100"></center>
																<center><?php $query = mysqli_query($con, "select * from usr where email = '$userid'");
													            $result = mysqli_fetch_array($query);  
																echo $result['fullname']; ?>  </center>            
                        <li>
                            <a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                       
                        <li>
                            <a href="join.php"><i class="fa fa-adjust fa-fw"></i>Refer</a>
                        </li>
                        <li>
                            <a href="tree.php"><i class="fa fa-adjust fa-hub"></i>Network</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>