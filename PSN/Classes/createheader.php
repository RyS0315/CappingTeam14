<?php
    class Header{
        protected $db;//Sets the Database -- Allows for queries in this class

        protected $menus; 

        protected $loggedIn;//Specifies if the user header should be added

        protected $userid;//Id of the user uploading the image

        protected $title;

        protected $css;

        Public function __construct($db,$menus,$title,$css){
            $this->db = $db;
            $this->menus = $menus;
            $this->title = $title;
            $this->css = $css;
        }

        function showUserMenu($id, $bool = 1){
            $this->loggedIn = $bool;
            $this->userid = $id;
        }

        function displayHeader(){
            $this->createTitle();
            echo "<section class='header'>
                  <div class='header-box'>
                  <ul class='header-link-box'>";
            foreach($this->menus as $i){
                echo "<li class='header-link ".$i['active']."'>
                        <a href='".$i['link']."'>".$i['name']."</a>
                      </li>";
            }
            echo "</ul>";

            echo "<ul class='logo-box'><li class='logo-li'><a href='index.php'><img class='logo' src='images/icons/logo.jpg'></a></li></ul>";
            if($this->loggedIn == 1){
                echo "<ul class='header-profile-pic'>
                        <li id='header-profile-pic-link' onclick='ShowMenu()'>
                            <img class='index-profile-pic' src='images/Users/".$this->userid."/Profile/".$this->userid.".jpg'>
                        </li>
                    </ul>";
                $this->createUserMenu($this->userid);
            }
            echo "</div></section>";
        }

        function createTitle(){
           echo "<html>
                    <head>
                        <title>".$this->title."</title>
                        <link rel='shortcut icon' href='images/icons/favicon.jpg'>
                    </head>
                    <body>";
            $this->addcss();
        }

        function addcss(){
            foreach($this->css as $i){
                echo "<link rel='stylesheet' type='text/css' href='".$i["src"]."'>";
                continue;
            }
        }

        function createUserMenu($id){
            $query = "SELECT fname, lname, username
                      FROM Users
                      WHERE userid = '$id'";
            $result = $this->db->fetchQuery($query);
            $firstname = $result[0]['fname'];
            $lastname = $result[0]['lname'];
            $username = $result[0]['username'];

            echo "<div id='header-profile-menu' class='hidden'>
                <ul class='header-profile-menu-name'>
                    <li class='header-profile-menu-name-name'>
                        <a href='profile.php'>".$firstname." ".$lastname ."</a>
                    </li>
                    <li class='header-profile-menu-name-username'>
                        <a href='profile.php'>@".$username."</a>
                    </li>
                </ul>
                <ul class='header-profile-menu-settings'>
                    <li class='header-profile-menu-list-item'>
                        <a href='settings-account.php'> Settings </a>
                    </li>
                    <li class='header-profile-menu-list-item'>
                        <a href='settings-themes.php'>Themes</a>
                    </li>
                </ul>
                <ul class='header-profile-menu-logout'>
                    <li class='header-profile-menu-list-item'>
                        <a href='signOut.php'> Log Out </a>
                    </li>
                </ul>
            </div>";
        }
    }
?>