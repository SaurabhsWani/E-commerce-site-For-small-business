<?php
include('includes/header.php'); 
?>

<center>
  <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Cities </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="op.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label> Cities</label>
              <input type="text" name="c1" class="form-control" placeholder="Type city name">
            </div>
            <div class="form-group">
              <label> City Code</label>
              <input type="text" name="c2" class="form-control" placeholder="Type city code">
            </div>                            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="Update" value="AddCity" class="btn btn-primary">Save</button>
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
            Add New City
          </button>
        </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <?php 
          $query="SELECT * FROM city";
          $sql=mysqli_query($connection,$query)
          ?>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>City</th>
                <th>City Code</th>
                <th>DELETE </th>
              </tr>
            </thead>
            <tbody>
             <?php  
             if (mysqli_num_rows($sql)>0) {
              while ($row=mysqli_fetch_assoc($sql)) {


                ?>
                <tr>
                  <td><?php echo $row['city'];?> </td>
                  <td><?php echo $row['code'];?> </td>
                  <td>
                    <form action="del.php" method="post">
                      <input type="hidden" name="del_idc" value="<?php echo $row['id'];?>">
                      <button type="submit" name="del_btnc" class="btn btn-danger"> DELETE</button>
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
?>
</center>