<?php
include('header.php');
?>
<?php
$emaill="";
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
if (isset($_POST['Password'])) 
{
	include('security1.php'); 
	if ($_SERVER["REQUEST_METHOD"]=="POST") 
	{
		if(isset($_POST['Email']))
		{
			$username=$_POST['Email'];
			$query2="SELECT * FROM b_person WHERE Email='$username' LIMIT 1";
			$result=mysqli_query($connection,$query2);
			$passcode=mysqli_fetch_array($result);
			if(empty($passcode))
			{
				echo "falsefalsefalsefalsefalsefalsefalsefalsefalsefalsefalsefalsefalsefalsefalsefalsefalsefalse";
			}
			else{
				if($passcode['Password']==$_POST['Password'])
				{
					$_SESSION['usr']=array(
						'fn' => $passcode['Name'],
						'bid'=>$passcode['bid'],
						'Email'=>$passcode['Email'],
						'img'=>$passcode['image'],
						'Mob'=>$passcode['Mobile'],
						'pass'=>$passcode['Password'] );
					echo '<script>window.location="index.php"</script>'; 				
				}
				else
				{
					echo '<script>window.location="ulogin.php"</script>';
				}
			}
		}
		else
		{
			echo '<script>window.location="ulogin.php"</script>';
		}
	}
}
?>
<div class="page-inner mt--5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-6">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<a class="btn btn-user btn-block" href="../asdfg" >
						<button class="btn btn-user btn-block"><i class="fas fa-home fa-mx fa-fw mr-1 text-gray-800"></i>
							HOME
						</button>
					</a>
					<div class="card-body p-1">
						
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h1 text-gray-900 mb-0">USER</h1>
										<h2 class="h2 text-gray-1000 mb-2">Login Here!</h2>
									</div>
									<form class="user" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
										<div class="form-group">
											<input type="email" class="form-control form-control-user" name="Email" required="Enter Email" placeholder="Enter Email Address...">
										</div>
										<div class="form-group">
											<input type="password" name="Password" required="Enter Password"  class="form-control form-control-user"  placeholder="Password">
										</div><br>
										<button type="submit" name="submit" value="submit" class="btn btn-success btn btn-user btn-block">
											<span class="btn-label">
												<i class="fa fa-check"></i>
											</span>Login 
										</button>
										<hr>
										<div class="text-center">
											<form class="user"> 
												<h5>
													<a href="sndotp/asdfg">
														<span class="btn btn-warning" style="background: white; ">
															<span class="btn-label">
																<i class="fa fa-exclamation-circle"></i>
															</span>Forger Password?
														</span>
													</a>
													<br><br>
													<!-- &emsp;&emsp;
													<a href="">
														<span class="btn btn-primary" style="background: white; ">Forget Username?
														</span>
													</a> -->
													<a href="../barwas">
														<span class="btn btn-secondary" style="background: white; " >
															<span class="btn-label">
																<i class="fa fa-plus"></i>
															</span>New Registration
														</span>
													</a>
												</h5>
											</form>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>


</div> 
<?php
include('footer.php');
include('script.php');
?>