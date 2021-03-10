<?php
include('security.php');
if (isset($_POST['logout_btn'])) 
{
	session_destroy();
	unset($_SESSION['email']);
	session_unset();
	header('Location:ulogin.php');
}
?>