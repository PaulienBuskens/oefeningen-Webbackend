<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht sessions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    </head>
    <body class="web-backend-opdracht">
        
        <h1>Opdracht sessions: deel 1</h1>

    <?php


	session_start();

	if ( isset( $_GET['session'] ) )
    {
        if ( $_GET['session']  == 'destroy' )
        {
            session_destroy( );
            header( 'location: phpoefening-021-deel1.php' );
        }
    }

	var_dump( $_SESSION );

	$email		=	( isset( $_SESSION[ 'registrationData' ][ 'deel1' ][ 'email'] ) ) ? $_SESSION[ 'registrationData' ][ 'deel1' ][ 'email'] : '';
	$nickname		=	( isset( $_SESSION[ 'registrationData' ][ 'deel1' ][ 'nickname'] ) ) ? $_SESSION[ 'registrationData' ][ 'deel1' ][ 'nickname'] : '';

?>

        
    </body>
</html>
