<footer class="site-footer bg-dark">
      <div class="container">
      <?php 
$query="SELECT * FROM footer";
$sql=mysqli_query($connection,$query);
if (mysqli_num_rows($sql)>0) {
  while ($row=mysqli_fetch_assoc($sql)) {
    ?>
    <div class="row">
          <div class="col-md-4 mb-4 mb-md-0">
            <h3 class="footer-heading mb-4 text-white">About</h3>
            <p><?php echo $row['abtus'];?></p>
            <p><a href="about.php" class="btn btn-primary text-white px-4">Read More</a></p>
          </div>
          <div class="col-md-5 mb-4 mb-md-0 ml-auto">
            <div class="row mb-4">
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
                  <ul class="list-unstyled">
                    <li><a href="asdfg">Home</a></li>
                    <li><a href="tyuio">About</a></li>
                    <li><a href="zxcvb">Gallery</a></li>
                    <li><a href="akihdar">Contacts</a></li>
                    <li><a href="barwas">New Registration</a></li>
                  </ul>
              </div>
            </div>
            <div class="row mb-5">
            </div>
          </div>          
          <div class="col-md-2">            
            <div class="row">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Social Icons</h3></div>
              <div class="col-md-12">
                <p>
                  <a href="<?php echo $row['facebk'];?>" target="_blank" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                  <a href="<?php echo $row['twt'];?>" target="_blank" class="p-2"><span class="icon-twitter"></span></a>
                  <a href="<?php echo $row['insta'];?>" target="_blank" class="p-2"><span class="icon-instagram"></span></a>
                  <a href="<?php echo $row['gp'];?>" target="_blank" class="p-2"><span class="icon-google"></span></a>
                  <a href="<?php echo $row['linked'];?>" target="_blank" class="p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>
          </div>
          </div>
        </div>
        <div class="row pt-5 text-center"> <!-- pt-5 mt-5 -->
          <div class="col-md-12">
            <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-primary" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a> | Developed by Saurabh Wani
            </p>
          </div>
          
        </div>
      </div>
    </footer>
    <?php         }
}
else
{
  echo "No Record Found";
}
 ?>
    <!-- footer end -->