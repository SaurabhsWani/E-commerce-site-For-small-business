<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sell Site</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <div class="site-wrap">
<!-- site translater -->
    <!-- <div class="site-navigation text-right" id="google_translate_element">  </div> -->
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <!-- .site-mobile-menu -->
    <div class="site-navbar-wrap js-site-navbar bg-white">
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="row align-items-center">
            <div class="col-md-2">
              <h2 class="mb-0 site-logo"><a href="asdfg" class="font-weight-bold text-uppercase">
             <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span>
             </a></div>
             <?php
              include('security.php');
              $query="SELECT * FROM nav";
              $sql=mysqli_query($connection,$query);
              if (mysqli_num_rows($sql)>0) {
                while ($row=mysqli_fetch_assoc($sql)) {
                 echo "<img src='admin/image/".$row['image']."' width=33px; height=33px;>";

               }}?>
             Sell Site</a>
           </h2>
         </div>
         <div class="col-md-10">
          <?php
          include('security.php');
          $query="SELECT * FROM nav";
          $sql=mysqli_query($connection,$query);
          if (mysqli_num_rows($sql)>0) {
            while ($row=mysqli_fetch_assoc($sql)) {
             ?>
             <nav class="site-navigation text-right" role="navigation">
              <div class="container">
                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="#"><a href="asdfg"><?php echo $row['h1'];?></a></li><!-- 
                  <li><a href="admin/login.php"><?php echo $row['h2'];?></a></li> -->
                  <li><a href="user/ulogin.php"><?php echo $row['h3'];?></a></li>
                  <li><a href="tyuio"><?php echo $row['h4'];?></a></li>
                  <li><a href="zxcvb"><?php echo $row['h5'];?></a></li>
                  <li><a href="akihdar"><?php echo $row['h6'];?></a></li>
                </ul>
              </div>
            </nav>
          <?php }}?>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<!-- <?php
$quer="SELECT * FROM slider";
$sql=mysqli_query($connection,$quer);
?>
<div class="slide-one-item home-slider owl-carousel">
  <?php
  foreach($sql as $row ) {
    ?>
    <div class="site-blocks-cover inner-page overlay" style="background-image: url(<?php echo "admin/image/".$row['image'];?>);" data-aos="fade" data-stellar-background-ratio="0">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center" data-aos="fade">
            <h1 class="font-secondary  font-weight-bold text-uppercase"><strong><?php echo $row['h1'];?></strong></h1>
            <h3 class="font-secondary  font-weight-bold text-uppercase"><?php echo $row['h2'];?></h3>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
  ?>
</div>

    <div class="slant-1"></div> -->