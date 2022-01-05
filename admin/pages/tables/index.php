<?php
// Inialize session

   session_start();

//----***Use variabel to capture start time *****------
// Check, if username session is NOT set then this page will jump to login page

if (!isset($_SESSION['username'])) {
header('Location: ../../../index.php');
}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daftar Barang</title>
  <link rel="icon" href="https://png.pngtree.com/element_our/png/20180904/location-gold-icon-vector-png_80837.jpg" sizes="192x192" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
     <!-- mini logo for sidebar mini 50x50 pixels -->
<span class="logo-mini"><b>e</b> Meter</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>e</b> Meter</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
      <li><a href="../../index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
          <li class="active">
          <a href="index.php">
            <i class="fa fa-briefcase"></i> <span>Data Lokasi</span>
            <span class="pull-right-container">
              
            </span>
            <?php if($_SESSION['akses']==0){ ?>
              <li><a href="user.php"><i class="fa fa-glass"></i> <span>Data Admin</span></a></li>
        
		<?php } ?>
		
            <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
          </a>
        </li>
      </ul>
  </section>

       
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Data Lokasi
        <small>View</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Lokasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
            
            </div>
            <!-- /.box-header -->
			
            <div class="box-body">
			 <h1 align="center">Data Lokasi</h1>
		    <hr></hr>
		  <div align="right">
					<center><button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-primary btn-sm">Tambah Data</button></center>
				</div>
				<br /><br />
              
              <table id="user_data" class="table table-striped table-bordered" style="width:100%">
                <thead>

                <tr>
							
							<th rowspan="2"><center>No</center></th>
							<th rowspan="2"><center>Foto Lokasi</center></th>
    						<th rowspan="2"><center>Nama Lokasi</center></th>
    						<th rowspan="2" ><center>Harga Tarif Listrik</center></th>
    						<th rowspan="2"><center>Harga Daerah</center></th>
                  </tr>
				 
						<th ><center>Keterangan</center></th>
                        <th ><center>Action</center></th>
						
                </tr>
                  
						
                </thead>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      
          <!-- /.form-group -->
       
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->

  <script src="js/demo/datatables-demo.js"></script>
</body>
<script src="js/demo/buttons.print.min.js"></script>
<script src="js/demo/dataTables.buttons.min.js"></script>
<script src="js/demo/buttons.html5.min.js"></script>
<script src="js/demo/buttons.bootstrap.min.js"></script>   
</html>
<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
				</div>
				<div class="modal-body">

					<label>Foto Lokasi</label>
					<input type="file" name="user_image" id="user_image" />
					<span id="user_uploaded_image"></span>
					<br />
					<label>Nama Lokasi</label>
					<input type="text" name="namalokasi" id="namalokasi" class="form-control" />
					<br />
					<label>Harga Tarif Listrik</label>
					<input type="text" name="hargatariflistrik" id="hargatariflistrik" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control">
					<br />
					<label>Harga Daerah</label>
					<input type="text" name="hargadaerah" id="hargadaerah" onkeypress="return event.charCode >= 48 && event.charCode <=57" class="form-control">
					<br />
					<label>Keterangan</label>
					<input type="text" name="keterangan" id="keterangan" class="form-control" />
					<br />
          
          
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

