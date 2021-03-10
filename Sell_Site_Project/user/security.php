<?php
session_start();
require('../admin/database/dbconfig.php');
function destroy()
{
	session_destroy();
	session_unset();
	header('Location:ulogin.php');
}
if ($dbconfig) 
{
	//echo "Database Connected";
}
else
{
	header('Location:../admin/database/dbconfig.php');
}
$usr=isset($_SESSION['usr'])?$_SESSION['usr']:"";
if(!$usr?destroy():False)
{
	header('Location:ulogin.php');
}
require "vendor/autoload.php";
$bid=intval($_SESSION['usr']['bid']);
$client= new MongoDB\Client; 
$db=$client->UserOrder;// to get database
$col=$db->$bid;
?>