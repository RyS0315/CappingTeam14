<?php
    class PrayerCommenter{
        protected $db;//Sets the Database -- Allows for queries in this class

        protected $userid;//The User Id of the current session


        Public function __construct($db,$userid){
            $this->db = $db;
            $this->userid = $userid;
        }

        function showComments($prayer){
            $comments = $this->getCommentInfo($prayer['prayid']);
            if($comments){
                $this->createComments($comments);
            }
        }

        function getCommentInfo($id){
            $query = "SELECT c.commid AS cid, c.comment AS comment, u.pPicture AS user_img, u.userid as userid
                      FROM Comments c, Users u
                      WHERE prayid = '$id'
                      AND u.userid = c.userid";
            $result = $this->db->fetchQuery($query);
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        function createComments($comment){
            $num = 0;
            foreach($comment as $i){
                if($num < 3){
                    $this->displayComment($i);
                }
                $num += 1;
            }
            if($num > 3){
                $this->showMore();
            }
        }

        function displayComment($comment){
            echo "<div class='comment-feed'>
                    <div class='comment-usr-img'>
                    <img class='feed-profile-img' src='images/Users/".$comment['userid']."/Profile/".$comment['user_img']."'>
                    </div>
                    <div class='comment-feed-content'>
                    ".$comment['comment']."
                    </div>
            </div>";
        }
    }
?>