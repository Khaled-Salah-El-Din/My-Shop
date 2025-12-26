<?php

session_start();

$user_id = $_SESSION["login"];

require_once "../admin/fun/Database.php";

$carts = new Database("cart");
$carts->delete("user_id", $user_id);

header("location:../cart.php");
exit;