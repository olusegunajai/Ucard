<?php require_once('control/user_default.php'); ?>
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
        Transaction Details
        <small>deposit and spending details </small>      </h1>
      <ol class="breadcrumb">
       <li> <a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><i class="fa fa-credit-card"></i> Wallet</li>
        <li class="active"> Transaction History</li>
      </ol>
    </section>

    <!-- Main content -->
		<section class="content">
			  <div class="row">
				<div class="col-xs-12">
				  <div class="box box-success">
					<div class="box-header">
					  <h3 class="box-title">Transaction Details</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
					  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
						<thead>
						<tr role="row" class="text-primary"><th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Transaction ID</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Reference</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Date</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Credit</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Debit</th><th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Balance</th></tr>
						</thead>
						<tbody>
						<tr role="row" class="odd">
						  <td class="sorting_1">Tx12002</td>
						  <td>Cash deposit via Bank wire-PayU</td>
						  <td>01/10/2017</td>
						  <td>10,000</td>
						  <td>0</td>
						  <td>10,000</td>
						</tr>
						</tbody>
						<tfoot>
						<tr class="text-primary"><th rowspan="1" colspan="1">Transaction ID</th><th rowspan="1" colspan="1">Refrences</th><th rowspan="1" colspan="1">Date</th><th rowspan="1" colspan="1">Credit</th><th rowspan="1" colspan="1">Debit</th><th rowspan="1" colspan="1">Balance</th></tr>
						</tfoot>
					  </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /.box -->
<div class="col-md-12 ui-sortable">
			        <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Form Wizards</h4>
                        </div>
                        <div class="panel-body">
                            <form action="http://seantheme.com/" method="POST">
								<div id="wizard" class="bwizard clearfix">
									<ol class="bwizard-steps clearfix clickable" role="tablist">
										<li role="tab" aria-selected="true" class="active" style="z-index: 4;"><span class="label badge-inverse">1</span><a href="#step1" class="hidden-phone">
										    Identification 
										    </a><a href="#step1" class="hidden-phone"><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small></a><a href="#step1" class="hidden-phone">
										</a></li>
										<li role="tab" aria-selected="false" style="z-index: 3;"><span class="label">2</span><a href="#step2" class="hidden-phone">
										    Contact Information
										    </a><a href="#step2" class="hidden-phone"><small>Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin.</small></a><a href="#step2" class="hidden-phone">
										</a></li>
										<li role="tab" aria-selected="false" style="z-index: 2;"><span class="label">3</span><a href="#step3" class="hidden-phone">
										    Login
										    </a><a href="#step3" class="hidden-phone"><small>Phasellus lacinia placerat neque pretium condimentum.</small></a><a href="#step3" class="hidden-phone">
										</a></li>
										<li role="tab" aria-selected="false" style="z-index: 1;"><span class="label">4</span><a href="#step4" class="hidden-phone">
										    Completed
										    </a><a href="#step4" class="hidden-phone"><small>Sed nunc neque, dapibus non leo sed, rhoncus dignissim elit.</small></a><a href="#step4" class="hidden-phone">
										</a></li>
									</ol>
									<!-- begin wizard step-1 -->
									
									<!-- end wizard step-1 -->
									<!-- begin wizard step-2 -->
									
									<!-- end wizard step-2 -->
									<!-- begin wizard step-3 -->
									
									<!-- end wizard step-3 -->
									<!-- begin wizard step-4 -->
									
									<!-- end wizard step-4 -->
								<div class="well"><div id="step1" role="tabpanel" class="bwizard-activated" aria-hidden="false">
                                        <fieldset>
                                            <legend class="pull-left width-full">Identification</legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<label>First Name</label>
														<input type="text" name="firstname" placeholder="John" class="form-control">
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<label>Middle Initial</label>
														<input type="text" name="middle" placeholder="A" class="form-control">
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
													<div class="form-group">
														<label>Last Name</label>
														<input type="text" name="lastname" placeholder="Smith" class="form-control">
													</div>
                                                </div>
                                                <!-- end col-4 -->
                                            </div>
                                            <!-- end row -->
										</fieldset>
									</div><div id="step2" role="tabpanel" class="hide" aria-hidden="true">
										<fieldset>
											<legend class="pull-left width-full">Contact Information</legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                <!-- begin col-6 -->
                                                <div class="col-md-6">
													<div class="form-group">
														<label>Phone Number</label>
														<input type="text" name="phone" placeholder="123-456-7890" class="form-control">
													</div>
                                                </div>
                                                <!-- end col-6 -->
                                                <!-- begin col-6 -->
                                                <div class="col-md-6">
													<div class="form-group">
														<label>Email Address</label>
														<input type="text" name="email" placeholder="someone@example.com" class="form-control">
													</div>
                                                </div>
                                                <!-- end col-6 -->
                                            </div>
                                            <!-- end row -->
										</fieldset>
									</div><div id="step3" role="tabpanel" class="hide" aria-hidden="true">
										<fieldset>
											<legend class="pull-left width-full">Login</legend>
                                            <!-- begin row -->
                                            <div class="row">
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <div class="controls">
                                                            <input type="text" name="username" placeholder="johnsmithy" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Pasword</label>
                                                        <div class="controls">
                                                            <input type="password" name="password" placeholder="Your password" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col-4 -->
                                                <!-- begin col-4 -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Confirm Pasword</label>
                                                        <div class="controls">
                                                            <input type="password" name="password2" placeholder="Confirmed password" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end col-6 -->
                                            </div>
                                            <!-- end row -->
                                        </fieldset>
									</div><div id="step4" role="tabpanel" class="hide" aria-hidden="true">
									    <div class="jumbotron m-b-0 text-center">
                                            <h1>Login Successfully</h1>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris consequat commodo porttitor. Vivamus eleifend, arcu in tincidunt semper, lorem odio molestie lacus, sed malesuada est lacus ac ligula. Aliquam bibendum felis id purus ullamcorper, quis luctus leo sollicitudin. </p>
                                            <p><a class="btn btn-success btn-lg" role="button">Proceed to User Profile</a></p>
                                        </div>
									</div></div><ul class="pager bwizard-buttons"><li class="previous disabled" role="button" aria-disabled="true"><a href="#">← Previous</a></li><li class="next" role="button" aria-disabled="false"><a href="#">Next →</a></li></ul></div>
							</form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
				</div>
				<!-- /.col -->
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
mysql_free_result($currentuser);
?>
