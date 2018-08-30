<?php 
    include 'config/dbconfig.php';
    include 'config/permissions.php';
?>

<html>
    <head>
        <title>PSN</title>
</head>
<link rel='stylesheet' href='css/core.css'>
<body>
    <section class='main-header'>
        Welcome Back <?php echo $username ?>
    </section>

    <section class='index-body'>
        <div class='index-posts-box'>
        </div>
    </section>

</body>