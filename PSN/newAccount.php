<?php
    include 'config/dbconfig.php';
    include 'config/permissions.php';
    include 'config/functions.php';
    $securityquests = ['What was the name of your childhood pet?',
                       'What was the model of your first car?',
                       'What is your mothers maiden name?',
                       'What was the name of the street you grew up on?',
                       '',
                       '',
                       '',
                       ''];
    if(isset($_POST['submit'])){
        $message = createAccount($db);
    }
    // print_ary($message);
    function createAccount($db){
        $error['first'] = checkFirst();
        $error['username'] = checkUsername($db);
        $error['password'] = checkPassword();
        $error['security'] = checkSecurity();
        $itr = 0;
        foreach($error as $i){
            if($i == 1){
                $itr += 1;
                continue;
            }else{
                $key = array_keys($error);
                $message[$key[$itr]] = $i;
                $itr += 1;
            }
        }
        if(isset($message)){
            return $message;
        }else{
            doCreate($db);
        } 
    }

    function checkFirst(){
        if(isset($_POST['firstname'])){
            if($_POST['firstname'] != ''){
                return true;
            }else{
                return 'Enter Your Name';
            }
        }
        return 'Enter Your Name';
    }

    function checkUsername($db){
        if(isset($_POST['username'])){
            if($_POST['username'] != ''){
                return checkAvailableUsername($db);    
            }else{
                return 'Enter Your Username';
            }
        }
        return 'Enter Your Username';
    }

    function checkAvailableUsername($db){
        $username = $_POST['username'];
        $usernamequery = "SELECT username
                          FROM users
                          WHERE username = '$username'";
        $usernameresult = $db->fetchquery($usernamequery);
        if($usernameresult){
            return 'Username is Taken';
        }else{
            return true;
        }
    }

    function checkPassword(){
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $confirmpassword = isset($_POST['confirmpassword']) ? $_POST['confirmpassword'] : '';
        if($password == ''){
            return 'Enter a Password';
        }
        if($confirmpassword == ''){
            return 'Confirm your Password';
        }
        if($password == $confirmpassword){
            return true;
        }else{
            return 'Passwords Do Not Match';
        }
    }

    function checkSecurity(){
        if(isset($_POST['securityAnswer'])){
            if($_POST['securityAnswer'] != ''){
                return true;
            }else{
                return 'Answer the security question';
            }
        }
        return 'Answer the security question';
    }

    function doCreate($db){
        $firstname = $_POST['firstname'];
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $security = $_POST['securityAnswer'];
        $insertquery = "INSERT into USERS (fname,lname,username,user_password) 
                        VALUES('$firstname', '$lastname','$username','$password')";
        $insertresult = $db->InsertQuery($insertquery);
        setUser($insertresult);
        header('Location:addReligion.php');
    }
?>

<html>
    <head>
        <title>PSN-Login</title>
</head>
<link rel='stylesheet' type='text/css' href='css/core.php'>
<body>
<section class='header'>
        <div class='header-box'>
            <ul>
                <li class='header-link'>
                <a href='login.php'>Home</a></li>
            </ul>
        </div>
    </section>

    <section class='newaccount-body'>
        <div class='newaccount-form-box'>
            <h2>Create Account</h2>
            <form id='newaccount-form-inputs' method='post' action='newAccount.php'>
                <input type='text' name='firstname' placeholder='First Name'>
                <input type='text' name='lastname' placeholder='Last Name'>
                <input type='text' name='username' placeholder='UserName'>
                <div class='hidden' id='failedpassword'>
                    Passwords Do Not Match
                </div>
                <input type='password' id='password' name='password' placeholder='Password'>
                <input type='password' id='confirmpassword'name='confirmpassword' placeholder='Confirm Password' onblur='checkPassword()'>
                <select name='security'>
                    <option value=0>Select a Security Question </option><?php
                    foreach($securityquests as $i){?>
                        <option value='<?php echo $i?>'><?php echo $i?></option><?php
                    }?>
                <input type='text' name='securityAnswer' placeholder='Enter Your Answer'></br>
                <button name='submit' type='submit' class='submit-button'>Create Account</button>
            </form>
        </div>
    </section>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function checkPassword(){
        var password = document.getElementById('password');
        var confirm = document.getElementById('confirmpassword');
        var passwordcontent = password.value;
        var confirmcontent = confirm.value;

        if(passwordcontent == confirmcontent){
            var failed = document.getElementById('failedpassword');
            $(failed).fadeOut();
        }
        else{
            var failed = document.getElementById('failedpassword');
            $(failed).fadeIn();
        }
        
    }
</script>
