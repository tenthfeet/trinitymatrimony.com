<?php 
/**
 * Developed by tenthfeet.com
 */
ob_start();
session_start();
// Turn off all error reporting
#error_reporting(0);
// Report simple running errors
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
//error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

require_once 'config.php';  
if(!isset($_SESSION['logged_in'])){	header('Location: index.php'); }

// AdminLTE-3.1.0 

 
  function base64_url_encode($input){
    return strtr(base64_encode($input), '+/=', '-_,');
  }


 
  function base64_url_decode($input){
    return base64_decode(strtr($input, '-_,', '+/='));
  }
 
 //$pageheadingdata = base64_url_decode($_GET['d']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo RETAILERS ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/custom/jquery-ui.min.css" type="text/css" />
</head>
<body class="sidebar-mini jcontrol-sidebar-slide-open layout-fixed layout-navbar-fixed layout-footer-fixed accent-maroon" jstyle="height: auto;">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-pink">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <?php $echo_ = '<li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>'; ?>
      <li class="nav-item"><a class="nav-link"> FY : <?php echo $_SESSION['fy']; ?></a></li>
      <li class="nav-item"><a class="nav-link"  href="logout.php" role="button"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link  navbar-info">
      <img src="dist/img/<?php echo LOGO ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>    

<?php include_once "sidebar.php"; ?>
  </aside>