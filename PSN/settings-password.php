<?php 
    require 'config/ApplicationTop.php';
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
    $title = "P.R.A.Y.";
    $header = new Header($db, $menus, $title, $css);
    $header->ShowUserMenu($id);
    $header->displayHeader();

    $settings = [
        [
            'name'=> 'Account',
            'link'=>'settings-account.php',
            'active'=>''
        ],
        [
            'name'=>'Password',
            'link'=>'settings-password.php',
            'active'=>'current'
        ],
        [
            'name'=>'Themes',
            'link'=>'settings-themes.php',
            'active'=>''
        ],
        [
            'name'=>'Religions',
            'link'=>'settings-religions.php',
            'active'=>''
        ]
    ];
    $usersettings = new UserSettings($db,$settings,$id);
    ?>

<section class='index-body' id='body'>

    <?php $usersettings->displaySettings();?>

<section>

<?php 
    $footer = new Footer($db,$src);
    $footer->buildFooter();
?>