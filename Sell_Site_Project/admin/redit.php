<?php
include('includes/header.php'); 
$url=$_SERVER['HTTP_REFERER'];
?>
<div class="container-fluid">
  <center>
    <?php
    if (isset($_SESSION['Success'])&&$_SESSION['Success']!='')
      show($_SESSION['Success'],1);
    if (isset($_SESSION['Status'])&&$_SESSION['Status']!='')
      show($_SESSION['Status'],0);
    ?>
  </center>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit User Profile</h6>
    </div>
    <div class="card-body">
     <?php
     if (isset($_GET['edit_btn'])) {
       $id=$_GET['edit_id'];
       $query="SELECT * FROM b_person WHERE bid=$id ";
       $sql=mysqli_query($connection,$query);
       foreach($sql as $row ) {
        ?>
        <form action="op.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $row['bid']?>" class="form-control" >
           <input type="hidden" name="TypeOfUser" value="b_person">
          </div>
          <div class="form-group">
            <div class="row">
            <?php echo "<div id='img_div'><img src='../admin/image/".$row['image']."'width=100px;height=100px;></div>";?>
            <img id="chnge" src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=130px;height=10px;/>
            <img id='blah' src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=0px;height=0px;/> 
            <input type="file" name="adimg" id="adimg" class="form-control"  required="" onchange="readURL(this);">
          </div>
          </div>
          <button type="submit" class="btn btn-primary" name="Update" value="AdmPic">Update Profile Photo</button>
        </form>
        <hr>
        <form action="op.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="f_name">First Name:</label>
              <input type="Name" value="<?php echo $row['First_Name'];?>" class="form-control" id="f_name" name="First_Name" required="">
            </div>
            <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $row['bid']?>" class="form-control" >
            </div>
            <div class="form-group">
              <label for="l_name">Last Name:</label>
              <input value="<?php echo $row['Last_Name'];?>" type="Name" class="form-control" id="l_name" name="Last_Name" required="">
            </div>
            <div class="form-group">
             <label for="Adhaar">Adhaar Number:</label>
             <input value="<?php echo $row['Adhaar'];?>" type="Adhaar" pattern="[0-9]{12}" class="form-control" id="Adhaar" name="Adhaar" required="">
           </div>
           <div class="form-group">
            <label for="mobile">Mobile No:</label>
          </div>
          <div class="form-group">
            <input value="<?php echo $row['Mobile'];?>" type="mobile" pattern="[0-9]{10}" class="form-control" name="Mobile" id="mobile" required="">
          </div>
          <div class="form-group">
            <label for="Email">Email:</label>
            <input  type="Email" class="form-control" value="<?php echo $row['Email'];?>" name="Email" id="Email" required="">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" value="<?php echo $row['Password'];?>" class="form-control" name="password" id="Password" required="">
          </div>

          <a href="<?php echo $url ?>" class="btn btn-danger">CANCEL</a>
          <button type="submit" class="btn btn-primary" value="AdmProf" name="Update">Update</button>
        </div>
      </form>
      <?php
    }
  }
  ?>
</div>
</div>
<?php
include('includes/footer.php');
?>