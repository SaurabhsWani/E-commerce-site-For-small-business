<?php
include('header.php');
include('navbar.php');
$bid=$_SESSION['usr']['bid'];
$wcb=select("*","wishcartbuy","WHERE id='$bid'");
$w = $c = array();
if (mysqli_num_rows($wcb)>0)
{
	while($row=mysqli_fetch_assoc($wcb))
	{
		$wish=unserialize($row['wish']);
		$y=count($wish);
		for ($i=0; $i <$y ; $i++) 
		{ 
			$w[$i]=intval($wish[$i]);
		}
		$cart=unserialize($row['cart']);
		$y=count($cart);
		for ($i=0; $i <$y ; $i++) 
		{ 
			$c[$i]=intval($cart[$i]);
		}
	}
}
?><br/><br/>
<div class="page-inner mt--5">	
		<div class="col-md-11 ml-auto mr-auto">
			<div class="row ">
				<?php 
				if ($_SERVER["REQUEST_METHOD"]=="GET") 
				{
					$sq=isset($_GET['sq'])?$_GET['sq']:" ";
					$query="SELECT * FROM category WHERE name LIKE '%$sq%'";
					$sql=mysqli_query($connection,$query);
					echo "<div class='col-md-12 text-info h4'>".mysqli_num_rows($sql)." Results </div>";
					if (mysqli_num_rows($sql)>0) {
						while ($row=mysqli_fetch_assoc($sql)) {
							$wc=in_array($row['id'],$w)?"btn-danger":"";
							$cc=in_array($row['id'],$c)?"btn-info":"";
							?>
							<div class="col-md-3">
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
											<button type="submit" name="wishlist" value="<?php echo 'W'.$row['id'];?>" class="btn btn-icon btn-round <?php echo $wc?>">
												<i class="fa fa-heart"></i>
											</button>
											<button type="submit" name="cart" value="<?php echo 'C'.$row['id'];?>" class="btn btn-icon btn-round <?php echo $cc?>">
												<i class="fas fa-cart-plus"></i>
											</button>
											<?php if($row['noofpr'] > 0){?>
												<button type="submit" name="buynow" value="<?php echo 'B'.$row['id'];?>" class="btn btn-sm btn-primary btn-border btn-round">Buy Now</button>
											<?php }else{ ?>
												<a href="#" class="btn btn-sm btn-danger btn-border btn-round">OutOfStock</a>
											<?php } ?>
										</form>
										<!-- <a href="#" class="btn btn-primary btn-rounded btn-sm">Read More</a> -->
									</div>
								</div>
							</div>
							<?php
						}
					}
				}
				?>
			</div>
		</div>
</div> 
<?php 
if(mysqli_num_rows($sql)==0){
	echo "<center><h1><i class='fas fa-sad-tear text-warning'></i> No result found for '<span class='text-danger'>$sq'</span></h1></center>";
}
include('footer.php');
include('script.php');
?>
