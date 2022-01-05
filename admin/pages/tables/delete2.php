<?php

include('../../../koneksi.php');
include("function2.php");

if(isset($_POST["user_id"]))
{
	$statement = $connection->prepare(
		"DELETE FROM login WHERE id = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["user_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'User Telah Dihapus';
	}
}



?>