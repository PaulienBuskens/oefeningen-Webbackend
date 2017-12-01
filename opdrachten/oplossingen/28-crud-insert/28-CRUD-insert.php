
<?php

    $message = false;

    if(isset($_POST['submit'])){
        try{

            $db = new PDO('mysql:host=localhost;dbname=bieren','root','');

            $brouwerSql = 'INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet)
                             VALUES ( :brnaam, :adres, :postcode, :gemeente, :omzet )';
        
            $brouwerStatement = $db->prepare($brouwerSql);

            $brouwerStatement->bindValue( ':brnaam', $_POST[ 'brnaam' ] );
			$brouwerStatement->bindValue( ':adres', $_POST[ 'adres' ] );
			$brouwerStatement->bindValue( ':postcode', $_POST[ 'postcode' ] );
			$brouwerStatement->bindValue( ':gemeente', $_POST[ 'gemeente' ] );
            $brouwerStatement->bindValue( ':omzet', $_POST[ 'omzet' ] );
            
            $isAdded = $brouwerStatement->execute();
            
                        if ( $isAdded ){
                            $insertId			=	$db->lastInsertId();
                            $message['type']	=	'success';
                            $message['text']	=	'Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is ' . $insertId . '.';
                        
                        }else{
                            $message['type']	=	'error';
                            $message['text']	=	'Er ging iets mis met het toevoegen, probeer opnieuw';
                        }
            
            }
            catch ( PDOException $e ){
                $message['type']	=	'error';
                $message['text']	=	'De connectie is niet gelukt.';
                }
            }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Opdracht CRUD insert</title>

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
        
    <h1>Voeg nieuwe brouwer toe</h1>

	<?php if ( $message ): ?>
		<div class="modal <?= $message[ "type" ] ?>">
			<?= $message['text'] ?>
		</div>
	<?php endif ?>

	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		
		<ul>
			<li>
				<label for="brnaam">Brouwernaam</label>
				<input type="text" name="brnaam" id="brnaam">
			</li>
			<li>
				<label for="adres">Adres</label>
				<input type="text" name="adres" id="adres">
			</li>
			<li>
				<label for="postcode">Postcode</label>
				<input type="text" name="postcode" id="postcode">
			</li>
			<li>
				<label for="gemeente">Gemeente</label>
				<input type="text" name="gemeente" id="gemeente">
			</li>
			<li>
				<label for="omzet">Omzet</label>
				<input type="text" name="omzet" id="omzet">
			</li>
		</ul>
		
		<input type="submit" value="Voeg toe" name="submit">
	</form>

    </body>
</html>
