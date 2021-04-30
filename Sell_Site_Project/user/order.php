<?php
include('header.php');
include('navbar.php');
$bid=$_SESSION['usr']['bid'];
$doc=$col->find([],
	['sort'=>['DateTime'=>-1]]);
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
						<div class="col-md-8 ml-auto mr-auto" id="<?php echo $docs['_id']?>">
							<div class="card card-post card-round">
								<?php echo "<img class='card-img-top' src='../admin/image/".$docs['Pimg']."' width=100px; height=200px;>";?>
								<div class="card-body">
									<div class="d-flex">
										<div class="info-post ml-2">
											<h3 class="card-title">
												<a href="index.php"><?php print_r($docs['Prname']); ?></a>
											</h3>
											<p class="username">Rs.<?php print_r($docs['Price']); ?></p>
											<button class="d-none d-sm-inline-block btn btn-sm shadow-sm" onclick="generate(<?php echo $docs['_id']?>)">
												<i class="fas fa-download fa-sm "></i>&emsp;Download Invoice</button>
											</div>
										</div>
										<div class="separator-solid"></div>					
										<p class="card-text ml-auto mr-auto">
											<table style="text-align: left;">
												<?php print_r(
													'<tr><td><b>Payment id</b></td>
													<td>'.$docs['_id'].
													'</td></tr><tr><td><b>Name</b></td>
													<td>'.$docs['Uname'].
													'</td></tr><tr><td><b>Email</b></td>
													<td>'.$docs['UEmail'].
													'</td></tr><tr><td><b>Mobile no</b></td>
													<td>'.$docs['Umono'].
													'</td></tr><tr><td><b>Ordered On</b></td>
													<td>'.$docs['DateTime'].
													'</td></tr><tr><td><b>No Of item</b></td>
													<td>'.$docs['Pcount'].
													'</td></tr><tr><td><b>Quantity per item</b></td>
													<td>'.$docs['Pweight'].
													'</td></tr><tr><td><b>Total Price</b></td>
													<td>'.$docs['TotalPrice'].
													'</td></tr><tr><td><b>Payment Method</b></td>
													<td>'.$docs['Paymethod']."</td></tr>"); ?>
												</table>
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