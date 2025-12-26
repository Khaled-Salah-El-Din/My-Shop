<?php

include "includes/sessionstart.php";
include "fun/Database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Messages</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
     <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/lightbox2/css/lightbox.min.css">
    <link rel="stylesheet" href="../vendor/bootstrap-select/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../vendor/owl.carousel2/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../vendor/owl.carousel2/assets/owl.theme.default.css">
    <style>
        table td,
        table th {
            vertical-align: middle !important;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

<?php
                
    include_once "includes/sidebar.php";

?>

<!-- Modal -->

<div class="modal fade" id="msgmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="msgtext" class="modal-body">Message content</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Dismiss</button>
                </div>
            </div>
        </div>
    </div>
      
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

<?php

include_once "includes/header.php";

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Messages</h1>
                    </div>

<table class="table table-hover table-bordered text-center align-middle">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">phone</th>
            <th scope="col">message</th>
            <th scope="col">status</th>
            <th scope="col">controls</th>
        </tr>
    </thead>
    <tbody>

<?php

$contactmsgs = new Database("contactmsgs");
$msgs = $contactmsgs->query("SELECT id, name, email, phone, status FROM contactmsgs");

foreach ($msgs as $msg) {

?>

    <tr>
        <th scope="row"><?= $msg['id'] ?></th>
        <td><?= $msg['name'] ?></td>
        <td><?= $msg['email'] ?></td>
        <td><?= $msg['phone'] ?></td>
        <td><li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark showbtns" href="#msgmodal" data-toggle="modal">Show message</a></li></td>

<?php

if ($msg['status']) {
    echo '<td class="status-cell bg-success"><b>read ✅</b></td>'; 
} else {
    echo '<td class="status-cell bg-warning"><b>unread ❌</b></td>'; 
}

?>
          
        <td><a href="fun/delete_msg.php?id=<?= $msg['id'] ?>"><button class="btn btn-danger">Delete</button></a></td>
    </tr>

<?php

}

?>
    </tbody>
</table>         

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php

require_once "includes/Footer&LogoutModal.php";

?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/bootstrap-select/js/bootstrap-select.min.js"></script> 

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="../vendor/lightbox2/js/lightbox.min.js"></script> 
    <script src="js/front.js"></script> 
    <script src="../vendor/owl.carousel2/owl.carousel.min.js"></script>
    <script src="../vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
    <script>
        $(".showbtns").click(function() {  
            let statusCell = $(this).closest('tr').find('.status-cell');
            
            $.post('fun/do_show_msg.php', {
                msg_id : $(this).closest('tr').find('th').text()

            }, function(data) {
                $("#msgtext").text(data.msg);
                $(".modal-title").text('Message of ' + data.name);
                $("#unreadMsgs").text(data.unreadMsgs);
                statusCell.replaceWith('<td class="status-cell bg-success"><b>read ✅</b></td>');
            }, "json");
        });
    </script>


</body>

</html>