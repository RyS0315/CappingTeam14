<?php
    class FileUploader{
        protected $db; //Sets the Database -- Allows for queries in this class

        protected $type;//Sets the Type of the File -- Will Determine where the file is placed

        protected $userid;//Id of the user uploading the image

        Public function __construct($db,$type,$userid){
            $this->db = $db;
            $this->type = $type
            $this->userid = $userid
        }
        /**
         * The Upload Function
         * 
         */
        function uploadFile ($file) {
            checkExtension($file);
            checkFile($file);//Make sure the file is safe
            $name = setName($file);//Set a random name to the file
            $path = setPath($name);//Create the path for the file to be place -- The folder
            doUpload($file, $path);
        }

        /**
         * 
         * 
         */
        function checkFile(){

        }

?>