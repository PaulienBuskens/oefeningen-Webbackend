<?php

	function ikBenAanspreekbaarViaString()
	{
		return 'Echt waar! Probeer maar.';
	}

	$isEenFunctieAanspreekbaarViaEenString	=	'ikBenAanspreekbaarViaString';


	function snooze(  )
	{
		return 'Ok, nog 5 minuutjes, maar dan... opstaan!';
	}

	function stop(  )
	{
		return 'Gedaan met slapen!';
	}

	function alarmklok( $time, $callback )
	{
		$actie 			=	'Het is ' . $time . ' uur. De wekker loopt af. ';
		$callbackResult	=	$callback();

		return $actie . $callbackResult;
	}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Voorbeeld van functie: callback</title>
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/global.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/directory.css">
	<link rel="stylesheet" type="text/css" href="http://web-backend.local/css/facade.css">
</head>

<body class="web-backend-inleiding">

	<section class="body">

		<h1>Voorbeeld van functions: callback</h1>

		<h2>Functienaam als string in een variabele</h2>

		<p><?= $isEenFunctieAanspreekbaarViaEenString() ?></p>

		<h2>functienaam meegegeven als argument in string-vorm</h2>

		Functieaanroeping: <code>alarmklok( 8, 'snooze' )</code>

		<p><?= alarmklok( 8, 'snooze' ) ?></p>

		Functieaanroeping: <code>alarmklok( 8.15, 'stop' )</code>

		<p><?= alarmklok( 8.15, 'stop' ) ?></p>

	</section>

</body>
</html>