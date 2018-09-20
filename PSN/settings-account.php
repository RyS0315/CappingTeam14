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
            'link'=>'settings-account.php',
            'active'=>'current'
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
            'active'=>''
        ]
    ];
    $usersettings = new UserSettings($db,$settings,$id);
    ?>

<section class='index-body'>

    <?php $usersettings->displaySettings();?>

    <div class='account-settings-box'>
        <h1>Account Settings</h1>
        <form method='post' action=''>
            <p>Username <input type='text' name='username' value='<?php echo $username ?>'></p>
            <p>Bio <input type='textarea' name='bio' value=''></p>
        </form>

        <h1>Update Profile Picture</h1>
        <form method='POST' action='' enctype="multipart/form-data">
            <input type='file' name='profile' id='profile' class='inputfile'>
            <label for="profile">Choose a file</label>
        </form>

        <h1>Update Banner Picture</h1>
        <form method='POST' action='' enctype="multipart/form-data">
            <input type='file' name='banner' id='banner' class='inputfile'>
            <label for="banner">Choose a file</label>
        </form>
    </div>

<section>

<?php 
    $footer = new Footer($db,$src);
    $footer->buildFooter();
?>