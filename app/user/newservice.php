<?php require_once('control/user_default.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
        New Services Schedule
        <small>topup service initilization </small>      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="fa fa-database"></i> TopUp</li>
        <li class="active"> New Service</li>
      </ol>
    </section>

<!--<select name="roperator" id="roperator">
	<option value="AIRT">Airtel</option>
	<option value="ETST">Etisalat</option>
	<option value="GLO">Glo</option>
	<option value="MTN">MTN Prepaid</option>
	<option value="MTNPOSP">MTN Postpaid</option>
	<option value="MTNDSERV">MTN Data</option>
	<option value="MTNBBSERV">MTN Blackberry</option>
	<option value="MTNHYNET">MTN Hynet</option>
	<option value="MLINK">Multilinks</option>
	<option value="VISAF">Visafone</option>
</select>

<select name="roperator" id="roperator">
	<option value="LCC">LCC Toll</option>
	<option value="LTC">LTC Toll</option>
</select>

<select name="roperator" id="roperator">
	<option value="STARTMS">Star times</option>
</select>-->

	<!-- Main content -->
			<section class="content">
			  <div class="row">
				<!-- left column -->
			   <div class="row col-md-12">
					<div class="col-md-12">
					  <!-- general form elements -->
					  <div class="box box-success">
						<div class="box-header with-border">
						  <h3 class="box-title text-success">Add New Service Profile</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<form method="POST" action="<?php echo $editFormAction; ?>" role="form" name="changekey">
						  <div class="box-body">
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Service Provider</label>
								 <select class="form-control" name="service">
									<option value="Airtel">Airtel</option>
									<option value="9mobile">9mobile</option>
									<option value="Glo">Glo</option>
									<option value="Mtn">Mtn</option>
									<option value="LCC">LCC</option>
									<option value="VoguePay">EKEDP</option>
									<option value="IBEDC">IBEDC</option>
									<option value="ie-(pre-paid)</">ie-(pre-paid)</option>
									<option value="i.e-(Posta-Paid)">i.e-(Posta-Paid)</option>
									<option value="EEDC-(Pre-paid)">EEDC-(Pre-paid)</option>
									<option value="EEDC-(Post-paid)">EEDC-(Post-paid)</option>
									<option value="BEDC-(Pre-paid)">BEDC-(Pre-paid)</option>
									<option value="BEDC-(Post-paid)">BEDC-(Post-paid)</option>
									<option value="PHDC(Pre-paid)">PHDC(Pre-paid)</option>
									<option value="PHDC-(Post-paid)">PHDC-(Post-paid)</option>
									<option value="Spectranet">Spectranet</option>
									<option value="Smile 4G">Smile 4G</option>
									<option value="SWIFT 4G">SWIFT 4G</option>
									<option value="DStv">DStv</option>
									<option value="GOtv">GOtv</option>
									<option value="Startimes">Startimes</option>
								  </select>
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">SPID</label>
								 <select class="form-control" name="service">
									<option value="3">Airtel - 3</option>
									<option value="4">9mobile - 4</option>
									<option value="5">Glo - 5</option>
									<option value="6">Mtn - 6</option>
									<option value="7">DStv - 7</option>
									<option value="9">Startimes - 9</option>
									<option value="11">BEDC-(Post-paid) - 11</option>
									<option value="12">EKEDP - 12</option>
									<option value="13">EEDC-(Post-paid) - 13</option>
									<option value="14">IBEDC - 14</option>
									<option value="15">i.e-(Posta-Paid) - 15</option>
									<option value="19">PHDC-(Post-paid) - 19</option>
									<option value="26">LCC - 26</option>
									<option value="70">Spectrane - 70</option>
									<option value="71">Smile 4G - 71</option>
									<option value="72">SWIFT 4G - 72</option>
									<option value="91">BEDC-(Pre-paid) - 91</option>
									<option value="93">EEDC-(Pre-paid) - 93</option>
									<option value="95">ie-(pre-paid) - 95</option>
									<option value="99">PHDC(Pre-paid) - 99</option>
								  </select>
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Reference #</label>
							  <input type="text" class="form-control" id="amount" name="amount" placeholder="Reference - IUC | SSID | ">
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Contact</label>
							  <input type="text" class="form-control" id="amount" name="contact" placeholder="Contact">
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Category</label>
								 <select class="form-control" name="category">
									<option value="mobile service">Mobile Service</option>
									<option value="toll">Toll</option>
									<option value="electricity">Electricity</option>
									<option value="internet">Internet</option>
									<option value="Cable TV">Cable TV</option>
								  </select>
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Level</label>
							  <input type="text" class="form-control" id="amount" name="level" placeholder="Custom Level">
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Recurrence</label>
								 <select class="form-control" name="service">
									<option value="1*1">Once</option>
									<option value="1*30">Monthly</option>
									<option value="2*30">Bi-Monthly</option>
									<option value="1*30*6">Quarterly</option>
									<option value="7">Half-Yearly</option>
									<option value="9">Yearly</option>
								  </select>
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Amount</label>
							  <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Narration</label>
							  <textarea class="form-control" name=""></textarea>
							</div>
						  </div>
						  <!-- /.box-body -->
							<input type="hidden" name="userid" value="<?php echo $row_currentuser['userid']; ?>">
						  <div class="box-footer">
							<button type="submit" class="btn btn-success">Next</button>
						  </div>
						  <input type="hidden" name="MM_update" value="changekey" />
						</form>
					  </div>
					  <!-- /.box -->
					  
					</div>
					<!--/.col (right) -->
						<!-- /.box-body -->
					  </div>
					  <!-- /.box -->

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
<!-- AdminLTE App -->
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
