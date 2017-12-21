<?php

    session_start();

    function relocate( $url )
    {
        header('location: ' . $url );
    }

    function my_autoloader($class) {
        include 'classes/' . $class . '.php';
    }

    function createNewFileName( $userId, $originalFileName )
    {

        $newFileName    =   $userId . '_' . time() . '_' . $originalFileName; 
        
        return $newFileName;
    }

    spl_autoload_register( 'my_autoloader' );

    define( 'BASE_URL', 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'PHP_SELF' ] );
    define( 'HOST', dirname( BASE_URL ) . '/');
    define( 'SERVER_PATH', getcwd() . '\\' );
    
    $message    =   false;

    if ( Message::hasMessage() )
    {
        $message = Message::getMessage();

        Message::remove();
    }

    $db = new PDO('mysql:host=localhost;dbname=oplossing_file_upload', 'root', ''); // Connectie maken

    $databaseWrapper    =   new Database( $db );

    $user = new User( $databaseWrapper );

    if ( !$user->validate() )
    {
        new Message( "U moet eerst inloggen", "error" );
        relocate("oplossing-file-upload-login-form.php");
    }

    if ( isset( $_POST[ 'submit' ] ) )
    {

        $newFileName    =   false;

        // Fotovalidatie
        if ( $_FILES[ 'profilePicture' ][ 'error' ] !== 4 )
        {
            // 0 is geldig, meer dan 0 niet geldig
            $isValid = 0;

            // File size (2mb)
            if ( $_FILES[ 'profilePicture' ][ 'size' ] > 2000000 )
            {
                ++$isValid;
            }

            // Extensie (gif, png, jpeg)
            if ( $_FILES[ 'profilePicture' ][ 'type' ] !== 'image/jpeg' &&
                $_FILES[ 'profilePicture' ][ 'type' ] !== 'image/png' &&
                $_FILES[ 'profilePicture' ][ 'type' ] !== 'image/gif'   )
            {

                ++$isValid;
            }

            if ( $isValid > 0 )
            {
                new Message( "Het bestand is niet geldig, probeer een ander bestand", "error" );
                relocate( "oplossing-file-upload-gegevens-form.php" );
            }
            else
            {
                // Nieuwe naam aanmaken
                $newFileName = createNewFileName( $user->getId(), $_FILES[ 'profilePicture' ][ 'name' ] );

                // Controle of naam reeds in map voorkomt
                while ( file_exists( SERVER_PATH . 'img\\' . $newFileName ) )
                {
                    $newFileName = createNewFileName( $user->getId(), $_FILES[ 'profilePicture' ][ 'name' ] );
                }
                
                // Verplaatsen
                move_uploaded_file( $_FILES[ 'profilePicture' ][ 'tmp_name' ], SERVER_PATH . 'img\\' . $newFileName );
            }
        }

        // Toevoegen aan db
        if ( $newFileName )
        {
            $editGegevensQuery  =   'UPDATE users
                                        SET profile_picture = :profile_picture
                                        WHERE id = :id';

            $editGegevensPlaceholders = array( ':profile_picture' => $newFileName,
                                                ':id' => $user->getId() );

            $databaseWrapper->query( $editGegevensQuery, $editGegevensPlaceholders );

             new Message( "De gegevens zijn gewijzigd!", "success" );
            relocate( "oplossing-file-upload-gegevens-form.php" );
        }

        
    }
?>