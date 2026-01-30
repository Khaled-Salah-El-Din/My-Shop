<?php 

  session_start(); 

  require_once "admin/fun/Database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Login | My Shop</title>
  <link rel="shortcut icon" href="img/favicon.png">

  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&display=swap" />
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" />
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet" />
  <link rel="stylesheet" href="css/custom.css" />
</head>

<body>
    
    <!-- Header -->
    <header class="header bg-white">
        <div class="container px-0 px-lg-3">
            <nav class="navbar navbar-expand-lg navbar-light py-4 px-lg-0"><a class="navbar-brand" href="index.php"><span class="font-weight-bold text-uppercase text-dark">My Shop</span></a>
        </nav>
    </div>
    </header>

    <div class="page-holder d-flex align-items-center py-5 bg-light">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 px-lg-4">
          <div class="card shadow-sm border-0">
            <div class="card-body p-5">
              <h3 class="mb-4 text-center text-uppercase">Welcome Back!</h3>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $password = $_POST["password"];

  $customers = new Database("customers");
  $customer = $customers->select("password", $password);
  $num = count($customer);
  
  if ($num > 0) { // customer creds were indeed found
    $_SESSION['login'] = $customer[0]['id'];

    $return_to = $_SESSION['return_to'] ?? 'index';

    unset($_SESSION['return_to']);

    switch ($return_to) {
      case 'do_add_to_cart':
        header("location:fun/do_add_to_cart.php");
        break;

      case 'cart':
        header("location:cart.php");
        break;

      default:
        header("location:index.php");
        break;
    }

    exit;

  } else {
    echo "<div class='alert alert-danger'>Incorrect login credentials.</div>";
  }
}

?>

              <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
                <div class="form-group mb-3">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" name="email" id="email" required placeholder="Enter E-mail" />
                </div>
                <div class="form-group mb-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" required placeholder="Enter password" />
                </div>

                <button type="submit" class="btn btn-dark btn-block mb-3">Login</button>

                <div class="text-center text-muted my-3">OR</div>

                <a href="#" class="btn btn-outline-danger btn-block mb-2">
                  <i class="fab fa-google mr-2"></i> Login with Google
                </a>
                <a href="#" class="btn btn-facebook btn-block text-white" style="background-color: #3b5998;">
                  <i class="fab fa-facebook-f mr-2"></i> Login with Facebook
                </a>
              </form>

              <hr class="my-4" />

              <div class="text-center">
                <a class="small text-muted" href="forgot-password.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small text-muted" href="register.php">Create an Account</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- Footer -->
     
<?php
    
include "includes/footer.php";
    
?>

  <!-- JS -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>