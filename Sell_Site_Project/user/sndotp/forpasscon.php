<?php
include('security.php');
if($_SESSION['id']== NULL)
{
	echo '<script>window.location="popup.php"</script>';
}
$sql="UPDATE b_person SET Password='$_POST[pd]' WHERE bid='$_POST[id]'";

if(mysqli_query($connection,$sql))
{
	header("refresh:1; url=../ulogin.php");
	echo "<script>alert(\"Updated successfully You Can Login now\");</script>";

}
else
{
	echo "<script>alert(\"Not Updated Try After Sometime\");</script>";
	echo '<script>window.location="popup.php"</script>';
}
?>