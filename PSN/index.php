<?php
    include 'config/dbconfig.php';
    include 'config/permissions.php';
    include 'config/functions.php';
    include 'Classes/createheader.php';
    include 'Classes/createFooter.php';
    include 'Classes/prayers.php';
    include 'Classes/prayerCommentDisplayer.php';
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
    $src[] = ["src"=>"js/removePrayer.js", "type"=>"js"];
    $src[] = ["src"=>"js/jqueryinit.php","type"=>"php"];
    $src[] = ["src"=>"js/autoGrow.js","type"=>"js"];
    $src[] = ["src"=>"js/filterRel.js","type"=>"js"];
    $src[] = ["src"=>"http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js","type"=>"js"];
    $src[] = ["src"=>"js/composePrayer.js","type"=>"js"];
    $css[] = ["src"=>"css/core.php","type"=>"css"];
    $title = "P.R.A.Y";
    $header = new Header($db, $menus, $title, $css);
    $header->ShowUserMenu($id);
    $header->displayHeader();

    $comments = new PrayerCommentDisplayer($db, $id);
    $feed = new PrayerCreator($db,$id,$comments);

    $primaryrelquery = "SELECT u.primary_religion
                   FROM users u
                   WHERE u.userid = $id";
    $primaryrelres = $db->fetchquery($primaryrelquery);
    $prel = $primaryrelres[0]['primary_religion'];
    
    $chosenreligion = isset($_SESSION['currel']) ? $_SESSION['currel'] : $prel;

    $curreligionquery = "SELECT r.religion_name, r.relid
                         FROM Religions r
                         WHERE r.relid = $chosenreligion";
    $curreligion = $db->fetchQuery($curreligionquery);

    $searchrelquery = "SELECT DISTINCT r.religion_name, r.relid
                       FROM Religions r, Users u, User_religions ur
                       WHERE r.relid <> $chosenreligion
                       AND ( ((u.userid = $id 
                       AND r.relid = u.primary_religion) 
                       OR (ur.userid = $id 
                       AND r.relid = ur.relid)))
                       OR ($id = 1 AND r.relid <> $chosenreligion)";
    $searchrels = $db->fetchQuery($searchrelquery);


    $prayerquery = "SELECT p.userid, u.fname, u.lname, u.username, p.content, pr.relid, p.prayid, p.img, r.religion_name
                    FROM Prayers p, Users u, Prayer_Religions pr, Religions r
                    WHERE p.userid = u.userid
                    AND pr.prayid = p.prayid
                    AND pr.relid = r.relid
                    AND (pr.relid = $chosenreligion
                    OR pr.relid = 1)
                    ORDER BY p.prayid desc";
    $prayers = $db->FetchQuery($prayerquery);
?>

    <section class='index-body'>
        <div class='index-left-box'>
            <p class='trends-header'>My <?php echo $curreligion[0]['religion_name']?> Stats</p>
            <p> Prayers sent </p>
            <p> Reputation (Rank)</p>
            <p> Date Joined </p>
        </div>

        <div class='index-center-box'>
            <ul class='sort-menu'>
                <li class='religion-menu-header'>
                    <?php echo $curreligion[0]['religion_name']?>
                    <ul class='religion-menu-items'>
                    <form method='post' action='php/filterReligion.php'>
                        <?php foreach($searchrels as $i){
                           echo" <li class='religion-menu-item' onclick='filterRel(".$i['relid'].")'>
                                ".$i['religion_name']."
                                <button id='filter-rel--".$i['relid']."' class='hidden' type='submit' name='religion' value=".$i['relid'].">
                            </li>";
                        }?>
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
            <p class='trends-header'>Featured Tags</p>
        </div>
    </section>
 <?php
    $footer = new Footer($db,$src);
    $footer->buildFooter();
?>
