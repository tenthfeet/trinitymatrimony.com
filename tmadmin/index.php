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
    if(isset($_POST['login'])) {
      if( !empty( $_POST )){
        try {
		  $user_obj = new Class_User();
		  $data = $user_obj->login( $_POST );
		  if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){  header('Location: invoices.php?invoicetype=I'); }
		} catch (Exception $e) {  $error = $e->getMessage(); }
	  }
    }
    else if(isset($_POST['fp'])) {
      if( !empty( $_POST )){
	    try {
		  $user_obj = new Class_User();
//          if($_POST['email']){  $data = $user_obj->forgetpassword( $_POST ); }
          if($_POST['email']){  $data = $user_obj->secretcode( $_POST ); }           
		
        } catch (Exception $e) {  $error = $e->getMessage(); }
	  }
    }

  	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){ header('Location: dashboard.php'); }
    else {  //$error = 'unauthorized access'; 
    }
?>


        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <div class="text-center"><img src="dist/img/<?php echo LOGO; ?>" jclass="user-image img-squre img-center" class="rounded mx-auto d-block" style="width:200px;" alt="User Image"></div><br />
            <form id="login-form" method="post" class="form-signin" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <?php if($error != '') { ?>
              <div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">X</span></button>
              <?php 
                // echo	$error; 
                if($error == LOGIN_FAIL) { echo "invalid username or password ! Try again "; }      
              ?>
              </div>                  
              <?php } //6S4rbYnPko 
                if($_GET['sts']){ ?>
              <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><b style="color:#FFFFFF !important;">X</b></span></button>
              <?php echo $_GET['sts']; ?>
              </div>
              <?php }  ?>
              
        <div class="input-group mb-3"><input type="email" class="form-control" placeholder="email" name="email" id="email" required jautofocus /><div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div></div>
        <div class="input-group mb-3"><input type="password" class="form-control" placeholder="password" name="password" required /><div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div></div>
        <!--div class="form-group has-feedback"><select class="form-control" name='fy' id='fy' style="width:100%; jborder:none;" required><option value=''>Select Financial Year</option>
          <?php for($i=2021; $i <= 2021; $i++) {  echo "<option value='".$i."'>".$i."-".($i+1)."</option>";  } ?></select>    
        </div-->
        
        <div class="row"> <div class="col-8">   <a href="#my_modal" data-color="red" data-toggle="modal" class="btn bg-red waves-effect" jdata-book-id="">Forgot Password?</a> </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" id="login" class="btn btn-primary btn-block">Sign In</button>
             <!--button type="submit" name="fp" class="btn bg-blue waves-effect"  style="float:right;">Send me Password</button-->
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->

         <div class="modal fade" id="my_modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Forget Password</h4>
                        </div>
                         <form id="fp-form" method="post" class="form-signin" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="modal-body">
                     
				<div class="form-group">
					<label class="mb-2">Please enter your email address</label>
					<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder=" your email" required="">
					<!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
				</div>
				    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-yellow waves-effect" style="float:left;" data-dismiss="modal">No, close it!</button>
                            <button type="submit" name="fp" class="btn bg-blue waves-effect"  style="float:right;"><!--Send me Password-->Reset My Password</button>
                            
                        </div>
                        	</form>
                    </div>
                </div>
            </div>
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

    $('#my_modal').on('show.bs.modal', function(e) {
    var bookId = $(e.relatedTarget).data('book-id');
    $(e.currentTarget).find('input[name="bookId"]').val(bookId);
    
     var dataString = 'id=' + bookId;
     $(e.currentTarget).find('.ct').html(bookId);   
     $.ajax({
        type: "GET",
        url: "labelprint.php",
        data: dataString,
        cache: false,
        success: function (data) {
          console.log(data);
         $(e.currentTarget).find('.ct').html(data);
        },
        error: function(err) {
          console.log(err);
        }
      }); 
});
</script>
</body>
</html>
