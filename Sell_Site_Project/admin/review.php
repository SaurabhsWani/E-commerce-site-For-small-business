<?php
include('includes/header.php'); 
if (isset($_POST['btn'])) 
{      
  $id = $_POST['id'];
  $query ="UPDATE `review` SET `status` = 'read' WHERE `id` = $id;";
  performQuery($query); 
}
?>
<center>
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
        <h6 class="btn btn-primary" title="Reviews">Reviews
        </h6>
      </div>

      <div class="card-body">
       <div class="table-responsive">
        <?php 
        $query="SELECT * FROM review INNER JOIN b_person ON review.id=b_person.bid";
        $sql=mysqli_query($connection,$query)
        ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <th> Name </th>
              <th>Review </th>
              <th>Rate</th>
              <th>Staus</th>
              <th>Show on website</th>
            </tr>
          </thead>
          <tbody>
           <?php  
           if (mysqli_num_rows($sql)>0) {
            while ($row=mysqli_fetch_assoc($sql)) {
              ?>
              <tr>
                <td><?php echo $row['id'];?> </td>
                <td><?php echo $row['Name'];?></td>
                <td> <?php echo $row['review'];?></td>
                <td> <?php echo $row['rate'];?> </td>
                <td> <?php $st=$row['display']=='yes'?'Showing':'Not Showing'; echo($st);?></td>
                <td><form action="op.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                  <button  type="submit" name="show_btn" value=0 class="btn btn-success"> Show</button>
                  <button  type="submit" name="show_btn" value=1 class="btn btn-danger">Don't Show</button>
                </form>
              </td>
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
<?php
include('includes/footer.php');
?>
</center>