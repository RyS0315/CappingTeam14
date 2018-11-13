<?php 
    include 'config/dbconfig.php';
    include 'config/functions.php';
    include 'config/permissions.php';
    include 'Classes/createheader.php';
    include 'Classes/createFooter.php';

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
            'active'=>'active'
        ],
        [
            'name'=>'Messages',
            'link'=>'messages.php',
            'active'=>''
        ]
    ];
    $src[] = ["src"=>"js/userMenu.js", "type"=>"js"];
    $src[] = ["src"=>"js/jqueryinit.php","type"=>"php"];
    $css[] = ["src"=>"css/core.php","type"=>"css"];
    $title = "P.R.A.Y.";

    $header = new Header($db, $menus,$title,$css);
    $header->ShowUserMenu($id);
    $header->displayHeader();

    /**
     * 
     * Notifications for a user are comments and upvotes on a prayer
     * that is associated with that user
     * 
     * Do not include downvotes
     * If score on a prayer reaches the downvote limit give a warning
     * notification
     * 
     */
    $likesquery = "SELECT l.prayid, COUNT(l.userid) AS likes
                   FROM Likes l, Prayers p
                   WHERE p.userid = '$id'
                   AND p.prayid = l.prayid
                   GROUP BY l.prayid";
    $likes = $db->fetchQuery($likesquery);

    $commentsquery = "SELECT COUNT(c.userid) AS comments, c.prayid
                      FROM Prayers p, Comments c
                      WHERE p.userid = '$id'
                      AND c.prayid = p.prayid
                      GROUP BY c.prayid";
    $comments = $db->fetchQuery($commentsquery);
    


?>
    <section class='index-body'>

    </section>
<?php 
print_ary($likes);
print_ary($comments);
    $footer = new Footer($db,$src);
    $footer->buildFooter();
?>