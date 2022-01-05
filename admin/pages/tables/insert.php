<?php
include('../../../koneksi.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$size =$_FILES['user_image']['size'];
		$max_size    = 100000;
		if ($size == 0)
		{
			echo 'Harap Mengisi Kolom Yang Kosong!';
			return;
		}
		if ($size > $max_size)
		{
			echo 'File Tidak Boleh Melebihi 100kb';
			return;
		}
		$pertamanama = $_POST["namalokasi"];
		$kode_unik = $pertamanama;
		$tak = substr('Zidane',0,6).$kode_unik;
		$statement = $connection->prepare("
			INSERT INTO crud (image,namalokasi, hargatariflistrik, hargadaerah, keterangan) 
			VALUES (:image,:namalokasi, :hargatariflistrik, :hargadaerah, :keterangan)
		");
		$result = $statement->execute(
			array(
			    ':image'  => $image,
				':namalokasi'	=>	$_POST["namalokasi"],
				':hargatariflistrik'	=>	$_POST["hargatariflistrik"],
				':hargadaerah'	=>	$_POST["hargadaerah"],
				':keterangan'	=>	$_POST["keterangan"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Telah Ditambahkan';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE crud 
			SET image = :image, namalokasi = :namalokasi, hargatariflistrik = :hargatariflistrik  , hargadaerah = :hargadaerah  , keterangan = :keterangan    WHERE id = :id"
		);
		$result = $statement->execute(
			array(
			    ':image'		=>	$image,
				':namalokasi'	=>	$_POST["namalokasi"],
				':hargatariflistrik'	=>	$_POST["hargatariflistrik"],
				':hargadaerah'	=>	$_POST["hargadaerah"],
				':keterangan'	=>	$_POST["keterangan"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Telah Disunting';
		}
	}
}

?>