<?php
include('header.php');
include('navbar.php');
$bid=$_SESSION['usr']['bid'];
$val=$_GET['val'];
$wcb=select("*","category","WHERE id='$val' LIMIT 1");
$productdetails = array();
if (mysqli_num_rows($wcb)>0)
{
	$row=mysqli_fetch_assoc($wcb);
?><br/><br/>
<div class="page-inner mt--5">	
	<div class="row">
		<div class="col-md-8 ml-auto mr-auto">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Payment Details</div>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-4 ml-auto mr-auto">
							<?php echo "<img class='card-img-top' src='../admin/image/".$row['image']."' width=150px; height=200px;>";?>
						</div>
					</div>
					<div class="row">
						<h2 class="h2 ml-auto mr-auto"><?php echo $row['name'];?></h2>
					</div>
					<div class="row">
						<h2 class="h4 ml-auto mr-auto"><?php echo 'Quantity: '.$row['pname'];?></h2>
						<h2 class="h4 ml-auto mr-auto"><?php echo 'Rs.'.$row['price'];?></h2>
					</div>
					<form action="op.php" method="post">
						<div class="row">
							<div class="col-md-7 ml-auto mr-auto">
								<div class="form-group form-group-default">
									<label>Qty</label>
									<input type="int" pattern="[0-5]{1}" class="form-control" name="count" value="1" placeholder="Less than 6">
								</div>
							</div>
							<?php  
							foreach ($row as $key=>$value) {
								echo "<input type='hidden' name='prd[".$key."]' value='".$value."'>";
							}
							?>							
							<div class="form-group col-md-7 ml-auto mr-auto">
								<label for="name">Name</label>
								<input type="text" name="uname" class="form-control" id="name" value="<?php echo $_SESSION['usr']['fn']; ?>">
							</div>
							<div class="form-group col-md-7 ml-auto mr-auto">
								<label for="email">Email Address</label>
								<input type="email" name="uemail" class="form-control" id="email" value="<?php echo $_SESSION['usr']['Email']; ?>">
								<small id="emailHelp2" class="form-text text-muted">We'll never share your email with anyone else.</small>
							</div>
							<div class="form-group col-md-7 ml-auto mr-auto">
								<label for="mob">Mobile No.</label>
								<input type="number" name="umob" pattern="[0-9]{10}" class="form-control" id="mob" value="<?php echo $_SESSION['usr']['Mob']; ?>">
							</div>
							<div class="form-group col-md-7 ml-auto mr-auto">
								<label for="text">Address</label>
								<textarea class="form-control" id="address" rows="3" name="uaddress" placeholder="Your Address"></textarea>
							</div>
							<div class="form-group col-md-7 ml-auto mr-auto">
								<label for="exampleFormControlSelect1">Payment Method</label>
								<select class="form-control" name="pm" id="exampleFormControlSelect1">
									<option>Cash On Delivery</option>
									<option>Debit Card</option>
									<option>Credit Card</option>
									<option>UPI</option>
									<option>Mobile Wallet</option>
								</select>
							</div>
							<div class="form-group col-md-7 ml-auto mr-auto">
								<button type="submit" name="pay" value="yes" class="btn btn-block btn-primary"> Place Order</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> 
<?php
}
include('footer.php');
include('script.php');
?>