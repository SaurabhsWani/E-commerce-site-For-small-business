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
     if (isset($_GET['edit_btn']))
     {
       $id=$_GET['edit_id'];
       $query="SELECT * FROM nav";
       $sql=mysqli_query($connection,$query);
       foreach($sql as $row ) {
        ?>
        <form action="op.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <input type="hidden" name="TypeOfImage" value="nav">
            <div class="form-group row">
              <?php echo "<div id='img_div'><img src='image/".$row['image']."' width=100px;height=100px;></div>";?>
              <img id="chnge" src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=130px;height=10px;/>
              <img id='blah' src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=0px;height=0px;/>
              <input type="file" name="aimg" id="adimg" class="form-control"  required="" onchange="readURL(this);">
            </div>
            <button type="submit" class="btn btn-success" name="Update" value="UpdImg">Update</button>
          </div>
        </form>
        <hr>
        <form action="op.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="h1">Home</label>
              <input type="text" value="<?php echo $row['h1'];?>" class="form-control"  name="h1" required="">
            </div>
            <div class="form-group">
              <label for="h1">User Login</label>
              <input type="text" value="<?php echo $row['h3'];?>" class="form-control"  name="h3" required="">
            </div>
            <div class="form-group">
              <label for="h1">About</label>
              <input type="text" value="<?php echo $row['h4'];?>" class="form-control"  name="h4" required="">
            </div>
            <div class="form-group">
              <label for="h1">Gallery</label>
              <input type="text" value="<?php echo $row['h5'];?>" class="form-control"  name="h5" required="">
            </div>
            <div class="form-group">
              <label for="h1">Contact</label>
              <input type="text" value="<?php echo $row['h6'];?>" class="form-control"  name="h6" required="">
            </div>
            <a href="Navigation.php" class="btn btn-danger">CANCEL</a>
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <button type="submit" class="btn btn-success" name="Update" value="UpdNav">Update</button>
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