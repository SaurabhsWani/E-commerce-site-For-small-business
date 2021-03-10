<?php
include('includes/header.php'); 
if (isset($_POST['btn'])) 
{      
  $id = $_POST['id'];
  $query ="UPDATE `distributer` SET `status` = 'read' WHERE `id` = $id;";
  performQuery($query); 
}
?>
<center>
  <div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="btn btn-dark">Distributer List
        </h6>
      </div>

      <div class="card-body">
       <div class="table-responsive">
        <?php 
        $query="SELECT * FROM distributer";
        $sql=mysqli_query($connection,$query)
        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <th> Name </th>
              <th>Email </th>
              <th>Mobile</th>
              <th>Message</th>
            </tr>
          </thead>
          <tbody>
           <?php  
           if (mysqli_num_rows($sql)>0) {
            while ($row=mysqli_fetch_assoc($sql)) {


              ?>
              <tr>
                <td><?php echo $row['id'];?> </td>
                <td><?php echo $row['name'];?> </td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['mobile'];?> </td>
                <td><?php echo $row['msg'];?></td>
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

<!-- /.container-fluid -->

<?php
include('includes/footer.php');
?></center>