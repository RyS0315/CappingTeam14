<?php 
    include 'config/dbconfig.php';
    include 'config/functions.php';
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
    $title = "P.R.A.Y.";

    $header = new Header($db, $menus,$title,$css);
    $header->ShowUserMenu($id);
    $header->displayHeader();
?>
    <img src='images/Users/<?php echo $id?>/Banner/<?php echo $id?>.jpg' width='100%'></img>

    <section class='index-body'>
        <img class='profile-profile-pic' src='images/Users/<?php echo $id?>/Profile/<?php echo $id?>.jpg'>
    </section>
<?php 
    $footer = new Footer($db,$src);
    $footer->buildFooter();
?> 

