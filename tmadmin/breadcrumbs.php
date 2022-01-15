
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5><?php echo $pageheading; ?></h5>
             <?php
               if($_GET['sts']){ ?>
               <div class="alert" style="color:green;">
                 <span class="closebtn" style="color:red;cursor:pointer;" onclick="this.parentElement.style.display='none';">&times;</span>
                 <?php echo $_GET['sts']; ?>&nbsp; <!--a href="<?php echo $_GET['addmore']; ?>" title="Add more" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i>Add more </a-->
               </div>
            <?php }  ?>
          </div>
          <div class="col-sm-6">
            
             <?php  if (strpos($_SERVER['REQUEST_URI'],'details')  || strpos($_SERVER['REQUEST_URI'],'dashboard') || strpos($_SERVER['REQUEST_URI'],'reports') ) { /* do not show add more link */ } else { ?>
            
            <ol class="breadcrumb float-sm-right">
              <li><a href="<?php  $filewithextn = $_SERVER['REQUEST_URI']; $qrystring = $_SERVER['QUERY_STRING']; 
                                  if($qrystring){ echo basename($filewithextn, '.php'.'?' . $_SERVER['QUERY_STRING']); }
                                  else { echo basename($filewithextn, '.php'); } ?>details.php?<?php echo $qrystring; ?>" title="Add New" class="btn btn-success btn-xs">
                                  <i class="fa fa-edit"></i>&nbsp;ADD NEW</a>
              </li>
                                  <?php }   //echo basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);  ?>
           </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
        