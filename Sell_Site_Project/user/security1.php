<?php
session_start();
require('../admin/database/dbconfig.php');

if ($dbconfig) 
{
	//echo "Database Connected";
}
else
{
	header('Location:../admin/database/dbconfig.php');
}
?>