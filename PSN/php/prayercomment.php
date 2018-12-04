<?php
require '../config/ApplicationTop.php';
include '../Classes/prayerCommenter.php';

print_ary($_POST);

$prayid = isset($_POST['prayid']) ? $_POST['prayid'] : '';
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';

if($prayid){
    $commenter = new prayerCommenter($db, $id);
    $result = $commenter->createComment($prayid, $comment);
    echo $result;
}

header('Location:../index.php');
?>