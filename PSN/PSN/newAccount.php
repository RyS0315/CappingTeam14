<?php 
    include 'config/dbconfig.php';
    include 'config/permissions.php';
    $securityquests = ['What was the name of your childhood pet?',
                       'What was the model of your first car?',
                       'What is your mothers maiden name?',
                       'What was the name of the street you grew up on?',
                       '',
                       '',
                       '',
                       ''];
?>

<html>
    <head>
        <title>PSN-Login</title>
</head>
<link rel='stylesheet' href='css/core.css'>
<body>
<section class='login-header'>
        <div class='login-header-box'>
            <ul>
                <li class='login-header-link'>
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
                <input type='password' name='password' placeholder='Password'>
                <input type='password' name='confirmpassword' placeholder='Confirm Password'>
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