<?php
include('security.php');
if(isset($_POST['show_btn'])) 
{
	$id1=$_POST['show_id'];
 $sql="UPDATE review SET display='yes' WHERE id=$id1";

 if(mysqli_query($connection,$sql))
 {
 	$_SESSION['Success']="Review will be shown on website ";
 	header("Location:review.php");
 	 	
 }
 else
{
$_SESSION['Status']="Please Try Again ";
	header('Location: review.php');
}
}
if(isset($_POST['unshow_btn'])) 
{
	$id1=$_POST['show_id'];
 $sql="UPDATE review SET display='no' WHERE id=$id1 limit 1";

 if(mysqli_query($connection,$sql))
 {
 	$_SESSION['Success']="Review will not be shown on website ";
 	header("Location:review.php");
 	 	
 }
 else
{
$_SESSION['Status']="Please Try Again ";
	header('Location: review.php');
}
}
?>