<?php

$id = $_GET["id"];

require_once "../admin/fun/Database.php";

$carts = new Database("cart");
$carts->delete("id", $id);

header("location:../cart.php");
exit;