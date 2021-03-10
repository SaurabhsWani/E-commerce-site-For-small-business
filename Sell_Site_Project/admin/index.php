<?php 
include('includes/header.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>
  <?php
  if (isset($_SESSION['Success'])&&$_SESSION['Success']!='') {
    echo '<h2 class="bg-primary text-white">'.$_SESSION['Success'].'</h2>';
    unset($_SESSION['Success']);
  }
  if (isset($_SESSION['Status'])&&$_SESSION['Status']!='') {
    echo '<h2 class="bg-danger text-white">'.$_SESSION['Status'].'</h2>';
    unset($_SESSION['Status']);
  }
  ?>
  <!-- Content Row -->
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-warning border-bottom-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Register Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $query="SELECT bid FROM admin ORDER BY bid";
                $sql_run=mysqli_query($connection,$query);
                $row=mysqli_num_rows($sql_run);
                echo '<h4>Total Admin: '.$row.'</h4>';
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="h1 mb-1 fas fa-user fa-sm fa-fw mr-3 text-gray-600"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary border-bottom-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Register User</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $query="SELECT bid FROM b_person ORDER BY bid";
                $sql_run=mysqli_query($connection,$query);
                $row=mysqli_num_rows($sql_run);
                echo '<h4>Total User : '.$row.'</h4>';
                ?>                
              </div>
            </div>
            <div class="col-auto">
              <i class="h1 mb-1 fas fa-user fa-sm fa-fw mr-3 text-gray-600"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success border-bottom-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Distributer Contacted Us yet</div>
              <div class="row no-gutters align-items-center">
                <div class="col">
                  <?php
                  $query="SELECT id FROM distributer ORDER BY id";
                  $sql_run=mysqli_query($connection,$query);
                  $row=mysqli_num_rows($sql_run);
                  $x1=$row;
                  echo '<h4>Total Distributer : '.$row.'</h4>';
                  ?>                          
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="h1 mb-1 fas fa-user fa-sm fa-fw mr-3 text-gray-600"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php 
include('includes/footer.php');
?>





