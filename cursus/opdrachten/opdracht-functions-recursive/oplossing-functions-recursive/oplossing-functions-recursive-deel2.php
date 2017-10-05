<?php

	function berekenKapitaal( $dataArray )
	{
		
		if ( $dataArray[ 'teller' ] <= $dataArray[ 'looptijd' ] )
		{
			$renteBedrag			=		floor( $dataArray['kapitaal'] * ( $dataArray['renteProcent'] / 100 ) );
			$dataArray['kapitaal']	+=		$renteBedrag;
			$dataArray['historiek'][ $dataArray[ 'teller' ] ]	=		'Het nieuwe bedrag bedraagt ' . $dataArray['kapitaal'] . '€ (waarvan ' . $renteBedrag . '€ onze rente is)';

			++$dataArray[ 'teller' ];

			return berekenKapitaal( $dataArray );
		}
		else
		{
			return $dataArray;
		}
	}

	$startKapitaal 	=	100000;
	$renteVoet		=	8;
	$aantalJaar		=	10;

	$winstHans = berekenKapitaal( array( 'kapitaal' => $startKapitaal, 
											'renteProcent' => $renteVoet, 
											'looptijd' => $aantalJaar,
											'teller'	=> 1,
											'historiek'	=>	array() ) );

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Oplossing recursive: deel2</title>
    </head>
    <body>

    	<h1>Oplossing recursive: deel2</h1>

		<ul>
			<?php foreach( $winstHans['historiek'] as $value): ?>
				<li><?php echo $value ?></li>
			<?php endforeach ?>
		</ul>
        
    </body>
</html>