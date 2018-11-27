<?php
    require 'config/ApplicationTop.php';
    include 'Classes/prayers.php';
    include 'Classes/prayerCommentDisplayer.php';

    $pageid = isset($_GET['id']) ? $_GET['id'] : $id;

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

    if($pageid != $id){
        $menus[1]['active'] = '';
    }

    $src[] = ["src"=>"js/userMenu.js", "type"=>"js"];
    $src[] = ["src"=>"js/jqueryinit.php","type"=>"php"];
    $css[] = ["src"=>"css/core.php","type"=>"css"];
    $title = "P.R.A.Y.";

    $header = new Header($db, $menus,$title,$css);
    $header->ShowUserMenu($id);
    $header->displayHeader();

    $comments = new PrayerCommentDisplayer($db, $id);
    $feed = new PrayerCreator($db,$id,$comments);

    $prayerquery = "SELECT p.userid, u.fname, u.lname, u.username, p.content, pr.relid, p.prayid, p.img,
                        r.religion_name, u.pPicture, p.dateLastMaint
                    FROM Prayers p, Users u, Prayer_Religions pr, Religions r
                    WHERE p.userid = u.userid
                    AND pr.prayid = p.prayid
                    AND pr.relid = r.relid
                    AND u.userid = $pageid
                    ORDER BY p.prayid desc";
    $prayers = $db->FetchQuery($prayerquery);

    $userinfoquery = "SELECT username, fname, lname, bio, pPicture, bPicture, dateAdded, Primary_Religion
                      FROM Users
                      WHERE userid = $pageid";
    $userinfo = $db->fetchQuery($userinfoquery);
?>
    <section class='profile-banner'>
        <div class='profile-banner-box'>
            <img class='profile-banner-pic' src='images/Users/<?php echo $pageid?>/Banner/<?php echo $userinfo[0]['bPicture']?>'>
        </div>
    </section>
    <img class='profile-profile-pic' src='images/Users/<?php echo $pageid?>/Profile/<?php echo $userinfo[0]['pPicture']?>'>
    <section class='profile-body'>
        <h1 class='profile-header-name'><?php echo $userinfo[0]['fname'] . " " . $userinfo[0]['lname'] ?></h1>
    </section>

    <div id="profile-prayers">
        <?php
        foreach($prayers as $i){
            $feed->showPrayer($i);
        }?>
    </div>
<?php
    $footer = new Footer($db,$src);
    $footer->buildFooter();
?>
