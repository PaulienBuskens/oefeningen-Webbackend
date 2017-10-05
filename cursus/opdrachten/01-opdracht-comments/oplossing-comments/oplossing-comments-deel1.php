<?php

	/*
		Pascal Nosenzo
		opleiding@pascalculator.be
	*/

		$artikel[0]['titel'] = "eerste les php";
		$artikel[1]['titel'] = "tweede les php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing comments: deel1</title>
	</head>
	<body>
		<h1>Oplossing comments: deel1</h1>
		<?php echo 'Pascal Nosenzo' ?>

		<?php foreach( $artikels as $artikel ): ?>
			<li><?php echo $artikel['titel'] ?></li> 
		<?php endforeach ?>
	</body>
</html>