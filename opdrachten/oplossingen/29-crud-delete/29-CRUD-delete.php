<?php

        $message        = false;
        $deleteConfirm  = false;
        $deleteId       = false;

        try{

            $db = new PDO('mysql:host=localhost;dbname=bieren','root','');

            if(isset($_POST['confirm'])){
                $deleteConfirm = true;
                $deleteId      = $_POST['confirm'];
            }

            if(isset($_POST['delete'])){
            $deleteSql = 'DELETE FROM brouwers
                           WHERE brouwernr = :brouwernr';
            
            $deleteStatement = $db->prepare( $deleteSql );
            
            $deleteStatement->bindValue( ':brouwernr', $_POST['delete'] );
            
            $isDeleted 	=	$deleteStatement->execute();
            
            if ( $isDeleted ){
                $message['type']	=	'success';
                $message['text']	=	'Deze record is succesvol verwijderd.';
            } else {
                $message['type']	=	'error';
                $message['text']	=	'Deze record kon niet verwijderd worden. Reden: ' . $deleteStatement->errorInfo()[2];
                }
            }

            $brouwersSql	=	'SELECT * 
            FROM brouwers';

            $brouwersStatement = $db->prepare( $brouwersSql );

            $brouwersStatement->execute();

            $brouwersFieldnames	=	array();

            for ( $fieldNumber = 0; $fieldNumber < $brouwersStatement->columnCount(); ++$fieldNumber ){
                  $brouwersFieldnames[]	=	$brouwersStatement->getColumnMeta( $fieldNumber )['name'];
                }


            $brouwers	=	array();

            while( $row = $brouwersStatement->fetch( PDO::FETCH_ASSOC ) ){
                    $brouwers[]	=	$row;
                    }
            }
        catch ( PDOException $e ){
            $message['type']	=	'error';
            $message['text']	=	'De connectie is niet gelukt.';
            }
        
?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CRUD delete</title>
        
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

			.delete-button
			{
				background-color	:	transparent;
				border				:	none;
				padding				:	0px;
				cursor				:	pointer;
			}
        </style>
        
    </head>
    <body class="web-backend-opdracht">

    <?php if ( $message ): ?>
    <div class="modal <?= $message[ "type" ] ?>">
        <?= $message['text'] ?>
    </div>
<?php endif ?>	

<?php if ( $deleteConfirm ): ?>
    <div>
        Bent u zeker dat u deze record wilt verwijderen?
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

            <button type="submit" name="delete" value="<?= $deleteId ?>">
                verwijder maar
            </button>

            <button type="submit">
                Toch maar niet
            </button>

        </form>
    </div>
<?php endif ?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <table>
        
        <thead>
            <tr>
                <th>#</th>
                <?php foreach ($brouwersFieldnames as $fieldname): ?>
                    <th><?= $fieldname ?></th>
                <?php endforeach ?>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($brouwers as $key => $brouwer): ?>
                <tr class="<?= ( ($key+1)%2 == 0 ) ? 'even' : ''  ?> <?= ( $brouwer['brouwernr'] === $deleteId ) ? 'confirm-delete' : ''  ?>">
                    
                    <td><?= ++$key ?></td>

                    <?php foreach ($brouwer as $value): ?>
                        <td><?= $value ?></td>
                    <?php endforeach ?>
                    <td>
                        <button type="submit" name="confirm" value="<?= $brouwer['brouwernr'] ?>" class="delete-button">
                            <img src="icon-delete.png" alt="Delete button">
                        </button>
                    </td>
                </tr>
            <?php endforeach ?>
            
        </tbody>

    </table>
</form>

     
    </body>
</html>
