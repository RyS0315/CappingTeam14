<?php
    require '../config/ApplicationTop.php';

    $username = generateRandomString();
    $password = generateRandomString();
    $first = generateRandomString(5);
    $last = generateRandomString(6);

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        // $this->checkUnique($randomString);
        return $randomString;
    }

    $insertquery = "INSERT into USERS (fname,lname,username,user_password,pPicture,bPicture)
                        VALUES('$first', '$last','$username','$password' , 'default.png', 'default.png')";
    $insertresult = $db->InsertQuery($insertquery);

    if($insertresult){
        header('Location:createUsers.php');
    }
?>