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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo TITLE ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->         
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <div class="login-logo"><a href="index.php"><b><?php echo RETAILERSBOLD ?></b><?php echo RETAILERSNORMAL ?></a></div>
  <!-- /.login-logo -->
<?php
	$error = '';
    if(isset($_POST['reset'])) {
      if( !empty( $_POST )){
        try {
		  $user_obj = new Class_User();
		  $data = $user_obj->resetpassword( $_POST );
		  
		} catch (Exception $e) {  $error = $e->getMessage(); }
	  }
    }
    

  	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){ header('Location: dashboard.php'); }
    else {  //$error = 'unauthorized access'; 
    }
?>


        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Reset your Password</p>
            <div class="text-center"><img src="dist/img/<?php echo LOGO; ?>" jclass="user-image img-squre img-center" class="rounded mx-auto d-block" style="width:200px;" alt="User Image"></div>
            <form id="login-form" method="post" class="form-signin" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <?php if($error != '') { ?>
              <div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">X</span></button>
              <?php 
                // echo	$error; 
                if($error == LOGIN_FAIL) { echo "invalid username or password ! Try again "; }      
              ?>
              </div>                  
              <?php } 
                if($_GET['sts']){ ?>
              <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><b style="color:#FFFFFF !important;">X</b></span></button>
              <?php echo $_GET['sts']; ?>
              </div>
              <?php }  ?>
              
        <div class="input-group mb-3"><input type="text" class="form-control" placeholder="secretcode" name="secretcode" id="secretcode" required jautofocus /><div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div></div>
        <div class="input-group mb-3"><input type="password" class="form-control" placeholder="password" name="password" required /><div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div></div>
        
        
        <div class="row"> <div class="col-8">   <a href="index.php" class="text-success btn btn-block btn-xs">I remember my password! <br> Go to Sign in page !!</a> </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="reset" id="reset" class="btn btn-primary btn-block">Reset</button>
             <!--button type="submit" name="fp" class="btn bg-blue waves-effect"  style="float:right;">Send me Password</button-->
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->

        
  </div>
  
  
  
  
  
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
  <script>
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());

    $('#fy').datepicker({ autoclose: true, dateFormat: 'dd-mm-yy' }); 


</script>
</body>
</html>
