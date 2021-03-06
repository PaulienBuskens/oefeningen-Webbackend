<?php
    
    session_start();

    var_dump( $_POST );

    function my_autoloader($class) {
        include 'classes/' . $class . '.php';
    }

    spl_autoload_register( 'my_autoloader' );

    function relocate( $url )
    {
        header('location: ' . $url );
    }

    define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );
    define( 'HOST', dirname( BASE_URL ) . '/');

   
    if ( isset( $_POST[ 'submit' ] ) )
    {
        $email      =   $_POST[ 'email' ];
        $password   =   $_POST[ 'password' ];

        if ( $email !== '' && $password !== '' )
        {

            $db = new PDO('mysql:host=localhost;dbname=phpoefening033', 'root', '');

            $databaseWrapper    =   new Database( $db );
            
            $user   =   new User( $databaseWrapper );

            $userLoggedIn = $user->login( $email, $password );

            if ( $userLoggedIn )
            {
                new Message( "Welkom in de applicatie!", "success" );
                relocate( 'dashboard.php' );
            }
            else
            {
                $error  =   new Message( "Er ging iets mis tijdens het inloggen, probeer opnieuw", "error" );
                relocate( 'login-form.php' );
            }
        }
        else
        {
            $error  =   new Message( "Vul een e-mailadres of een paswoord in", "error" );
            relocate( 'registratie-form.php' );
        }
    }


?>