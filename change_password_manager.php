<?php 
session_start();
require("dbn.php");
include("manager_side_bar.html");

	if(isset($_REQUEST["update_info"]) && isset($_REQUEST["old_pass"]) && isset($_REQUEST["new_pass"]) && isset($_REQUEST["con_pass"]))
	{	
		$op=$_REQUEST["old_pass"];
		$np=$_REQUEST["new_pass"];
		$cp=$_REQUEST["con_pass"];
		$mgr_id = $_SESSION['manager_id'];
		$mgr_pass = $_SESSION['manager_pass'];
		
		if($op == $mgr_pass && $np == $cp)
		{
			updateIntoDB("update users set password = '$cp' where user_id = $mgr_id");
			$message = "Password Changed Successfully";
			echo "<script type='text/javascript'>alert('$message');</script>";
			//header("Location: change_password_manager.php");
		}
		else
		{
			$message = "Password Changing Failed";
			echo "<script type='text/javascript'>alert('$message');</script>";
			//header("Location: change_password_manager.php");
		}
		
		
	}
?>


<!DOCTYPE HTML>

<html>
<head>
	<!-- Customized css file -->
	<link rel="stylesheet" type="text/css" href="styles/sm_edit_profile.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
	<div id="container">
		
		
		<div class="content">
			<form>
				<div class="first_block">
					<h2>Change Password</h2>
					<hr>
				
					<p>Old Password</p>
					<input type="password" placeholder="Old Password" name="old_pass">
					<p>New Password</p>
					<input type="password" placeholder="New Password" name="new_pass">
					<p>Confirm Password</p>
					<input type="password" placeholder="Confirm password" name="con_pass">
						
					<input type="submit" name="update_info" value="Done">
						
				</div>
									
			</form>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>