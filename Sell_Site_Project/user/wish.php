<?php
include('header.php');
include('navbar.php');
$bid=$_SESSION['usr']['bid'];
$wcb=select("*","wishcartbuy","WHERE id='$bid'");
$b = array();
if (mysqli_num_rows($wcb)>0)
{
	while($row=mysqli_fetch_assoc($wcb))
	{
		$wisharr=unserialize($row['wish']);
		$y=count($wisharr);
		for ($i=0; $i <$y ; $i++) 
		{ 
			$b[$i]=intval($wisharr[$i]);
		}
	}
}
?><br/><br/>
<div class="page-inner mt--5">	
	<div class="row ">
		<div class="col-md-8 ml-auto mr-auto">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Wishlist</h4>
				</div>
			</div>
			<div class="row ">
				<?php 
				$query="SELECT * FROM category";
				$sql=mysqli_query($connection,$query);
				if (mysqli_num_rows($sql)>0) {
					while ($row=mysqli_fetch_assoc($sql)) {
						if(in_array($row['id'],$b))
						{
							?>
							<div class="col-md-4">
								<div class="card card-post card-round">
									<?php echo "<img class='card-img-top' src='../admin/image/".$row['image']."' width=100px; height=200px;>";?>
									<div class="card-body">
										<div class="d-flex">
											<div class="info-post ml-2">
												<h3 class="card-title">
													<a href="#"><?php echo $row['name']?></a>
												</h3>
												<p class="username">Rs. <?php echo $row['price']."&emsp;".$row['pname']?></p>
											</div>
										</div>
										<div class="separator-solid"></div>
										<!-- <p class="card-category text-info mb-1"><a href="#">Design</a></p> -->								
										<p class="card-text">Reviews</p>
										<form action="op.php" method="post">
											<button type="submit" name="wishlist" value="<?php echo 'W'.$row['id'];?>" class="btn btn-icon btn-round btn-danger">
												<i class="fa fa-heart"></i>
											</button>&emsp;&emsp;&emsp;
											<button type="submit" name="buynow" value="<?php echo 'B'.$row['id'];?>" class="btn btn-primary btn-border btn-round">Buy Now</button>
										</form>
										<!-- <a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a> -->
									</div>
								</div>
							</div>
							<?php
						}
					}
				}
				if (empty($b)) {echo "<a href='index.php'><button type='submit' name='buynow' class='btn btn-info btn-border btn-round'>Continue Shopping</button></a>";}
				?>
			</div>
		</div>
	</div>
</div> 
<?php
include('footer.php');
include('script.php');
?>
