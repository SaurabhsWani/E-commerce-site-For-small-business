<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gopaaata Admin</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
   <!-- Sidebar -->
<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-6">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <a class="btn btn-user btn-block" href="../asdfg" >
            <button class="btn btn-user btn-block"><i class="fas fa-home fa-mx fa-fw mr-1 text-gray-800"></i>
              HOME
            </button>
          </a>
           <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-0">ADMIN</h1>
                  <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                  <?php
                  if (isset($_SESSION['status'])&&$_SESSION['status']!='') {
                    echo '<h2 class="bg-danger text-white">'.$_SESSION['status'].'</h2>';
                    unset($_SESSION['status']);
                  }

                  ?>
                </div>
                <form class="user" action="lcode.php" method="POST">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user"  placeholder="Enter Email Address...">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user"  placeholder="Password">
                  </div>
                  <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block">Login </button>
                  <hr>
                </form>        

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  

  <?php 
  include('includes/footer.php');
  ?>