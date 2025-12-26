<?php

include "../admin/fun/Database.php";

$id = $_POST['id'];
$quantity = ((int) $_POST['quantity']) + 1;

$carts = new Database("cart");
$carts->update(["quantity"=>$quantity], "id", $id);

echo $quantity;