<?php
    require 'config/ApplicationTop.php';
    include 'Classes/prayers.php';
    include 'Classes/prayerCommentDisplayer.php';

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
                       OR ($id = 1 AND r.relid <> $chosenreligion)
                       ORDER BY r.religion_name";
    $searchrels = $db->fetchQuery($searchrelquery);


    $prayerquery = "SELECT p.userid, u.fname, u.lname, u.username, p.content, pr.relid, p.prayid, p.img,
                        r.religion_name, u.pPicture, p.dateLastMaint
                    FROM Prayers p, Users u, Prayer_Religions pr, Religions r
                    WHERE p.userid = u.userid
                    AND pr.prayid = p.prayid
                    AND pr.relid = r.relid
                    AND (pr.relid = $chosenreligion
                    OR pr.relid = 1)
                    ORDER BY p.prayid desc";
    $prayers = $db->FetchQuery($prayerquery);

    $prayersSentquery = "SELECT COUNT(p.userid)
                         FROM Prayers p
                         WHERE p.userid = $id";
    $prayersSent = $db->FetchQuery($prayersSentquery);

    $dateJoinedquery = "SELECT u.dateAdded
                        FROM Users u
                        WHERE u.userid = $id";
    $dateJoined = $db->FetchQuery($dateJoinedquery);
?>

    <section class='index-body'>
        <div class='index-left-box'>
            <p class='trends-header'>My <?php echo $curreligion[0]['religion_name']?> Stats</p>
            <p>Prayers sent: <?php echo prayersSent($id, $curreligion[0]['relid'], $db )?> </p>
            <br>
            <p> Reputation: <?php echo getReputation($id, $curreligion[0]['relid'], $db )?></p>
            <br>
            <p> Joined: <?php echo dateJoined($id, $curreligion[0]['relid'], $db )?> </p>
        </div>

        <div class='index-center-box'>
            <ul class='sort-menu'>
                <li class='religion-menu-header'>
                    <?php echo $curreligion[0]['religion_name']?>
                    <ul class='religion-menu-items'>
                    <form method='post' action='php/filterReligion.php' style='max-height:300px; overflow-y:scroll; overflow-x:hidden; font-size: 22px;'>
                        <?php foreach($searchrels as $i){
                           echo" <li class='religion-menu-item' onclick='filterRel(".$i['relid'].")'>
                                ".$i['religion_name']."
                                <button id='filter-rel--".$i['relid']."' class='hidden' type='submit' name='religion' value=".$i['relid'].">
                            </li>";
                        }?>
                    </form>
                    </ul>
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
