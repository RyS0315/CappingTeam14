<?php
    require 'config/ApplicationTop.php';
    include 'Classes/messagesCreator.php';

    $curconvo = isset($_SESSION['curconvo']) ? $_SESSION['curconvo'] : '';

    $usersquery = "SELECT u.username
              FROM users u
              WHERE u.userid <> $id";
    $users = $db->fetchQuery($usersquery);

    foreach($users as $i){
        $usersjs[] = $i['username'];
    }

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


    $header = new Header($db, $menus,$title,$css);
    $header->ShowUserMenu($id);
    $header->displayHeader();

    $messager = new messageCreator($db, $id);

    $users = $messager->getUsers();

?>

    <section class='index-body' id='body'>
        <img class='mobile-message-button' src='images/icons/messageArrow.png'>
        <div class='messages-users-settings-box'>
            <div class='messages-users-heading-box'>
                <p class='messages-users-heading'>Conversations</p>
            </div>
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
                <form autocomplete="off" action="openConvo.php">
                <div class='messages-settings'>
                <input type='text' name='user' id='user-search' placeholder='Search Users'></textarea>
                </div>
            </form>
        </div>
        <div class='messages-feed'>
            <?php
            if($curconvo != ''){
                $messages[$curconvo] = $messager->getMessages($curconvo);
                if(!$messages[$curconvo]){
                    $messages[$curconvo] = $messager->brandNewConvo($curconvo);
                }
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

<script>
    array = getarrayInfo(<?php echo json_encode($usersjs); ?>);
    autocomplete(document.getElementById("user-search"), array);

    function getarrayInfo(userObj){
        return userObj;
    }
</script>
