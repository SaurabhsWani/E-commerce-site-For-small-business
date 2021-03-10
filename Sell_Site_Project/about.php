<?php
include('header.php');
?>
<div class="site-section first-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center" data-aos="fade">
            <span class="caption d-block mb-2 font-secondary font-weight-bold">Sell Site</span>
            <h2 class="site-section-heading text-uppercase text-center font-secondary">About us</h2>
          </div>
        </div>
       </div>
</div>


<?php
	$quey="SELECT * FROM aboutus ";
	$sql=mysqli_query($connection,$quey);
	foreach($sql as $row ) {
		?>
    <div class="site-half block">
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
<?php
include('footer.php');
include('script.php');
?>