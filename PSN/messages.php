<?php 
    include 'config/dbconfig.php';
    include 'config/permissions.php';
    include 'Classes/createheader.php';

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
            'active'=>'active'
        ]
    ];

    $header = new Header($db, $menus);
    $header->ShowUserMenu($id);
    $header->displayHeader();
?>
<html>
    <head>
        <title>PSN</title>
    </head>
    <link rel='stylesheet' type='text/css' href='css/core.php'>
<body>
    <div id='header-profile-menu' class='hidden'>
        <ul id='header-profile-menu-list'>
            <li>
                <a href='profile.php'><?php echo $firstname.' '.$lastname .'@'.$username?> </a>
            </li>
            <li>
                <a href='settings.php'> Settings </a>
            </li>
            <li>
                <a href='signOut.php'> Log Out </a>
            </li>
        </ul>
    </div>

    <section class='profile-body'>

    </section>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    function ShowMenu(){
        var menu = document.getElementById('header-profile-menu');
        var button = document.getElementById('header-profile-pic-link');
        button.removeAttribute('onclick');
        $(menu).fadeIn();
        button.setAttribute('onclick','CloseMenu()');
        // menu.classList.remove('hidden');
    }

    function CloseMenu(){
        var menu = document.getElementById('header-profile-menu');
        var button = document.getElementById('header-profile-pic-link');
        button.removeAttribute('onclick');
        $(menu).fadeOut();
        button.setAttribute('onclick','ShowMenu()');
    }
</script> 