<?php
include('../../../koneksi.php');
include('function2.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$statement = $connection->prepare("
			INSERT INTO login (nama, username, password, akses) 
			VALUES (:nama, :username, :password, :akses)
		");
		$result = $statement->execute(
			array(
				':nama'	=>	$_POST["nama"],
				':username'	=>	$_POST["username"],
				':password'	=>	$_POST["password"],
				':akses'	=>	$_POST["akses"],
			)
		);
		if(!empty($result))
		{
			echo 'User Telah Ditambahkan';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE login 
			SET nama = :nama, username = :username, password = :password  , akses = :akses   WHERE id = :id"
		);
		$result = $statement->execute(
			array(
				':nama'	=>	$_POST["nama"],
				':username'	=>	$_POST["username"],
				':password'	=>	$_POST["password"],
				':akses'	=>	$_POST["akses"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'User Telah Disunting';
		}
	}
}

?>