<?php
include('../../../koneksi.php');
include('function2.php');
$query = '';
$output = array();
$query .= "SELECT * FROM login ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE nama LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR username LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR akses LIKE "%'.$_POST["search"]["value"].'%" ';
	
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= '';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
	$aksesye = '';
	if($row["akses"] == 0)
	{
		$aksesye = 'SuperAdmin';
	}
	else if($row["akses"] == 1)
	{
		$aksesye = 'Admin';
	}
	else if($row["akses"] == 2)
	{
		$aksesye = 'Atasan';
	}
	$sub_array = array();
	$sub_array[] = $_POST['start']+1;
	$sub_array[] = '<center>'.$row["id"].'</center>';
	$sub_array[] = '<center>'.$row["nama"].'</center>';
	$sub_array[] = '<center>'.$row["username"].'</center>';
	$sub_array[] = '<center>'.$aksesye.'</center>';

	$sub_array[] = '
<td>
	<center>
		<button type="button" name="update" id="'.$row["id"].'" class="btn btn-info update">Sunting</button>
		
		<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger delete">Hapus</button>
	</center>
</td>';	
	

	
	$data[] = $sub_array;
	$_POST['start']++;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>