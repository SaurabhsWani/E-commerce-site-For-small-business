<?php
include('header.php');
include('navbar.php');
?>

<div class="page-inner mt--5"><br>
	<!-- <h2><marquee>
		<?php 
		$query="SELECT * FROM nupd";
		$sql=mysqli_query($connection,$query);

		if (mysqli_num_rows($sql)>0) 
		{
			while ($row=mysqli_fetch_assoc($sql)) 
			{
				echo $row['l1'].'&emsp;&emsp; ';         
			}
		}
		else
		{
			echo "No Record Found";
		}
		?>

	</marquee></h2> -->
	<!-- TimeLine -->
	<?php
	if (isset($_SESSION['Success'])&&$_SESSION['Success']!='') {
		echo '<h2 class="bg-primary text-white">'.$_SESSION['Success'].'</h2>';
		unset($_SESSION['Success']);
	}
	if (isset($_SESSION['Status'])&&$_SESSION['Status']!='') {
		echo '<h2 class="bg-danger text-white">'.$_SESSION['Status'].'</h2>';
		unset($_SESSION['Status']);
	}
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
	?>
	<div class="row ">
		<div class="col-md-10 ml-auto mr-auto">
			<div class="row ">
				<?php 
				$query="SELECT * FROM category";
				$sql=mysqli_query($connection,$query);
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
				?>
			</div>
		</div>
	</div>
	<div class="container-fluid col-md-8">
		<h4 class="page-title">How To Buy Gopa Aata Product ?</h4>
		<div class="row">
			<div class="col-md-12">
				<ul class="timeline">
					<li>
						<div class="timeline-badge info"><i class="fas fa-cart-plus"></i></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Step 1</h4>
							</div>
							<div class="timeline-body">
								<p>Choose Product From Category.<br><a href="category.php"><button class="btn">Go to Category</button></a></p>
							</div>
						</div>
					</li>
					<li class="timeline-inverted">
						<div class="timeline-badge warning"><i class="fas fa-list-ul"></i></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Step 2</h4>
							</div>
							<div class="timeline-body">
								<p>
									See the list of Cities Where Gopa Aata is available.<br>
									<br>
									<?php 
									$query="SELECT * FROM city";
									$sql=mysqli_query($connection,$query);
									if (mysqli_num_rows($sql)>0) {
										while ($row=mysqli_fetch_assoc($sql)) {
											echo $row['city']." (".$row['code'].")"?>
											</br><?php
										}
									}
									?>
								</p>
							</div>
						</div>
					</li>
					<li>
						<div class="timeline-badge primary"><i class="fas fa-phone"></i></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Step 3</h4>
							</div>
							<div class="timeline-body">
								<p>Contact the seller near you, Do inquiry about the availability of product.</p>
							</div>
						</div>
					</li>
					<li class="timeline-inverted">
						<div class="timeline-badge success"><i class="far fa-check-circle"></i></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Step 4</h4>
							</div>
							<div class="timeline-body">
								<p>Enjoy your product</p>
							</div>
						</div>
					</li>
					<li>
						<div class="timeline-badge secondary"><i class="fas fa-sticky-note"></i></div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4 class="timeline-title">Review</h4>
							</div>
							<div class="timeline-body">
								<p>Write a Review About Product.<br><a href="review.php"><button class="btn">Write Review</button></a></p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div> 
<?php
include('footer.php');
include('script.php');
?>