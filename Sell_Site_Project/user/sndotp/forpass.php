<?php
include('security.php');
?>
<!DOCTYPE>
<!DOCTYPE html>
<html>
<head>
	<title>popup</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center>

		<?php
		if($_SESSION['id']== NULL)
{
	echo '<script>window.location="asdfg"</script>';
}
		$id3=$_SESSION['id'];
		$sql="SELECT * FROM b_person WHERE bid=$id3";
		$record=mysqli_query($connection,$sql);
		if ($record) 
		{
			$result=mysqli_query($connection,$sql);
			$row=mysqli_fetch_array($result);

			echo "<center>
			<a>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<h2>Gopa Aata</h2>
			<p >name:&emsp; ".$row['Name']."</p>";
			echo "<p>mobile no.:&emsp;".$row['Mobile']."</p>";
			echo "<form action=barwas method=post>";
			echo "<p>new password:&emsp;&emsp;&emsp;<input type=password name=pd required></p>";
			echo "<p>&emsp;&emsp;&emsp;&emsp;re enter:&emsp;&emsp;&emsp;<input type=text name=pd required></p>";
			echo "<input type=hidden name=id value='".$row['bid']."'>";
			echo "<button  type='submit' value='submit' name='submit' >submit</button>";
			echo "</form></a>
			</center>";

		}
		else
		{
		echo "<script>alert('Oops....Something went wrong!');</script>";
		session_destroy();
		session_unset();
		echo '<script>window.location="asdfg"</script>';
		}
		


		?>
	</center>	
</body>
</html>

