<?php
    class PrayerCreator{
        protected $db;//Sets the Database -- Allows for queries in this class

        protected $userid;//The User Id of the current session

        Public function __construct($db,$userid){
            $this->db = $db;
            $this->userid = $userid;
        }

        function showPrayer($i){
            echo "<div class='feed-box'> 
                    <div class='feed-profile-img-box'>
                        <img class='feed-profile-img 'src='images/Users/".$i['userid']."/Profile/".$i['userid'].".jpg'>
                    </div>
                    <div class='feed-content-box'>
                        <ul class='feed-content-header'>
                        <li class='feed-content-name'>
                            <a class='feed-profile-link' href='profile.php?id=".$i['userid']."'>
                                <p class='feed-profile-name'>".$i['fname']." ".$i['lname']."</p>
                                <p class='feed-profile-username'>@".$i['username']."</p>
                            </a>
                        </li>";
                        if($i['userid'] == $this->userid){
                            echo "<li class='feed-content-delete'>
                            <img id='deleteprayer' src='images/icons/close.png'>
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
                                <img class='feed-img' src='images/Users/".$i['userid']."/Uploads/".$i['img']."' onload='center_img(this)'>
                            </div>
                            </div>";
                        }
                        echo "
                            <div class='feed-comment'>
                            <textarea name='comment' style='height:35px' onkeyup='auto_grow(this)' placeholder='Comment'></textarea>
                        </div>
                        <ul class='feed-interact-menu'>
                            <li class='feed-like'>
                            </li>
                        </ul>
                    </div>
                </div>";
                        }
                        // <img class='like-button' src='images/icons/Like.png'><p class='feed-num-likes'>".$i['favs']."</p>
    }
?>