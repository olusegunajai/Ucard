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
					<div class="col-md-6">
					  <!-- general form elements -->
					  <div class="box box-info">
						<div class="box-header with-border">
						  <h3 class="box-title text-info">Single TopUp Request</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<form method="POST" action="<?php echo $editFormAction; ?>" role="form" name="newprofile">
						  <div class="box-body">
							<div class="form-group">
							  <label for="exampleInputPassword1">Which service would you like to use to add money to your MOBUTU wallet?</label>
								 <select class="form-control" name="service">
									<option value="PayU">PayU</option>
									<option value="VoguePay">VoguePay</option>
								  </select>
							</div>
							<div class="form-group">
							  <label for="exampleInputPassword1">How much do you want to deposit?</label>
							  <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
							</div>
						  </div>
						  <!-- /.box-body -->
							<input type="hidden" name="userid" value="<?php echo $row_currentuser['userid']; ?>">
						  <div class="box-footer">
							<button type="submit" class="btn btn-info">Next</button>
						  </div>
						  <input type="hidden" name="MM_update" value="changekey" />
						</form>
					  </div>
					  <!-- /.box -->
					  
					</div>
					<!--/.col (right) -->
					<div class="col-md-6">
					  <!-- general form elements -->
					  <div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title text-info">Multiple TopUp Request</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
						<form method="POST" action="<?php echo $editFormAction; ?>" role="form" name="newprofile">
						  <div class="box-body">
							<div class="form-group">
							  <label for="exampleInputPassword1">Which service would you like to use to add money to your MOBUTU wallet?</label>
								 <select class="form-control" name="service">
									<option value="PayU">PayU</option>
									<option value="VoguePay">VoguePay</option>
								  </select>
							</div>
							<div class="form-group">
							  <label for="exampleInputPassword1">How much do you want to deposit?</label>
							  <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
							</div>
						  </div>
						  <!-- /.box-body -->
							<input type="hidden" name="userid" value="<?php echo $row_currentuser['userid']; ?>">
						  <div class="box-footer">
							<button type="submit" class="btn btn-primary">Next</button>
						  </div>
						  <input type="hidden" name="MM_update" value="changekey" />
						</form>
					  </div>
					  <!-- /.box -->
					  
					</div>
					<!--/.col (right) -->

					
					<!-- Start col-12 -->
					<div class="col-xs-12">
					  <div class="box box-warning">
						<div class="box-header">
						  <h3 class="box-title text-warning">Service profile List</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
						  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
							<thead>
							<tr role="row" class="text-primary"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Service</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">SPID</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Description</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Reference</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Contact</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Type</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Level</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Recurrence</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Amount</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Author</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Date</th></tr>
							</thead>
							<tbody>
							<?php do{ ?>
							<tr role="row" class="odd">
							  <td class="sorting_1"><?php echo $row_service_profile['profile_name']; ?></td>
							  <td><?php echo $row_service_profile['SPID']; ?></td>
							  <td><?php echo $row_service_profile['profile_desc']; ?></td>
							  <td><?php echo $row_service_profile['profile_ref']; ?></td>
							  <td><?php echo $row_service_profile['contact']; ?></td>
							  <td><?php echo $row_service_profile['profile_cat']; ?></td>
							  <td><?php echo $row_service_profile['profile_level']; ?></td>
							  <td><?php echo $row_service_profile['reccurence']; ?></td>
							  <td><?php echo $row_service_profile['amount']; ?></td>
							  <td><?php echo $row_service_profile['created_user']; ?></td>
							  <td><?php echo $row_service_profile['created_date']; ?></td>
							</tr>
							<?php }while ($row_service_profile = mysql_fetch_assoc($service_profile)); ?>
							</tbody>
							<tfoot>
							<tr class="text-primary"><th rowspan="1" colspan="1">Service</th><th rowspan="1" colspan="1">SPID</th><th rowspan="1" colspan="1">Description</th><th rowspan="1" colspan="1">Reference</th><th rowspan="1" colspan="1">Contact</th><th rowspan="1" colspan="1">Type</th><th rowspan="1" colspan="1">Level</th><th rowspan="1" colspan="1">Recurrence</th><th rowspan="1" colspan="1">Amount</th><th rowspan="1" colspan="1">Author</th><th rowspan="1" colspan="1">Date</th></tr>
							</tfoot>
						  </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
						</div>
						<!-- /.box-body -->
					  </div>
					  <!-- /.box -->

					</div>
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
