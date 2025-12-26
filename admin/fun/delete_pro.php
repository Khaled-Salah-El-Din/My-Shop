<?php

require_once "Database.php";

$id = $_GET["id"];

$products = new Database("products");
$products->delete("id", $id);

header("location:../products.php");
exit;