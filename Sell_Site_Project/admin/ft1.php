<?php
include('includes/header.php'); 
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
      <h6 class="m-0 font-weight-bold text-primary"> Edit User Profile  </h6>
    </div>
    <div class="card-body">
     <?php
     if (isset($_GET['edit_btn'])) {
       $id=$_GET['edit_id'];
       $query="SELECT * FROM footer";
       $sql=mysqli_query($connection,$query);
       foreach($sql as $row ) {
        ?>
        <form action="op.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
           <div class="form-group">
            <label for="h1">Phone</label>
            <input type="text" value="<?php echo $row['phone'];?>" class="form-control"  name="phone" required="" pattern="[0-9]{10}">
          </div>
          <div class="form-group">
            <label for="h1">Email</label>
            <input type="text" value="<?php echo $row['email'];?>" class="form-control"  name="email" required="">
          </div>
          <div class="form-group">
            <label for="h1">Location</label>
            <input type="text" value="<?php echo $row['location'];?>" class="form-control"  name="location" required="">
          </div>
          <div class="form-group">
            <label for="h1">About us</label>
            <input type="text" value="<?php echo $row['abtus'];?>" class="form-control"  name="abtus" required="">
          </div>
          <div class="form-group">
            <label for="h1">Address</label>
            <input type="text" value="<?php echo $row['addres'];?>" class="form-control"  name="addres" required="">
          </div>
          <div class="form-group">
            <label for="h1">Contact no</label>
            <input type="text" value="<?php echo $row['conno'];?>" class="form-control"  name="conno" required="" pattern="[0-9]{10}">
          </div>
          <div class="form-group">
            <label for="h1">Facebook id</label>
            <input type="text" value="<?php echo $row['facebk'];?>" class="form-control"  name="facebk" required="">
          </div>
          <div class="form-group">
            <label for="h1">Twitter id</label>
            <input type="text" value="<?php echo $row['twt'];?>" class="form-control"  name="twt" required="">
          </div>
          <div class="form-group">
            <label for="h1">Linked in id</label>
            <input type="text" value="<?php echo $row['linked'];?>" class="form-control"  name="linked" required="">
          </div>
          <div class="form-group">
            <label for="h1">Google+ id</label>
            <input type="text" value="<?php echo $row['gp'];?>" class="form-control"  name="gp" required="">
          </div>
          <div class="form-group">
            <label for="h1">Instagram id</label>
            <input type="text" value="<?php echo $row['insta'];?>" class="form-control"  name="insta" required="">
          </div>
          <a href="footer.php" class="btn btn-danger">CANCEL</a>
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <button type="submit" class="btn btn-success" name="Update" value="UpdFtr">Update</button>
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