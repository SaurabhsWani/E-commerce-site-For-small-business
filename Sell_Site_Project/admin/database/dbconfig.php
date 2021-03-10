<link rel="stylesheet" type="text/css" href="../css/sb-admin-2.min.css">
<?php
$dbname="sellsite";
$connection = new mysqli('127.0.0.1','root','',$dbname);
$dbconfig=mysqli_select_db($connection,$dbname);
if ($dbconfig)
{
	//echo "Database Connected";
}
else
{
	echo '
<div class="container-fluid">

           <div class="text-center">
            <div class="error mx-auto" data-text="error ">error</div>
            <p class="lead text-gray-800 mb-3">Database connection Failure</p>
            <p class="text-gray-50 mb-0">Please Check your database connection...</p>
            <a href="../../index.php">&larr; Back to Login</a>
          </div>

        </div>
	';

}

?>