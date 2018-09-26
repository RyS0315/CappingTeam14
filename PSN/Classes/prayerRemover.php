<?
    class prayerRemover{

        protected $db;//Sets the Database -- Allows for queries in this class

        protected $userid;//The User Id of the current session

        Public function __construct($db,$userid){
            $this->db = $db;
            $this->userid = $userid;
        }

        /**
         * Function to remove a prayer
         *
         * $prayer => Array of all the information for prayer
         *
         */
        function removePrayer($prayer){
            checkpermission($prayer['userid']);//Check if the current user is allow to remove the prayer
            removeRelation($prayer['prayid']);//Remove all field where the prayer is a foreign key
            removeimg($prayer['img']);//Remove the image from the directory
            remove($prayer['prayid']);//Remove prayer from prayer table
        }

        /**
         * A prayer can be deleted by the user of the prayer, or by an admin.
         * Check for those conditions
         *
         * $this->userid => current user
         * $uid => user of the prayer
         *
         */
        function checkpermission($uid){
            if($this->userid != $uid || $this->userid != 1) {

            }
        }

        /**
         * All fields that use the prayer id as a foreign key must be deleted before
         * the prayer is deleted. Do that here
         *
         * Tables that use prayid as FK
         *
         * Prayer_Religion
         * Comment
         * Likes
         * Prayer_Tag
         *
         */
        function removeRelation($pid){
            $queryArray = ["DELETE FROM Prayer_Tag WHERE prayid = $pid",
                            "DELETE FROM Prayer_Religion WHERE prayid = $pid",
                            "DELETE FROM Comment WHERE prayid = $pid",
                            "DELETE FROM Likes WHERE prayid = $pid"];
            for ($i = 0; $i < $queryArray.length; $i++) {
                $this->db->deleteQuery($queryArray[$i]);
            }
        }

        /**
         * If the prayer has an image attached to it, remove it from the directory
         * Path can be built dynamically by using $this->userid.
         *
         */
        function removeimg($img){
            if($img != null) {
                $path = "images/Users/".$this->userid."/Uploads/".$img;

            }
        }

        /**
         * Remove the prayer from the prayer table.
         * This should be done last
         *
         */
        function remove($pid){
            $query = "DELETE FROM Prayer WHERE prayid = $pid";
            $this->db->deleteQuery($query);
        }

    }

?>
