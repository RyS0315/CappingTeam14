<?php
    require '../config/ApplicationTop.php';

    $userquery = "SELECT u.userid
                  FROM Users u";
    $users = $db->FetchQuery($userquery);

    $curdirs = glob("../images/Users/*" , GLOB_ONLYDIR);

    foreach($users as $i){
        $new = true;
        foreach($curdirs as $j){
            if(!$new){
                continue;
            }
            if($j == $i['userid']){
                $new = false;
                continue;
            }
            if($new){
                mkdir(getRoot()."images/Users/".$id['userid'] );
                mkdir(getRoot()."images/Users/".$id['userid']."/Profile" );
                mkdir(getRoot()."images/Users/".$id['userid']."/Banner" );
                mkdir(getRoot()."images/Users/".$id['userid']."/Uploads" );
                copy(getRoot()."images/icons/defaultProfile.jpg" , getRoot()."images/Users/".$id['userid']."/Profile/".$id['pPicture']);
                copy(getRoot()."images/icons/defaultBanner.png" , getRoot()."images/Users/".$id['userid']."/Banner/".$id['bPicture']);
            }
        }
    }
?>