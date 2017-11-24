<?php

    $message = '';

    try{
    
    $db = new pdo('mysql:host=localhost;dbname=bieren', 'root','');


        $sql = 'SELECT brnaam, brouwernr FROM brouwers';

        $result = $db->query($sql);

        $statement = $db->prepare( $sql );
        
        $statement->execute( );

        $bieren	=array();
        
            while ( $row = $result->fetch(PDO::FETCH_ASSOC)){
                    $bieren[] 	=	$row;
            }
        
            $columnNames	=	array();
            $columnNames[]	=	'Biernummer';
        
            foreach( $bieren[0] as $key => $bier ){
                    $columnNames[  ]	=	$key;
            }

    }catch ( PDOException $e ){
    $message['type']	=	'error';
    $message['text']	=	'De connectie is niet gelukt.';
    }

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CRUD query</title>
       
	</head>

    <body class="web-backend-opdracht">

    </body>
</html>
