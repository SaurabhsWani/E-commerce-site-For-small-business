<?php
include('header.php');
include('navbar.php');
$bid=$_SESSION['usr']['bid'];
$doc=$col->find([],
	['sort'=>['DateTime'=>1]]);
?>
<br/><br/>
<div class="page-inner mt--5">	
	<div class="row ">
		<div class="col-md-8 ml-auto mr-auto">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Orders</h4>
				</div>
			</div>
			<div class="row ">
				<?php 
				foreach($doc as $docs)
				{
					?>
					<div class="col-md-8 ml-auto mr-auto">
						<div class="card card-post card-round">
							<?php echo "<img class='card-img-top' src='../admin/image/".$docs['Pimg']."' width=100px; height=200px;>";?>
							<div class="card-body">
								<div class="d-flex">
									<div class="info-post ml-2">
										<h3 class="card-title">
											<a href="#"><?php print_r($docs['Prname']); ?></a>
										</h3>
										<p class="username">Rs.<?php print_r($docs['Price']); ?></p>
									</div>
								</div>
								<div class="separator-solid"></div>					
								<p class="card-text ml-auto mr-auto">
									<?php print_r(
										'<b>Payment id:</b>'.$docs['_id'].
										'<br><b>Name:</b>'.$docs['Uname'].
										'<br><b>Email:</b>'.$docs['UEmail'].
										'<br><b>Mobile no:</b>'.$docs['Umono'].
										'<br><b>Ordered On:</b>'.$docs['DateTime'].
										'<br><b>No Of item:</b>'.$docs['Pcount'].
										'<br><b>Quantity per item:</b>'.$docs['Pweight'].
										'<br><b>Total Price:</b>'.$docs['TotalPrice'].
										'<br><b>Payment Method:</b>'.$docs['Paymethod']); ?>
									</p>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div> 
	<?php
	include('footer.php');
	include('script.php');
	?>