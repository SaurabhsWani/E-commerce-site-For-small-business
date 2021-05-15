<?php
include('header.php');
?>
<div class="container">
  <div class="row mb-5">
    <div class="col-md-12 text-center" data-aos="fade"> 
      <span class="caption d-block mb-2 font-secondary font-weight-bold">Sell Site</span>
      <h2 class="site-section-heading text-uppercase text-center font-secondary">Contact Form For Distributor</h2>
    </div>
  </div>
  </div>
<div class="row">
 
  <div class="col-md-12 col-lg-8 mb-5">
   <form action="contactcon.php" method="post" class="p-5 bg-white">

    <div class="row form-group">
      <div class="col-md-12 mb-3 mb-md-0" data-aos="fade-right" data-aos-delay="100">
        <label class="font-weight-bold" for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fname" class="form-control" placeholder="Full Name">
      </div>
    </div>
    <div class="row form-group">
      <div class="col-md-12" data-aos="fade-right" data-aos-delay="100">
        <label class="font-weight-bold" for="email">Email</label>
        <input type="email" id="email" class="form-control" name="eml" placeholder="Email Address">
      </div>
    </div>


    <div class="row form-group">
      <div class="col-md-12 mb-3 mb-md-0" data-aos="fade-right" data-aos-delay="100">
        <label class="font-weight-bold" for="phone">Phone</label>
        <input type="text" id="phone" pattern="[0-9]{10}" class="form-control" name="phne" placeholder="Phone #">
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-12" data-aos="fade-right" data-aos-delay="100">
        <label class="font-weight-bold" for="message">Message</label> 
        <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Say hello to us"></textarea>
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-12" data-aos="fade-right" data-aos-delay="100">
        <button type="submit" name="sub_btn"  class="btn btn-primary text-white px-4 py-2">Submit</button>
      </div>
    </div>

    
  </form>
</div>
<?php 
$query="SELECT * FROM footer";
$sql=mysqli_query($connection,$query);
if (mysqli_num_rows($sql)>0) {
  while ($row=mysqli_fetch_assoc($sql)) {
    ?> 
    <div class="col-lg-4">
      <div class="p-4 mb-3 bg-white">
        <h3 class="h5 text-black mb-3" data-aos="fade-left" data-aos-delay="100">Contact Info</h3>
        <p class="mb-0 font-weight-bold" data-aos="fade-left" data-aos-delay="100">Address</p>
        <p class="mb-4" data-aos="fade-left" data-aos-delay="100"><?php echo $row['addres'];?></p>

        <p class="mb-0 font-weight-bold" data-aos="fade-left" data-aos-delay="100">Mobile</p>
        <p class="mb-4" data-aos="fade-left" data-aos-delay="100"><a><?php echo $row['conno'];?></a></p>

        <p class="mb-0 font-weight-bold" data-aos="fade-left" data-aos-delay="100">Email Address</p>
        <p class="mb-0" data-aos="fade-left" data-aos-delay="100"><?php echo $row['email'];?></p>

      </div>
      
      
    </div>
  </div>
  <?php         }
}
else
{
  echo "No Record Found";
}
?>
<?php
include('footer.php');
include('script.php');
?>
