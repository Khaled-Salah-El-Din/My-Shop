<?php

require_once "Database.php";

$id = $_GET["id"];

$contactmsgs = new Database("contactmsgs");
$contactmsgs->delete("id", $id);

header("location:../messages.php");
exit;