<?php 
    include 'config/dbconfig.php';
    include 'config/permissions.php';

    $relarray = [
        [
            'religion'=>'Christianity', 
            'followers'=>'123223'
        ],
        [
            'religion'=>'Islam', 
            'followers'=>'31412'
        ],
        [
            'religion'=>'Judaism', 
            'followers'=>'23123'
        ],
        [
            'religion'=>'Buddhism', 
            'followers'=>'9828'
        ]
    ]

?>
<html>
    <head>
        <title>PSN</title>
    </head>
    <link rel='stylesheet' type='text/css' href='css/core.php'>
<body>
    <section class='header'>
        <div class='header-box'>
            <ul>
                <li class='header-link'>
                    <a href='index.php'>Home</a>
                </li>
                <li class='header-link'>
                    <a href='profile.php'>Profile</a>
                </li>
                <li class='header-link'>
                    <a href='notifications.php'>Notifications</a>
                </li>
                <li class='header-link'>
                    <a href='messages.php'>Messages</a>
                </li>
            </ul>
            <ul class='header-profile-pic'>
                <li id='header-profile-pic-link' onclick='ShowMenu()'>
                    <img class='index-profile-pic' src='images/Users/<?php echo $id?>/Profile/<?php echo $id?>.jpg'>
                </li>
            </ul>
        </div>
    </section>
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

    <section class='index-body'>
        <div style='width:100%'>
        <h2> Add a Religion </h2>
        <div class='religions-body' style='display:flex; width:100%; flex-wrap:wrap'><?php
            foreach($relarray as $i){?>
                <div class='religion-box' style='min-width:33%'>
                    <p>Religion:<?php echo $i['religion']?></p>
                    <p>Followers:<?php echo $i['followers']?></p>
                </div><?php
            }?>
        <div>
        
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
    }

    function CloseMenu(){
        var menu = document.getElementById('header-profile-menu');
        var button = document.getElementById('header-profile-pic-link');
        button.removeAttribute('onclick');
        $(menu).fadeOut();
        button.setAttribute('onclick','ShowMenu()');
    }
</script> 