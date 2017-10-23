<?php require_once('../../Connections/conn.php'); ?><?php 
require_once('control/user_default.php');
//require_once('do_topup.php'); ?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "serviceprofile")) {
  $insertSQL = sprintf("INSERT INTO ucard_profile (profileID, profile_name, productcode, SPID, profile_desc, profile_ref, contact, profile_cat, profile_level, reccurence, amount, created_user, created_date) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['profileID'], "int"),
                       GetSQLValueString($_POST['provider'], "text"),
                       GetSQLValueString($_POST['operator'], "text"),
                       GetSQLValueString($_POST['SPID'], "int"),
                       GetSQLValueString($_POST['description'], "text"),
                       GetSQLValueString($_POST['reference'], "text"),
                       GetSQLValueString($_POST['contact'], "text"),
                       GetSQLValueString($_POST['profile_cat'], "text"),
                       GetSQLValueString($_POST['level'], "text"),
                       GetSQLValueString($_POST['recurrence'], "text"),
                       GetSQLValueString($_POST['amount'], "text"),
                       GetSQLValueString($_POST['created_user'], "text"),
                       GetSQLValueString($_POST['created_date'], "text"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
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
								<script type="text/javascript">
                                
                                /*
                                 * This is wysiwyg but serves the purpose
                                 * First select menu loads the required options for second select menu
                                 * Just another mini-code from 
                                 * Ferdinand Noah
                                 * IZA60 Systems
                                 * January, 2015
                                 * Enjoy
                                 */
                                
                                var mobileSelect	=	'<select class="form-control" name="operator" id="operator">';
                                    mobileSelect	+=	'<option value="AIRT">Airtel</option>';
                                    mobileSelect	+=	'<option value="ETST">9Mobile</option>';
                                    mobileSelect	+=	'<option value="GLO">Glo</option>';
                                    mobileSelect	+=	'<option value="MTN">MTN Prepaid</option>';
                                    mobileSelect	+=	'<option value="MTNPOSP">MTN Postpaid</option>';
                                    mobileSelect	+=	'<option value="MTNDSERV">MTN Data</option>';
                                    mobileSelect	+=	'<option value="MTNBBSERV">MTN Blackberry</option>';
                                    mobileSelect	+=	'<option value="MTNHYNET">MTN Hynet</option>';
                                    mobileSelect	+=	'<option value="MLINK">Multilinks</option>';
                                    mobileSelect	+=	'<option value="VISAF">Visafone</option>'; 
                                    mobileSelect	+=	'</select>';
                                    
                                    
                                var tollSelect		=	'<select class="form-control" name="operator" id="operator">';
                                    tollSelect		+=	'<option value="LCC">LCC Toll</option>';
                                    tollSelect		+=	'<option value="LTC">LTC Toll</option>';
                                    tollSelect		+=	'</select>';
                                    
                                
                                var electricitySelect		=	'<select class="form-control" name="operator" id="operator">';
                                    electricitySelect		+=	'<option value="EKOPREPAID">EKEDP Prepaid</option>';
                                    electricitySelect		+=	'<option value="EKOPOSTP">EKEDP Postpaid</option>';
                                    electricitySelect		+=	'<option value="IBEDCPREPD">IBEDC Prepaid</option>';
                                    electricitySelect		+=	'<option value="IBEDCPOSTP">IBEDC Postpaid</option>';
                                    electricitySelect		+=	'<option value="BEDCPREPD">BEDC Prepaid</option>';
                                    electricitySelect		+=	'<option value="BEDCPOSTPD">BEDC Postpaid</option>';
                                    electricitySelect		+=	'<option value="IKEJAPREPD">IKEJA Prepaid</option>';
                                    electricitySelect		+=	'<option value="IKEJAPOSTP">IKEJA Postpaid</option>';
                                    electricitySelect		+=	'<option value="ENUGUPREPD">ENUGU Prepaid</option>';
                                    electricitySelect		+=	'<option value="ENUGUPOSTPD">ENUGU Postpaid</option>';
                                    electricitySelect		+=	'<option value="PHEDPREPD">IKEJA Prepaid</option>';
                                    electricitySelect		+=	'<option value="PHEDPOSTP">IKEJA Postpaid</option>';
                                    electricitySelect		+=	'</select>';
                                    
                                
                                var internetSelect		=	'<select class="form-control" name="operator" id="operator">';
                                    internetSelect		+=	'<option value="Spectranet">Spectranet</option>';
                                    internetSelect		+=	'<option value="SMBU">SMILE 4G</option>';
                                    internetSelect		+=	'<option value="SWIFT4G">SWIFT 4G</option>';
                                    internetSelect		+=	'</select>';
                                    
                                
                                var cableSelect		=	'<select class="form-control" name="operator" id="operator">';
                                    cableSelect		+=	'<option value="STARTMS">Star times</option>';
                                    cableSelect		+=	'<option value="GOtv">GOtv</option>';
                                    cableSelect		+=	'<option value="DSTV">DSTV</option>';
                                    cableSelect		+=	'<option value="DSTVBOXOFF">DSTV Box Office</option>';
                                    cableSelect		+=	'</select>';
                                
                                    
                                var selectedService = document.getElementById('profile_cat').value;
                                
                                function loadCompany()
                                {
                                    if(document.getElementById('profile_cat').value == "mobile"){
                                    document.getElementById('service').innerHTML = mobileSelect;
                                    }
                                    if(document.getElementById('profile_cat').value == "toll"){
                                        document.getElementById('service').innerHTML = tollSelect;
                                    }
                                    if(document.getElementById('profile_cat').value == "electricity"){
                                        document.getElementById('service').innerHTML = electricitySelect;
                                    }
                                    if(document.getElementById('profile_cat').value == "internet"){
                                        document.getElementById('service').innerHTML = internetSelect;
                                    }
                                    if(document.getElementById('profile_cat').value == "cable"){
                                        document.getElementById('service').innerHTML = cableSelect;
                                    }
                                }
                                
                                </script>
						
						<!-- form start -->
						<form method="POST" action="<?php echo $editFormAction; ?>" role="form" name="serviceprofile">
						  <div class="box-body">
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Category</label>
								 <select class="form-control" name="profile_cat" id="profile_cat" onFocus="loadCompany();" onChange="loadCompany();"  autofocus>
									<option value="mobile">Mobile Service</option>
									<option value="toll">Toll</option>
									<option value="electricity">Electricity</option>
									<option value="internet">Internet</option>
									<option value="cable">Cable TV</option>
								  </select>
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Operator</label>
                                <span id="service"></span>
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Service Provider</label>
								 <select class="form-control" name="provider">
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
								 <select class="form-control" name="SPID">
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
							  <label for="exampleInputPassword1">Account Reference #</label>
							  <input type="text" class="form-control" id="amount" name="reference" placeholder="IUC | SSID | ">
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Contact</label>
							  <input type="text" class="form-control" id="amount" name="contact" placeholder="Contact">
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Level</label>
							  <input type="text" class="form-control" id="amount" name="level" placeholder="Custom Level">
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Recurrence</label>
								 <select class="form-control" name="recurrence">
									<option value="Monthly">Monthly</option>
									<option value="Bi-Monthly">Bi-Monthly</option>
									<option value="Quarterly">Quarterly</option>
									<option value="Half-Yearly">Half-Yearly</option>
									<option value="Yearly">Yearly</option>
								  </select>
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Amount</label>
							  <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
							</div>
							<div class="form-group col-md-6">
							  <label for="exampleInputPassword1">Description</label>
							  <textarea class="form-control" name="description"></textarea>
							</div>
						  </div>
						  <!-- /.box-body -->
							<input type="hidden" name="userid" value="<?php echo $row_currentuser['userid']; ?>">
						  <div class="box-footer">
							<button type="submit" class="btn btn-success">Next</button>
						  </div>
						  <input type="hidden" name="created_user" value="<?php echo $row_currentuser['username']; ?>" />
						  <input type="hidden" name="created_date" value="<?php echo date('d/m/Y'); ?>" />
						  <input type="hidden" name="profileID" value="" />
						  <input type="hidden" name="MM_update" value="changekey" />
						  <input type="hidden" name="MM_insert" value="serviceprofile">
						</form>
					  </div>
					  <!-- /.box -->
					  
					</div>
					<!--/.col (right) -->
<div class="col-xs-12">
					  <div class="box box-warning">
						<div class="box-header">
						  <h3 class="box-title text-warning">Service profile List</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
						  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
							<thead>
							<tr role="row" class="text-primary"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Service</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">SPID</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Description</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Reference</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Contact</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Type</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Level</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Recurrence</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Amount</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Date</th></tr>
							</thead>
							<tbody>
														<tr role="row" class="odd">
							  <td class="sorting_1">Spectranet</td>
							  <td>70</td>
							  <td>Monthly subscrition</td>
							  <td>25946123564</td>
							  <td>07069629395</td>
							  <td>Internet</td>
							  <td>6</td>
							  <td>30</td>
							  <td>7000</td>
							  <td>01/10/2017</td>
							</tr>
														<tr role="row" class="odd">
							  <td class="sorting_1">Airtel</td>
							  <td>3</td>
							  <td>astuytreaeafrgtyuk675645343</td>
							  <td>08026357711</td>
							  <td>07069629395</td>
							  <td>mobile</td>
							  <td>5-7</td>
							  <td>Monthly</td>
							  <td>10000</td>
							  <td>22/10/2017</td>
							</tr>
														<tr role="row" class="odd">
							  <td class="sorting_1">DStv</td>
							  <td>7</td>
							  <td>Monthly TV sub</td>
							  <td>22f4424111</td>
							  <td>07069629395</td>
							  <td>cable</td>
							  <td>5-7</td>
							  <td>Monthly</td>
							  <td>10000</td>
							  <td>22/10/2017</td>
							</tr>
														</tbody>
							<tfoot>
							<tr class="text-primary"><th rowspan="1" colspan="1">Service</th><th rowspan="1" colspan="1">SPID</th><th rowspan="1" colspan="1">Description</th><th rowspan="1" colspan="1">Reference</th><th rowspan="1" colspan="1">Contact</th><th rowspan="1" colspan="1">Type</th><th rowspan="1" colspan="1">Level</th><th rowspan="1" colspan="1">Recurrence</th><th rowspan="1" colspan="1">Amount</th><th rowspan="1" colspan="1">Date</th></tr>
							</tfoot>
						  </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
						</div>
						<!-- /.box-body -->
					  </div>
					  <!-- /.box -->

					</div>						<!-- /.box-body -->
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
