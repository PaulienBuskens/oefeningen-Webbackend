<?php

    $message = '';

    try{
    
    $db = new pdo('mysql:host=localhost;dbname=bieren', 'root','');


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
        <style>
			.modal
			{
				padding			:	6px;
				border-radius	:	3px;
			}

			.success
			{
				background-color:lightgreen;
			}

			.error
			{
				background-color:red;
			}

			.even
			{
				background-color:lightgrey;
			}
		</style>
	</head>

    <body class="web-backend-opdracht">

        <?php if ( $message ): ?>
		    <div class="modal <?= $message[ "type" ] ?>">
			    <?= $message['text'] ?>
		    </div>
    	<?php endif ?>

	<table>
		
		<thead>
			<tr>
				<?php foreach ($columnNames as $columnName): ?>
					<th><?= $columnName ?></th>
				<?php endforeach ?>
			</tr>
		</thead>

		<tbody>
		
			<?php foreach ($bieren as $key => $bier): ?>
				<tr class="<?= ( ( $key + 1) %2 == 0 ) ? 'even' : '' ?>">
					<td><?= ($key + 1) ?></td>
					<?php foreach ($bier as $value): ?>
						<td><?= $value ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
			
		</tbody>
	</table>
    </body>
</html>
