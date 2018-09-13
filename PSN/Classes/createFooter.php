<?php
    class Footer{
        protected $db;//Sets the Database -- Allows for queries in this class

        protected $files;//All the css and js files used on the page

        Public function __construct($db,$files){
            $this->db = $db;
            $this->files = $files;
        }

        function buildFooter(){
            echo "</body></html>";
            foreach($this->files as $i){
                if($i["type"] == "php"){
                    include $i["src"];
                    continue;
                }
                if($i["type"] == "css"){
                    echo "<link rel='stylesheet' type='text/css' href='".$i["src"]."'>";
                    continue;
                }
                if($i["type"] == "js"){
                    echo "<script type='text/javascript' src='".$i["src"]."'></script>";
                    continue;
                }
                return $i["type"]." is not a valid type";
            }
        }


    }

?>