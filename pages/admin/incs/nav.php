    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
     
      <a class="navbar-brand mr-1 row" href="<?php echo(URL) ?>">
      <span>
        <img style="max-width: 5%;height: auto;display: initial;border-radius: 8px;" class="thumbnail rounded-circle img-responsive" src="<?php echo URL; ?>\libs\public\imgs\favicon.png" alt="logo" srcset="">
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
        </span>
        </a>
        

      <!-- Navbar Search -->
      <!-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form> -->

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- <span class="badge badge-danger">0</span> -->
          </a>
          <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div> -->
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- <span class="badge badge-danger">0</span> -->
          </a>
          <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div> -->
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <!-- <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a> -->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

     <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo(URL) ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>User Management</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Users:</h6>
            <!-- <a class="dropdown-item" href="login.html">Login</a> -->
            <a class="dropdown-item" href="<?php echo URL; ?>register/">Create users</a>
            <a class="dropdown-item" href="<?php echo URL; ?>views/">View users</a>
            <!-- <a class="dropdown-item" href="forgot-password.html">Forgot Password</a> -->
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Groups:</h6>
            <a class="dropdown-item" href="<?php echo URL; ?>creategroup/">Create Group</a>
            <a class="dropdown-item" href="<?php echo URL; ?>viewgroups/">View List</a>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL; ?>adddevices/">
            <i class="fas fa-fw fa-plus-square"></i>
            <span>Add Devices</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL; ?>devices/">
            <i class="fas fa-fw fa-table"></i>
            <span>View Devices</span></a>
        </li>

          <li class="nav-item">
          <a class="nav-link" href="<?php echo URL; ?>assigndevices/">
            <i class="fas fa-fw fa-anchor"></i>
            <span>Assign Devices</span></a>
        </li>
         <li class="nav-item">
          <span class=""><a class="nav-link" href="<?php echo URL; ?>logout/">
            <i class="fas fa-fw fa-sign-out"></i>
            <span>Logout</span></a></span>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>
