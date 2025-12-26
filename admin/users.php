<?php

require_once "includes/sessionstart.php";
require_once "fun/Database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Users</title>
    <link rel="shortcut icon" href="img/favicon.png">
    
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
                
            require_once "includes/sidebar.php";

        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                
                require_once "includes/header.php";

                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Users</h1>
        
<?php

if ( !isset($_GET["action"]) ) {
    include "design/all_users.php";
} elseif ( $_GET["action"] === "edit") {
    include "design/edit_user.php";
}

?>                         

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php

            include "includes/Footer&LogoutModal.php";

            ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
    <script>
       $("form").submit(function(ev) {
            ev.preventDefault();

            let username = $("#username").val();
            let password = $("#password").val();
            let email = $("#email").val();
            let gender = $("#gender").val();
            let pr = $("#pr").val();
            
            $.post('fun/do_add_user.php', {
                username : username,
                password : password,
                email : email,
                gender : gender,
                pr : pr
                
            }, function(data) {
                $("tbody").append(
                   `<tr>
                    <th scope="row">${data.id}</th>
                    <td>${username}</td>
                    <td>${password}</td>
                    <td>${email}</td>
                    <td>${data.gender}</td>
                    <td>${data.pr}</td>
                    <td><a href="?action=edit&id=${data.id}"><button class="btn btn-primary">Edit</button></a>
                    <a href="fun/delete_user.php?id=${data.id}"><button class="btn btn-danger">Delete</button></a></td>
                    </tr>`
                );

                $('#addModal').modal('hide');
                $("#username, #password, #email, #gender, #pr").val('');
                $("#gender").val(1);
                $("#pr").val(1);
            }, 'json');
       });   
    </script>
</body>

</html>