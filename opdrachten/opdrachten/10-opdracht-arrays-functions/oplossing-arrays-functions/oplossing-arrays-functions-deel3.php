<?php

	$getallen	=	array( 8, 7, 8, 7, 3, 2, 1, 2, 4 );

	$getallenUnique	=	array_unique( $getallen );

	$getallenUniqueGesorteerd	=	$getallenUnique;

	// Let op: rsort neemt de array die het sorteert by reference, wat wil zeggen dat de originele array aangepast zal worden.
	// Als het sorteren gelukt is, returnt deze functie enkel TRUE of FALSE als het niet gelukt is
	rsort( $getallenUniqueGesorteerd );


?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing arrays</title>
    </head>
    <body>

    	<h1>Oplossing array functies - deel 3</h1>

		<h2>Originele getallen array</h2>
			
		<pre>
			<?php var_dump( $getallen ) ?>
		</pre>
		
		<h2>Unieke getallen array</h2>

		<pre>
			<?php var_dump( $getallenUnique ) ?>
		</pre>

		<h2>Omgekeerd gesorteerde getallen array</h2>

		<pre>
			<?php var_dump( $getallenUniqueGesorteerd ) ?>
		</pre>


		
    </body>
</html>