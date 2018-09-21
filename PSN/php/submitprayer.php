<?php 
    $content = isset($_POST['newprayer']) ? $_POST['newprayer'] : '';
    $prayerquery = "INSERT into PRAYER(userid, content) 
                    VALUES ($id , '$content')";
    $prayid = $db->InsertQuery($prayerquery);

    $prayerrelquery = "INSERT into Prayer_Religion(prayid, relid)
                       Values ($prayid, 1)";
    $prayerrelresult = $db->Insertquery($prayerrelquery);


?>