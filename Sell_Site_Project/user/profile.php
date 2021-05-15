<?php
include('header.php');
include('navbar.php');
?>
<div class="page-inner mt--5">
  <br>
  <div class="card shadow mb-4  col-md-8 ml-auto mr-auto">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"> Edit User Profile  </h6>
    </div>
    <div class="card-body">
     <form action="usrupd.php" method="post" enctype="multipart/form-data">
       <div class="form-group">
        <label> First Name </label>
        <input type="text" name="First_Name" value="<?php echo $_SESSION['usr']['fn'];?>" class="form-control" >
      </div>
      <div class="form-group">
        <label>Mobile no</label>
        <input type="text" name="Mobile" value="<?php echo $_SESSION['usr']['Mob']?>" class="form-control" >
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="Email" value="<?php echo $_SESSION['usr']['Email']?>" class="form-control" >
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="Password" value="<?php echo $_SESSION['usr']['pass']?>" class="form-control" >
      </div>
      <div class="form-group">
        <?php echo "<div id='img_div'><img src='../admin/image/".$_SESSION['usr']['img']."' width=100px;height=100px;></div>";?>
        <label for="adimg">Upload Image</label>
        <input type="file" accept=".jpg,.png" name="adimg" id="adimg" class="form-control" required=""/>
      </div>
      <a href="index.php" class="btn btn-danger">CANCEL</a>
      <form action="usrupd.php" method="post">
        <button type="submit" class="btn btn-primary" name="upd">Update</button>
      </form>
    </form>
  </div>
</div>
</div> 
<?php
include('footer.php');
include('script.php');
?>