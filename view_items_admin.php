<?php 
//session_start();
session_start();
if($_SESSION["admin"] == "false"){
	header("location: Login.php");
}
require("dbn.php");
include("admin_side_bar.html");
$result = getJSONFromDB("select items.item_id, items.item_name, categories.category_name, items.item_price, items.item_stock, items.production_date
 from items 
 INNER JOIN categories on items.category_id = categories.category_id");
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
			<h2>List of Items</h2>
				<th>Item ID</th> <th>Name</th> <th> Category </th> <th> Price </th> <th>Stock </th> <th>Production Date </th> 
				<?php 
					for($i=0;$i<sizeof($result);$i++){
						$id = $result[$i]["item_id"];
						$item_name = $result[$i]["item_name"];
						$category = $result[$i]["category_name"];
						$price = $result[$i]["item_price"];
						$stock = $result[$i]["item_stock"];
						$date = $result[$i]["production_date"];
						echo "<tr>
							<td>$id</td>
							<td>$item_name</td>
							<td>$category</td>
							<td>$price</td>
							<td>$stock</td>
							<td>$date</td>
						 </tr>";
					}
				 ?>
			</table>
		</div>

	</div>
</body>
</html>

