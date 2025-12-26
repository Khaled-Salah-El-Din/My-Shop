<?php

include "../admin/fun/Database.php";

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$msg = $_POST["msg"];

$contactmsgs = new Database("contactmsgs");
$contactmsgs->insert(
    ["name"=>$name,"email"=>$email, "phone"=>$phone, "msg"=>$msg]
);

echo "Your message has been successfully sent!";