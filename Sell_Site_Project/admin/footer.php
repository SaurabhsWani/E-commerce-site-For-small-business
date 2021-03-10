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
                    $query="SELECT * FROM footer";
                    $sql=mysqli_query($connection,$query)
                    ?>
                     <div class="modal-body">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Update Footer</th>
                            <th> Phone</th>
                            <th> Email</th>
                            <th>Location</th>
                            <th>About Us In short</th>
                            <th>Address</th>
                            <th>Contact no</th>
                            <th>Facebook id</th>
                            <th>Twitter id</th>
                            <th>Linked in</th>
                            <th>Google+ id</th>
                            <th>Instagram id</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                       <?php  
                       if (mysqli_num_rows($sql)>0) {
                          while ($row=mysqli_fetch_assoc($sql)) {
                             
                            
                            ?>
                            <tr>
                               <td>  <form action="ft1.php" method="get">
                                <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                                <button  type="submit" name="edit_btn" value="Edit" class="btn btn-success"> Update</button>
                            </form>
                        </td>
                        <td><?php echo $row['phone'];?></td>
                        <td><?php echo $row['email'];?> </td>
                        <td><?php echo $row['location'];?> </td>
                        <td><?php echo $row['abtus'];?> </td>
                        <td><?php echo $row['addres'];?> </td>
                        <td><?php echo $row['conno'];?> </td>
                        <td><?php echo $row['facebk'];?> </td>
                        <td><?php echo $row['twt'];?></td>
                        <td><?php echo $row['linked'];?></td>
                        <td><?php echo $row['gp'];?></td>
                        <td><?php echo $row['insta'];?></td>                         
                        
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

<!-- /.container-fluid -->
</center>
<?php
include('includes/footer.php');
?>