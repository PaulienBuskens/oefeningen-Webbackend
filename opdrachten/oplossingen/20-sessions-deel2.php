<?php

session_start();

    var_dump( $_POST );
	var_dump( $_SESSION );

    if ( isset( $_POST[ 'submit' ] ) )
    {
        $_SESSION['registrationData'][ 'deel1' ]['email']       =   $_POST[ 'email' ];
        $_SESSION['registrationData'][ 'deel1' ]['nickname']    =   $_POST[ 'nickname' ];
    }
    
    $registrationData[ 'deel1' ]     =   $_SESSION[ 'registrationData' ][ 'deel1' ];

    $straat      =   ( isset( $_SESSION[ 'registrationData' ][ 'deel2' ][ 'straat'] ) ) ? $_SESSION[ 'registrationData' ][ 'deel2' ][ 'straat'] : '';
    $nummer      =   ( isset( $_SESSION[ 'registrationData' ][ 'deel2' ][ 'nummer'] ) ) ? $_SESSION[ 'registrationData' ][ 'deel2' ][ 'nummer'] : '';
    $gemeente      =   ( isset( $_SESSION[ 'registrationData' ][ 'deel2' ][ 'gemeente'] ) ) ? $_SESSION[ 'registrationData' ][ 'deel2' ][ 'gemeente'] : '';
    $postcode      =   ( isset( $_SESSION[ 'registrationData' ][ 'deel2' ][ 'postcode'] ) ) ? $_SESSION[ 'registrationData' ][ 'deel2' ][ 'postcode'] : '';

?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht sessions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    </head>
    <body class="web-backend-opdracht">
        
        <h1>Opdracht sessions: deel 2</h1>

        <a href="20-sessions.php?session=destroy">Vernietig sessie</a>

        <h2>Registratiegegevens</h2>
        
        <ul>
        <?php foreach( $registrationData[ 'deel1' ] as $data => $value ):  ?>
            <li><?= $data ?>: <?= $value ?></li>
        <?php endforeach ?>
        </ul>

        <h2>Deel 2: adres</h2>

        <form action="20-sessions-deel3.php" method="POST">
            
            <ul>
                <li>
                    <label for="straat">straat</label>
                    <input type="text" id="straat" name="straat" value="<?= $straat ?>" placeholder="vul straat in"  <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "straat" ) ? 'autofocus' : '' ?>>
                </li>
                <li>
                    <label for="nummer">nummer</label>
                    <input type="text" id="nummer" name="nummer" value="<?= $nummer ?>" placeholder="vul nummer in"  <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "nummer" ) ? 'autofocus' : '' ?>>
                </li>
                <li>
                    <label for="gemeente">gemeente</label>
                    <input type="text" id="gemeente" name="gemeente" value="<?= $gemeente ?>" placeholder="vul gemeente in"  <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "gemeente" ) ? 'autofocus' : '' ?>>
                </li>
                <li>
                    <label for="postcode">postcode</label>
                    <input type="text" id="postcode" name="postcode" value="<?= $postcode ?>" placeholder="vul postcode in"  <?= ( isset( $_GET['focus'] ) && $_GET['focus'] == "postcode" ) ? 'autofocus' : '' ?>>
                </li>
            </ul>

            <input type="submit" name="submit">

        </form>
		
        
    </body>
</html>
