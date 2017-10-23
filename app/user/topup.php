<?php 
require_once('control/user_default.php'); 
require_once('do_topup.php'); 

mysql_select_db($database_conn, $conn);
$query_transactions = "SELECT topups.productcodes, topups.destinations, topups.amounts, topups.resultdescription, topups.comments, topups.created_date FROM topups WHERE topups.created_by = '$cur_user'";
$transactions = mysql_query($query_transactions, $conn) or die(mysql_error());
$row_transactions = mysql_fetch_assoc($transactions);
$totalRows_transactions = mysql_num_rows($transactions);
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
					<div class="col-md-4">
					  <!-- general form elements -->
					  <div class="box box-info">
						<div class="box-header with-border">
						  <h3 class="box-title text-info">Single TopUp</h3>
						</div>
						<!-- /.box-header -->
						<!-- form start -->
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
                                
                                var mobileSelect	=	'<select class="form-control" name="productcode" id="productcode">';
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
                                    
                                    
                                var tollSelect		=	'<select class="form-control" name="productcode" id="productcode">';
                                    tollSelect		+=	'<option value="LCC">LCC Toll</option>';
                                    tollSelect		+=	'<option value="LTC">LTC Toll</option>';
                                    tollSelect		+=	'</select>';
                                    
                                
                                var electricitySelect		=	'<select class="form-control" name="productcode" id="productcode">';
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
                                    
                                
                                var internetSelect		=	'<select class="form-control" name="productcode" id="productcode">';
                                    internetSelect		+=	'<option value="Spectranet">Spectranet</option>';
                                    internetSelect		+=	'<option value="SMBU">SMILE 4G</option>';
                                    internetSelect		+=	'<option value="SWIFT4G">SWIFT 4G</option>';
                                    internetSelect		+=	'</select>';
                                    
                                
                                var cableSelect		=	'<select class="form-control" name="productcode" id="productcode">';
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
						<form method="POST" action="<?php echo $editFormAction; ?>" role="form" name="singletopup">
						  <div class="box-body">
							<div class="form-group">
							  <label for="exampleInputPassword1">Category</label>
								 <select class="form-control" name="profile_cat" id="profile_cat" onfocus="loadCompany();" onchange="loadCompany();"  autofocus>
									<option value="mobile">Mobile Service</option>
									<option value="toll">Toll</option>
									<option value="electricity">Electricity</option>
									<option value="internet">Internet</option>
									<option value="cable">Cable TV</option>
								  </select>
							</div>
							<div class="form-group">
							  <label for="exampleInputPassword1">Operator</label>
                                <span id="service"></span>
							</div>
							<div class="form-group">
							  <label for="exampleInputPassword1">Destination Reference</label>
							  <input type="text" class="form-control" id="destination" name="destination" placeholder="Phone number | IUC | USERID">
							</div>
							<div class="form-group">
							  <label for="exampleInputPassword1">How much do you want to Topup?</label>
							  <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
							</div>
                            <div class="form-group">
							  <label for="exampleInputPassword1">Description</label>
							  <textarea class="form-control" name="comment"></textarea>
							</div>						  </div>
						  <!-- /.box-body -->
							<input type="hidden" name="created_by" value="<?php echo $row_currentuser['username']; ?>">
						  <div class="box-footer">
							<button type="submit" class="btn btn-info">Next</button>
						  </div>
						  <input type="hidden" name="topupid" value="" />
						  <input type="hidden" name="created_date" value="<?php echo date('d/m/Y'); ?>" />
						  <input type="hidden" name="MM_update" value="changekey" />
						  <input type="hidden" name="MM_insert" value="singletopup">
						</form>
					  </div>
					  <!-- /.box -->
					  
				 </div>
					<!--/.col (right) -->
					<div class="col-md-8">
					  <!-- general form elements -->
<div class="box box-warning">
						<div class="box-header">
						  <h3 class="box-title text-warning">TopUp Transactions</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
						  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                              <thead>
                                <tr role="row" class="text-primary"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Product</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Destination Account</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Amount</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Result</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Comment</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Date & Time</th></tr>
                              </thead>
                              <tbody>
                                <?php if ($totalRows_transactions == 0) { // Show if recordset empty ?>
                                      <tr role="row" class="odd">
                                        <td class="sorting_1">You have not made any TopUp transactions so far</td>
                                      </tr>
                                <?php } // Show if recordset empty ?>
                            <?php if ($totalRows_transactions > 0) { // Show if recordset not empty ?>
                                <?php do{ ?>
                                <tr role="row" class="odd">
                                  <td class="sorting_1">1</td>
						          <td><?php echo $row_transactions['productcodes']; ?></td>
						          <td><?php echo $row_transactions['destinations']; ?></td>
						          <td><?php echo $row_transactions['amounts']; ?></td>
						          <td><?php echo $row_transactions['resultdescription']; ?></td>
						          <td><?php echo $row_transactions['comments']; ?></td>
						          <td><?php echo $row_transactions['created_date']; ?></td>
					        </tr>
                                <?php }while($row_transactions = mysql_fetch_assoc($transactions)
); ?>
                              <?php } // Show if recordset not empty ?>
                              </tbody>
                              <tfoot>
                                <tr class="text-primary"><th rowspan="1" colspan="1">#</th><th rowspan="1" colspan="1">Product</th><th rowspan="1" colspan="1">Destination Account</th><th rowspan="1" colspan="1">Amount</th><th rowspan="1" colspan="1">Result</th><th rowspan="1" colspan="1">Comment</th><th rowspan="1" colspan="1">Date & Time</th></tr>
                              </tfoot>
                            </table>
</div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of <?php echo $totalRows_transactions ?> entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button previous" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
						</div>
						<!-- /.box-body -->
					  </div>
  					  <!-- /.box -->
					  
					</div>
<!--/.col (right) -->

					
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
mysql_free_result($transactions);

mysql_free_result($currentuser);
?>
