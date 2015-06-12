<body class="skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Pu</b>OL</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Pulsa</b>ONLINE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/> -->
                  <span class="hidden-xs"><?php echo $_SESSION["nama"]; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <!-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" /> -->
                    <p>
                      <?php echo $_SESSION["nama"]." - ".$_SESSION["group"]; ?>
                      <small><?php echo "Kode Agen ".$_SESSION["kode_agen"]; ?></small>
                      <small>Member since <?php echo $_SESSION["create_at"]; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!-- <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div> -->
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!-- <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>