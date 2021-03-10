<?php
include('security.php');
require('functions.php');
$url=$_SERVER['HTTP_REFERER'];
// counting admin
$query="SELECT bid FROM admin ORDER BY bid";
$sql_run=mysqli_query($connection,$query);
$row=mysqli_num_rows($sql_run);
echo '<h4>Total Admin: '.$row.'</h4>';
//end counting 
$name=$_SESSION['name'];
$idd=$_SESSION['username'];
if ($_POST['delete']=="DelPrd") 
{
	$id1=$_POST['id'];
	$sql="DELETE  FROM category WHERE id=$id1";

	if(mysqli_query($connection,$sql))
	{
		$_SESSION['Success']="Content Deleted from category";
		header("Location:category.php");
		
	}
	else
	{
		$_SESSION['Status']="Content Not Deleted from category";
		header('Location:category.php');
	}
}
if ($_POST['Remove']=="RemAdmin") 
{
	$id1=$_POST['id'];
	if ($idd!=$id1)
	{

		$sql="DELETE  FROM admin WHERE bid=$id1 ";
		if(mysqli_query($connection,$sql))
			poutput("Admin profile Deleted",$url);
		else
			noutput("Admin profile Not Deleted",$url);
	}
		else
			noutput("Admin Can Not be Deleted",$url);
}
else
{
	if (isset($_POST['del_btn'])) 
	{
		$id1=$_POST['del_id'];
		$sql="DELETE FROM aboutus WHERE id=$id1";

		if(mysqli_query($connection,$sql))
		{
			$_SESSION['Success']="Content Deleted";
			header("Location:abtus.php");
			
		}
		else
		{
			$_SESSION['Status']="Content Not Deleted";
			header('Location: abtus.php');
		}
	}
	elseif (isset($_POST['del_btnr'])) 
	{
		$id1=$_POST['del_idr'];
		$sql="DELETE FROM recipe WHERE id=$id1";

		if(mysqli_query($connection,$sql))
		{
			$_SESSION['Success']="Content Deleted";
			header("Location:recipe.php");
			
		}
		else
		{
			$_SESSION['Status']="Content Not Deleted";
			header('Location: recipe.php');
		}
	}
	elseif (isset($_POST['del_btnc'])) 
	{
		$id1=$_POST['del_idr'];
		$sql="DELETE FROM certificate WHERE id=$id1";

		if(mysqli_query($connection,$sql))
		{
			$_SESSION['Success']="Certificate Deleted";
			header("Location:certificate.php");
			
		}
		else
		{
			$_SESSION['Status']="Certificate Not Deleted";
			header('Location: certificate.php');
		}
	}
	elseif (isset($_POST['del_btnt'])) 
	{
		$id1=$_POST['del_idt'];
		$sql="DELETE FROM team WHERE id=$id1";

		if(mysqli_query($connection,$sql))
		{
			$_SESSION['Success']="Member Deleted";
			header("Location:team.php");
			
		}
		else
		{
			$_SESSION['Status']="Member Not Deleted";
			header('Location: team.php');
		}
	}
	elseif (isset($_POST['delte_btn']) ) 
	{
		$id1=$_POST['delte_id'];
		$sql="DELETE  FROM b_person WHERE bid=$id1";

		if(mysqli_query($connection,$sql))
		{
			$_SESSION['Success']="User profile Deleted";
			header("Location:tables.php");
			
		}
		else
		{
			$_SESSION['Status']="user profile Not Deleted";
			header('Location:tables.php');
		}
	}
	elseif (isset($_POST['del_btn1'])) 
	{
		$id1=$_POST['del_id1'];
		$sql="DELETE FROM nupd WHERE id=$id1";

		if(mysqli_query($connection,$sql))
		{
			$_SESSION['Success']="News/Update Deleted";
			header("Location:newupd.php");
			
		}
		else
		{
			$_SESSION['Status']="News/Update Not Deleted";
			header('Location: newupd.php');
		}
	}
	elseif (isset($_POST['del_btnc'])) 
	{
		$id1=$_POST['del_idc'];
		$sql="DELETE FROM city WHERE id=$id1";

		if(mysqli_query($connection,$sql))
		{
			$_SESSION['Success']="City Deleted";
			header("Location:Cities.php");
			
		}
		else
		{
			$_SESSION['Status']="City Not Deleted";
			header('Location: Cities.php');
		}
	}
	else
	{
		header('Location: register.php');
		$_SESSION['Status']="Admin Can Not Be Deleted";
	}
}

?>