<?php
include('includes/header.php'); 
?>
<center>
  <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Update </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="op.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label> News/Update </label>
              <input type="text" name="l1" class="form-control" placeholder="Write a News/Update here ">
            </div>                            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="Update" value="AddNews" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php 
  $query="SELECT * FROM nupd";
  $sql=mysqli_query($connection,$query);
  if (mysqli_num_rows($sql)>0) {
    while ($row=mysqli_fetch_assoc($sql)) 
    {
      ?>
      <div class="modal fade" id="EditNews<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit News/Update </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="op.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="form-group">
                  <label> NEWS</label>
                  <input type="text" name="l1" value="<?php echo $row['l1']?>" class="form-control" >
                </div>
                <div class="form-group">
                 <input type="hidden" name="id" value="<?php echo $row['id']?>" class="form-control" >
               </div>                 
             </div>
             <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="Update" value="UpdNews" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
  }
}?>
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-1 font-weight-bold text-primary"> 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
          Add New News/Update
        </button>
      </h6>
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
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>NEWS</th>
              <th>EDIT </th>
              <th>DELETE </th>
            </tr>
          </thead>
          <tbody>
           <?php
           $query="SELECT * FROM nupd";
           $sql=mysqli_query($connection,$query);  
           if (mysqli_num_rows($sql)>0) {
            while ($row=mysqli_fetch_assoc($sql)) 
            {
              ?>
              <tr>
                <td><?php echo $row['l1'];?> </td>
                <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditNews<?php echo $row['id'];?>">
                    Edit
                  </button>
                </td>
                <td>
                  <form action="del.php" method="post">
                    <input type="hidden" name="del_id1" value="<?php echo $row['id'];?>">
                    <button type="submit" name="del_btn1" class="btn btn-danger"> DELETE</button>
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