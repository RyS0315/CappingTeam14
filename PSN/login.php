<?php 
    include 'config/dbconfig.php';
    include 'config/permissions.php';

    $root = '';
    $inputUsername = isset($_POST['username']) ? $_POST['username'] : '';
    $inputPassword = isset($_POST['password']) ? $_POST['password'] : '';
    $error = '';
    $attempts = isset($_POST['attempts']) ? $_POST['attempts'] : 0;
    if($inputUsername!='' || $inputPassword !=''){
        $check = checkUser($inputUsername, $inputPassword, $db, $attempts);
        $error = $check['error'];
        $attempts = $check['attempts'];
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
                <li class='header-link active'>
                <a href='login.php'>Home</a></li>
            </ul>
        </div>
    </section>
    <section class='login-body'>
        <div class='login-form-box'>
            <div class='login-form-box-body'>
                <h1 style='width:50%; margin:auto; padding-top:50px; font-family:"Palatino"; font-size:28px'>Log in to PSN</h1>
                <p class='error' style='width:50%; margin:auto; margin-top:5px'><?php echo $error ?></p>
                <form method='post' action='login.php' id='login-form-inputs'>    
                    <input type='text' name='username' value='<?php echo $inputUsername ?>' placeholder='Username or Email'>
                    <input type='password' name='password' placeholder='Password'></br>
                    <input type='hidden' name='attempts' value='<?php echo $attempts ?>'>
                    <button class='submit-button' name='submit' type='submit'>Login</button>
                </form>
            </div>
            <p style='width:50%; margin:auto; margin-top:10px;'>New User?
                <a style='padding-left:5px'href='newAccount.php'>Create an account</a></p>
        </div>
    </section>
</body>
</html>
