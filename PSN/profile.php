<?php 
    include 'config/dbconfig.php';
    include 'config/permissions.php';
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
            'active'=>'active'
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

    $header = new Header($db, $menus,$title,$css);
    $header->ShowUserMenu($id);
    $header->displayHeader();
?>
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
    <img src='images/Users/<?php echo $id?>/Banner/<?php echo $id?>.jpg' width='100%'></img>

    <section class='profile-body'>
        <img class='profile-profile-pic' src='images/Users/<?php echo $id?>/Profile/<?php echo $id?>.jpg'>
    </section>
<?php 
    $footer = new Footer($db,$src);
    $footer->buildFooter();
?> 

