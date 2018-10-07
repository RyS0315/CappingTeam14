<?php 
    include 'config/dbconfig.php';
    include 'config/permissions.php';
    include 'config/functions.php';
    include 'Classes/createheader.php';
    include 'Classes/createFooter.php';
    include 'Classes/messagesCreator.php';
    include 'php/onloadscripts.php';

    $curconvo = isset($_SESSION['curconvo']) ? $_SESSION['curconvo'] : 'Not Set';

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
    $src[] = ["src"=>"js/userMenu.js", "type"=>"js"];
    $src[] = ["src"=>"js/messagePreview.js", "type"=>"js"];
    $src[] = ["src"=>"js/jqueryinit.php","type"=>"php"];

    $css[] = ["src"=>"css/core.php","type"=>"css"];
    $title = "P.R.A.Y";

    $header = new Header($db, $menus,$title,$css);
    $header->ShowUserMenu($id);
    $header->displayHeader();

    $messager = new messageCreator($db, $id);

    $users = $messager->getUsers();
    
?>

    <section class='index-body'>
        <div class='messages-users'>
            <?php
                foreach($users as $i){
                    $messages[$i['userid']] = $messager->getMessages($i['userid']);
                    end($messages[$i['userid']]);
                    $key = key($messages[$i['userid']]);
                    $recentmsg = $messages[$i['userid']][$key]['msg'];
                    $messager->previewConvo($i,$recentmsg);
                }
            
            ?>
        </div>

        <div class='messages-feed'>
            <?php 
            if($curconvo != ''){
                $messager->displayConvo($messages[$curconvo], $curconvo);
            }else{?>
                <div class='messages-default'>
                <p>No Conversation Selected</p> 
                </div>
            <?php } ?>
        </div>
    </section>
<?php 
    $footer = new Footer($db,$src);
    $footer->buildFooter();
?>