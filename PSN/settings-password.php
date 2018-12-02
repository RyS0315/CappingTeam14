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
            'name'=>'Religions',
            'link'=>'settings-religions.php',
            'active'=>''
        ]
    ];
    $usersettings = new UserSettings($db,$settings,$id);
    ?>

<section class='index-body' id='body'>

    <?php $usersettings->displaySettings();?>
    <div class='account-settings-box'>
    <h1>Update Your Password</h1>
    <form method='post' action='php/updatePassword.php'>
    <h3>Old Password</h3>
    <input class='password-change' id='oldpassword' type='text' name='oldpass' placeholder='Enter Your Old Password'>
    <h3>New Password</h3>
    <input class='password-change' id='newpassword' type='text' name='newpass' placeholder='Enter Your New Password'>
    <h3>Verify New Password</h3>
    <input class='password-change' id='newpassword' type='text' name='newpass' placeholder='Verify Your New Password'>
    <button type='submit' name='change-password'>Update</button>
    </form>
    </div>

<section>

<?php 
    $footer = new Footer($db,$src);
    $footer->buildFooter();
?>