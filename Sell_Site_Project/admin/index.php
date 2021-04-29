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
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $query="SELECT bid FROM admin ORDER BY bid";
                $sql_run=mysqli_query($connection,$query);
                $row=mysqli_num_rows($sql_run);
                echo '<h4> Admin: '.$row.'</h4>';
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
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Registered User</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $query="SELECT bid FROM b_person ORDER BY bid";
                $sql_run=mysqli_query($connection,$query);
                $row=mysqli_num_rows($sql_run);
                echo '<h4> User : '.$row.'</h4>';
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
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Connected Distributers</div>
              <div class="row no-gutters align-items-center">
                <div class="col">
                  <?php
                  $query="SELECT id FROM distributer ORDER BY id";
                  $sql_run=mysqli_query($connection,$query);
                  $row=mysqli_num_rows($sql_run);
                  $x1=$row;
                  echo '<h4>Distributer : '.$row.'</h4>';
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
    <?php
    $noofrows=0;
    $prdname="Select Another Product";
    if ($_SERVER["REQUEST_METHOD"]=="GET") 
    {
      if (isset($_GET['Prd'])) {
        $month = array();
        $prdid=$_GET['Prd'];
        $arr = explode('-', $prdid);
        $prdid= $arr[0];
        $cprice= $arr[1];
        $sellval=array();
        $ppm=array();
        $wcb=select("*","prdanalysis","WHERE prdid='$prdid' ORDER BY srid DESC");
        $noofrows=mysqli_num_rows($wcb);
        if (mysqli_num_rows($wcb)>0)
        {
          while($row=mysqli_fetch_assoc($wcb))
          {
            array_push($month,$row['month']);
            array_push($sellval,$row['itmcount']);
            array_push($ppm,$row['pricepermonth']);
            $prdname=$row['prdname'];
          }
        }
        else
        {
          array_push($month,0);
          array_push($sellval,0);
          $prdname="No Sell of Selected Item Yet";
        }
        $jmonth=json_encode($month);
        $jsellval=json_encode($sellval); 
      }
    }
    ?>
    <div class="col-xl-12 " id="graph">
      <div class="card shadow mb-4" >
        <div class="card-header py-3 bg-gradient-light text-gray-900">
          <div class="row">
            <form method="get" action="index.php#graph" class="col-md-6">
              <div class="form-group ">
                <label for="exampleFormControlSelect1">Select Item to see chart</label>
                <select class="form-control" name="Prd" title="Select Product to see graph" id="exampleFormControlSelect1">

                  <?php
                  if ($_SERVER["REQUEST_METHOD"]=="GET") 
                  {
                    if (isset($_GET['Prd'])) {
                      echo "<option  value='".$prdid."'>".strtoupper($prdname)."</option>";
                    }
                  }
                  $getprd=select("*","category","ORDER BY id DESC");
                  if (mysqli_num_rows($getprd)>0)
                  {
                    while($row=mysqli_fetch_assoc($getprd))
                    {
                      echo "<option  value='".$row['id']."-".$row['costprice']."'>".strtoupper($row['name'])."</option>";
                    }
                  }
                  ?>
                </select>
                <button type="submit" class="form-control btn btn-primary" name="Show">Show Graph</button>
              </div>
            </form>
            <div class="col-md-6">
              <?php
              if ($_SERVER["REQUEST_METHOD"]=="GET" AND $noofrows>0) 
              {
                if (isset($_GET['Prd']))
                  { ?>
                    <table class="bg-gray-200 text-gray-900 " cellspacing="0" border="" style="text-align: center;">
                      <thead>
                        <tr>
                          <td>Product </td>
                          <td>Month</td>
                          <td>Total Sell</td>
                          <td>Month SP (<?php echo $cprice; ?>)</td>
                          <td>Total CP</td>
                          <td>Total SP</td>
                          <td>Profit/Loss <i class="fas fa-arrow-up"></i><i class="fas fa-arrow-down"></i></td>
                        </tr> 
                      </thead>
                      <tbody>
                        <?php 
                        $ttlsp=$ttlcp=$tsitmc=0;
                        for ($i=0; $i < count($sellval); $i++) { 
                          $tsitmc+=$sellval[$i];
                          $tcp=$sellval[$i]*$cprice;
                          $tsp=$sellval[$i]*$ppm[$i];
                          $profitorloss=$tsp==$tcp?" ":($tsp>$tcp?" <i class='fas fa-arrow-up text-success'></i>":" <i class='fas fa-arrow-down text-danger'></i>");
                          echo "<tr>
                          <td>".strtoupper($prdname)."</td>
                          <td>".$month[$i]."</td>
                          <td>".$sellval[$i]."</td>                          
                          <td>".$ppm[$i]."</td>
                          <td>".$tcp."</td>
                          <td>".$tsp."</td>
                          <td>".($tsp-$tcp),$profitorloss."</td>
                          </tr>
                          ";
                          $ttlsp=$ttlsp+($sellval[$i]*$ppm[$i]);
                          $ttlcp=$ttlcp+($sellval[$i]*$cprice);
                        }
                        $tprofitorloss=$ttlsp==$ttlcp?"":$ttlsp>$ttlcp?" <i class='fas fa-arrow-up text-success'></i>":" <i class='fas fa-arrow-down text-danger'></i>";
                        ?> 
                        <tr><td>Total</td><td></td><td><?php echo $tsitmc;?></td><td></td><td><?php echo $ttlsp; ?></td><td><?php echo $ttlcp; ?></td><td><?php echo($ttlsp-$ttlcp),$tprofitorloss ?></td></tr>
                      </tbody>
                    </table>
                    <?php
                  }
                }
                ?>
              </div>
            </div>
            <h6 class="m-0 font-weight-bold text-primary">
              <?php echo strtoupper($prdname);?>
            </h6>
          </div>
          <?php if ($_SERVER["REQUEST_METHOD"]=="GET" AND $noofrows>0) 
          {
            ?> 
            <div class="card-body ">
              <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
              </div>
              <hr>
              The Graph Shows the selling of product in a month 
              <code><?php echo strtoupper($prdname);?> Sell Vs Month</code>.
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
  <?php 
  include('includes/footer.php');
  ?>





