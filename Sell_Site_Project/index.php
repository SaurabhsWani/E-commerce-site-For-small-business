<?php
include('header.php');
?>
<div class="container">
  <div class="row mb-1">
    <div class="col-md-12 text-center" data-aos="fade">
      <span class="caption d-block font-secondary font-weight-bold">Outstanding Services of </span>
      <h2 class="site-section-heading text-uppercase text-center font-secondary">Sell Site</h2>
      <h3 class="caption d-block font-secondary font-weight-bold"><h2>Home</h2></h3>
    </div>
  </div>
</div>
<?php
$query="SELECT * FROM review INNER JOIN b_person ON review.id=b_person.bid";
$sql=mysqli_query($connection,$query);
$sum=0;
$y=0;
$x=0;
if (mysqli_num_rows($sql)>0)
{
  while ($row=mysqli_fetch_assoc($sql))
  {
    if ($row['display']=='yes')
    {
      $x=intval($row['rate']);
      $y++;
    }
    $sum=$sum+$x;
  }
  $rate=$sum==0?100:intval($sum/$y);
}
else
{
  $rate=0;
}
?>
<div class="col-md-11 ml-auto mr-auto">
  <div class="row " id='res'>
    <?php 
    if ($_SERVER["REQUEST_METHOD"]=="GET") 
    {
      $sq=isset($_GET['sq'])?$_GET['sq']:" ";
      $query="SELECT * FROM category WHERE name LIKE '%$sq%' ORDER BY RAND()";
      $sql=mysqli_query($connection,$query);
      if (mysqli_num_rows($sql)>0) {
        echo "<div class='col-md-12 text-info h4'>".mysqli_num_rows($sql)." Results </div>";
        while ($row=mysqli_fetch_assoc($sql)) {
          ?>
          <div class="col-md-3">
            <div class="card card-post card-round">
              <?php echo "<img class='card-img-top' src='admin/image/".$row['image']."' width=100px; height=200px;>";?>
              <div class="card-body">
                <div class="d-flex">
                  <div class="info-post ml-2">
                    <h3 class="card-title">
                      <a href="user/ulogin.php?f=ind"><?php echo $row['name']?></a>
                    </h3>
                    <p class="username">Rs. <?php echo $row['price']."&emsp;".$row['pname']?></p>
                  </div>
                </div>
                <div class="separator-solid"></div>
                <!-- <p class="card-category text-info mb-1"><a href="#">Design</a></p> -->               
                <!-- <p class="card-text">Reviews</p> -->
                <a href="user/ulogin.php?f=ind">
                  <button type="submit" name="wishlist" class="btn btn-icon btn-info">
                    <i class="icon-heart"></i>
                  </button>
                  <button type="submit" name="cart" class="btn btn-icon btn-round btn-info">
                    <i class="icon-cart-plus"></i>
                  </button>
                  <?php if($row['noofpr'] > 0){?>
                  <button type="submit" name="buynow" class="btn btn-primary">Buy Now</button>
                  <?php }else{ ?>
                  <a href="#" class="btn btn-sm btn-danger btn-border ">OutOfStock</a>
                  <?php } ?>
                </a>
                <!-- <a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a> -->
              </div>
            </div>
          </div>
          <?php
        }
      }
    }
    ?>
  </div>
  <hr>
  <div class="row ">
    <div class='col-md-12 text-warning h4'><center>Our Products</center></div><br><br>
    <?php 
    $query="SELECT * FROM category ORDER BY RAND()";
    $sql=mysqli_query($connection,$query);
    if (mysqli_num_rows($sql)>0) {
      while ($row=mysqli_fetch_assoc($sql)) {
        ?>
        <div class="col-md-3">
          <div class="card card-post card-round">
            <?php echo "<img class='card-img-top' src='admin/image/".$row['image']."' width=100px; height=200px;>";?>
            <div class="card-body">
              <div class="d-flex">
                <div class="info-post ml-2">
                  <h3 class="card-title">
                    <a href="user/ulogin.php?f=ind"><?php echo $row['name']?></a>
                  </h3>
                  <p class="username">Rs. <?php echo $row['price']."&emsp; Quantity ".$row['pname']?></p>
                </div>
              </div>
              <div class="separator-solid"></div>
              <!-- <p class="card-category text-info mb-1"><a href="#">Design</a></p> -->               
              <!-- <p class="card-text">Reviews</p> -->
              <a href="user/ulogin.php?f=ind">
                <button type="submit" name="wishlist" class="btn btn-icon btn-info">
                  <i class="icon-heart"></i>
                </button>
                <button type="submit" name="cart" class="btn btn-icon btn-round btn-info">
                  <i class="icon-cart-plus"></i>
                </button>
                <?php if($row['noofpr'] > 0){?>
                <button type="submit" name="buynow" class="btn btn-primary">Buy Now</button>
                <?php }else{ ?>
                <a href="#" class="btn btn-sm btn-danger btn-border ">OutOfStock</a>
                <?php } ?>
              </a>
              <!-- <a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a> -->
            </div>
          </div>
        </div>
        <?php
      }
    }
    ?>
  </div><br>
<div class="card shadow mb-6">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="m-0 font-weight-bold ">Reviews From Customers <u><?php echo"Rating: ".$rate;?></u></h6><h8>Click to show More</h8>
  </a>
  <!-- Card Content - Collapse -->
  <div class="collapse" id="collapseCardExample">
    <div class="card-body">
      <?php
      $query="SELECT * FROM review INNER JOIN b_person ON review.id=b_person.bid";
      $sql=mysqli_query($connection,$query);
      $sum=0;
      $y=0;
      $x=0;
      if (mysqli_num_rows($sql)>0)
      {
        echo "<div class='row'>";
        while ($row=mysqli_fetch_assoc($sql))
        {
          if ($row['display']=='yes')
          {
            echo "<div class='col-md-4'>";
            echo '<h5>Customer Name</h5><p>'.$row['Name'].'</p>';
            echo '<h5>Review</h5><p>'.$row['review'].'</p>';
            echo '<h5>Rate</h5>'.$row['rate'].'/100<hr>';
            echo "</div>";
            $x=$row['rate'];
            $y++;
          }
          $sum=$sum+$x;
        }
        $rate=intval($sum/$y);
        echo "</div>";
        echo "Rating Of Sell Site :- ".$rate;
      }
      else
      {
        echo "No Record Found";
      }
      ?>
    </div>
  </div>
</div>
</div>
<br>
<?php
include('footer.php');
include('script.php');
?>