<?php
include('security.php');
require('../admin/functions.php');
?>
<body>
	<div class="wrapper overlay-sidebar">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="green2">
				
				<!-- <a href="index1.php" class="logo">
					<img src="../admin/image/logo.jpg" alt="" class="navbar-brand" style="width: 50px;height: 50px;">
				</a> -->
				
				<a href="index.php" class="logo">
					<div class="avatar-sm float-left mr-1">
						<?php
						$query="SELECT * FROM nav";
						$sql=mysqli_query($connection,$query);
						if (mysqli_num_rows($sql)>0) {
							while ($row=mysqli_fetch_assoc($sql)) {
								echo "<img class='img_div' src='../admin/image/".$row['image']."' style='width: 40px;height: 50px;'>";
							}
						}
						?> 
						<!-- <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle"> -->
					</div>
					<span class="text-white pb-1 fw-bold">Sell Site 
					</span>
				</a>	
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle sidenav-overlay-toggler">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->
			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="green2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3" method="get" action="serres.php">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" name="sq" placeholder="Search Product..." class="form-control">
							</div>
						</form>
					</div>
					<div class="collapse" id="search-nav">
							<div class="input-group">
								<a href="index.php#Howto"><button class="btn btn-round">How to Buy</button></a>
							</div>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<div id='img_div'><img class='avatar-img rounded-circle' src='<?php echo "../admin/image/".$_SESSION['usr']['img'] ?>' >
									</div>
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">

											<div class="avatar-lg">
												<div id='img_div'><img class='avatar-img rounded-circle' src='<?php echo "../admin/image/".$_SESSION['usr']['img']?>'></div>
											</div>
											<div class="u-text">
												<h4>
													<?php echo $_SESSION['usr']['fn'];?>
												</h4>
												<p class="text-muted">
													<?php echo $_SESSION['usr']['Email'];?>
												</p>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>							
										<a class="dropdown-item" href="profile.php">	
											<button class="btn  btn-user btn-block">My Profile</button>
										</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
											<button class="btn  btn-user btn-block"><i class="fas fa-sign-out-alt fa-mx fa-fw mr-1 text-gray-800"></i>
											Logout</button>
										</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<div>
			<a class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">
				<div class="custom-template">
					<div class="custom-toggle">
						<i class="fas icon-logout fa-mx fa-fw mr-1 text-white-1000"></i>
					</div>
				</div>
			</a>
		</div>
		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
					<div class="modal-footer">
						<form action="logout.php" method="POST">
							<button class="btn btn-danger" type="button" data-dismiss="modal">
								<span class="btn-label"><i class="fa fa-exclamation-circle"></i>Cancel</span>
							</button>
							<button type="submit" name="logout_btn" class="btn btn-success">
								<span class="btn-label"><i class="fa fa-check"></i>Logout</span>
							</button>					
						</form>

					</div>
				</div>
			</div>
		</div>
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="dark">	
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">						
					<ul class="nav nav-primary">
						<li class="nav-item ">
							<a  href="index.php" >
								<i class="fas fa-home"></i>
								<p>Home</p>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<li class="nav-item ">
							<a  href="wish.php" >
								<i class="fa fa-heart"></i>
								<p>Wishlist</p>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<li class="nav-item ">
							<a  href="cart.php">
								<i class="fas fa-cart-plus"></i>
								<p>Cart</p>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
						<li class="nav-item ">
							<a  href="order.php" >
								<i class="fas fa-shopping-cart"></i>
								<p>My Order</p>
								<!-- <span class="caret"></span> -->
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
		<div class="main-panel">
			<div class="content">

