<?php 

  require_once "admin/fun/Database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Contact | My Shop</title>
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
<?php 

include_once "includes/header.php";

?>

    <div class="page-holder d-flex align-items-center py-5 bg-light">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-6 px-lg-4">
          <div class="card shadow-sm border-0">
            <div class="card-body p-5">
              <h3 class="mb-4 text-center text-uppercase">Contact Us</h3>
              <h6 class="mb-4 text-center">Use this form to send us any questions, feedback or requests you have, or just to say hi!</h6>

              <form>
                <div class="form-group mb-3">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" required placeholder="Enter your name" />
                </div>

                <div class="form-group mb-4">
                  <label for="email">E-mail</label>
                  <input type="text" class="form-control" name="email" id="email" required placeholder="Enter your e-mail address" />
                </div>

                <div class="form-group mb-4">
                  <label for="phone">Phone Number</label>
                  <input type="text" class="form-control" name="phone" id="phone" required placeholder="Enter your phone number" />
                </div>

                <div class="form-group mb-4">
                  <label for="msg">Write down your message here</label>
                  <textarea class="form-control" name="msg" id="msg" required placeholder="Enter your message to us"></textarea>
                </div>

                <button type="submit" class="btn btn-dark btn-block mb-3">Send</button>
              </form>      
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- Footer -->
     
<?php
    
include_once "includes/footer.php";
    
?>

  <!-- JS -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
        $("form").submit(function(ev) {
            ev.preventDefault();

            $.post('fun/do_add_to_contactmsgs.php', {
                name : $("#name").val(),
                email : $("#email").val(),
                phone : $("#phone").val(),
                msg : $("#msg").val()
                
            }, function(data) {
                $("form").after(`<h1 id="temp-msg">${data}</h1>`);

                $("#name, #email, #phone, #msg").val('');

                setTimeout(function() { // fades out the message 5 seconds after it's first displayed and removes the element from the DOM
                  $("#temp-msg").fadeOut(1000, function() {
                    $(this).remove();
                  });
                }, 5000);
            });
        })
  </script>
</body>

</html>