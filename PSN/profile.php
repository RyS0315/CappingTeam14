<?php 
    include 'config/dbconfig.php';
    include 'config/permissions.php';
?>

<html>
    <head>
        <title>PSN</title>
    </head>
    <link rel='stylesheet' type='text/css' href='css/core.php'>
<body>
    <section class='main-header'>
        <div class='main-header-box'>
            <ul>
                <li class='login-header-link'>
                    <a href='index.php'>Home</a>
                </li>
                <li class='login-header-link active'>
                    <a href='profile.php'> Profile </a>
                </li>
                <li class='login-header-link'>
                    <a href='notifications.php'> Notifications </a>
                </li>
                <li class='login-header-link'>
                    <a href='messages.php'> Messages </a>
                </li>
                <li class='login-header-link'>
                    <a href='signOut.php'> Log Out </a>
                </li>
            </ul>
        </div>
    </section>
    <img src='images/Users/<?php echo $id?>/Banner/<?php echo $id?>.jpg' width='100%'></img>

    <section class='profile-body'>
        <img class='profile-profile-pic' src='images/Users/<?php echo $id?>/Profile/<?php echo $id?>.jpg'>
    </section>
</body>

