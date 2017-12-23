<?php

    session_start();

    function relocate($url){
        header('location: '. $url);
    }

    function my_autoloader($class){
        include 'classes/' . $class . '.php';
    }

    spl_autoload_register('my_autoloader');

    define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );
    define( 'HOST', dirname( BASE_URL ) . '/');

    $message = false;

    if(Message::hasMessage()){
        $message = Message::getMessage();
        Message::remove();
    }

    $db = new PDO('mysql:host=localhost;dbname=oplossing_file_upload', 'root', ''); 

    $databaseWrapper    =   new Database( $db );

    $user = new User( $databaseWrapper );

    if ( !$user->validate() )
    {
        new Message( "Log eerst in", "error" );
        relocate("login-form.php");
    }

    var_dump($_POST);

    $titel = $_POST['titel'];
    $artikelTekst = $_POST['artikel'];
    $kernwoorden = $_POST['kernwoorden'];
    $datum = $_POST['datum'];
    $is_active = isset($_post['is_active'])? 1 : 0;

    $artikel = new Artikel($databaseWrapper);

    $artikelToegevoegd = $artikel->add($titel, $artikelTekst, $kernwoorden, $datum, $is_active);

    if($artikelToegevoegd){
        new Message( 'Het artikel met titel "'. $titel .'" werd toegevoegd.', 'succes');
        relocate("artikels-overzicht.php");
    }
    
    
?>