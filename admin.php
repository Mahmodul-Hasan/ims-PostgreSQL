<?php 
session_start();
if($_SESSION["admin"] == "false"){
	header("location: Login.php");
}
require("dbn.php");
include("admin_side_bar.html");
$mostOrderMadeBy = getJSONFromDB("select customer_contact_no,customer_name from customer WHERE customer_id =
(
SELECT customer_id
    FROM orders
    GROUP BY customer_id
    ORDER BY COUNT(*) DESC
    LIMIT 1)");
$mostOrderMadeBy = json_decode($mostOrderMadeBy, true);
$mostOrderedItem = getJSONFromDB("select item_id,item_name from items WHERE item_id = 
(select item_id
 from orders
 group by item_id
order by count(*) desc
LIMIT 1)");
$mostOrderedItem = json_decode($mostOrderedItem, true);
$totalOrders = getJSONFromDB("select count(order_id) as total_order from orders");
$totalOrders = json_decode($totalOrders, true);
$totalItemsInInventory = getJSONFromDB("select COUNT(item_id) as total_items from items where item_stock > 0");
$totalItemsInInventory = json_decode($totalItemsInInventory, true);

$totalExpenses = getJSONFromDB("
select month, SUM(house_rent + electricity_bill + others) as total_expense from monthly_expense group by month order by month desc");
$totalExpenses = json_decode($totalExpenses, true);
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
			margin-left: 280px;
		}
		.left{
			width: 400px;
			float: left;
		}
		#sb{
			margin-left: 280px;
		}
		.right{
			width: 550px;
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
			<h1> Monthly Report</h1>
			<table id="tbb">
				<th>Option</th> <th>Name/Quantity</th> 
				<?php 
					$most_order_made_by = $mostOrderMadeBy[0]["customer_name"]."(".$mostOrderMadeBy[0]["customer_contact_no"].")";
					$most_ordered_item = $mostOrderedItem[0]["item_name"]."(".$mostOrderedItem[0]["item_id"].")";
					$total_orders = $totalOrders[0]["total_order"];
					$total_item_in_inventory = $totalItemsInInventory[0]["total_items"];
					echo "<tr>
						<td>Most Order Made By</td>
						<td>$most_order_made_by</td>
						</tr>
						<tr>
						<td>Most Ordered Item</td>
						<td>$most_ordered_item</td>
						</tr>
						<tr>
						<td>Total Orders</td>
						<td>$total_orders</td>
						<tr>
						<td>Total Sold Items</td>
						<td>$total_item_in_inventory</td>
					</tr>";
				 ?>
			</table>
		</div>
		<div class="right">
			<h1> Other Expenses</h1>
			<table id="tbb">
				<th>Month</th> <th>Total Expenses</th> 
				<?php 
					for($i=0;$i<sizeof($totalExpenses);$i++){
						$month = $totalExpenses[$i]["month"];
						$te = $totalExpenses[$i]["total_expense"];
						echo "<tr>
						<td>$month</td>
						<td>$te</td>
					    </tr>";
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>

