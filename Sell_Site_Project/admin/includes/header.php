<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<script type="text/javascript">
   function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah')
            .attr('src', e.target.result)
            .width(100)
            .height(100);
            $('#chnge').attr('src','image/arrow.jpg')
            .width(100)
            .height(100);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
   <!-- Sidebar -->
   <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <?php
    include("functions.php");
    include("./functions.php");
    require('security.php');
    $usr=$_SESSION['username'];
    $query="SELECT * FROM admin WHERE bid='$usr'";
    $sql=mysqli_query($connection,$query);
    if(mysqli_num_rows($sql) ) {
      while ($row=mysqli_fetch_assoc($sql) ) {
        ?>
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="rededit.php?edit_id=<?php echo $usr ?>&edit_btn=Edit">
          <div class="sidebar-brand-icon rotate-n-0">
            <?php echo "<div  id='img_div'><img src='image/".$row['image']."' width=50px;height=50px; class='rounded'></div>";?>
          </div>
          <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['name']; ?></div>
        </a>
        <br>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item ">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt  fa-sm fa-fw mr-2 text-gray-200"></i>
            <span>Dashboard</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">
          <li class="nav-item">
            <a class="nav-link collapsed" href="register.php" >
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-200"></i>
              <span>Admin Data</span>
            </a>
          </li>
          <!-- Nav Item - Tables -->
          <li class="nav-item">
            <a class="nav-link" href="tables.php">
              <i class="fas fa-fw fa-table fa-sm fa-fw mr-2 text-gray-200"></i>
              <span>USER DATA</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="distributer.php">
                <i class="fas fa-fw fa-list fa-sm fa-fw mr-2 text-gray-200"></i>
                <span>Distributer List</span></a>
              </li>

              <!-- Divider -->
              <hr class="sidebar-divider">
              <!-- Nav Item - Pages Collapse Menu -->
               <li class="nav-item">
                <a class="nav-link" href="abtus.php">
                  <i class="fas fa-info-circle fa-sm fa-fw mr-2 text-gray-200"></i>
                  <span>About us</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="category.php">
                    <i class="fas fa-cubes fa-sm fa-fw mr-2 text-gray-200"></i>
                    <span>Product Category</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Cities.php">
                    <i class="fas fa-building fa-sm fa-fw mr-2 text-gray-200"></i>
                    <span>Cities</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="footer.php">
                    <i class="fas fa-arrow-circle-down fa-sm fa-fw mr-2 text-gray-200"></i>
                    <span>Footer</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="gal.php">
                    <i class="fas fa-image fa-sm fa-fw mr-2 text-gray-200"></i>
                    <span>Gallery</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Navigation.php">
                    <i class="fas fa-bars fa-sm fa-fw mr-2 text-gray-200"></i>
                    <span>Navigation Bar</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="newupd.php">
                    <i class="fas fa-recycle fa-sm fa-fw mr-2 text-gray-200"></i>
                    <span>New Update</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="review.php">
                    <i class="fas fa-thumbs-up fa-sm fa-fw mr-2 text-gray-200"></i>
                    <span>Review</span>
                  </a>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="slider.php">
                    <i class="fas fa-arrows-alt fa-sm fa-fw mr-2 text-gray-200"></i>
                    <span>Slider</span>
                  </a>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                  <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
              </ul>
              <!-- End of Sidebar -->
              <!-- Content Wrapper -->
              <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                  <!-- Topbar -->
                  <nav class="navbar navbar-expand navbar-light bg-gradient-info topbar mb-4 static-top shadow">

                    <ul class="navbar-nav ml-auto">
                      <!-- Nav Item - User Information -->
                      <li class="nav-item dropdown no-arrow">
                        <a class="nav-link text-gray-200" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Review&emsp;  
                          <?php
                          $query = "SELECT * from `review` where `status` = 'unread' order by `DATE` DESC";
                          if(count(fetchAll($query))>0){
                            ?>
                            <span class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
                            <?php
                          }
                          ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                          <?php
                          $query = "SELECT * from `review` order by `DATE` DESC ";
                          if(count(fetchAll($query))>0){
                           foreach(fetchAll($query) as $i ){
                            if ($i['status']=='unread') {                      
                              ?>
                              <form action="review.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $i['id'] ?>">
                                <button style ="
                                <?php
                                if($i['status']=='unread'){
                                  echo "font-weight:bold;";
                                }
                                ?>
                                " class="dropdown-item" name="btn" >
                                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['DATE'])) ?></i></small><br/>
                                <?php 
                                echo "New Review Recived.";?>
                              </button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <?php
                          }
                        }
                        echo "No Further Review yet.";             
                      }
                      else{
                       echo "No Further Review yet.";
                     }
                     ?>
                   </div>
                 </li>
                 <li class="nav-item dropdown no-arrow">
                  <a class="nav-link text-gray-200" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notifications&emsp;  
                    <?php
                    $query = "SELECT * from `distributer` where `status` = 'unread' order by `DATE` DESC";
                    if(count(fetchAll($query))>0){
                      ?>
                      <span class="badge badge-light"><?php echo count(fetchAll($query)); ?></span>
                      <?php
                    }
                    ?>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <?php
                    $query = "SELECT * from `distributer` order by `DATE` DESC ";
                    if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i ){
                      if ($i['status']=='unread') {                      
                        ?>
                        <form action="distributer.php" method="POST">
                          <input type="hidden" name="id" value="<?php echo $i['id'] ?>">
                          <button style ="
                          <?php
                          if($i['status']=='unread'){
                            echo "font-weight:bold;";
                          }
                          ?>
                          " class="dropdown-item" name="btn" >
                          <small><i><?php echo date('F j, Y, g:i a',strtotime($i['DATE'])) ?></i></small><br/>
                          <?php 
                          echo "New Contact Recived.";?>
                        </button>
                      </form>
                      <div class="dropdown-divider"></div>
                      <?php
                    }
                  }
                  echo "No Further Notification yet.";             
                }
                else{
                 echo "No Further Notification yet.";
               }
               ?>
             </div>
           </li>
           <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle text-gray-200" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <!-- <span class="mr-2 d-none d-lg-inline text-white-1000 small"></span> -->
              <i class=" mb-0 fas fa-fw fa-cog fa-sm fa-fw mr-1 text-gray-200"></i> Setting
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a><form action="rededit.php" method="get" enctype="multipart/form-data">
                <input type="hidden" name="edit_id" value="<?php echo $row['bid'];?>">
                &emsp; <button  type="submit" name="edit_btn" value="Edit" class="btn "><i class="h5 fas fa-user fa-mx fa-fw mr-1 text-gray-1000"></i> Profile</button>
                </form></a><?php }}?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <button class="btn  btn-user btn-block"><i class="fas fa-sign-out-alt fa-mx fa-fw mr-1 text-gray-1000"></i>
                  Logout</button>
                </a>
              </div>

            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                <form action="logout.php" method="POST">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <button type="submit" name="logout_btn" class="btn btn-primary" >Logout</button>
                </form>

              </div>
            </div>
          </div>
        </div>