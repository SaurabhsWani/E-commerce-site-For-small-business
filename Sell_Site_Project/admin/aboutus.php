<?php 
include('includes/header.php');
?>
<!-- DataTales Example -->
<div class="container-fluid">
  <center>
    <?php
    if (isset($_SESSION['Success'])&&$_SESSION['Success']!='')
      show($_SESSION['Success'],1);
    if (isset($_SESSION['Status'])&&$_SESSION['Status']!='')
      show($_SESSION['Status'],0);
    ?>
  </center>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"> Edit About Us  </h6>
    </div>
    <div class="card-body">
      <?php
      $id1 = $_GET['edit_id'];
      $query="SELECT * FROM aboutus WHERE id='$id1'";
      $sql=mysqli_query($connection,$query);
      foreach($sql as $row ) {
        ?>
        <form action="op.php" method="post" enctype="multipart/form-data">
         <input type="hidden" name="id" value="<?php echo $row['id']?>" class="form-control" >
         <input type="hidden" name="TypeOfImage" value="aboutus">
         <div class="form-group">
          <div class="row">
          <?php echo "<div id='img_div'><img src='image/".$row['image']."' width=100px;height=100px;></div>";?>
          <img id="chnge" src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=130px;height=10px;/>
          <img id='blah' src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=0px;height=0px;/>
          </div>
          <input type="file" name="aimg" class="form-control" id="adminimg" required="" onchange="readURL(this);">
        </div>
        <button type="submit" class="btn btn-primary" name="Update" value="UpdImg">Update</button>
      </form>
      <hr>
      <form action="op.php" method="post" enctype="multipart/form-data">
       <div class="form-group">
        <label> Title </label>
        <input type="text" name="title" value="<?php echo $row['title']?>" class="form-control" >
      </div>
      <div class="form-group">
       <input type="hidden" name="id" value="<?php echo $row['id']?>" class="form-control" >
     </div>
     <div class="form-group">
       <label> Sub Title </label>
       <input type="text" name="subtitle" value="<?php echo $row['subtitle']?>" class="form-control" >
     </div>
     <div class="form-group">
      <label>Content</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" type="input" name="content" value=""><?php echo $row['content']?></textarea>
    </div>
    <a href="abtus.php" class="btn btn-danger">CANCEL</a>
    <button type="submit" class="btn btn-primary" name="Update" value="UpdInfo">Update</button>
  </form>
  <?php
}

?>
</div>
</div>
</div>
<?php 
include('includes/footer.php');
?>



