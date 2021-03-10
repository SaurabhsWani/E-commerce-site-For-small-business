<?php
include('security.php');
$id1=$_SESSION['usr']['bid'];
if (isset($_POST['upd'])) 
{
	if(is_uploaded_file($_FILES['adimg']['tmp_name']))
	{
		$image=$_FILES['adimg']['tmp_name'];
		$image2=$_FILES['adimg']['name'];
	}
	$target='../admin/image/'.$_FILES['adimg']['name'];
	$sql="UPDATE b_person SET Name='$_POST[First_Name]',Mobile='$_POST[Mobile]',Email='$_POST[Email]',image='$image2' WHERE bid=$id1";

	if(mysqli_query($connection,$sql))
	{
		if(move_uploaded_file($image,$target))
		{
			$query2="SELECT * FROM b_person WHERE bid=$id1 LIMIT 1";
			$result=mysqli_query($connection,$query2);
			$passcode=mysqli_fetch_array($result);
			$_SESSION['usr']=array(
						'fn' => $passcode['Name'],
						'bid'=>$passcode['bid'],
						'Email'=>$passcode['Email'],
						'img'=>$passcode['image'],
						'Mob'=>$passcode['Mobile'],
						'pass'=>$passcode['Password'] );
			$_SESSION['Success']="User profile Updated";
			header("Location:profile.php");
		}
		
	}
	else
	{
		$_SESSION['Status']="User profile Not Updated";
		header('Location: index.php');
	}
}
?>