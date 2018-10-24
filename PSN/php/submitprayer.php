<?php 
    include '../Classes/imageUploader.php';
    include '../config/dbconfig.php';
    include '../config/permissions.php';
    include '../config/functions.php';

    $relid = isset($_POST['religion']) ? $_POST['religion'] : '';
    $content = isset($_POST['newprayer']) ? $_POST['newprayer'] : '';
    $img = isset($_FILES['upload']) ? $_FILES['upload'] : '' ;

    // print_ary($_FILES);
    // print_ary($_POST);

    if($img['error'] != 4){
        $uploadtype = 'Uploads';
        $uploader = new fileUploader($db,$uploadtype,$id);
        $imgname = $uploader->uploadFile($img);
        if($imgname['error']){
            $error = $imgname['str'];
        }else{
            $name = $imgname['str'];
            $prayerquery = "INSERT into PRAYERS(userid, content, img) 
                        VALUES ($id , '$content', '$name')";
            $prayid = $db->InsertQuery($prayerquery);
            addprayerReligion($prayid, $relid, $db);
            
            header('location:../index.php');
        }
    }else{
        $prayerquery = "INSERT into PRAYERS(userid, content, img) 
                        VALUES ($id , '$content', null)";
        $prayid = $db->InsertQuery($prayerquery);

        addprayerReligion($prayid, $relid, $db);

        header('location:../index.php');
    }

    function addprayerReligion($prayid, $relid,$db){
        $prayerrelquery = "INSERT into Prayer_Religions(prayid, relid)
                            Values ($prayid, $relid)";
        $prayerrelresult = $db->Insertquery($prayerrelquery);
    }

?>