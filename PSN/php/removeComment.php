<?php
    include '../config/dbconfig.php';
    include '../config/permissions.php';
    include '../config/functions.php';

    $commid = isset($_POST['delete']) ? $_POST['delete'] : '';

    $removequery = "DELETE FROM Comments WHERE commid = '$commid'";
    $result = $db->DeleteQuery($removequery);

    header('Location:../index.php');
?>