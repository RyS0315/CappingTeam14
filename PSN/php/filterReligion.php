<?php
include '../config/dbconfig.php';
include '../config/permissions.php';
include '../config/functions.php';

$newrelid = isset($_POST['religion']) ? $_POST['religion'] : '';

if($newrelid != ''){
    $_SESSION['currel'] = $newrelid;
}

header('location:../index.php');
?>
