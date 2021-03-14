<?php
include('header.php');
?>
<!-- <div class="site-section first-section">
  <div class="container">
    <div class="row mb-1">
      <div class="col-md-12 text-center" data-aos="fade">
        <span class="caption d-block mb-2 font-secondary font-weight-bold">Outstanding Services of </span>
        <h2 class="site-section-heading text-uppercase text-center font-secondary">Sell Site</h2>
        <h3 class="caption d-block mb-5 font-secondary font-weight-bold"><h2>About Us</h2></h3>
        </div>
      </div>
    </div>
  </div> -->
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
    echo "No Record Found";
  }
  ?>

  <?php
  $quey="SELECT * FROM aboutus ";
  $sql=mysqli_query($connection,$quey);
  foreach($sql as $row ) {
    ?><div class="site-half block">
      <div class="img-bg-1 " style="background-image: url(<?php echo "admin/image/".$row['image'];?>);" data-aos="fade" data-aos-delay="100" ></div>
      <div class="container">
        <div class="row no-gutters align-items-stretch">
          <div class="col-lg-5 ml-lg-auto py-5">
            <span class="caption d-block mb-2 font-secondary font-weight-bold"><?php echo $row['title']?></span>
            <h2 class="site-section-heading text-uppercase font-secondary mb-5"><?php echo $row['subtitle']?></h2>
            <p><?php echo $row['content']?></p>
          </div>
        </div>
      </div>
    </div>
    <br>
    <?php
  }

  ?>
  <div class="card shadow mb-6">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold ">Reviews From Customers <u><?php echo"Rating: ".$rate;?></u></h6><h8>Click to show More</h8>
    </a>
    <!-- Card Content - Collapse -->
   <!--  <div class="collapse" id="collapseCardExample">
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
              echo '<h5>Customer Name</h5><p>'.$row['First_Name']." ".$row['Last_Name'].'</p>';
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
    </div> -->
  </div>
</div>
<br>
<?php
include('footer.php');
include('script.php');
?>