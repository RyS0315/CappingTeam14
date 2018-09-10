<?php 
    include 'config/dbconfig.php';
    include 'config/permissions.php';
    include 'config/functions.php';
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
                <li class='header-link active'>
                    <a href='index.php'>Home</a>
                </li>
                <li class='header-link'>
                    <a href='profile.php'> Profile </a>
                </li>
                <li class='header-link'>
                    <a href='notifications.php'> Notifications </a>
                </li>
                <li class='header-link'>
                    <a href='messages.php'> Messages </a>
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
        <div class='index-left-box'>
            <div class='index-left-trends'>
                Trends
            </div>
        </div>

        <div class='index-center-box'>
            News Feed</br>
            <strong> SEE TWITTER LAYOUT </strong>
        </div>

        <div class='index-right-box'>
            People Near you
        </div>
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