<?php
include '../config/dbconfig.php';
include '../config/permissions.php';
include '../config/functions.php';


print_ary($_POST);

$recid = isset($_POST['id']) ? $_POST['id'] : '';
$msg = isset($_POST['msg']) ? $_POST['msg'] : '';

function sendMessage($recid, $msg, $id, $db){
    checkMessage($msg);//make sure message is safe
    $msgid = createMessage($msg,$id,$db);//create message in messages table
    linkMessage($recid,$msgid,$db);//send created message to the user in User_Messages table
    header('location:../messages.php');
}

function checkMessage($msg){
    return true;
}

function createMessage($msg, $id,$db){
    $query = "INSERT INTO Messages(userid, msg)VALUES('$id','$msg')";
    $result = $db->InsertQuery($query);
    return $result;
}

function linkMessage($recid,$msgid,$db){
    $query = "INSERT INTO USER_MESSAGES(userid, messageid)VALUES('$recid','$msgid')";
    $result = $db->InsertQuery($query);
}

sendMessage($recid, $msg, $id, $db);

?>