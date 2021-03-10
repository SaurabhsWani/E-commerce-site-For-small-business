<link rel="stylesheet" type="text/css" href="../css/sb-admin-2.min.css">
<?php
include('admin/database/dbconfig.php');

if ($dbconfig) 
{
	//echo "Database Connected";
}
elseif ($dbconfig) {
	header('Location:admin/database/dbconfig.php');
}
else
{
echo '
<div class="container-fluid">

           <div class="text-center">
            <div class="error mx-auto" data-text="error ">error</div>
            <p class="lead text-gray-800 mb-3">Database connection Failure</p>
            <p class="text-gray-50 mb-0">Please Check your database connection...</p>
            <a href="asdfg">&larr; Back to Home page</a>
          </div>

        </div>
	';	
}
?>