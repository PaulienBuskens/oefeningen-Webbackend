<?php

var_dump( $_POST );

	if ( isset( $_GET[ 'logout' ] ) )
	{

		setcookie( 'authenticatedUserId', '', time() - 1000 );
		header('location: 21-cookies-deel2.php');
	}

	$fileContent	=	file_get_contents( '21-cookies-deel2.txt' );
	$userData		=	JSON_decode( $fileContent, true );


	$message			=	false;
	$isAuthenticated	=	false;
	
	if ( isset( $_POST[ 'submit' ] ) )
	{

		foreach ( $userData as $id => $user )
		{
			if ( $_POST[ 'username' ] == $user['username'] &&
					$_POST[ 'password' ] == $user['password'] )
			{

				$cookieTime	=	( isset( $_POST[ 'rememberMe' ] ) ? ( time() + 60*60*24*30 ) : time() + 3600 );

				setcookie( 'authenticatedUserId', $id, $cookieTime );
				header( 'location: 21-cookies-deel2.php' );
				break;
			}
		}

		$message = 'Er ging iets mis. Probeer opnieuw.';		
	}

	if ( isset( $_COOKIE[ 'authenticatedUserId' ] ) )
	{
		$userId				=	$_COOKIE[ 'authenticatedUserId' ];
		$message			=	'Welkom ' . $userData[$userId]['username'] . '. U bent ingelogd.';
		$isAuthenticated	=	true;
	}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht cookies</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    </head>
    <body class="web-backend-opdracht">
    
    <section class="body">
        <h1>Opdracht cookies: deel 2</h1>

        <h1>Inloggen</h1>
		
		<?php if ($message): ?>
			<?=	$message ?>
		<?php endif ?>

		<?php if ( !$isAuthenticated ): ?>
		
			<form action="21-cookies-deel2.php" method="post">
				<ul>
					<li>
						<label for="username">Username: </label>
						<input type="text" name="username" id="username" value="jan">
					</li>
					<li>
						<label for="password">Password: </label>
						<input type="password" name="password" id="password" value="paswoord01">
					</li>
					<li>
						<label for="rememberMe">Mij onthouden: </label>
						<input type="checkbox" name="rememberMe" id="rememberMe">
					</li>
				</ul>
				<input type="submit" name="submit" value="Log in">
			</form>
		<?php else: ?>

			<a href="21-cookies-deel2.php?logout=true">Logo out</a>

		<?php endif ?>

    </body>    
</html>
