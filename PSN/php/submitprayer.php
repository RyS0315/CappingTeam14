<?php 
    include 'Classes/imageUploader.php';
    $content = isset($_POST['newprayer']) ? $_POST['newprayer'] : '';
    $img = isset($_FILES['upload'])?$_FILES['upload'] : '' ;
    if($img != ''){
        $uploadtype = 'Uploads';
        $uploader = new fileUploader($db,$uploadtype,$id);
        $imgname = $uploader->uploadFile($img);
    }
    $prayerquery = "INSERT into PRAYER(userid, content, img) 
                    VALUES ($id , '$content', '$imgname')";
    $prayid = $db->InsertQuery($prayerquery);

    $prayerrelquery = "INSERT into Prayer_Religion(prayid, relid)
                       Values ($prayid, 1)";
    $prayerrelresult = $db->Insertquery($prayerrelquery);
    

    header('location:index.php');


?>