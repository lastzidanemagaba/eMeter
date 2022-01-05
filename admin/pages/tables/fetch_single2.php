<?php
include('../../../koneksi.php');
include('function2.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM login 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nama"] = $row["nama"];
		$output["username"] = $row["username"];
		$output["password"] = $row["password"];
		$output["akses"] = $row["akses"];
		
	}
	echo json_encode($output);
}
?>