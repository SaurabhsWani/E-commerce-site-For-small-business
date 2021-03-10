<?php
include('includes/header.php'); 
?>
<center>
  <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="op.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label> Username </label>
              <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group">
              <label>Upload Image</label>
              <input type="file" name="aimg" class="form-control" id="adminimg" required="" onchange="readURL(this);">
            <img id='blah' src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=0px;height=0px;/> 
            </div>
            <div class="form-group">
              <input type="hidden" name="usertype"  value="admin">
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="Update" value="registerbtn" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-1 font-weight-bold text-info">Admin Profiles 
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addadminprofile">
            Add Admin Profile 
          </button>
        </h6>
      </div>

      <div class="card-body">
        <?php
        if (isset($_SESSION['Success'])&&$_SESSION['Success']!='')
          show($_SESSION['Success'],1);
        if (isset($_SESSION['Status'])&&$_SESSION['Status']!='')
          show($_SESSION['Status'],0);
        ?>
        <div class="table-responsive">
          <?php 
          $query="SELECT * FROM admin";
          $sql=mysqli_query($connection,$query)
          ?>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th> ID </th>
                <th> Username </th>
                <th>Email </th>
                <th>Password</th>
                <th>User Type</th>
                <th>Profile Photo</th>
                <th>EDIT </th>
                <th>Remove </th>
              </tr>
            </thead>
            <tbody>
             <?php  
             if (mysqli_num_rows($sql)>0) {
              while ($row=mysqli_fetch_assoc($sql)) {
               
                
                ?>
                <tr>
                  <td><?php echo $row['bid'];?> </td>
                  <td><?php echo $row['username'];?> </td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['password'];?> </td>
                  <td><?php echo $row['usertype'];?></td>
                  <td><?php echo "<div id='img_div'><img src='image/".$row['image']."' width=100px;height=100px;></div>";?>
                </td>
                <td>
                  <form action="rededit.php" method="get" enctype="multipart/form-data">
                    <input type="hidden" name="edit_id" value="<?php echo $row['bid'];?>">
                    <button  type="submit" name="edit_btn" value="Edit" class="btn btn-success"> EDIT</button>
                  </form>
                </td>
                <td>
                  <form action="del.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['bid'];?>">
                    <button type="submit" name="Remove" value="RemAdmin" class="btn btn-danger"> DELETE</button>
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

<!-- /.container-fluid -->

<?php
include('includes/footer.php');
?></center>