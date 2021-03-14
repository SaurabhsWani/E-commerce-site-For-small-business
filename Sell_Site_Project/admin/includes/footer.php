<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<!-- Footer -->
<script type="text/javascript">	
	var label=<?php  echo $jmonth ?>;
	var datas=<?php echo $jsellval ?>;
	// var label=["Mar/2021", "Apr/2021", "May/2021", "Jun/2021", "Jul/2021", "Aug/2021"];
	// var datas=[40, 90, 50, 80, 70, 100];
// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
	type: 'line',
	data: {
		labels: label,
		datasets: [{
			label: "Product Selled",
			lineTension: 0.3,
			backgroundColor: "rgba(78, 115, 223, 0.05)",
			borderColor: "rgba(78, 115, 223, 1)",
			pointRadius: 3,
			pointBackgroundColor: "rgba(78, 115, 223, 1)",
			pointBorderColor: "rgba(78, 115, 223, 1)",
			pointHoverRadius: 3,
			pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
			pointHoverBorderColor: "rgba(78, 115, 223, 1)",
			pointHitRadius: 10,
			pointBorderWidth: 2,
			data: datas,
		}],
	},
	options: {
		maintainAspectRatio: false,
		layout: {
			padding: {
				left: 10,
				right: 25,
				top: 25,
				bottom: 0
			}
		},
		scales: {
			xAxes: [{
				time: {
					unit: 'date'
				},
				gridLines: {
					display: false,
					drawBorder: false
				},
				ticks: {
					maxTicksLimit: 7
				}
			}],
			yAxes: [{
				ticks: {
					maxTicksLimit: 5,
					padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
          	return '' + number_format(value);
          }
      },
      gridLines: {
      	color: "rgb(234, 236, 244)",
      	zeroLineColor: "rgb(234, 236, 244)",
      	drawBorder: false,
      	borderDash: [2],
      	zeroLineBorderDash: [2]
      }
  }],
},
legend: {
	display: false
},
tooltips: {
	backgroundColor: "rgb(255,255,255)",
	bodyFontColor: "#858796",
	titleMarginBottom: 10,
	titleFontColor: '#6e707e',
	titleFontSize: 14,
	borderColor: '#dddfeb',
	borderWidth: 1,
	xPadding: 15,
	yPadding: 15,
	displayColors: false,
	intersect: false,
	mode: 'index',
	caretPadding: 10,
	callbacks: {
		label: function(tooltipItem, chart) {
			var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
			return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
		}
	}
}
}
});

</script>
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Your Website 2019 | Developed By Saurabh Wani</span>
		</div>
	</div>
</footer>
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>
<!-- End of Footer -->
</div>
</div>
</div>
<!-- End of Content Wrapper -->
</body>

</html>