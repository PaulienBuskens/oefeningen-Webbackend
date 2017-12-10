<?php

    sesison_start();

    function __autoload($classname){
        require_once($classname . '.php');
    }

    $connection = new PDO('mysql:host=localhost;dbname=phpoefening029','root','';)

    if(User::validate($connection)){
        $message = Message::getMessage();

    }else{
        User::logout();
        new Message('error', 'Er ging iets mistijdens het inloggen, probeer opnieuw.');
        header( 'location: login-form.php');
    }

    var_dump($_SESSION);



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Dashboard</title>
</head>
<body>

    <h1>Dashboard</h1>

    <?php if(isset($message)): ?>
        <div class="modal <?= $message['type']?> ">
            <?= $message['text']?>
        </div>
    
    <?php endif ?>

    <p>hallo,</p>

    <a href="logout.php">uitloggen</a>
    
</body>
</html>