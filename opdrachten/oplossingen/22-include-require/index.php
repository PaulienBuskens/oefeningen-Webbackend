<?php

var_dump( $_GET );

	$artikels =	array(
					array(	'title'	=> 'PHP 8.4 gereleased',
							'body' 	=> 'De nieuwste versie van PHP bevat uitbreidingen op oa. mind control-facades, in-browser 3d projecties en de API voor drones.',
							'tags' 	=> 'Kernwoorden: new, PHP 8.4',
					),
					array(	'title'	=> 'Zymphovel framework',
							'body' 	=> 'Wordt Zymphovel het nieuwste PHP-framework dat de wereld in een sneltempo zal veroveren?',
							'tags' 	=> 'Kernwoorden: frameworks',
					),
					array(	'title'	=> 'Rasmus Lerdorf vermist',
							'body' 	=> 'De geestelijke vader van PHP Rasmus Lerdorf is sinds vorige week vermist nadat hij met zijn privé-jet richting Ibiza vertrok.',
							'tags' 	=> 'Kernwoorden: bizar, rasmus lerdorf',
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
