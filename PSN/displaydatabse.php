<?php
    include 'config/dbconfig.php';
    include 'config/permissions.php';
    include 'config/functions.php';
    include 'Classes/createheader.php';
    include 'Classes/createFooter.php';
    $menus = [
        [
            'name'=>'Home',
            'link'=>'index.php',
            'active'=>''
        ],
        [
            'name'=>'Profile',
            'link'=>'profile.php',
            'active'=>''
        ],
        [
            'name'=>'Notifications',
            'link'=>'notifications.php',
            'active'=>''
        ],
        [
            'name'=>'Messages',
            'link'=>'messages.php',
            'active'=>''
        ]
    ];

    $src[] = ["src"=>"js/userMenu.js", "type"=>"js"];
    $src[] = ["src"=>"js/removePrayer.js", "type"=>"js"];
    $src[] = ["src"=>"js/jqueryinit.php","type"=>"php"];
    $src[] = ["src"=>"js/autoGrow.js","type"=>"js"];
    $src[] = ["src"=>"js/filterRel.js","type"=>"js"];
    $src[] = ["src"=>"http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js","type"=>"js"];
    $src[] = ["src"=>"js/composePrayer.js","type"=>"js"];
    $css[] = ["src"=>"css/core.php","type"=>"css"];
    $title = "P.R.A.Y.";
    $header = new Header($db, $menus, $title, $css);
    $header->ShowUserMenu($id);
    $header->displayHeader();

    if($id != 1){
        header('location:../index.php');
    }

    $tablesquery = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_TYPE='BASE TABLE'";
    $tables = $db->fetchQuery($tablesquery);
    print_ary($tables);

?>




 <?php
    $footer = new Footer($db,$src);
    $footer->buildFooter();
?>