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

    $myreligionsquery = "SELECT r.religion_name, r.relid
                         FROM USER_RELIGIONS ur, Religions r
                         WHERE ur.userid = '$id'
                         AND ur.relid = r.relid";
    $myreligions = $db->fetchQuery($myreligionsquery);



    $allreligionsquery = "SELECT r.religion_name, r.relid
                          FROM RELIGIONS r LEFT JOIN User_religions ur ON ur.relid = r.relid
                          WHERE r.relid <> 1
                          AND r.relid NOT IN (SELECT r.relid
                                          FROM Religions r, user_religions ur
                                          WHERE r.relid = ur.relid
                                          AND ur.userid = '$id')";
    $religions = $db->FetchQuery($allreligionsquery);


    ?>

<section class='index-body'>

    <?php $usersettings->displaySettings();?>

    <div class='settings-religions-body'>
    <form method='post' action='php/addReligion.php'>
        <?php
         print_ary($myreligions); print_ary($religions);
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
