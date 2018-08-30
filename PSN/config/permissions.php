<?php
    session_start();
    $_SESSION['userId'] = isset($_SESSION['userId']) ? $_SESSION['userId'] : '';
    $username = '';
    $id =  $_SESSION['userId'];
    if($id !=''){
        $userquery = "SELECT * FROM USERS WHERE userid = $id";
        $userresult = $db->FetchQuery($userquery);
        $username = $userresult[0]['username'];
        $firstname = $userresult[0]['first_name'];
        $lastname = $userresult[0]['last_name'];
        $password = $userresult[0]['user_password'];
    }
     
    function checkUser($username, $pass,$db){
        // echo $username.'</br>';
        // echo $pass.'</br>';
        $validuserquery = "SELECT userid
                           FROM USERS
                            WHERE username = '$username'
                            AND user_password = '$pass'";
                        //    echo $validuserquery.'<br>';
        $checkResult = $db->FetchQuery($validuserquery);
        // print_r($checkResult);
        if($checkResult){
            setUser($checkResult[0]['userid']);
            header('Location:index.php');
            // return true;
        }
        else{
            return 'Please Enter a Valid Username and Password';
        }
    }

    function setUser($id){
        $_SESSION['userId'] = $id;
        return $_SESSION['userId'];
    }

    function isLoggedIn(){
        if($_SESSION['userId'] != ''){
            return $_SESSION['userId'];
        }
        else{
            return false;
        }
    }

    function signOut(){
        session_destroy();
        header('Location:index.php');
    }
?>