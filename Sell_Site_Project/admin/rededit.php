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
      <h6 class="m-0 font-weight-bold text-primary"> Edit Admin Profile  </h6>
    </div>
    <div class="card-body">
     <?php
     if (isset($_GET['edit_btn'])) {
       $id=$_GET['edit_id'];
       $query="SELECT * FROM admin WHERE bid='$id' ";
       $sql=mysqli_query($connection,$query);
       foreach($sql as $row ) {
        ?>
        <form action="op.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
           <input type="hidden" name="id" value="<?php echo $row['bid']?>" class="form-control" >
           <input type="hidden" name="TypeOfUser" value="admin">
         </div>
         <div class="form-group">
          <div class="row">
            <?php echo "<div id='img_div'>
            <img src='image/".$row['image']."' width=100px;height=100px;>
            </div>";?>
            <img id="chnge" src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=130px;height=10px;/>
            <img id='blah' src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=0px;height=0px;/>
          </div>
          <label for='adimg'>Update image</label>
          <input type="file" name="adimg" id="adimg" class="form-control" required="" onchange="readURL(this);"/>
        </div>
        <button type="submit" class="btn btn-primary" name="Update" value="AdmPic">Update Profile Photo</button>
      </form>
      <hr>
      <form action="op.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label> Username </label>
          <input type="text" name="username" value="<?php echo $row['username']?>" class="form-control" >
        </div>
        <div class="form-group">
         <input type="hidden" name="id" value="<?php echo $row['bid']?>" class="form-control" >
       </div>
       <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $row['email']?>" class="form-control" >
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" value="<?php echo $row['password']?>" class="form-control" >
      </div>
      <div class="form-group">
        <label>User Type</label>
        <select name="update_usertype" class="form-control">
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>
      </div>
      <a href="register.php" class="btn btn-danger">CANCEL</a>
      <button type="submit" class="btn btn-primary" name="Update" value="UsrProf">Update</button>
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