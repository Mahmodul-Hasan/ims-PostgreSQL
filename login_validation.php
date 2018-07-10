<?php
session_start();
$_SESSION['admin'] = "false";
$_SESSION['mgr'] = "false";


require("dbn.php");

$username = $_REQUEST['username'];
$pass = $_REQUEST['password'];


$sql = "select * from users where user_id = '$username' and password = '$pass'";
$result = getJSONFromDB($sql);
$result = json_decode($result, true);

echo $result;

if(isset($result[0]["user_id"]) && $result[0]["user_id"] == $username && $result[0]["password"] == $pass){
	if($result[0]["role"] == "admin" && $result[0]["status"] == "active"){
		$_SESSION['admin'] = "true";
		$_SESSION['adminid'] = $username;
		header("Location: admin.php");	
	}
	elseif ($result[0]["role"] == "mgr" && $result[0]["status"] == "active") {
		$_SESSION['mgr'] = "true";
		$_SESSION['manager_id'] = $result[0]["user_id"];
		$_SESSION['manager_pass'] = $result[0]["password"];
		header("Location: manage_orders_manager.php");
	}
	else{
		echo "<h1> You have been blocked </h1> <h3>Contact your admin to solve the issue</h3>";
	}
	
}
else
{
	header("Location: login.php");
}

?>