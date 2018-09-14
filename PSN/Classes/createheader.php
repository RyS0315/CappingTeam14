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
            }
            echo "</div></section>";
        }

        function createTitle(){
           echo "<html>
                    <head>
                        <title>".$this->title."</title>
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
    }
?>