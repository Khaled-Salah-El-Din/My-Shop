<?php

session_start();
require_once "../admin/fun/Database.php";

if ( !isset($_SESSION['login']) ) { // customer isn't logged in
    $_SESSION['return_to'] = "do_add_to_cart";
    $_SESSION['pro_id'] = $_GET["pro_id"];
    header("location:../login.php");
    exit;
}
 
if ( isset($_GET["pro_id"]) ) { // customer was already logged in
    $pro_id = $_GET["pro_id"];

} else { // customer has been redirected here after logging in successfully
    $pro_id = $_SESSION['pro_id'];
    unset($_SESSION['pro_id']);
}

$user_id = $_SESSION["login"];

$carts = new Database("cart");

$cart_item = $carts->query("SELECT * FROM cart WHERE user_id = :user_id AND pro_id = :pro_id", ["user_id"=>$user_id, "pro_id"=>$pro_id]);

if ($cart_item) { // product is already in cart
    $q = $cart_item[0]['quantity'] + 1;
    $id = $cart_item[0]['id'];

    $carts->update(["quantity"=>$q], "id", $id);

} else { // adding product to cart database
    $carts->insert(["user_id"=>$user_id, "pro_id"=>$pro_id, "quantity"=>1]);

}

header("location:../cart.php");
exit;