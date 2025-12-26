<?php

require_once "Database.php";

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$genderId = $_POST['gender'];
$prId = $_POST['pr'];

$users = new Database("users");
$newId = $users->insert(
    ["username"=>$username,
           "password"=>$password, 
           "email"=>$email, 
           "gender"=>$genderId,
           "pr"=>$prId]
);

$genders = new Database("gender");
$gender = $genders->query("SELECT name FROM gender WHERE id = :id", ["id"=>$genderId])[0];
$gender = $gender['name'];

$prs = new Database("pr");
$pr = $prs->query("SELECT name FROM pr WHERE id = :id", ["id"=>$prId])[0];
$pr = $pr['name'];

$response = [
    'id' => $newId,
    'gender' => $gender,
    'pr' => $pr
];

echo json_encode($response);