<?php 
    include 'config/dbconfig.php';
    include 'config/permissions.php';
    include 'config/functions.php';
    include 'Classes/createheader.php';
    include 'Classes/createFooter.php';
    include 'Classes/prayers.php';

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
    $css[] = ["src"=>"css/core.php","type"=>"css"];
    $title = "P.R.A.Y";
    $header = new Header($db, $menus, $title, $css);
    $header->ShowUserMenu($id);
    $header->displayHeader();

    $feed = new PrayerCreator($db,$id);


    $samplePrayer = [
        [   
            'prayeeid'=>'1',
            'fname'=>'Team',
            'lname'=>'14',
            'username'=>'Admin',
            'content'=>'First Prayer Ever',
            'relid'=>'1',
            'favs'=>'420'
        ],
        [   
            'prayeeid'=>'2',
            'fname'=>'Riley',
            'lname'=>'Stadel',
            'username'=>'RySu',
            'content'=>'Praise the almighty Pablo for he is just',
            'relid'=>'1',
            'favs'=>'420'
        ]
    ];

?>
    <section class='index-body'>
        <div class='index-left-box'>
            Trends
        </div>

        <div class='index-center-box'>
        <ul class='sort-menu'>
            <li class='religion-menu-header'>
                Church Of Marist
                <ul class='religion-menu-items'>
                    <li class='religion-menu-item'>
                        Rel1
                    </li>
                    <li class='religion-menu-item'>
                        Rel2
                    </li>
                    <li class='religion-menu-item'>
                        Rel3
                    </li>
                </ul>
            </li>
        </ul>
        <?php
            foreach($samplePrayer as $i){
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