<?php
    class PrayerCreator{
        protected $db;//Sets the Database -- Allows for queries in this class

        protected $userid;//The User Id of the current session

        protected $comments;//The class that creates all the comments for a prayer

        protected $likepic;
        
        protected $dislikepic;

        protected $likeclass;
        
        protected $dislikeclass;

        Public function __construct($db,$userid,$comments){
            $this->db = $db;
            $this->userid = $userid;
            $this->comments = $comments;
        }

        function checkLike($prayid){
            $this->likepic = getRoot()."images/icons/thumbs-up-grey.png";
            $this->dislikepic = getRoot()."images/icons/thumbs-down-grey.png";
            $this->likeclass = "";
            $this->dislikeclass = "";
            $checkquery = "SELECT *
                           FROM LIKES
                           WHERE prayid = '$prayid'
                           AND userid = '$this->userid'";
            $check = $this->db->fetchQuery($checkquery);
            if($check){
                if($check[0]['isLike'] == 0){
                    $this->dislikepic = getRoot()."images/icons/thumbs-down-purple.png";
                    $this->dislikeclass = "up-down-active";
                }else{
                    $this->likepic = getRoot()."images/icons/thumbs-up-purple.png";
                    $this->likeclass = "up-down-active";
                }
            }
        }

        function showPrayer($i){
            $this->checkLike($i['prayid']);
            $likeurl = "`php/addLike.php`";
            $likedata = "{prayid : ".$i['prayid']."}";
            $dislikeurl = "`php/addDislike.php`";
            $dislikedata = "{prayid : ".$i['prayid']."}";
            echo "
            <div class='feed-container'>
                <div class='feed-box'>
                    <div class='feed-profile-img-box'>
                        <img class='feed-profile-img 'src='images/Users/".$i['userid']."/Profile/".$i['pPicture']."'>
                    </div>
                    <div class='feed-content-box'>
                        <ul class='feed-content-header'>
                        <li class='feed-content-name'>
                            <a class='feed-profile-link' href='profile.php?id=".$i['userid']."'>
                                <p class='feed-profile-name'>".$i['fname']." ".$i['lname']."</p>
                                <p class='feed-profile-username'>@".$i['username']."</p>
                            </a>
                        </li>";
                        if($i['userid'] == $this->userid || $this->userid == 1){
                            echo "<li class='feed-content-delete'>
                            <img id='deleteprayer' src='images/icons/close.png' onclick='removePrayer(".$i['prayid'].")'>
                            <form method='post' action='php/removePrayer.php'>
                            <button id='removePrayer--".$i['prayid']."' name='delete' type='submit' class='hidden' value='".$i['prayid']."'>
                            </form>
                            </li>";
                        }
                        echo
                        "</ul>
                        <p class='feed-content'>".$i['content']."</p>
                        ";
                        if($i['img'] != ''){
                            echo "
                            <div class='feed-img-box'>
                            <div class='feed-img-container'>
                                <img class='feed-img' src='".getRoot()."images/Users/".$i['userid']."/Uploads/".$i['img']."'
                                     onload='center_img(this)' onclick='showLargeImg(this)'>
                            </div>
                            </div>";
                        }
                        echo"
                        <ul class='feed-interact-menu'>
                            <li class='feed-like ".$this->likeclass."' onclick='addLike(".$likeurl.", ".$likedata.", ".$i['prayid'].")' id='like--".$i['prayid']."' >
                            <img id='like-pic--".$i['prayid']."' src='".$this->likepic."' width='20px' height='20px'>
                            </li>
                            <li class='feed-downvote ".$this->dislikeclass."' onclick='addDislike(".$dislikeurl.", ".$dislikedata.", ".$i['prayid'].")' id='dislike--".$i['prayid']."'>
                            <img id='dislike-pic--".$i['prayid']."' src='".$this->dislikepic."' width='20px' height='20px'>
                            </li>
                            <li class='prayer-date'>
                            <p>Posted ". formatDate($i['dateLastMaint']) ."</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class='feed-comment-box'>";
                    $this->comments->showComments($i);
                    echo "<div class='post-comment'>
                        <form method='post' action='php/prayercomment.php'>
                            <textarea class='comment' name='comment' style='height:35px' onkeyup='auto_grow(this)' placeholder='Comment'></textarea>
                            <div id='submit-comment-box'>
                                <button type='submit' name='prayid' id='submit-comment' value='".$i['prayid']."'>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>";
            }
    }
?>
