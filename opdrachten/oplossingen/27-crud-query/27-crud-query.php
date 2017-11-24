<?php

    $message = '';

    try{
    
    $db = new pdo('mysql:host=localhost;dbname=bieren', 'root','','bieren');


    if($db->errno > 0){

        $message = 'Kan geen connectie maken ' .$db->connect_error;

    }else{
        $message = 'connectie geslaagd';

        $sql = 'SELECT *
        FROM bieren 
        INNER JOIN brouwers
        ON bieren.brouwernr = brouwers.brouwernr
        WHERE bieren.naam LIKE "Du%"
        AND brouwers.brnaam LIKE "%a%"';

        $result = $db->query($sql);

        $statement = $db->prepare( $sql );
        
        $statement->execute( );

        $bieren	=array();
        
            while ( $row = $sql->fetch(PDO::FETCH_ASSOC)){
                    $bieren[] 	=	$row;
            }
        
            $columnNames	=	array();
            $columnNames[]	=	'Biernummer';
        
            foreach( $bieren[0] as $key => $bier ){
                    $columnNames[  ]	=	$key;
            }
    }
} catch ( PDOException $e )
{
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

        <p><?= $message ?></p>

            <tabel>
                <thead>
                <tr>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </tabel>
        
        
    </body>
</html>
