<?php 

	// Voor windows
	setlocale( 'LC_ALL', 'nld_nld' );

	// Voor *nix (oa. mac)
	//setlocale( 'LC_ALL', 'nl_NL' );
	
	$timestamp	=	mktime( 22, 35, 25, 01, 21, 1904 );

	$datum	=	strftime('%d %B %Y, %H:%M:%S %p', $timestamp);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing date deel2</title>
    </head>
    <body>

		<h1>Oplossing date deel2</h1>

		<p><?= $datum ?></p>

    </body>
</html>