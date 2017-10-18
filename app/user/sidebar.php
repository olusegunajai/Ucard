  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional)--> 
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $row_currentuser['user_image']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p class="text-capitalize"><?php echo $row_currentuser['username']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview"><a href="#"><i class="fa fa-user text-green"></i> <span>Profile</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="profile.php">My Profile</a></li>
          </ul>
        </li>
        <li class="treeview">
        <a href="#"><i class="fa fa-credit-card text-aqua"></i> <span>Wallet</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="deposit.php">Deposit</a></li>
            <li><a href="transactions.php">Transaction Details</a></li>
          </ul>
        </li>
        <li class="treeview">
		  <a href="#"><i class="fa fa-database text-yellow"></i> <span>TopUp</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="newservice.php">New Service Schedule</a></li>
            <li><a href="topup.php">TopUp Service</a></li>
          </ul>
		</li>
        <li class="treeview">
          <a href="#"><i class="fa fa-cogs text-blue"></i> <span>Options</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="changekey.php">Change Password</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-medkit text-danger"></i> <span>Help Center</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="documentation.php">Documentation</a></li>
            <li><a href="http://www.ucardapp.com/documentation.php">Online help  <i class="fa fa-paper-plane-o text-aqua"></i></a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
