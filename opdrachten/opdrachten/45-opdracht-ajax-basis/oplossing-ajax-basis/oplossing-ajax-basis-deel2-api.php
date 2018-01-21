<?php

echo json_encode( $_SERVER );
	if( $_SERVER['REQUEST_METHOD'] === 'GET' ) 
	{
		if ( isset( $_GET['brouwernr'] ) )
		{
			$brouwerNummer	=	$_GET['brouwernr'];

			$bierenQuery	=	'SELECT bieren.naam
							FROM bieren
							WHERE bieren.brouwernr = :brouwernummer';

			$bierenStatement	=	$db->prepare( $bierenQuery );

			$bierenStatement->bindValue( ':brouwernummer', $brouwerNummer );

			$bierenStatement->execute();

			$bieren	=	array();

			while( $row = $bierenStatement->fetch( PDO::FETCH_ASSOC ) )
			{
				$bieren[ ]	=	$row;
			}
		}

	}
	


?>