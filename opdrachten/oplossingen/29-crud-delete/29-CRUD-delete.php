<?php

        $message = false;

    if(isset($_POST['submit'])){
        try{

            $db = new PDO('mysql:host=localhost;dbname=bieren','root','');

            $brouwerSql = 'SELECT * FROM brouwers';
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CRUD delete</title>
        
    </head>
    <body class="web-backend-opdracht">

     
    </body>
</html>
