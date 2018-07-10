<?php 
session_start();
if($_SESSION["admin"] == "false"){
	header("location: Login.php");
}
require("dbn.php");
include("admin_side_bar.html");
$result = getJSONFromDB("select * from vendor");
$result = json_decode($result, true);

if(isset($_GET["did"]))
{//deleting a customer
	$id = $_GET["did"];
	deleteFromDB("delete from vendor where vendor_id = $id");
	header("Location: vendor_details_admin.php");
}
if(isset($_REQUEST["create_new_vendor"]))
{
	if(strlen((string)$_REQUEST["vnd_name"])!=0)
	{
		$name = $_REQUEST["vnd_name"];
		$contact = $_REQUEST["vnd_contact_no"];
		$email = $_REQUEST["vnd_email"];
		$address = $_REQUEST["vnd_address"];

		$idresult = getJSONFromDB("select max(vendor_id) from vendor");
		$idresult = json_decode($idresult, true);
		$id = $idresult[0]["max"];
		$id = $id + 1;
		insertIntoDB("insert into vendor values ('$id', '$name', '$contact', '$email', '$address')");

		header("Location: vendor_details_admin.php");		
	}
	else{
		header("Location: vendor_details_admin.php");
	}
	
}
if(isset($_REQUEST["update_vendor"]) )
{
	if(!isset($_REQUEST["vnd_id"]) || strlen((String)$_REQUEST["vnd_id"])==0)
	{
		header("Location: vendor_details_admin.php");
	}
	$id = $_REQUEST["vnd_id"];
	$result = getJSONFromDB("select * from vendor where vendor_id = $id");
	$result = json_decode($result, true);
	if(isset($_REQUEST["vnd_name"]) && strlen((String)$_REQUEST["vnd_name"])!=0)
	{
		$name = $_REQUEST["vnd_name"];
	}
	else{
		$name = $result[0]["vendor_name"];
	}
	if(isset($_REQUEST["vnd_contact_no"]) && strlen($_REQUEST["vnd_contact_no"])!=0)
	{
		$contact = $_REQUEST["vnd_contact_no"];
	}
	else{
		$contact = $result[0]["vendor_contact_no"];
	}
	if(isset($_REQUEST["vnd_email"]) && strlen($_REQUEST["vnd_email"])!=0)
	{
		$email = $_REQUEST["vnd_email"];
	}
	else{
		$email = $result[0]["vendor_email"];
	}
	if(isset($_REQUEST["vnd_address"]) && strlen($_REQUEST["vnd_address"])!=0)
	{
		$address = $_REQUEST["vnd_address"];
	}
	else{
		$address = $result[0]["vendor_address"];
	}
	updateIntoDB("update vendor set vendor_name = '$name', vendor_contact_no = '$contact', 
		vendor_email = '$email', vendor_address = '$address' where vendor_id = $id");
	header("Location: vendor_details_admin.php");

}


?>

<!DOCTYPE html>
<html>
<head>
	<style>
		#bd{
			margin-left: 260px;
		}
		.left{
			width: 400px;
			float: left;
		}
		.right{
			width: 350px;
			float: right;
		}
		#tbb{
			border-collapse: collapse;
		}
		#tbb th{
			text-align: left;
			background-color: #3a6070;
			color: #FFF;
			padding: 4px 30px 4px 8px;
		}
		#tbb td{
			border : 1px solid #e3e3e3;
			padding: 4px 8px;
		}
		#cd{
			margin-left: 300px;
		}
		#myInput{
			width: 300px;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
		}
		#sb{
			margin-left: 260px;
		}
	</style>
<script>
function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("tbb");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>
	
	
</head>
<body>
	
	<br><br>
	<div id="sb">
		<input id='myInput' class="w3-input w3-border" 
		align="middle" onkeyup='searchTable()' 
		type='text' placeholder='Search Here'
		style="height:100%" >
	</div>
	<div>
	<div id="bd">
		<div class = "left">
			<table id="tbb">
				<h2>Vendor Information</h2>
				<th>Vendor ID</th> <th>Name</th> <th> Contact</th> <th> Email </th> <th>Address</th> <th>Delete</th>
				<?php 
					for($i=0;$i<sizeof($result);$i++){
						$id = $result[$i]["vendor_id"];
						$name = $result[$i]["vendor_name"];
						$address = $result[$i]["vendor_address"];
						$email = $result[$i]["vendor_email"];
						$contact = $result[$i]["vendor_contact_no"];
						echo "<tr>
							<td>$id</td>
							<td>$name</td>
							<td>$contact</td>
							<td>$email</td>
							<td>$address</td>
							<td><a href='vendor_details_admin.php?did=$id'>Delete</a></td>
						 </tr>";
					}
				 ?>
			</table>
		</div>
		<div class="right">
			<form action="vendor_details_admin.php" method="POST">
				<table id="tbb">
					<tr>
						<th>Add new Vendor</th>
					</tr>

					<tr>
						<td>Name</td>
						<td><input type="text" name="vnd_name"></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><input type="text" name="vnd_address"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="vnd_email"></td>
					</tr>
					<tr>
						<td>Contact No</td>
						<td><input type="text" name="vnd_contact_no"></td>
					</tr>
					<tr>
						<td></td>
						<td> <input type="submit" name="create_new_vendor" value="Add Vendor"></td>
					</tr>
				</table>
			</form>
		</div>
		<div class="right">
		<br><br>
			<form action="vendor_details_admin.php" method="POST">
				<table id="tbb">
					<tr>
						<th>Update</th>
					</tr>
					<tr>
						<td>Enter ID</td>
						<td><input type="number" name="vnd_id"></td>
					</tr>
					<tr>
						<td>New Address</td>
						<td><input type="text" name="vnd_address"></td>
					</tr>
					<tr>
						<td>New Email</td>
						<td><input type="text" name="vnd_email"></td>
					</tr>
					<tr>
						<td>New Contact No</td>
						<td><input type="text" name="vnd_contact_no"></td>
					</tr>

					<tr>
						<td></td>
						<td> <input type="submit" name="update_vendor" value="Update Vendor"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	</div>
</body>
</html>

