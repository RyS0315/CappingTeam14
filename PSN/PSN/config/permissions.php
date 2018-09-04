<?php
    // include 'functions.php';

    session_start();
    $_SESSION['userId'] = isset($_SESSION['userId']) ? $_SESSION['userId'] : '';
    $username = '';
    $id =  $_SESSION['userId'];
    $usersettings = isLoggedIn($id, $db);
    // print_r($usersettings);
    // print_ary($usersettings);
    $username = $usersettings['username'];
    $firstname = $usersettings['firstname'];
    $lastname = $usersettings['lastname'];
    $password = $usersettings['password'];

    function checkUser($username, $pass,$db, $attempts){
        $validuserquery = "SELECT userid
                           FROM USERS
                            WHERE username = '$username'
                            AND user_password = '$pass'";
        $checkResult = $db->FetchQuery($validuserquery);
        if($checkResult){
            setUser($checkResult[0]['userid']);
            header('Location:index.php');
        }
        else{
            $response['error'] = 'Please Enter a Valid Username and Password';
            $newattempts = $attempts + 1;
            $response['attempts'] = $newattempts;
            if($newattempts > 5){
                header('location:verifyAccount.php');
            } else{
               return $response;
            }
        }
    }

    function setUser($id){
        $_SESSION['userId'] = $id;
        return $_SESSION['userId'];
    }

    function isLoggedIn($id, $db){
        $SETTINGS['username'] = '';
        $SETTINGS['firstname'] = ''; 
        $SETTINGS['lastname'] = ''; 
        $SETTINGS['password'] = ''; 
        
        if($_SESSION['userId'] != ''){
            $userquery = "SELECT * 
                          FROM USERS 
                          WHERE userid = $id";
            $userresult = $db->FetchQuery($userquery);
            $SETTINGS['username'] = $userresult[0]['username'];
            $SETTINGS['firstname'] = $userresult[0]['first_name'];
            $SETTINGS['lastname'] = $userresult[0]['last_name'];
            $SETTINGS['password'] = $userresult[0]['user_password'];
            return $SETTINGS;
        }
        else{
            if ($_SERVER['REQUEST_URI'] === 'login.php') {
                header('Location:login.php');
            }else{
                return false;
            }
        }
    }

    function signOut(){
        session_destroy();
        header('Location:login.php');
    }
?>