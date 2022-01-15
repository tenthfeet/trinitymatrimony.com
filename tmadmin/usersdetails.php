<?php include_once "headerpart.php"; ?>
<?php 
 
 require_once "Classes/DBcon.php";
 require_once "Classes/Admin.php";
 require_once "Classes/User.php";
 require_once "Classes/Masters.php";
 
 require_once "Classes/DBcon.php";
 require_once "Classes/Admin.php";
 require_once "Classes/User.php";
 require_once "Classes/Masters.php";
 
 $party = $_GET['party'];
 $pageheading = Users; 
 $smallheading = date("d-m-Y");

  if( !empty( $_POST )){
		try {
			$user_obj = new Class_User();
      if($_POST['hid_id']){
          $data = $user_obj->user_edit( $_POST );
          
      } 
      else { 
        $data = $user_obj->users_add( $_POST );
      }       
				echo "success".$data;
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	}

	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){		
    //header('Location: dashboard.php');
  }
?>
<?php 
  if($_GET['id']){
	  $id = $_GET['id'];
  
    $db = new Class_DBcon();
		$con = $db->con;
  	$query = "SELECT * FROM ".users." where user_id = ".$id;
	$result = mysqli_query($con, $query);
			
	$row = $result->fetch_assoc();
	
   	mysqli_close($con);
  }

	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){ }
?>
<?php $task = $_GET['task']; 
  $action = $_GET['action'];
  if($action == 'V'){ $readonly = 'readonly';  $disabled = 'disabled'; } else { $readonly = ''; $disabled = ''; } 

