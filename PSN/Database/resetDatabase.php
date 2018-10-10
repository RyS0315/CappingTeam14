<?php
    include '../config/dbconfig.php';
    include '../config/permissions.php';


    if($id != 1){
        header('location:../index.php');
    }
    $file = "../sqlchanges.sql";
    $result = $db->runScriptFile($file);

    if($result = true){
        echo "Update Successful";
    }


    header('location:databasePage.php');
?>