 <?php
 include('header.php');
 ?>
 <div class="site-section first-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12 text-center" data-aos="fade"> 
        <span class="caption d-block mb-2 font-secondary font-weight-bold">Sell Site</span>
        <h2 class="site-section-heading text-uppercase text-center font-secondary">User Registration Form</h2>
      </div>
    </div>
  </div>
</div>

<center >
 <div class="col-xl-6 col-lg-6 col-md-6">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-body">
        <form action="Reg_buy_connection.php" method="post" enctype="multipart/form-data"><h5><strong>
          <div class="form-group">
            <label for="f_name">Full Name:</label>
            <input type="Name" placeholder="Full Name" class="form-control" id="f_name" name="First_Name" required="">
          </div>
          <div class="form-group">
           <label for="Adhaar">Adhaar Number:</label>
           <input placeholder="Enter 12 Digit Adhaar no" type="Adhaar" pattern="[0-9]{12}" class="form-control" id="Adhaar" name="Adhaar" required="">
         </div>
         <div class="form-group">
          <label>Upload Profile Photo</label>
          <input type="file" name="adimg" id="adimg" class="form-control"  required="">
        </div>
        <div class="form-group">
          <label for="mobile">Mobile No:</label>
          <input placeholder="Enter 10 digit mobile no" type="mobile" pattern="[0-9]{10}" class="form-control" name="Mobile" id="mobile" required="">
        </div>
        <div class="form-group">
          <label for="Email">Email:</label>
          <input  type="Email" class="form-control" placeholder="Enter Email Id" name="Email" id="Email" required="">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <div class="input-group">
            <input type="password" placeholder="Enter Password" class="form-control" name="password" id="myInput1" required="">
            <div class="input-group-append">
             <span  class="btn btn-dark text-white px-4 py-2" onclick="myFunction1()">
              <i class="icon-eye"></i>
            </span>
          </div>
        </div>
      </div>
      <div class="form-group" >
        <label for="password2" >Confirm Password:</label>
        <div class="input-group">
          <input placeholder="Re-Enter Password" type="password" class="form-control" name="password2" id="myInput" required="" data-toggle="password">
          <div class="input-group-append">
           <span  class="btn btn-dark text-white px-4 py-2" onclick="myFunction()">
            <i class="icon-eye"></i>
          </span>
        </div>

      </div>
    </div>
    <button type="submit" class="btn btn-primary text-white px-4 py-2" >Submit</button>
  </strong></h5></form>
</div>
</div>
</div>
</div>

</center>
<br>

<?php
include('footer.php');
include('script.php');
?>


<script>
  function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  function myFunction1() {
    var x = document.getElementById("myInput1");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>


<?php
if(isset($_POST['Email'])==true && empty($_POST['Email'])==false) {
  $email= $_POST['Email'];
  if (filter_var($email,FILTER_VALIDATE_EMAIL)==true) {

  }
  else
  {
    echo "Enter valid Email";
  }
  # code...
}
?>