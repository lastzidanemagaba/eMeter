<?php
include('../../../koneksi.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM crud 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
	    if($row["image"] != '')
		{
			$output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
		$output["namalokasi"] = $row["namalokasi"];
		$output["hargatariflistrik"] = $row["hargatariflistrik"];
		$output["hargadaerah"] = $row["hargadaerah"];
		$output["keterangan"] = $row["keterangan"];
		
		
		
	}
	echo json_encode($output);
}
?>