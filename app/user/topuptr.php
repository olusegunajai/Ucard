<?php require_once('../../Connections/conn.php'); ?><?php 
require_once('control/user_default.php'); 
?>
<?php

mysql_select_db($database_conn, $conn);
$query_service_profile = "SELECT * FROM ucard_profile WHERE ucard_profile.created_user = 'olaoluwa Tolu' ORDER BY ucard_profile.created_date";
$service_profile = mysql_query($query_service_profile, $conn) or die(mysql_error());
$row_service_profile = mysql_fetch_assoc($service_profile);
$totalRows_service_profile = mysql_num_rows($service_profile);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MOBUTU.com | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
	<?php require_once('header.php'); ?>
  <!-- Left side column. contains the logo and sidebar -->
	<?php require_once('sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        TopUp Services 
        <small>topup service initilization </small>      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="fa fa-database"></i> TopUp</li>
        <li class="active"> TopUp Service</li>
      </ol>
    </section>

    <!-- Main content -->
			<section class="content">
			  <div class="row">
				<!-- left column -->
			   <div class="row col-md-12">
				<div class="col-md-12"><?php echo $msg; ?></div>

					
					<!-- Start col-12--> 
				</div>
			  <!-- /.row -->
			</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
	<?php require_once('footer.php'); ?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- MOBUTU App -->
<script src="../../dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
<?php
mysql_free_result($service_profile);

mysql_free_result($currentuser);
?>
