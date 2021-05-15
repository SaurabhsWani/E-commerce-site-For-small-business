<?php
include('header.php');
include('navbar.php');
?><br><br>
<div class="page-inner mt--5">
	<?php
	if (isset($_SESSION['Success'])&&$_SESSION['Success']!='') {
		echo '<h2 class="bg-primary text-white">'.$_SESSION['Success'].'</h2>';
		unset($_SESSION['Success']);
	}
	if (isset($_SESSION['Status'])&&$_SESSION['Status']!='') {
		echo '<h2 class="bg-danger text-white">'.$_SESSION['Status'].'</h2>';
		unset($_SESSION['Status']);
	}
	if(isset($_POST['btn'])&&$_SERVER["REQUEST_METHOD"]=="POST") 
	{
		if($_POST['rev']=='' || $_POST['rate']=='NaN')
		{
			$_SESSION['Success']="Please Fill All the fields ";
			echo "<script> window.location = 'review.php';</script>";
		} 
		else
		{
			$sql="INSERT INTO review (id,review,rate,status,`DATE`,display) VALUES('$_POST[id]','$_POST[rev]','$_POST[rate]','unread',CURRENT_TIMESTAMP,'no')";

			if(mysqli_query($connection,$sql))
			{
				$_SESSION['Success']="Your review Submitted ";
				echo "<script> window.location = 'review.php';</script>";

			}
			else
			{
				$_SESSION['Status']="Your review Not Submitted ";
				echo "<script> window.location = 'review.php';</script>";
			}
		}
	}
	?>
	<form class="p-5 col-md-8 ml-auto mr-auto bg-white" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="hidden" name="id" value="<?php echo intval($_SESSION['usr']['bid']);?>">
		<div class="form-group">
			<label for="comment">Write about our product </label>
			<textarea class="form-control" name="rev" id="comment" rows="5" require="" placeholder="Enter Something About Us"></textarea>
		</div>
		<div class="form-group">
			<label for="comment">Rate Us Out-Of-100</label>
			<div class="sparkline8-list shadow-reset">
				<div class="input-knob-dial-wrap">
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="knob-single">
								<input type="text" name="rate" class="dial" data-fgcolor="#03a9f4" data-width="85" data-height="85" require=""><br>Rotate Knob
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<button  type="submit" name="btn" class="btn btn-success"> Submit Review</button>
		</div>
	</form>
</div> 
<script src="js/vendor/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.meanmenu.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/counterup/jquery.counterup.min.js"></script>
<script src="js/counterup/waypoints.min.js"></script>
<script src="js/modal-active.js"></script>
<script src="js/touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="js/touchspin/touchspin-active.js"></script>
<script src="js/colorpicker/jquery.spectrum.min.js"></script>
<script src="js/colorpicker/color-picker-active.js"></script>
<script src="js/datapicker/bootstrap-datepicker.js"></script>
<script src="js/datapicker/datepicker-active.js"></script>
<script src="js/input-mask/jasny-bootstrap.min.js"></script>
<script src="js/chosen/chosen.jquery.js"></script>
<script src="js/chosen/chosen-active.js"></script>
<script src="js/select2/select2.full.min.js"></script>
<script src="js/select2/select2-active.js"></script>
<script src="js/ionRangeSlider/ion.rangeSlider.min.js"></script>
<script src="js/ionRangeSlider/ion.rangeSlider.active.js"></script>
<script src="js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
<script src="js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
<script src="js/rangle-slider/rangle-active.js"></script>
<script src="js/knob/jquery.knob.js"></script>
<script src="js/knob/knob-active.js"></script>
<script src="js/main.js"></script>
<?php
include('footer.php');
include('script.php');
?>
