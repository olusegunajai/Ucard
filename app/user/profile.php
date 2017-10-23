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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

$curr_email = $_SESSION['MM_Username'];

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "updateprofile")) {
  $updateSQL = sprintf("UPDATE `user` SET username=%s, email=%s, dob=%s, mobile=%s, gender=%s, marital_status=%s, address=%s, city=%s, state=%s, country=%s, user_image=%s, id=%s, utility=%s WHERE email='$curr_email'",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['dob'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['gender'], "text"),
                       GetSQLValueString($_POST['marital_status'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['city'], "text"),
                       GetSQLValueString($_POST['state'], "text"),
                       GetSQLValueString($_POST['country'], "text"),
                       GetSQLValueString($_FILE['user_image'], "text"),
                       GetSQLValueString($_FILE['id'], "text"),
                       GetSQLValueString($_FILE['utility'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());

  $updateGoTo = "profile.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
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
        Mobutu Profile
        <small>My Personal Account </small>      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">My Profile</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo $row_currentuser['user_image']; ?>" alt="User profile picture">

              <h3 class="profile-username text-center text-capitalize text-aqua"><?php echo $row_currentuser['username']; ?></h3>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title text-aqua">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-envelope text-orange margin-r-5"></i> Email</strong>

              <p class="text-muted"><?php echo $row_currentuser['email']; ?></p>

              <hr>

              <strong><i class="fa fa-user text-blue margin-r-5"></i> Date of birth</strong>

              <p class="text-muted"><?php echo $row_currentuser['dob']; ?></p>

              <hr>

              <strong><i class="fa fa-phone text-green margin-r-5"></i> Contact</strong>

              <p><?php echo $row_currentuser['mobile']; ?></p>

              <hr>

              <strong><i class="fa fa-pencil text-yellow margin-r-5"></i> Gender</strong>

              <p><?php echo $row_currentuser['gender']; ?></p>

              <hr>

              <strong><i class="fa fa-shield text-aqua margin-r-5"></i> Marital Status</strong>

              <p class="margin-r-5"><?php echo $row_currentuser['marital_status']; ?></p>

              <hr>

              <strong><i class="fa fa-map-marker text-red margin-r-5"></i> Address</strong>

              <p><?php echo $row_currentuser['address']; ?>, <?php echo $row_currentuser['city'].' '.$row_currentuser['state'].','.$row_currentuser['country']; ?></p>
			  <hr>
			  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Update Profile</a></li>
            </ul>
			<div class="tab-content">
              <div class="tab-pane active" id="settings">
                <form class="form-horizontal" name="updateprofile" method="POST" action="<?php echo $editFormAction; ?>" enctype="multipart/form-data">
                  <div class="form-group">
					 <h3 class="col-md-12 text-aqua">PERSONAL DATA</h3>
					 
					 <hr />
                    <label for="inputName" class="col-sm-2 control-label">Full Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="username" value="<?php echo $row_currentuser['username']; ?>" id="inputName" placeholder="Full Name">
                    </div>
                  </div>
                  <div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label" name="username">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" value="<?php echo $row_currentuser['email']; ?>" id="inputEmail" placeholder="you@example.com">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Date Of Birth</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="dob" value="<?php echo $row_currentuser['dob']; ?>" id="inputName" placeholder="(dd/mm/year)">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Mobile No.</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="mobile" value="<?php echo $row_currentuser['mobile']; ?>" id="inputSkills" placeholder="+ext-000-000-0000">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Gender</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="gender">
						<option>--CHOOSE YOUR GENDER--</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					  </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Marital Status</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="marital_status">
						<option>--CHOOSE YOUR STATUS--</option>
						<option value="single">Single</option>
						<option value="married">Married</option>
						<option value="divorced">Divorced</option>
						<option value="seperated">Seperated</option>
					  </select>
                    </div>
                  </div>
                  <div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label" name="username">Address</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" value="<?php echo $row_currentuser['address']; ?>" id="inputEmail" placeholder="Address">
                    </div>
                  </div>
                  <div class="form-group">
					<label for="inputEmail" class="col-sm-2 control-label" name="username">City</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="city" value="<?php echo $row_currentuser['city']; ?>" id="inputEmail" placeholder="City">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">State</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="state">
						<option>--CHOOSE YOUR GENDER--</option>
						<option value="Lagos">Lagos</option>
						<option value="Ogun">Ogun</option>
						<option value="Oyo">Oyo</option>
						<option value="female">Ogun</option>
					  </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Country</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="country">
						<option>--CHOOSE YOUR GENDER--</option>
						<option value="male">Nigeria</option>
						<option value="female">Ghana</option>
					  </select>
                    </div>
                  </div>
				 <div class="form-group">
				  <label for="exampleInputFile" class="col-sm-2 control-label">Profile Picture</label>
                    <div class="col-sm-10">
						<input type="file" id="exampleInputFile">
                    </div>
				 </div>
				 
				 <hr />
				 <h3 class="col-md-12 text-aqua">KYC</h3>
				 <hr />
				 
				 <div class="form-group">
				  <label for="exampleInputFile" class="col-sm-2 control-label">Nat. ID/Driver's License</label>
                    <div class="col-sm-10">
						<input type="file" id="exampleInputFile">
                    </div>
				 </div>
				 <div class="form-group">
				  <label for="exampleInputFile" class="col-sm-2 control-label">Utility Bill</label>
                    <div class="col-sm-10">
						<input type="file" id="exampleInputFile">
                    </div>
				 </div>
 				  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions of Nelson Mobutu Ventures.</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update Profile</button>
                    </div>
                  </div>
                  <input type="hidden" name="userid" value="" />
                  <input type="hidden" name="modify_date" value="<?php echo date('d/m/Y'); ?>"
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
	<?php require_once('footer.php'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>          </li>
        </ul>
        <!-- /.control-sidebar-menu -->
      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
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
