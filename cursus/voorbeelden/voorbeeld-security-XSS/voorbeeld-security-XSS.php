<?php

	define( 'BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] );

	$value	=	'';

	if ( isset( $_POST[ 'name' ] ) )
	{
		$value	=	$_POST['name'];
	}
	

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voorbeeld time</title>
    <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
</head>

<body class="web-backend-voorbeeld">

	<section class="body">
		
		<h1>XSS injection (Werkt niet in Chrome > IE!)</h1>


		<form action="<?= BASE_URL ?>" method="POST">
		<label for="name">naam</label>
			<input type="text" name="name" id="name" value="<?= $value ?>">
			<input type="submit">
	    </form>

	    <p>Tip: vul <code>Kevin Mitnick"&gt; &lt;script&gt;alert('Gehackt!')&lt;/script&gt; &lt;hr style="display:none;</code> in</p> 	   
    </body>
</html>