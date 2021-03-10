<?php
include('header.php');
?>
<div class="site-section first-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center" data-aos="fade"> 
          <span class="caption d-block mb-2 font-secondary font-weight-bold">Sell Site</span>
            <h2 class="site-section-heading text-uppercase text-center font-secondary">Gallery</h2>
          </div>
        </div>
       </div>
</div>
<div class="row">
<?php
$query="SELECT * FROM gallery";
$sql=mysqli_query($connection,$query);
$x=100;
foreach($sql as $row ) {
  
            ?>
          <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $x?>">
            <img src="<?php echo "admin/image/".$row['image'];?>" alt="Image" class="img-fluid"></a>
          </div>
          <?php $x=($x+100); }

        ?>
        </div>
<?php
include('footer.php');
include('script.php');
?>