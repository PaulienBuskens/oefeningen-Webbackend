<?php 

	$timestamp	=	mktime(22, 35, 25, 01, 21, 1904);

	$datum	=	date('d F Y, g:i:s A', $timestamp);
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing date</title>
    </head>
    <body>

		<h1>Oplossing date</h1>

		<p><?= $datum ?></p>

    </body>
</html>