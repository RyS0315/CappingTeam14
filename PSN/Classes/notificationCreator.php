<?php
    class Notificationer{
        protected $db;//Sets the Database -- Allows for queries in this class

        protected $userid;//The User Id of the current session

        Public function __construct($db,$userid){
            $this->db = $db;
            $this->userid = $userid;
        }

        function showLikes($i){
            echo " <div class='notification-container'>
                    <p> ".$i['likes']." People Liked Your Prayer</p>";
                    $this->prayerPrev($i['prayid']);
                    echo"</div>
            ";
        }

        function showComments($i){
            echo " <div class='notification-container'>
                    <p> ".$i['comments']." People Commented On Your Prayer</p>";
                    $this->prayerPrev($i['prayid']);
                    echo"</div>
            ";
        }

        function prayerPrev($prayid){
            echo"Preview Of Prayer will go here";
        }

        function showWarning(){

        }
    }

?>