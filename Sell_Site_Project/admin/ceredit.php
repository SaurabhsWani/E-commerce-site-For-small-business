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
      <h6 class="m-0 font-weight-bold text-primary"> Edit Certificate  </h6>
    </div>
    <div class="card-body">
      <?php
      $id1 = $_GET['edit_id'];
      $query="SELECT * FROM certificate WHERE id='$id1'";
      $sql=mysqli_query($connection,$query);
      foreach($sql as $row ) {
        ?>
        <form action="op.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
           <input type="hidden" name="id" value="<?php echo $row['id']?>" class="form-control" >
         </div>
         <input type="hidden" name="TypeOfImage" value="certificate">
         <div class="form-group">
          <?php echo "<div id='img_div'><img src='image/".$row['image']."' width=100px;height=100px;></div>";?>
          <label>Upload Certificate</label>
          <input type="file" name="aimg" class="form-control" id="adminimg" required="">
        </div>
        <button type="submit" class="btn btn-primary" name="Update" value="UpdImg">Update</button>
      </form>
      <hr>
      <form action="op.php" method="post" enctype="multipart/form-data">
       <div class="form-group">
        <label> certificate </label>
        <input type="text" name="cn" value="<?php echo $row['certificate']?>" class="form-control" >
      </div>
      <div class="form-group">
       <input type="hidden" name="id" value="<?php echo $row['id']?>" class="form-control" >
     </div>
     <div class="form-group">
      <label>Details</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" type="input" name="ci" value=""><?php echo $row['details']?></textarea>
    </div>
    <a href="certificate.php" class="btn btn-danger">CANCEL</a>
    <button type="submit" class="btn btn-primary" name="Update" value="UpdCerti">Update</button>
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