?>
<?php $task = $_GET['task']; ?>
<?php include_once "breadcrumbs.php"; ?>
 
          <div class="col-12">
            <div class="card">
              <!--div class="card-header"></div-->
              <!-- /.card-header -->
              <div class="card-body">
              <form class="form" id="visitorsdetails" name="visitorsdetails" method="post" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                <input type="hidden" name="hid_id" id="hid_id" class="form-control" value="<?php echo $id; ?>">
                <input type="hidden" name="party" id="party" class="form-control" value="<?php echo $party; ?>">

                 <!--div class="form-group form-float">                      
                        <?php   $U = '';  $A = '';  $SA = '';  
                        if($row['usertype'] == "User") { $U="Selected"; }
                        if($row['usertype'] == "Admin") { $A="Selected"; } 
                        if($row['usertype'] == "Superadmin") { $SA="Selected"; }  
                        ?>
                        <!--label>User Type</label> * 
                        <select class="form-control" id="usertype" name="usertype" required <?php echo $disabled; ?> >
                          <option value="Admin" <?php echo $A; ?> >Admin</option>
                          <option value="User" <?php echo $U; ?> >User</option>
                        </select>
                 </div-->
                      
                <div class="form-group">
                      <label>Name <span class="starred">*</span></label>
                      <input type="text" class="form-control" id="name" name="name" jplaceholder="Name"  pattern="[A-Za-z0-9 -#_]+{3,100}" title="3 to 100 characters and special chars '#', '_' and '-' " maxlength="100" required value="<?php echo $row['name']; ?>"  <?php echo $readonly; ?>>
                </div>
                <div class="form-group">
                      <label>eMail  <span class="starred">*</span>&nbsp;</label>
                      <input type="text" class="form-control" id="email" name="email"  pattern="[A-Za-z0-9 -#_@]+{3,250}" title="3 to 250 characters " maxlength="250"  required value="<?php echo $row['email']; ?>" <?php echo $readonly; ?>>
                </div>
                    
                <div class="form-group">
                     <label>Password <span class="starred">*</span>&nbsp;</label> 
                      <input type="text" class="form-control" id="password" name="password"  pattern="[A-Za-z0-9 -#_]+{3,250}" title="3 to 250 characters " maxlength="250" nrequired value="<?php echo $row['password']; ?>" <?php echo $readonly; ?> >
                </div>
                    
                    
                <div class="form-group">
                      <label>Mobile <span class="starred">*</span></label>
                      <input type="text" class="form-control" id="phone" name="phone" jplaceholder="Mobile" pattern="[0-9+- #_]+{9,20}" title="9  - 20 chars " maxlength="20" required value="<?php echo $row['phone']; ?>" <?php echo $readonly; ?>>
                </div>      
                <div class="form-group">
                      <label>Franchisee Name <span class="starred">*</span></label>
                      <input type="text" class="form-control" id="franchiseename" name="franchiseename" maxlength="220" required value="<?php echo $row['franchiseename']; ?>" <?php echo $readonly; ?>>
                </div>                  
                <div class="form-group">
                      <label>Address <span class="starred">*</span></label>
                      <input type="text" class="form-control" id="address1" name="address1" maxlength="220" required value="<?php echo $row['address1']; ?>" <?php echo $readonly; ?>>
                </div>                  
                <div class="form-group">
                      <label>Lat Long Coordinates </label>
                      <input type="text" class="form-control" id="latlong" name="latlong" maxlength="220" nrequired value="<?php echo $row['latlong']; ?>" <?php echo $readonly; ?>>
                </div>                                                      
                    
                 <div class="row">                    
                   <div class="col-xs-12 jcol-md-6">    <p id="output"></p>                  
                        <?php if($row['idproof'] != ''){      $pdf =  $row['idproof'];  echo "<span style='color:#00A65A;'>PO file available </span>"; }?> 
                        <input type="hidden" id="idproof" name="idproof" value=""> <!--p class="help-block">Upload files within 2 MB Size - doc/docx/pdf/jpg/gif/png are valid file types</p></div-->
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#uploadModal1" data-id="1" >Upload ID Proof</button>
                                <!-- Modal -->
                            <div id="uploadModal1" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                              <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">File upload</h4>
                                  </div>
                                  <div class="modal-body">
                                  <!-- Form -->
                                  Select file : <input type='file' name='file1' id='file1' class='form-control' ><br>
                                  <input type='button' class='btn btn-info' value='Upload' id='btn_upload1'>
                                  <!-- Preview-->
                                  <div id='preview1'></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                      </div>
                 </div>
                 




                    
                <div class="form-group">
                    <?php   $A = 'Selected';  $D = '';   if($row['status'] == "Disabled") { $D="Selected"; } ?>
                      <label>Status </label>
                        <select class="form-control" id="status" name="status" required <?php echo $disabled; ?>>
                          <option value="Active" <?php echo $A; ?> >Active</option>
                          <option value="Disabled" <?php echo $D; ?> >Disable</option>
                        </select>
                </div>
                
              
                <div class="col-md-3">&nbsp;</div>
                
                <div class="col-xs-12">
                    <div class="card-footer">
                      <button type="button" class="btn btn-default pull-right" onclick="window.history.go(-1); return false;">Cancel</button>
                      <button type="submit" class="btn btn-info pull-right">Submit</button>
                    </div><!-- /.box-footer -->
                </div>
                <div class="col-md-3">&nbsp;</div>
              </form>
            </div>
                <!-- /.card-body -->
          </div>
              <!-- /.card -->
        </div>
<?php include "footer.php"; ?>
  <script type="text/javascript">
  
   //function myFunction() {  document.getElementById("myForm").reset(); }
   
   $(document).ready(function(){
                $('#btn_upload1').click(function(){
                
                var fd = new FormData();
                var files = $('#file1')[0].files[0];
                fd.append('file',files);
                
                
                // AJAX request
                $.ajax({
                    url: 'ajaxfileupload.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        if(response != 0){
                            // Show image preview
                            //$('#preview').append("<img src='"+response+"' width='100' max-height='100' style='display: inline-block;'>");
                            $('#preview1').append("File Uploaded Successfully");
                            $('#idproof').val(response);
                        }else{
                            $('#preview1').append("File not Uploaded");
                        }
                    }
                });
            });
            
            
  });      
  </script>          