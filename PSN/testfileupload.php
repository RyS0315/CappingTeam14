<?php 
/**
 * This is a temporary page solely to check to functionality
 * of the fileUploaderClass.
 * 
 */
include 'config/dbconfig.php';
include 'config/permissions.php';
include 'config/functions.php';
include 'Classes/ImageUploader.php';

print_ary($_FILES);
// print_ary($_POST);

$upload = isset($_FILES['upload']) ? $_FILES['upload'] : '';
$uploadtype = 'Banner';

if($upload != ''){
    $uploader = new fileUploader($db,$uploadtype,$id);
    $uploader->uploadFile($upload);
    header('location:testfileupload.php');
}

?>


<html>
<body>
<form method='POST' action='' enctype="multipart/form-data">
    <input type='file' name='upload'>
    <button type='submit' name='submit'>Upload</button>
</form>
</body>
</html>