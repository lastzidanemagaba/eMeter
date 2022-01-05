<?php 
session_start();
error_reporting(0);
include 'koneksi.php';
if (isset($_POST['submit'])) 
{

    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = mysqli_query($conn,"select * from login where username='$username' and password='$password'");
    $cek = mysqli_num_rows($login);
    if($cek > 0)
    {
	    $data = mysqli_fetch_assoc($login);
        if($data['akses']==0){

		// buat session login dan username
		$_SESSION['username'] = $username;
        $_SESSION['akses'] = 0;
		// alihkan ke halaman dashboard admin
		header("Location: admin/index.php");

	// cek jika user login sebagai pegawai
        }else if($data['akses']==1){
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['akses'] = 1;
            $aksesusr = $_SESSION['akses'];
            // alihkan ke halaman dashboard pegawai
            header("Location: admin/index.php");

        // cek jika user login sebagai pengurus
        }else if($data['akses']==2){
            // buat session login dan username
            $_SESSION['username'] = $username;
            $_SESSION['akses'] = 2;
            $aksesusr = $_SESSION['akses'];
            // alihkan ke halaman dashboard pengurus
            header("Location: admin/index.php");

        }else{

            // alihkan ke halaman login kembali
            echo "<script>alert('Username Atau Password Tidak Benar !')</script>";
        }

	}else{
	echo "<script>alert('Username Atau Password Tidak Benar !')</script>";
}        



   
}
?>
 
<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <title>eMeter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel = "icon" href = 
"https://png.pngtree.com/element_our/png/20180904/location-gold-icon-vector-png_80837.jpg" 
        type = "image/x-icon">
        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="assets2/css/reset.css">
        <link rel="stylesheet" href="assets2/css/supersized.css">
        <link rel="stylesheet" href="assets2/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>
        <div class="page-container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
           <div class="card-header">
            <h1>eMeter</h1>
            
            </div>
            <div class="card-body">
            <form action="" method="POST">
                <input type="text" name="username" class="username" placeholder="Username">
                <input type="password" name="password" class="password" placeholder="Password">
                <button type="submit" name="submit">Login</button>
                <div class="error"><span>+</span></div>
            </form>
            </div>
        </div>
            
        </div>
        </div>
</div>

        <!-- Javascript -->
        <script src="assets2/js/jquery-1.8.2.min.js"></script>
        <script src="assets2/js/supersized.3.2.7.min.js"></script>
        <script src="assets2/js/supersized-init.js"></script>
        <script src="assets2/js/scripts.js"></script>

    </body>

</html>


