<?php 
    include 'config/dbconfig.php';
    include 'config/permissions.php';
    include 'config/functions.php';
    include 'Classes/createheader.php';
    include 'Classes/createFooter.php';
    include 'Classes/prayers.php';
    include 'php/onloadscripts.php';

    if(isset($_POST['submit-prayer'])){
        include 'php/submitprayer.php';
    }

    $menus = [
        [
            'name'=>'Home',
            'link'=>'index.php',
            'active'=>'active'
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
            'active'=>''
        ]
    ];
    $src[] = ["src"=>"js/userMenu.js", "type"=>"js"];
    $src[] = ["src"=>"js/jqueryinit.php","type"=>"php"];
    $src[] = ["src"=>"js/autoGrow.js","type"=>"js"];

    $src[] = ["src"=>"js/composePrayer.js","type"=>"js"];
    $css[] = ["src"=>"css/core.php","type"=>"css"];
    $title = "P.R.A.Y";
    $header = new Header($db, $menus, $title, $css);
    $header->ShowUserMenu($id);
    $header->displayHeader();

    $feed = new PrayerCreator($db,$id);
    $chosenreligion = 2;

    $prayerquery = "SELECT p.userid, u.fname, u.lname, u.username, p.content, pr.relid, p.prayid, p.img
                    FROM Prayer p, Users u, Prayer_Religion pr
                    WHERE p.userid = u.userid
                    AND pr.prayid = p.prayid
                    AND (pr.relid = $chosenreligion
                    OR pr.relid = 1)
                    ORDER BY p.prayid desc";
    $prayers = $db->FetchQuery($prayerquery);
    // print_ary($prayers);
    $userreligions = [
        [
            'id'=>'1',
            'name'=>'Church of Marist'
        ],
        [
            'id'=>'2',
            'name'=>'Rel1'
        ],
        [
            'id'=>'3',
            'name'=>'Rel2'
        ],
        [
            'id'=>'4',
            'name'=>'Rel3'
        ]
    ]
?>
    <section class='index-body'>
        <div class='index-left-box'>
            Trends
        </div>

        <div class='index-center-box'>
        <form method='post' action='index.php'>
            <ul class='sort-menu'>
                <li class='religion-menu-header'>
                Church Of Marist
                <ul class='religion-menu-items'>
                    <li class='religion-menu-item'>
                        Really Long Religion to Test the Dimensions Of This Menu
                    </li>
                    <li class='religion-menu-item'>
                        Po-Town Popes
                    </li>
                    <li class='religion-menu-item'>
                        Buddha
                    </li>
                </ul>
        </form>
            </li>
        </ul>
        <?php
            foreach($prayers as $i){
                $feed->showPrayer($i);
            }?>
        </div>

        <div class='index-right-box'>
            People Near you
        </div>
    </section>
 <?php 
    $footer = new Footer($db,$src);
    $footer->buildFooter();
?>