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
            'active'=>''
        ],
        [
            'name'=>'Email',
            'link'=>'settings-email.php',
            'active'=>''
        ],
        [
            'name'=>'Blocked Accounts',
            'link'=>'settings-blocked.php',
            'active'=>''
        ],
        [
            'name'=>'Themes',
            'link'=>'settings-themes.php',
            'active'=>''
        ],
        [
            'name'=>'Religions',
            'link'=>'settings-religions.php',
            'active'=>'current'
        ]
    ];
    $usersettings = new UserSettings($db,$settings,$id);

    $allreligionsquery = "SELECT * 
                          FROM RELIGIONS
                          WHERE relid <> 1";
    $religions = $db->FetchQuery($allreligionsquery);
    ?>

<section class='index-body'>

    <?php $usersettings->displaySettings();?>

    <div class='settings-religions-body'>
    <form method='post' action='php/addReligion.php'>
        <?php
            foreach($religions as $i){?>
                <div class='religion-box'>
                    <button type='submit' value='<?php echo $i['relid'] ?>'><?php echo $i['religion_name'] ?></button>
                </div>
                <?php
            }?>
            </form>
    </div>

<section>

<?php 
    $footer = new Footer($db,$src);
    $footer->buildFooter();
?>