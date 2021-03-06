<?php

    session_start();

    function relocate($url){
        header('location: ' . $url);
    }

    function my_autoloader($class){
        include 'classes/' .$class . '.php';
    }

    spl_autoload_register('my_autoloader');

    define('BASE_URL', 'http://' .$_SERVER['HTTP_HOST']. $_SERVER['PHP_SELF']);
    define('HOST', dirname(BASE_URL). '/');

    $message = false;

    if( Message::hasMessage()){
        $message = Message::getMessage();
        Message::remove();
    }

    $db = new PDO('mysql:host=localhost;dbname=oplossing_file_upload', 'root', '');

    $databaseWrapper = new Database($db);

    $user = new User ($databaseWrapper);

    if( !$user->validate()){
        new Message("log eerst in", "error");
        relocate("login-form.php");
    }

    if(isset($_POST['acitvate'])){
        $artikel = new Artikel($databaseWrapper);
        $id = $_POST['activate'];

        var_dump($_POST);
        $artikel->toggle($id);

        new Message('de activatiestatus is succesvol veranderd', 'success');
        relocate("artikels-overzicht.php");
    }
?>