<<<<<<< HEAD
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; 2010-2021 <a href="<?php echo COPYRIGHTURL; ?>"><?php echo COPYRIGHTNAME; ?></a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!--script src="dist/js/demo.js"></script-->
<!-- Page specific script -->
<script>
  $(function () {
    $("#tableid").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, 
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
/*    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
*/    
  });
</script>
<script>
// to set local storage for active treemenu 
  $(document).ready(function () {
    $(".treeview").click(function () {
      localStorage.removeItem("treeviewactivekey");
      var value = $(this).attr('id');
      localStorage.setItem("treeviewactivekey", value)
      $("#"+tab).addClass("active");
      activaTab(value);
    });
  });
  window.onload = function() {
    if(localStorage.getItem("treeviewactivekey")==null){
      localStorage.setItem("treeviewactivekey", "tv0");
      activaTab("tv0"); 
    }
    else {
      activaTab(localStorage.getItem("treeviewactivekey")); 
    }
  }
  function activaTab(tab){
    $(".treeview li").removeClass("active menu-is-opening menu-open");
    $("#"+tab).addClass("active menu-is-opening menu-open");
    $("#treeviewactivekey").val(tab);
  };
</script>   
</body>
=======
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; 2010-2021 <a href="<?php echo COPYRIGHTURL; ?>"><?php echo COPYRIGHTNAME; ?></a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!--script src="dist/js/demo.js"></script-->
<!-- Page specific script -->
<script>
  $(function () {
    $("#tableid").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, 
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
/*    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
*/    
  });
</script>
<script>
// to set local storage for active treemenu 
  $(document).ready(function () {
    $(".treeview").click(function () {
      localStorage.removeItem("treeviewactivekey");
      var value = $(this).attr('id');
      localStorage.setItem("treeviewactivekey", value)
      $("#"+tab).addClass("active");
      activaTab(value);
    });
  });
  window.onload = function() {
    if(localStorage.getItem("treeviewactivekey")==null){
      localStorage.setItem("treeviewactivekey", "tv0");
      activaTab("tv0"); 
    }
    else {
      activaTab(localStorage.getItem("treeviewactivekey")); 
    }
  }
  function activaTab(tab){
    $(".treeview li").removeClass("active menu-is-opening menu-open");
    $("#"+tab).addClass("active menu-is-opening menu-open");
    $("#treeviewactivekey").val(tab);
  };
</script>   
</body>
>>>>>>> 80ad18a9e8edf8966f3abec631dd834096f06899
</html>