<?php
    require '../config/ApplicationTop.php';

    $prayid = cleanVar($_POST['prayid']);
    // $type = $_POST['type'];

    $checkquery = "SELECT *
                   FROM LIKES 
                   WHERE prayid = '$prayid' 
                   AND userid = '$id'";
    $check = $db->fetchQuery($checkquery);
    if($check){
        if($check[0]['isLike'] == 1){
            $query = "UPDATE LIKES
                  SET isLIke = 0
                  WHERE userid = '$id'
                  AND prayid = '$prayid'";
            $result = $db->UpdateQuery($query);
        } else{
            $query = "DELETE FROM LIKES
                      WHERE userid = '$id'
                      AND prayid = '$prayid'";
            $result = $db->DeleteQuery($query);
        }
    }else{
        $query = "INSERT into LIKES(userid, prayid, isLike) VALUES
             ('$id', '$prayid', 0)";
        $result = $db->InsertQuery($query);
    }

?>