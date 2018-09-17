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
                    <div class='feed-img-box'>
                        <img class='feed-img 'src='images/Users/".$i['prayeeid']."/Profile/".$i['prayeeid'].".jpg'>
                    </div>
                    <div class='feed-content-box'>
                        <a class='feed-profile-link' href='profile.php?id=".$i['prayeeid']."'>
                        <p class='feed-profile-name'>".$i['fname']." ".$i['lname']."</p>
                        <p class='feed-profile-username'>@".$i['username']."</p>
                        </a>
                        <p class='feed-content'>".$i['content']."</p>
                        <div class='feed-comment'>
                            <textarea name='comment' style='height:35px' onkeyup='auto_grow(this)' placeholder='Comment'></textarea>
                        </div>
                        <ul class='feed-interact-menu'>
                            <li class='feed-like'>
                                <img class='like-button' src='images/icons/Like.png'><p class='feed-num-likes'>".$i['favs']."</p>
                            </li>
                        </ul>
                    </div>
                </div>";
        }
    }
?>