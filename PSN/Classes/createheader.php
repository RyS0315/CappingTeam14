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
            $this->createCompose();
            $this->createLargeImageContainer();
            //Header
            echo "
                  <section class='header'>
                  <div class='header-box'>
                  <ul class='header-link-box'>";
            foreach($this->menus as $i){
                echo "<li class='header-link ".$i['active']."'>
                        <a href='".$i['link']."'>".$i['name']."</a>
                      </li>";
            }
            echo "</ul>";

            echo "<ul class='logo-box'>
                    <li class='logo-li'>
                        <a href='index.php'><img class='logo' src='images/icons/favicon.png'></a>
                    </li>
                  </ul>";
            if($this->loggedIn == 1){
                echo "<ul class='header-profile-pic'>
                        <li id='header-profile-pic-link' onclick='ShowMenu()'>
                            <img class='index-profile-pic' src='images/Users/".$this->userid."/Profile/".$this->userid.".jpg'>
                        </li>
                        <li id='sort-compose'>
                            <div id='startprayer' onclick='ShowCompose()'>PRAY</div>
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
                        <link rel='shortcut icon' href='images/icons/favicon.png'>
                    </head>
                    <body>";
            $this->addcss();
            echo "<div id='overlay' class='overlay hidden'></div>";
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
                        <a href='settings-religions.php'>Religions</a>
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

        function createCompose(){
            $primaryrelquery = "SELECT u.primary_religion
                   FROM users u
                   WHERE u.userid = $this->userid";
            $primaryrelres = $this->db->fetchquery($primaryrelquery);
            $prel = $primaryrelres[0]['primary_religion'];
            
            $chosenreligion = isset($_SESSION['currel']) ? $_SESSION['currel'] : $prel;

            $curreligionquery = "SELECT r.religion_name, r.relid
                                FROM Religions r
                                WHERE r.relid = $chosenreligion";
            $curreligion = $this->db->fetchQuery($curreligionquery);

            $relid = $chosenreligion;
            $relname = $curreligion[0]['religion_name'];

            echo "
                <div id='compose-prayer' class='hidden'>
                <div class='prayer-box'>
                <ul class='compose-header-background'>
                    <li class='compose-header'>
                        <h1>Pray to ".$relname."</h1>
                    </li>
                    <li class='close-button'>
                        <img id='closebutton' src='images/icons/close.png'>
                    </li>
                </ul>
                    <form method='post' class='compose-content' action='php/submitprayer.php' enctype='multipart/form-data'>
                        <textarea id='compose-area' name='newprayer' placeholder='Compose Your Prayer' 
                                  onkeyup='auto_grow(this)'></textarea>
                        <div id='preview'>
                            <p id='upload-size-error' style='display:none; color:#ff0000'>Image too Large. Must be less than 500KB</p>
                            <img src='' id='uploadpreview' style='display:none'>
                        </div>
                        <ul class='compose-content-bottom'>
                        <li class='compose-img-upload'>
                            <input type='file' name='upload' id='upload' class='inputfile' onchange='readURL(this)'>
                            <label id='uploadbutton' for='upload'>Upload Picture</label> 
                        </li>
                        <li class='compose-submit'>
                            <button type='submit' name='religion' id='submit-prayer' value='".$relid."'>Send Prayer</button>
                        </li>
                        </ul>
                    </form>
                </div>
            </div>";
        }

        function createLargeImageContainer(){
            echo"<div id='imglarge-body' class=''hidden>
                    <div class='imglarge-box'>
                    <img id='closelargeimg' class='close' src='images/icons/close.png'>
                        <img id='imglarge' src='#'>
                    </div>
                </div>";
        }
    }
?>