<?php

	$referenceGuide = false;
	$voorbeelden    = false;
	$oplossingen	= false;
	$search			= false;

	if(isset($_GET['link'])){

		switch($_GET['link']){
			
			case 'reference-guide':
				$referenceGuide = true;
				break;
			
			case 'voorbeelden':
				$voorbeelden	= true;
				$map		 	= true;
				$bestandenArray = getBestanden($map);
				break;
			
			case 'oplossingen':
				$oplossingen 	= true;
				$map			= 'oplossingen';
				$bestandenArray = getBestanden($map);
				break;
		}
	}

	if(isset($_GET['search-query'])){
		$search = true;

		$voorbeeldenBestanden = getBestanden('voorbeelden');
		$oplossingenBestanden = getBestanden('oplossingen');

		$alleBestanden = array_merge($voorbeeldenBestanden,$oplossingenBestanden);
		$resultaten	   = array();
		$zoekString	   =$_GET['search-query'];

		foreach($alleBestanden as $bestand){

			$zoekStringGevonden = strpos($bestand, $zoekString);

			if($zoekStringGevonden !== false){
				$resultaten[] = $bestand;
			}
		}

		$bestandenArray = $resultaten;
	}

	function getBestanden($map){
		$bestandenArray = scandir( '../'. $map . '/');

		array_shift($bestandenArray);
		array_shift($bestandenArray);

		return $bestandenArray;
	}

?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Opdracht herhalingsopdracht 01</title>
		<style>
			iframe
			{
				width:1000px;
				height:750px;
			}
		</style>
    </head>
    <body>
		<h1>Herhalingsopdracht</h1>

		<ul>
			<li><a href="18-herhalingsopdracht-01.php?link=reference-guide">Reference guide</a></li>
			<li><a href="18-herhalingsopdracht-01.php?link=voorbeelden">Voorbeelden</a></li>
			<li><a href="18-herhalingsopdracht-01.php?link=oplossingen">Oplossingen</a></li>
		</ul>
		<form action="18-herhalingsopdracht-01.php" method="GET">

			<label id="search-query">Zoek naar:</label>
			<input type="text" name="search-query" id="search-query">

			<input type="submit">

		</form>

		<?php if ( $referenceGuide ): ?>
			<iframe src="../web-backend-inleiding.pdf"></iframe>
		<?php endif ?>

		<?php if ( $voorbeelden || $oplossingen ): ?>
			<ul>
				<?php foreach ( $bestandenArray as $bestand ): ?>
					<li><a href="../<?php echo $map ?>/<?php echo $bestand ?>"><?php echo $bestand ?></a></li>
				<?php endforeach ?>
			</ul>
		<?php endif ?>

		<?php if ( $search ): ?>
			<ul>
				<?php foreach ( $bestandenArray as $bestand ): ?>
					<li><?php echo $bestand ?></li>
				<?php endforeach ?>
			</ul>
		<?php endif ?>

       
    </body>
</html>
