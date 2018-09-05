<?php 
    include 'config/dbconfig.php';
    include 'config/permissions.php';
    include 'config/functions.php';
    // $testary = ['1'=>'sdfsf', '2'=>'sadsada','3'=>['3a'=>'dasda','3b'=>'sadasda','3c'=>['3ca'=>'sadasda']]];
    // print_ary($testary);
    
?>

<html>
    <head>
        <title>PSN</title>
    </head>
<link rel='stylesheet' href='css/core.css'>
<body>
    <section class='main-header'>
        <div class='main-header-box'>
            <ul>
                <li class='login-header-link active'>
                    <a href='index.php'>Home</a>
                </li>
                <li class='login-header-link'>
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

    <section class='index-body'>
        <div class='index-left-box'>
            <div class='index-left-stats'>
                <img src='images/Users/<?php echo $id?>/Banner/<?php echo $id?>.jpg' width='100%'>
                <div style='display:inline-flex; margin-left:15px'>
                    <div>
                        <img class='index-profile-pic'src='images/Users/<?php echo $id?>/Profile/<?php echo $id?>.jpg'>
                    </div>
                    <div style='padding-left:10px'>
                        <p class='index-name'><?php echo $firstname .' '. $lastname ?></p>
                        <p class='index-username'><?php echo '@'.$username ?></p>
                    </div>
                </div>
                <div style='display:inline-flex; width:100%; padding-left:10px'>
                    <div class='index-left-stat-box'>
                        <p>Prayers</p>
                        <p>0</p>
                    </div>
                    <div class='index-left-stat-box'>
                        <p>Religions</p>
                        <p>0</p>
                    </div>
                    <div class='index-left-stat-box'>   
                        <p>Disciples</p>
                        <p>0</p>
                    </div>
                </div>
            </div>
            <div class='index-left-trends'>
                Trends
            </div>
        </div>

        <div class='index-center-box'>
            <div class='compose-prayer'>
                <iframe src='ComposePrayer.php' width='100%' frameborder=0 scrolling='no' onkeyup='resizeIframe(this)'></iframe>
            </div>
            News Feed</br>
            <strong> SEE TWITTER LAYOUT </strong>
        </div>

        <div class='index-right-box'>
            People Near you
        </div>
    </section>
</body>

<script type="text/javascript">
  function resizeIframe(iframe) {
    iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
  }
</script> 