<?php 
include('includes/header.php');
?>
<!-- DataTales Example -->
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"> Edit recipe  </h6>
    </div>
    <div class="card-body">
     <?php
     if (isset($_SESSION['Success'])&&$_SESSION['Success']!='') {
      echo '<h2 class="bg-primary text-white">'.$_SESSION['Success'].'</h2>';
      unset($_SESSION['Success']);
    }
    if (isset($_SESSION['Status'])&&$_SESSION['Status']!='') {
      echo '<h2 class="bg-danger text-white">'.$_SESSION['Status'].'</h2>';
      unset($_SESSION['Status']);
    }
    ?>
    <?php
    $id1 = $_POST['edit_id'];
    $query="SELECT * FROM recipe WHERE id='$id1'";
    $sql=mysqli_query($connection,$query);
    foreach($sql as $row ) {
      ?>
      <form action="recpcon.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
         <input type="hidden" name="id" value="<?php echo $row['id']?>" class="form-control" >
       </div>
       <div class="form-group">
        <?php echo "<div id='img_div'><img src='image/".$row['image']."' width=100px;height=100px;></div>";?>
        <label>Upload Image</label>
        <input type="file" name="aimg" class="form-control" id="adminimg" required="">
      </div>
      <button type="submit" class="btn btn-primary" name="updp">Update</button>
    </form><hr>
    <form action="recpcon.php" method="post" enctype="multipart/form-data">
     <div class="form-group">
      <label> Title </label>
      <input type="text" name="rn" value="<?php echo $row['name']?>" class="form-control" >
    </div>
    <div class="form-group">
     <input type="hidden" name="id" value="<?php echo $row['id']?>" class="form-control" >
   </div>
   <div class="form-group">
     <label> Sub Title </label>
     <input type="text" name="ri" value="<?php echo $row['ing']?>" class="form-control" >
   </div>
   <div class="form-group">
    <label>Content</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" type="input" name="rm" value=""><?php echo $row['mthd']?></textarea>
  </div>
  <a href="recipe.php" class="btn btn-danger">CANCEL</a>
  <button type="submit" class="btn btn-primary" name="upd">Update</button>
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



