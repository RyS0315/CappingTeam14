<?php

Class mydb {
    // Create connection
    protected $conn;

    Public function __construct($con){
        $this->conn = $con;
    }

    function FetchQuery($query){
        $result_array=[];
        $arrayresult = [];
        if($queryresult = mysqli_query($this->conn, $query)){
            while ($row = mysqli_fetch_assoc($queryresult)){
                $arrayresult[] = $row;
            }
            return $arrayresult;
        }else{
            //find the error and return it
            echo"</br></br></br>";
            die(mysqli_error($this->conn) ."</br>".$query);
        }
    }

    function UpdateQuery($query){
        //return boolean value
        if(mysqli_query($this->conn, $query)) {
            return 'Update Worked';
        } else {
            //Find the error and return it
            echo"</br></br></br>";
            die(mysqli_error($this->conn) ."</br>".$query);
        }
    }

    function DeleteQuery($query){
        if(mysqli_query($this->conn, $query)) {
            return 'Delete Worked';
        } else {
            //Find the error and return it
            echo"</br></br></br>";
            die(mysqli_error($this->conn) ."</br>".$query);
        }
    }

    function InsertQuery($query){
        if(mysqli_query($this->conn, $query)) {
            return mysqli_insert_id($this->conn);
        } else {
            //Find the error and return it
            echo"</br></br></br>";
            die(mysqli_error($this->conn) ."</br>".$query);
        }
    }

    function CreateTableQuery($query){
        //return table name or false
       $queryresult = mysqli_query($conn, $query);
    }

    function AlterTableQuery(){
        //Return True of False
    }

    function CountFollowers($relid){
        
    }
}

?>