<?php

  session_start();
  require_once "admin/fun/Database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Register</title>
  <link rel="shortcut icon" href="img/favicon.png">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Boutique Theme CSS -->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <link rel="stylesheet" href="css/custom.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body>
  <div class="page-holder">

    <!-- Header -->
   <header class="header bg-white">
        <div class="container px-0 px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-4 px-lg-0"><a class="navbar-brand" href="index.php"><span class="font-weight-bold text-uppercase text-dark">My Shop</span></a>
          </nav>
        </div>
    </header>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // print_r($_POST);
  $first_name = $_POST["first_name"]; // ?? '' at the end is one way to remove the error from displaying in the page
  $last_name = $_POST["last_name"]; // @ at the start is another way
  $email = $_POST["email"];
  $password = $_POST["password"];

  $customers = new Database("customers");
  
  $new_customer_id = $customers->insert([
                            "first_name"=>$first_name,
                            "last_name"=>$last_name,
                            "email"=>$email,
                            "password"=>$password
                          ]);

  $_SESSION["login"] = $new_customer_id;

  $return_to = $_SESSION['return_to'] ?? 'index';

  unset($_SESSION['return_to']);

  switch ($return_to) {
    case 'cart':
      header("location:cart.php");
      break;

    default:
      header("location:index.php");
      break;
  }

  exit;
}

?>

    <section class="py-5 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
              <div class="card-body p-5">
                <h2 class="h3 mb-4 text-uppercase text-center">Create an Account</h2>
                <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" class="needs-validation" novalidate>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="firstName">First Name</label>
                      <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="lastName">Last Name</label>
                      <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="confirmPassword">Confirm Password</label>
                      <input type="password" class="form-control" id="confirmPassword" placeholder="Repeat Password" required>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-dark btn-block text-uppercase mt-4">Register</button>
                  <hr class="my-4">
                  <div class="text-center">
                    <a href="#" class="btn btn-outline-danger btn-block"><i class="fab fa-google mr-2"></i> Register with Google</a>
                    <a href="#" class="btn btn-outline-primary btn-block"><i class="fab fa-facebook-f mr-2"></i> Register with Facebook</a>
                  </div>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="forgot-password.php">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="login.php">Already have an account? Login!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
     
<?php
    
include_once "includes/footer.php";
    
?>

  </div>

  <!-- JavaScript files -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/front.js"></script>
</body>

</html>