<?php
//functions/define.php
include_once'../functions/define.php';
include_once '../core/init.php';
require_once('../helpers/helper.php');
?>
<?php if (!is_logged_in()){

   // login_error_redirect();
   header('Location: login.php');
} ?>


<?php
//
// if (is_logged_in()){
//
//   $users_sql = "SELECT * FROM users WHERE $users";
// }
//echo "string".$user_data['email'];die;

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sirajul 2 | Admin Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=BASE_URL ;?>/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="<?=BASE_URL ;?>/admin/bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
 <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->

  <link rel="stylesheet" href="<?=BASE_URL ;?>/admin/ionicons-2.0.1/css/ionicons.min.css">
 <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" href="<?=BASE_URL ;?>/AdminLTE-2.3.11/plugins/datatables/jquery.dataTables.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=BASE_URL ;?>/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=BASE_URL ;?>/admin/dist/css/skins/_all-skins.min.css">
  <!-- parsely.css -->
    <link rel="stylesheet" href="<?=BASE_URL ;?>/js/parsley/parsley.css">
  <!--./ parsely.css -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!--=============== Site wrapper =================== -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>PL</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
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
              <img src="<?=BASE_URL ;?>/images/users/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$user_data['full_name'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=BASE_URL ;?>/images/users/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?=$user_data['full_name'].'- Web Developer'; ?>
                  <small><?='Join Date-'.$user_data['join_date'] ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=ADMIN_BASE_URL?>/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=BASE_URL ;?>/images/users/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Sirajul Mostafa</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
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
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-gift text-danger"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=BASE_URL ;?>/admin/product.php"><i class="fa fa-circle-o text-green"></i> Manage Product</a></li>
            <li><a href="<?=ADMIN_BASE_URL ;?>/add_product.php"><i class="fa fa-circle-o text-green"></i> Add Product</a></li>

          </ul>


        </li>


        <li class="treeview">
          <a href="#">
            <i class=" fa fa-archive text-orange"></i> <span>Archive</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=BASE_URL ;?>/admin/archive.php"><i class="fa fa-circle-o text-green"></i>Archive</a></li>


          </ul>


        </li>


         <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-leaf text-green"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=ADMIN_BASE_URL ;?>/view_category.php"><i class="fa fa-circle-o text-blue"></i>Manage Category</a></li>
            <li><a href="<?=ADMIN_BASE_URL ;?>/add_category.php"><i class="fa fa-circle-o text-green"></i> Add Category</a></li>

          </ul>


        </li>

        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-bullhorn text-orange"></i> <span>Barand</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=ADMIN_BASE_URL ;?>/brand.php"><i class="fa fa-circle-o text-blue"></i>Manage Barand</a></li>


          </ul>


        </li>
        <li class="treeview">
          <a href="#">
            <i class=" glyphicon glyphicon-user text-success "></i> <span>Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=ADMIN_BASE_URL ;?>/user.php"><i class="fa fa-circle-o text-blue"></i>Manage Account</a></li>


          </ul>


        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=BASE_URL ;?>/admin/product.php"><i class="fa fa-circle-o text-green"></i> Manage Product</a></li>
            <li><a href="<?=ADMIN_BASE_URL ;?>/view_category.php"><i class="fa fa-circle-o text-green"></i> Manage category</a></li>
            <li><a href="<?=ADMIN_BASE_URL ;?>/brand.php"><i class="fa fa-circle-o text-red"></i> Manage Brand</a></li>
            <li><a href="<?=BASE_URL ;?>/admin/youraccount/user.php"><i class="fa fa-circle-o text-blue"></i>Manage Account</a></li>
            <li><a href="index.php?page&page=archive"><i class="fa fa-circle-o text-orange"></i> Archive</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Manage Inentory</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>


        </li>


      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- ======================================================== -->

    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
