<?php

require_once "Database.php";

$msg_id = $_POST["msg_id"];

$contactmsgs = new Database("contactmsgs");

// fetches the button's message and client's name from the database
$msg = $contactmsgs->query("SELECT name, msg FROM contactmsgs WHERE id = :id", ["id"=>$msg_id])[0];

// updates message status in the database to read
$contactmsgs->update(["status"=>1], "id", $msg_id);

// counts number of unread messages for display in the dashboard header
$unread_msgs = $contactmsgs->countWhere("status", 0);

$response = [
    'msg' => $msg['msg'],
    'name' => $msg['name'],
    'unreadMsgs' => $unread_msgs
];

echo json_encode($response);