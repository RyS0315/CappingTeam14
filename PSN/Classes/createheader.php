<?php
    class Header{
        protected $db;//Sets the Database -- Allows for queries in this class

        protected $menus; 

        protected $loggedIn;//Specifies if the user header should be added

        protected $userid;//Id of the user uploading the image

        Public function __construct($db,$menus){
            $this->db = $db;
            $this->menus = $menus;
        }

        function showUserMenu($id, $bool = 1){
            $this->loggedIn = $bool;
            $this->userid = $id;
        }

        function displayHeader(){
            echo "<section class='header'>
            <div class='header-box'>
            <ul>";
            foreach($this->menus as $i){
                echo "<li class='header-link ".$i['active']."'>
                    <a href='".$i['link']."'>".$i['name']."</a>
                </li>";
            }
            echo "</ul>";
            if($this->loggedIn){
                echo "<ul class='header-profile-pic'>
                <li id='header-profile-pic-link' onclick='ShowMenu()'>
                    <img class='index-profile-pic' src='images/Users/".$this->userid."/Profile/".$this->userid.".jpg'>
                </li>
                </ul>";
            }
            echo "</div></section>";
        }
    }
?>