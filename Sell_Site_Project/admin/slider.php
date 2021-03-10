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
      <h6 class="m-0 font-weight-bold text-primary"> Edit Slider Content  </h6>
    </div>
    <div class="card-body">
      <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add new Slider Content </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

            </div>
            <form action="op.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
               <div class="form-group">
                <label>Upload Content</label>
                <input type="file" name="aimg" class="form-control" id="adminimg" required="" onchange="readURL(this);">
                <img id='blah' src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=0px;height=0px;/>
              </div>
              <div class="form-group">
                <label>Add Heading</label>
                <input type="text" name="h1" class="form-control"  required="">
              </div>
              <div class="form-group">
                <label>Add Sub-Heading</label>
                <input type="text" name="h2" class="form-control"  required="">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="Update" value="AddSlider" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <center><h6 class="m-1 font-weight-bold text-primary"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add New Slider
            </button>
          </center>
        </h6>
      </div>
      <div class="table-responsive">
        <?php
        $query="SELECT * FROM slider ORDER By id DESC";
        $sql=mysqli_query($connection,$query);
        foreach($sql as $row ) {
          ?><table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
           <tr>
            <form action="op.php" method="post" enctype="multipart/form-data">
              <td>
                <div class="form-group row">
                 <?php echo "<div id='img_div'><img src='image/".$row['image']."' width=100px;height=100px;></div>";?>
                 <img id="chnge" src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=130px;height=10px;/>
                 <img id='blah' src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=0px;height=0px;/>
                 <input type="file" name="adimg" id="adimg" class="form-control"  required="" onchange="readURL(this);">
               </div>
             </td>
             <td>
              <div class="form-group">
                <label>Update Heading</label>
                <input type="text" name="h1" class="form-control" value="<?php echo $row['h1'];?>" required="">
              </div>
            </td><td>
              <div class="form-group">
                <label>Update Sub-Heading</label>
                <input type="text" name="h2" class="form-control" value="<?php echo $row['h2'];?>" required="">
              </div>
            </td>
            <td>
              <input type="hidden" name="id" value="<?php echo $row['id'];?>">
              <button type="submit" class="btn btn-success" name="Update" value="UpdSlider">Update</button>
            </td>
          </form>
          <td>
            <form action="op.php" method="post">
              <input type="hidden" name="id" value="<?php echo $row['id'];?>">
              <button type="submit" name="Update" value="del" class="btn btn-danger"> DELETE</button>
            </form>
          </td>
        </tr>
      </table>
      <?php
    }
    ?>
  </div>
</div>
</div>
<?php
include('includes/footer.php');
?>