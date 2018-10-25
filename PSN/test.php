<?php
$t = new DateTime('2018-10-24 20:55:00', new DateTimeZone('America/New_York'));
function formatDate($date){
    $currentDate = new DateTime(null, new DateTimeZone('America/New_York'));
    $currentTime = $currentDate->format('Y-m-d H:i:s');
    $formattedDate;
    $month;
    switch (substr($date,5,2)) {
        case "01":
            $month = "January";
            break;
        case "02":
            $month = "February";
            break;
        case "03":
            $month = "March";
            break;
        case "04":
            $month = "April";
            break;
        case "05":
            $month = "May";
            break;
        case "06":
            $month = "June";
            break;
        case "07":
            $month = "July";
            break;
        case "08":
            $month = "August";
            break;
        case "09":
            $month = "September";
            break;
        case "10":
            $month = "October";
            break;
        case "11":
            $month = "November";
            break;
        case "12":
            $month = "December";
            break;
    }
    if (substr($currentTime,0,4) == substr($date,0,4)) {
        if (substr($currentTime,5,2) == substr($date,5,2)) {
            if (substr($currentTime,8,2) == substr($date,8,2)) {
                if (substr($currentTime,11,2) == substr($date,11,2)) {
                    if (substr($currentTime,14,2) == substr($date,14,2)) {
                        $formattedDate = intval(substr($currentTime,17,2)) - intval(substr($date,17,2))." seconds ago";
                        return $formattedDate;
                    }
                    else {
                        $formattedDate = intval(substr($currentTime,14,2)) - intval(substr($date,14,2))." minutes ago";
                        return $formattedDate;
                    }
                }
                else {
                    $formattedDate = intval(substr($currentTime,11,2)) - intval(substr($date,11,2))." hours ago";
                    return $formattedDate;
                }
            }
        }
    }
    $formattedDate = $month." ".substr($date,8,2).", ".substr($date,0,4)." ".substr($date,11,2).":".substr($date,14,2).":".substr($date,17,2);
    return $formattedDate;
}
$newDate = $t->format('Y-m-d H:i:s');
$result = formatDate($newDate);
echo $result
?>
<html>
<head>
</head>
<body>
</body>
</html>
