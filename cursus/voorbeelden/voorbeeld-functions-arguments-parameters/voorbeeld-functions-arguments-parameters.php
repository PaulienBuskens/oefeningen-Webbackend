<?php
	
	/* Geen argumenten */
	function sayHello( )
	{
		$result 	=	'';

		$result = 'Hallo, onbekende.';

		return $result;
	}

	/* Eén argument */
	function sayGoodbye( $name )
	{
		$result 	=	'';

		$result = 'Tot de volgende keer, ' . $name . '.';

		return $result;
	}

	/* Meerdere argumenten */
	function say( $type, $name ) 
	{
		switch ($type) 
		{
			case 'hello':
				return 'Hello ' . $name;
				break;
				
			case 'goodbye':
				return 'Goodbye ' . $name;
				break;

			case 'warning':
				return 'LOOK OUT ' . strtoupper($name) . '!!!';
				break;
		}
	}

	/* Argumenten met een voorgedefiniëerde parameter */
	function sayCustom( $type, $name, $custom = FALSE) 
	{
		$result 	=	'';

		if ( $custom === FALSE )
		{
			switch ($type) 
			{
				case 'hello':
					$result = 'Hello ' . $name;
					break;
	
				case 'goodbye':
					$result = 'Goodbye ' . $name;
					break;
	
				case 'warning':
					$result = 'LOOK OUT ' . strtoupper($name) . '!!!';
					break;
			}
		}
		else
		{
			$result = 'Hm, blijkbaar heeft ' . $name . ' recht op een custom boodschap.';
		}

		return $result;
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Voorbeeld van functie met meerdere parameters</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>

<body class="web-backend-inleiding">

	<section class="body">

		<h1>Voorbeeld van functie zonder parameters</h1>

		<p><?= sayHello( ) ?></p>


		<h1>Voorbeeld van functie met één parameter</h1>

		<p><?= sayGoodbye( 'Peter' ) ?></p>


		<h1>Voorbeeld van functie met meerdere parameters</h1>

		<p><?= say('hello', 'Tim') ?></p>
		<p><?= say('goodbye', 'Hans') ?></p>
		<p><?= say('warning', 'Sam') ?></p>

		<h1>Voorbeeld van functie met een pregedefiniëerde parameter</h1>

		<p><?= sayCustom('hello', 'Tim') ?></p>
		<p><?= sayCustom('hello', 'Tim', TRUE) ?></p>

	</section>

</body>
</html>