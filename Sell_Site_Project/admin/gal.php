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
  <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add new Photo </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="galupd.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
           <div class="form-group">
            <label>Upload Image</label>
            <input type="file" name="aimg" class="form-control" id="adminimg" required="" onchange="readURL(this);">
            <img id='blah' src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=0px;height=0px;/>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="addbtn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <center>
      <h6 class="m-1 font-weight-bold text-primary"> Edit Gallery Photos 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
          Add New Photo
        </button>
      </h6>
    </center>
  </div>
  <div class="table-responsive">           
    <table class="table table-bordered " id="dataTable" width="90%" cellspacing="0">
      <?php
      $query="SELECT * FROM gallery ORDER BY id DESC ";
      $sql=mysqli_query($connection,$query);
      foreach($sql as $row ) {
        ?>
        <tr> 
          <form action="op.php" method="post" enctype="multipart/form-data"> 
            <td>
              <div class="form-group ">
                <div class="row img_div">
                 &emsp;  <?php echo "<img src='image/".$row['image']."' width=100px;height=100px;>";?>
                 <img id="chnge" src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=130px;height=10px;/>
                 <img id='blah' src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=0px;height=0px;/>
               </div>
               <input type="file" name="aimg" id="aimg" class="form-control"  required="" onchange="readURL(this);">
             </div>
           </td>
           <td>
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">              
            <input type="hidden" name="TypeOfImage" value="gallery">
            <button type="submit" class="btn btn-success" name="Update" value="UpdImg">Update</button>
          </td>
        </form>
        <td>
          <form action="galupd.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <button type="submit" name="del" class="btn btn-danger"> DELETE</button>
          </form>
        </td>
      </tr>
      <?php
    }
    ?>
  </table>
</div>
</div>
</div>
<?php
include('includes/footer.php');
?>