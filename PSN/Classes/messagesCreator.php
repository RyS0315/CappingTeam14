<?php 
    

    class MessageCreator{
        protected $db; //Sets the Database -- Allows for queries in this class

        protected $userid;//Id of the user uploading the image

        Public function __construct($db, $userid){
            $this->db = $db;
            $this->userid = $userid;
        }

        function getUsers(){
            /**
             * query-> Select user info for any user that has 
             * 1->Recieved a message from me OR
             * 2->Sent a message to me
             * 
             */
            $query = "SELECT DISTINCT u.userid, u.fname, u.lname, u.username, u.pPicture
                      FROM User_Messages um, Users u, Messages m
                      WHERE (um.userid = u.userid
                      AND m.messageid = um.messageid
                      AND m.userid = '$this->userid')
                      OR (m.userid = u.userid
                      AND m.messageid = um.messageid
                      AND um.userid = '$this->userid')";
            $result = $this->db->fetchQuery($query);
            return $result;
        }

        /**
         * 
         * Returns all messages with said user
         * 
         */
        function getMessages($id){
            $query = "SELECT DISTINCT m.msg, m.userid, u.fname
                      FROM User_messages um, Messages m, Users u
                      WHERE um.messageid = m.messageid
                      AND u.userid = '$id'
                      AND(um.userid = '$id'
                      OR m.userid = '$id')
                      ORDER BY m.dateAdded, m.messageid";
            $result = $this->db->fetchQuery($query);
            return $result;
        }

        function previewConvo($user, $msg){
            echo "<div id='msg-prv--".$user['userid']."'class='message-preview' onclick=setMessage(".$user['userid'].")>
                    <form method='post' action='php/setmessage.php'>
                        <button name='userid' id='set-msg--".$user['userid']."'class='hidden' value='".$user['userid']."'></button>
                    </form>
                    <div class='message-preview-img'>
                        <img class='feed-profile-img'src='images/Users/".$user['userid']."/Profile/".$user['pPicture']."'>
                    </div>
                    <div class='message-preview-content'>
                        <div class='message-preview-name'>
                            ".$user['fname']."".$user['lname']."@".$user['username']."
                        </div>
                        <div class='message-preview-msg'>
                            ". $msg ."
                        </div>
                    </div>
                  </div>";
        }

        function displayConvo($msgs, $recid){
            echo"<div class='msg-user-name-box'>
                    <p class='msg-name'>".$msgs[0]['fname']."</p>
                 </div>
                 <div class='msg-convo'>";
            foreach($msgs as $i){
                echo"<div class='msg-container'>";
                    if($i['userid'] == $this->userid){
                        echo "<div class='msg-from-me'>
                                    <p class='msg-content' style='color:#ffffff'>".$i['msg']."</p>
                                </div>";
                    }else{
                        echo "<div class='msg-to-me'>
                        <p class='msg-content'>".$i['msg']."</p>
                        </div>";
                    }
                    echo "</div>";
            }
            echo "</div>
                <div class='compose-message'>
                    <form method='post' action='php/submitMessage.php'>
                    <textarea name='msg' id='msg' placeholder='Compose Message'></textarea>
                    <button class='submit-button'type='submit' name='id' value='".$recid."'> Submit</button>
                    </form>
                 </div>";
        }
    }




?>