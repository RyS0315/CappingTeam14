<?php
    include 'dbconfig.php';
    include 'functions.php';
    include getRoot().'config/permissions.php';
    include getRoot().'Classes/createheader.php';
    include getRoot().'Classes/createFooter.php';
    include getRoot().'php/onloadscripts.php';

    $src[] = ["src"=>"js/userMenu.js", "type"=>"js"];
    $src[] = ["src"=>"js/removePrayer.js", "type"=>"js"];
    $src[] = ["src"=>"js/jqueryinit.php","type"=>"php"];
    $src[] = ["src"=>"js/autoGrow.js","type"=>"js"];
    $src[] = ["src"=>"js/filterRel.js","type"=>"js"];
    $src[] = ["src"=>"http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js","type"=>"js"];
    $src[] = ["src"=>"js/composePrayer.js","type"=>"js"];
    $src[] = ["src"=>"js/searchUsers.js","type"=>"js"];
    $src[] = ["src"=>"js/LikeDislike.js","type"=>"js"];
    $src[] = ["src"=>"js/mobileHeader.js", "type"=>"js"];
    $src[] = ["src"=>"js/mobileMessages.js", "type"=>"js"];

    $css[] = ["src"=>"css/core.php","type"=>"css"];

    $title = "P.R.A.Y.";
?>
