<?php



function get_total_all_records()
{
	include('../../../koneksi.php');
	$statement = $connection->prepare("SELECT * FROM login");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>