<?php

require_once "Database.php";

$id = $_GET["id"];

$users = new Database("users");
$users->delete("id", $id);

header("location:../users.php");
exit;