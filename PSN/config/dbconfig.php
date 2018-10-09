<?php
    include '/../Database/mydb.php';
    include '/../Database/pgdb.php';

    $databaseServer = 'MYSQL';

    $servername = '127.0.0.1';
    $username = "root";
    $password = "";
    $dbname = 'psndata';

    if($databaseServer == 'MYSQL'){

        // Create connection for MYSQL
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $db = new mydb($conn);   
    }
    
    if($databaseServer == 'Postgres'){
        
        //Create Connection for Postgres
        $conn = pg_connect("host=".$servername." user=".$username." password=".$password." dbname=".$dbname."");

        if (!$conn) {
            die('Could not connect: ' . pg_last_error());
        }
        
        //Postgres
        $db = new pgdb($conn);
    }
?>