<?php

require_once "Database.php";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$pr = $_POST['pr'];
$id = $_GET['id'];

$users = new Database("users");

$users->update(["username"=>$username,
                      "password"=>$password,
                      "email"=>$email,
                      "gender"=>$gender,
                      "pr"=>$pr],
                      "id", $id);

header("location:../users.php");
exit;