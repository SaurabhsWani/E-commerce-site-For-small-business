<?php
include('header.php');
include('navbar.php');
$bid=$_SESSION['usr']['bid'];
$doc=$col->find([],	['sort'=>['DateTime'=>-1]]);
?>
<br/><br/>
<script type="text/javascript" src="dist/jspdf.debug.js"></script>
<div class="page-inner mt--5">	
	<div class="row ">
		<div class="col-md-8 ml-auto mr-auto">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Previous Orders</h4>
				</div>
			</div>
			<div class="row ">
				<?php 
				foreach($doc as $docs)
				{
					?>
					<div class="col-md-8 ml-auto mr-auto" >
						<div class="card card-post card-round" >
							<div class="card-body" id="<?php echo $docs['_id']?>">
								<?php echo "<img class='card-img-top' src='../admin/image/".$docs['Pimg']."'>";?>
								<div class="d-flex">
									<div class="info-post ml-2">
										<h3 class="card-title">
											<a href="index.php"><?php print_r($docs['Prname']); ?></a>
										</h3>
										<p class="username">Rs.<?php print_r($docs['Price']); ?></p>
									</div>
								</div>
								<div class="separator-solid">
								</div>					
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
											<td>'.$docs['Paymethod']."</td></tr>"); 
											?>
										</table>
									</p>
								</div>
								<button class="btn btn-sm btn-dark" onclick="printDiv('<?php echo $docs['_id']?>','Tax Invoice By Sell Site')">
									<i class="fas fa-print fa-sm "></i>&emsp;Print Invoice
								</button>
								<button class="btn btn-sm btn-white" onclick="saveDiv('<?php echo $docs['_id']?>','Tax Invoice From Sell Site')">
									<i class="fas fa-download fa-sm "></i>&emsp;Download Invoice
								</button>					
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div> 			
	<script type="text/javascript">
		var doc = new jsPDF();

		function saveDiv(divId, title) {
			doc.fromHTML(`<html><head><title>${title}</title></head><body>` + document.getElementById(divId).innerHTML + `</body></html>`);
			doc.save('div.pdf');
		}

		function printDiv(divId,
			title) {

			let mywindow = window.open('', 'PRINT');

			mywindow.document.write(`<html><head><title>${title}</title>`);
			mywindow.document.write('</head><body style="size: A4;font-size: 15pt;"><center>');
			mywindow.document.write(`<h4>${title}</h4>`);
			mywindow.document.write(document.getElementById(divId).innerHTML);
			mywindow.document.write('</center></body></html>');

  mywindow.document.close(); // necessary for IE >= 10
  mywindow.focus(); // necessary for IE >= 10*/

  mywindow.print();
  mywindow.close();

  return true;
}
</script>
<?php
include('footer.php');
include('script.php');
?>