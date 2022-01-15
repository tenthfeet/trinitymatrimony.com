<?php include_once "headerpart.php"; ?>
<?php 
 
 require_once "Classes/DBcon.php";
 require_once "Classes/Admin.php";
 require_once "Classes/User.php";
 require_once "Classes/Masters.php";
 
 $party = $_GET['party'];
 $pageheading = $party; 
 //$pageheading = "Customers Details"; 
 $smallheading = date("d-m-Y");
 
 if( !empty( $_GET )){
		try {
			$user_obj = new Class_User();
      if($_GET['id']){
        if($_GET['action'] == "D"){
          $data = $user_obj->user_delete( $_GET );
        }
      } 
		} catch (Exception $e) {
			$error = $e->getMessage();
		}
	}  
?>
<?php include_once "breadcrumbs.php"; ?>


          <div class="col-12">
            <div class="card">
              <!--div class="card-header"></div-->
              <!-- /.card-header -->
              <div class="card-body">
              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width:4%;">#</th>
                    <th style="width:14%;">Name</th>
                    <th style="width:20%;">email</th>
                    <th style="width:10%;">User Type</th>
                    <th style="width:10%;">Contact No</th>
                    <th style="width:10%;">Status</th>
                    <th style="width:15%;">Action</th>
                  </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
<?php     
    $db = new Class_DBcon();
	  $con = $db->con;
      
    $query = "SELECT u.name, u.email, u.usertype, u.phone, u.user_id, u.status FROM ".users." u WHERE 1=1 ORDER BY name ASC";
	  $result = mysqli_query($con, $query);
	  $i = 1;
			
      while($row = $result->fetch_assoc()) {
        print '<tr>';
        print '<td>'.$i.'</td>';
        print '<td>'.$row["name"].'</td>';
        print '<td>'.$row["email"];
        print '</td>';
        print '<td>'.$row["usertype"].'</td>';  
        print '<td>'.$row["phone"].'</td>';
        if($row["status"] == 'Active') { $status = '<span class="label label-success status-label">Active</span>'; } else { $status = '<span class="label label-danger status-label">Disabled</span>';}  
        print '<td>'.$status.'</td>';
        print '<td>';
        print '<a href="#usersdetails.php?id='.$row["user_id"].'&action=E&task=accounts&party='.$party.'" title="Edit" class="btn btn-primary btn-xs">EDT</a>&nbsp;';
        print '<a href="#users.php?id='.$row["user_id"].'&action=D" class="btn bg-red btn btn-xs waves-effect" onClick="return confirm (\'Are you sure, you want to delete?\')" title="Delete">DEL</a>';
        
        print '</td>';
        print '</tr>';
        $i++;
      }
      mysqli_close($con);
?>
  </tbody>
</table>



                  <div class="modal fade"  id="my_modal" tabindex="-1" role="dialog" >
                <div class="modal-dialog" role="document" >
                    <div class="modal-content" style="background-color: #00c0ef !important; border-radius:4px;">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Forget Password</h4>
                        </div>
                        
                        <div class="modal-body">
                          <div id="printThis" class="ct"></div>
				
				    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-yellow waves-effect" style="float:left;" data-dismiss="modal">Close it!</button>
                          
                        </div>
                        
                    </div>
                </div>
            </div>



              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
<?php include "footer.php"; ?>
<script>     
 $(".tiptext").mouseover(function(){ 
   
   $(this).children(".description").show();
 }).mouseout(function() {
   $(this).children(".description").hide();
 });

    
$('#my_modal').on('show.bs.modal', function(e) {
    var bookId = $(e.relatedTarget).data('book-id');
    $(e.currentTarget).find('input[name="bookId"]').val(bookId);
    
     var dataString = 'id=' + bookId;
     alert(dataString);
     $(e.currentTarget).find('.ct').html(bookId);   
     $.ajax({
        type: "GET",
        url: "ajaxtoviewpagedata.php",
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


    
 $(".tiptext").mouseover(function(){ 
   
   $(this).children(".description").show();
 }).mouseout(function() {
   $(this).children(".description").hide();
 });

    </script>