<?php 

    $username = 'root';
	$password = '';
	$dbnamee= 'eMeter';
	$server = 'localhost';
 
    $conn = mysqli_connect($server,$username,$password,$dbnamee) or die ("Tidak Dapat Terhubung ke Database :" . mysqli_connect_error ());
	$connection = new PDO( 'mysql:host='.$server.';dbname='.$dbnamee, $username, $password );
	$koneksi = mysqli_connect($server, $username, $password, $dbnamee) or die("Connection failed: " . mysqli_connect_error());
?>