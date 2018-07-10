<?php 
session_start();
if($_SESSION["admin"] == "false"){
	header("location: Login.php");
}
require("dbn.php");
include("admin_side_bar.html");
$result = getJSONFromDB("select orders.order_id, items.item_name, manager.manager_name, orders.order_quantity, orders.order_date from orders INNER JOIN items on orders.item_id = items.item_id INNER JOIN manager on orders.manager_id = manager.manager_id");
$result = json_decode($result, true);
?>

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


<!DOCTYPE html>
<html>
<head>
	<style>
		#bd{
			margin-left: 260px;
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
</head>
<body>
	
	<br><br>
	<div id="sb">
		<input id='myInput' class="w3-input w3-border" 
		align="middle" onkeyup='searchTable()' 
		type='text' placeholder='Search Here'
		style="height:100%" >
	</div>
	<div id="bd">
		<div class = "left">
			<table id="tbb">
			<h2>List of Orders</h2>
				<th>Order ID</th> <th>Item</th> <th> Manager </th> <th> Quantity </th> <th>Date</th> 
				<?php 
					for($i=0;$i<sizeof($result);$i++){
						$id = $result[$i]["order_id"];
						$item_name = $result[$i]["item_name"];
						$manager_name = $result[$i]["manager_name"];
						$quantity = $result[$i]["order_quantity"];
						$date = $result[$i]["order_date"];
						echo "<tr>
							<td>$id</td>
							<td>$item_name</td>
							<td>$manager_name</td>
							<td>$quantity</td>
							<td>$date</td>
						 </tr>";
					}
				 ?>
			</table>
		</div>

	</div>
</body>
</html>

