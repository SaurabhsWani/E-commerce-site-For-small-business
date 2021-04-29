<?php
include('includes/header.php'); 
?>
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-1">
      <h6 class="m-0 font-weight-bold text-primary"> Edit Category Of product  </h6>
    </div>
    <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add new Category </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="op.php" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
             <div class="form-group">
              <label>Product Image</label>
              <input type="file" name="aimg" class="form-control" id="adminimg" required=""onchange="readURL(this);">
              <img id='blah' src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=0px;height=0px;/>
            </div>
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" name="pnme" class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Product Quantity Per pice</label>
              <input type="text" name="pname" class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>No of pice</label>
              <input type="number" name="ppic" class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Product Cost Price</label>
              <input type="text" name="cprice" class="form-control"  required="">
            </div>
            <div class="form-group">
              <label>Product Selling Price</label>
              <input type="text" name="price" class="form-control"  required="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="Update" value="AddPrd" class="btn btn-primary">Save</button>
          </div>
        </form>

      </div>
    </div>
  </div>
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
      <center>
        <h6 class="m-1 font-weight-bold text-primary"> 
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
            Add New Category of Product
          </button>
        </h6>
      </center>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
        <thead>
          <tr>
            <td><label>Upload Image</label></td>
            <td><label>Update Quantity</label></td>
            <td><label>Cost Price</label></td>
            <td><label>Update Selling Price</label></td>
            <td><label>Update Name</label></td>
            <td><label>Update No of pice</label></td>
            <td><label>Update </label></td>
            <td><label>Remove</label></td>
          </tr>
        </thead>
        <?php
        $query="SELECT * FROM category ORDER BY id DESC";
        $sql=mysqli_query($connection,$query);
        foreach($sql as $row ) {
          ?>
          <tr>   
            <form action="op.php" method="post" enctype="multipart/form-data"><tr>
              <td>
                <div class="form-group">
                 <?php echo "<div id='img_div'><img src='image/".$row['image']."' width=100px;height=100px;></div>";?>                     
                 <!-- <input type="file" name="adimg" id="adimg" class="form-control"  required=""> -->
               </div>
             </td>
             <td>
              <div class="form-group">
                <input type="text" name="pname" class="form-control" value="<?php echo $row['pname'];?>" required="">
              </div>
            </td>
            <td>
              <div class="form-group">
                <input type="dis" disabled=""class="form-control" value="<?php echo $row['costprice'];?>" >
              </div>
            </td>
            <td>
              <div class="form-group">
                <input type="text" name="price" class="form-control" value="<?php echo $row['price'];?>" required="">
              </div>
            </td>
            <td>
              <div class="form-group">
                <input type="text" name="pnme" class="form-control" value="<?php echo $row['name'];?>" required="">
              </div>
            </td>
            <td>
              <div class="form-group">
                <input type="text" name="ppic" class="form-control" value="<?php echo $row['noofpr'];?>" required="">
              </div>
            </td>
            <td>
              <input type="hidden" name="id" value="<?php echo $row['id'];?>">
              <button type="submit" class="btn btn-success" name="Update" value="UpdPrd">Update</button>
            </td>
          </form>
          <td>
            <form action="del.php" method="post">
              <input type="hidden" name="id" value="<?php echo $row['id'];?>">
              <button type="submit" name="delete" value="DelPrd" class="btn btn-danger"> Remove</button>
            </form>
          </td>
        </tr>
        <?php
      }
      ?>
    </table>
  </div>
</div>
<?php
include('includes/footer.php');
?>