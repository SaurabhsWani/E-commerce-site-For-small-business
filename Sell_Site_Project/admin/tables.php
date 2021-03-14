<?php 
include('includes/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<body id="page-top">
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
       <center> <h6 class="m-1 font-weight-bold text-primary">User Details <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       Add User Profile </h6></center>
     </button>
   </div><div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="Reg_buy_connection.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <label for="f_name">First Name:</label>
              <input type="Name" placeholder="First Name" class="form-control" id="f_name" name="First_Name" required="">
            </div>
            <div class="form-group">
              <label for="l_name">Last Name:</label>
              <input placeholder="Last Name" type="Name" class="form-control" id="l_name" name="Last_Name" required="">
            </div>
            <div class="form-group">
             <label for="Adhaar">Adhaar Number:</label>
             <input placeholder="Enter 12 Digit Adhaar no" type="Adhaar" pattern="[0-9]{12}" class="form-control" id="Adhaar" name="Adhaar" required="">
           </div>
           <div class="form-group">
            <label>Upload Profile Photo</label>
            <input type="file" name="adimg" id="adimg" class="form-control"  required=""
            onchange="readURL(this);">
            <img id='blah' src='#' onerror="this.onerror=null;this.src='image/blk.jpg'" width=0px;height=0px;/> 
          </div>
          <div class="form-group">
            <label for="mobile">Mobile No:</label>
            <input placeholder="Enter 10 digit mobile no" type="mobile" pattern="[0-9]{10}" class="form-control" name="Mobile" id="mobile" required="">
          </div>
          <div class="form-group">
            <label for="Email">Email:</label>
            <input  type="Email" class="form-control" placeholder="Enter Email Id" name="Email" id="Email" required="">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" placeholder="Enter Password" class="form-control" name="password" id="Password" required="">
          </div>
          <div class="form-group" >
            <label for="password2" >Confirm Password:</label>
            <input placeholder="Re-Enter Password" type="password2" class="form-control" name="password2" id="mobile" required="">
          </div>
        </div> 
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit"  class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>
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
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Profile Photo</th>
          <th>Mobile</th>
          <th>Addhar</th>
          <th>EDIT </th>
          <th>DELETE </th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Profile Photo</th>
          <th>Mobile</th>
          <th>Addhar</th>
          <th>EDIT </th>
          <th>DELETE </th>
        </tr>
      </tfoot>
      <tbody>
        <?php 
        $query="SELECT * FROM b_person";
        $sql=mysqli_query($connection,$query)
        ?>

        <?php  
        if (mysqli_num_rows($sql)>0) {
          while ($row=mysqli_fetch_assoc($sql)) {


            ?>
            <tr>
              <td><?php echo $row['bid'];?></td>
              <td><?php echo $row['Name'];?></td>
              <td><?php echo $row['Email'];?></td>
              <td><?php echo $row['Password'];?></td>
              <td><?php echo "<div id='img_div'><img src='../admin/image/".$row['image']."'width=100px;height=100px;></div>";?></td>
              <td><?php echo $row['Mobile'];?></td>
              <td><?php echo $row['Adhaar'];?></td> 
              <td>
                <form action="redit.php" method="get" enctype="multipart/form-data">
                  <input type="hidden" name="edit_id" value="<?php echo $row['bid'];?>">
                  <button  type="submit" name="edit_btn" value="Edit" class="btn btn-success"> EDIT</button>
                </form>
              </td>
              <td>
                <form action="del.php" method="post">
                  <input type="hidden" name="delte_id" value="<?php echo $row['bid'];?>">
                  <button type="submit" name="delte_btn" class="btn btn-danger"> DELETE</button>
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
</div>
</body>

</html>
<?php 
include('includes/footer.php');
?>