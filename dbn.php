<?php
   
function getJSONFromDB($sql){
   $host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = ims";
   $credentials = "user = postgres password=123456";

   $conn = pg_connect( "$host $port $dbname $credentials"  );
	//echo $sql;
	$result = pg_query($conn, $sql)or die(pg_result_error($$conn));
	$arr=array();
	//print_r($result);
	while($row = pg_fetch_assoc($result)) {
		$arr[]=$row;
		
	}
	return json_encode($arr);
}

function deleteFromDB($sql){
   $host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = ims";
   $credentials = "user = postgres password=123456";

   $conn = pg_connect( "$host $port $dbname $credentials"  );
	//echo $sql;
	$result = pg_query($conn, $sql)or die(pg_result_error($$conn));
	return true;
}
function insertIntoDB($sql){
	$host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = ims";
   $credentials = "user = postgres password=123456";

   $conn = pg_connect( "$host $port $dbname $credentials");
	//echo $sql;
	$result = pg_query($conn, $sql)or die(pg_result_error($$conn));	
}
function updateIntoDB($sql)
{
	$host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = ims";
   $credentials = "user = postgres password=123456";

   $conn = pg_connect( "$host $port $dbname $credentials"  );
	//echo $sql;
	$result = pg_query($conn, $sql)or die(pg_result_error($$conn));
}

?>