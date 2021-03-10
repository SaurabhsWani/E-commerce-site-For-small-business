<?php
include('includes/header.php'); 
?>
<center>
  <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <?php 
          $query="SELECT * FROM nav";
          $sql=mysqli_query($connection,$query)
          ?>
          <div class="modal-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Update Nav-Bar</th>
                  <th> Logo</th>
                  <th> Home</th>
                  <th>Admin Login</th>
                  <th>Login</th>
                  <th>About</th>
                  <th>Gallary</th>
                  <th>Certificate</th>
                  <th>Contact</th>
                  <th>Recipe</th>

                </tr>
              </thead>
              <tbody>
               <?php  
               if (mysqli_num_rows($sql)>0) {
                while ($row=mysqli_fetch_assoc($sql)) {
                  ?>
                  <tr>
                   <td>  <form action="navit1.php" method="get">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                    <button  type="submit" name="edit_btn" value="Edit" class="btn btn-success"> Update</button>
                  </form>
                </td>
                <td> <?php echo "<div id='img_div'><img src='image/".$row['image']."' width=100px;height=100px;></div>";?></td>
                <td><?php echo $row['h1'];?> </td>
                <td><?php echo $row['h2'];?> </td>
                <td><?php echo $row['h3'];?> </td>
                <td><?php echo $row['h4'];?> </td>
                <td><?php echo $row['h5'];?> </td>
                <td><?php echo $row['h7'];?> </td>
                <td><?php echo $row['h6'];?> </td>
                <td><?php echo $row['h8'];?> </td>
              </tr>
              <?php         
            }
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
<!-- /.container-fluid -->
</center>
<?php
include('includes/footer.php');
?>