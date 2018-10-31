<?php
include '../config/dbconfig.php';
include '../config/functions.php';
include getRoot().'Classes/imageUploader.php';
include getRoot().'config/permissions.php';

print_ary($_POST);
print_ary($_FILES);

$curUserInfoquery = "SELECT * FROM USERS WHERE userid = $id";
$curUserInfo = $db->fetchQuery($curUserInfoquery);

$username = isset($_POST['username']) ? $_POST['username'] : $curUserInfo[0]['username'];
echo $username; 

$bio = isset($_POST['bio']) ? $_POST['bio'] : $curUserInfo[0]['bio'];
echo $bio;

//upload profile image
if ($_FILES['profile']['size'] != 0 && $_FILES['profile']['error'] == 0){
    $pPic = $_FILES['profile'];
    $profileupload = new fileUploader($db,'Profile',$id);
    $profileupload->uploadFile($pPic);
}

//upload banner image
if ($_FILES['banner']['size'] != 0 && $_FILES['banner']['error'] == 0){
    $bPic = $_FILES['banner'];
    $bannerupload = new fileUploader($db,'Banner',$id);
    $bannerupload->uploadFile($bPic);
}

//update user table
$query = "UPDATE USERS set username = '$username' , bio = '$bio' WHERE userid = $id";
$result = $db->UpdateQuery($query);
echo $result;

//return to settings-account.php
header('location:'.getRoot().'settings-account.php');

?>