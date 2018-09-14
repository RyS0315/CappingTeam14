<?php 
    include 'config/dbconfig.php';
    include 'config/permissions.php';
    include 'config/functions.php';
    include 'Classes/createheader.php';
    include 'Classes/createFooter.php';
    include 'Classes/createUserSettings.php';

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
    $src[] = ["src"=>"js/jqueryinit.php","type"=>"php"];
    $css[] = ["src"=>"css/core.php","type"=>"css"];
    $title = "P.R.A.Y";
    $header = new Header($db, $menus, $title, $css);
    $header->ShowUserMenu($id);
    $header->displayHeader();

    $settings = [
        [
            'name'=> 'Account',
            'link'=>'index.php',
            'active'=>''
        ],
        [
            'name'=>'Password',
            'link'=>'profile.php',
            'active'=>''
        ],
        [
            'name'=>'Email',
            'link'=>'notifications.php',
            'active'=>''
        ],
        [
            'name'=>'Blocked Accounts',
            'link'=>'messages.php',
            'active'=>''
        ],
        [
            'name'=>'Religions',
            'link'=>'messages.php',
            'active'=>''
        ]
    ];
    $usersettings = new UserSettings($db,$settings,$id);
    ?>

<section class='index-body'>

    <?php $usersettings->displaySettings();?>
<section>



<?php 
    $footer = new Footer($db,$src);
    $footer->buildFooter();
?>