<?php

var_dump( $_GET );

	$artikels =	array(
					array(	'title'	=> 'Titel artikel 1',
							'body' 	=> 'Body artikel 1',
							'tags' 	=> 'Kernwoorden artikel 1',
					),
					array(	'title'	=> 'Titel artikel 2',
							'body' 	=> 'Body artikel 2',
							'tags' 	=> 'Kernwoorden artikel 2',
					),
					array(	'title'	=> 'Titel artikel 3',
							'body' 	=> 'Body artikel 3',
							'tags' 	=> 'Kernwoorden artikel 3',
					)
				);

	if ( isset( $_GET[ 'artikel' ] ) )
	{
		$artikel	=	$artikels[ $_GET[ 'artikel' ] ];
	}


	include 'view/header-partial.html';
	if ( !isset( $_GET[ 'artikel' ] ) )
	{
		include 'view/bodys-partial.html';
	}
	else
	{
		include 'view/body-partial.html';
	}
	include 'view/footer-partial.html';
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht include/require</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">


       

        
        
    </body>
</html>
