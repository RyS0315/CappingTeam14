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
            'prayeeid'=>'2',
            'fname'=>'Riley',
            'lname'=>'Stadel',
            'username'=>'RySu',
            'content'=>'Praise the almighty Pablo and he shall give us a passing grade on this project so we can become Billionaires',
            'relid'=>'1',
            'favs'=>'1234'
        ],
        [   
            'prayeeid'=>'1',
            'fname'=>'Team',
            'lname'=>'14',
            'username'=>'Admin',
            'content'=>'First Prayer Ever',
            'relid'=>'1',
            'favs'=>'420'
        ]
    ];

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
                        Po-Town Popes
                    </li>
                    <li class='religion-menu-item'>
                        Really Long Religion to Test the Dimensions Of This Menu
                    </li>
                    <li class='religion-menu-item'>
                        Buddha
                    </li>
                </ul>
        </form>
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