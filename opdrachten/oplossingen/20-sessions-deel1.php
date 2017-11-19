<?php


	session_start();

	if ( isset( $_GET['session'] ) )
    {
        if ( $_GET['session']  == 'destroy' )
        {
            session_destroy( );
            header( 'location: 20-sessions-deel1.php' );
        }
    }

	var_dump( $_SESSION );

	$email		=	( isset( $_SESSION[ 'registrationData' ][ 'deel1' ][ 'email'] ) ) ? $_SESSION[ 'registrationData' ][ 'deel1' ][ 'email'] : '';
	$nickname	=	( isset( $_SESSION[ 'registrationData' ][ 'deel1' ][ 'nickname'] ) ) ? $_SESSION[ 'registrationData' ][ 'deel1' ][ 'nickname'] : '';

?>


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

        <a href="20-sessions-deel1.php?session=destroy">Vernietig sessie</a>

        <h2>Deel1: Registratiegegevens</h2>
        
        <form action="20-sessions-deel2.php" methode="POST">
            <ul>
                <li>
					<label for="email">email</label>
					<input type="text" id="email" name="email" value="<?= $email ?>" placeholder="vul email in" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "email" ) ? 'autofocus' : '' ?>>
				</li>
				<li>
					<label for="nickname">nickname</label>
					<input type="text" id="nickname" name="nickname" value="<?= $nickname ?>" placeholder="vul nickname in" <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "nickname" ) ? 'autofocus' : '' ?>>
				</li>
			</ul>

			<input type="submit" name="submit">
        
        </form>
    </body>
</html>
