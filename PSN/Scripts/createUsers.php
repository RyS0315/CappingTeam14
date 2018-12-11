<?php
    header('Location:../index.php');
    require '../config/ApplicationTop.php';

    $username = generateRandomString();
    $password = generateRandomString();
    $first = generateRandomString(5);
    $last = generateRandomString(6);
    
    $numreligionsquery = "SELECT COUNT(relid) as num
                          FROM Religions";
    $numreligionsresult = $db->fetchQuery($numreligionsquery); 
    $numreligions = $numreligionsresult[0]['num'];

    $prel = Rand(1, $numreligions);

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

    $insertquery = "INSERT into USERS (fname,lname,username,user_password,pPicture,bPicture, primary_religion)
                        VALUES('$first', '$last','$username','$password' , 'default.png', 'default.png', '$prel')";
    $insertresult = $db->InsertQuery($insertquery);


    
    
    if($insertresult){
        $religionInsert = "INSERT into User_Religions(userid, relid)
                        VALUES('$insertresult', '$prel')";
        $religion = $db->InsertQuery($religionInsert);
        createDir($insertresult);
        setDefaultPhoto($insertresult);
        header('Location:createUsers.php');
    }



    function createDir($id){
        mkdir(getRoot()."images/Users/".$id ,0777, true);
        mkdir(getRoot()."images/Users/".$id."/Profile" ,0777, true);
        mkdir(getRoot()."images/Users/".$id."/Banner" ,0777, true);
        mkdir(getRoot()."images/Users/".$id."/Uploads" ,0777, true);
    }

    function setDefaultPhoto($id){
        copy(getRoot()."images/icons/defaultProfile.jpg" , getRoot()."images/Users/".$id."/Profile/default.png");
        copy(getRoot()."images/icons/defaultBanner.png" , getRoot()."images/Users/".$id."/Banner/default.png");
    }
?>