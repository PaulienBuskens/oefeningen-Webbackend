
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

$db = new PDO('mysql:host=localhost;dbname=oplossing_file_upload', 'root', ''); 

$databaseWrapper    =   new Database( $db );

$user = new User( $databaseWrapper );

if ( !$user->validate() )
{
    new Message( "Log eerst in", "error" );
    relocate("login-form.php");
}

if ( isset( $_POST[ 'submit' ] ) )
{

    $newFileName    =   false;

  
    if ( $_FILES[ 'profilePicture' ][ 'error' ] !== 4 )
    {
        
        $isValid = 0;

    
        if ( $_FILES[ 'profilePicture' ][ 'size' ] > 2000000 )
        {
            ++$isValid;
        }

      
        if ( $_FILES[ 'profilePicture' ][ 'type' ] !== 'image/jpeg' &&
            $_FILES[ 'profilePicture' ][ 'type' ] !== 'image/png' &&
            $_FILES[ 'profilePicture' ][ 'type' ] !== 'image/gif'   )
        {

            ++$isValid;
        }

        if ( $isValid > 0 )
        {
            new Message( "Het bestand is niet geldig, probeer een ander bestand", "error" );
            relocate( "gegevens-form.php" );
        }
        else
        {
           
            $newFileName = createNewFileName( $user->getId(), $_FILES[ 'profilePicture' ][ 'name' ] );

           
            while ( file_exists( SERVER_PATH . 'img\\' . $newFileName ) )
            {
                $newFileName = createNewFileName( $user->getId(), $_FILES[ 'profilePicture' ][ 'name' ] );
            }
            
           
            move_uploaded_file( $_FILES[ 'profilePicture' ][ 'tmp_name' ], SERVER_PATH . 'img\\' . $newFileName );
        }
    }

  
    if ( $newFileName )
    {
        $editGegevensQuery  =   'UPDATE users
                                    SET profile_picture = :profile_picture
                                    WHERE id = :id';

        $editGegevensPlaceholders = array( ':profile_picture' => $newFileName,
                                            ':id' => $user->getId() );

        $databaseWrapper->query( $editGegevensQuery, $editGegevensPlaceholders );

         new Message( "De gegevens zijn gewijzigd!", "success" );
        relocate( "ogegevens-form.php" );
    }

    
}
?>