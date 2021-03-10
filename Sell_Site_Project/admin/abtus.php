<?php
include('includes/header.php'); 
?>
<center>
  <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add new heading and content </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="op.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label> Title </label>
              <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
            <div class="form-group">
              <label>Sub Title</label>
              <input type="text" name="subtitle" class="form-control" placeholder="sub title">
              <input type="hidden" name="id" value="0">
            </div>
            <div class="form-group">
              <label>Content</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" type="input" name="content" placeholder="Discription" value=""></textarea>
            </div>
            <div class="form-group">
              <label>Upload Image</label>
              <input type="file" name="aimg" class="form-control" id="adminimg" required=""onchange="readURL(this);"><br>
              <img id='blah' src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=0px;height=0px;/>
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="Update" value="AddNewAboutUs" class="btn btn-primary">Save</button>
          </div>
        </form>

      </div>
    </div>
  </div>
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
        <h6 class="m-1 font-weight-bold text-primary"> 
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
            Add New Content on about us page
          </button>
        </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <?php
          $query="SELECT * FROM aboutus";
          $sql=mysqli_query($connection,$query)
          ?>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th> ID </th>
                <th> Title</th>
                <th>Sub Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>EDIT </th>
                <th>DELETE </th>
              </tr>
            </thead>
            <tbody>
             <?php  
             if (mysqli_num_rows($sql)>0) {
              while ($row=mysqli_fetch_assoc($sql)) 
              {
                ?>
                <tr>
                  <td><?php echo $row['id'];?> </td>
                  <td><?php echo $row['title'];?> </td>
                  <td><?php echo $row['subtitle'];?></td>
                  <td><textarea class="form-control" id="exampleFormControlTextarea1" readonly="true" rows="4"><?php echo $row['content']?></textarea></td>
                  <td> <?php echo "<div id='img_div'><img src='image/".$row['image']."' width=100px;height=100px;></div>";?></td>
                  <td>  
                    <form action="aboutus.php" method="get">
                      <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                      <button  type="submit" name="edit_btn" value="Edit" class="btn btn-success"> EDIT</button>
                    </form>
                  </td>
                  <td>
                    <form action="del.php" method="post">
                      <input type="hidden" name="del_id" value="<?php echo $row['id'];?>">
                      <button type="submit" name="del_btn" class="btn btn-danger"> DELETE</button>
                    </form>
                  </td>
                </tr>
              <?php         }
            }
            else
            {
              echo "No Record Found";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php
include('includes/footer.php');
?>
</center>