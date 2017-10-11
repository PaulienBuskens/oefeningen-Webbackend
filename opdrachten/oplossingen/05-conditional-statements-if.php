<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht conditional statements</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht conditional statements: deel 1</h1>

            <ul>
                <li>Maak een HTML-document met een PHP code-block</li>
                <li>Maak een PHP-script dat aan de hand van een getal ( tussen 1 en 7 ) de bijhorende dag afprint in kleine letters (geen hoofdletters!)</li>
                <li>Bijvoorbeeld, wanneer <code>$getal</code> gelijk is aan 1 dan wordt de string <code>'maandag'</code> op het scherm getoond</li>
            </ul>  

            <?php
                $getal = 1;
                $dag = "";
                if ($getal == 1){
                    
                   echo $dag = "maandag";

                }

            ?>

    		<h1 class="extra">Opdracht conditional statements: deel 2</h1>

    		<ul>
                <li>Maak een kopie van deel 1</li>
    			<li>Zet de naam van de dag (bv <code>'maandag'</code>) doormiddel van een string-functie dan naar hoofdletters om (bv <code>'MAANDAG'</code>).</li>
                <li>Zet alle letters in hoofdletters, behalve de 'a'</li>
                <li>Zet alle letters in hoofdletters, behalve de laatste 'a'</li>
    		</ul>


            <?php
                $getal = 1;
                $dag = "";
                if ($getal == 1){
                    
                   echo $dag = "maandag";
                   
                }
                if ($getal == 2){

                    echo $dag = "dinsdag";
                }
                if ($getal == 3){
                    
                   echo $dag = "woensdag";
                   
                }
                if ($getal == 4){

                    echo $dag = "donderdag";
                }
                if ($getal == 5){
                    
                   echo $dag = "vrijdag";
                   
                }
                if ($getal == 6){

                    echo $dag = "zaterdag";
                }
                if ($getal == 7){

                    echo $dag = "zondag";
                }
                ?>

                <p></p>
                <?php

                echo $dag =	strtoupper( $dag ); //Zet naar uppercase
                //$dag 	=	str_replace( 'A', 'a' , $dag );
                $laatsteAPos = strrpos( $dag, 'A' );   //Geef de positie van de laatste 'A';
                ?>
                <p></p>

                <?php

                echo $dag =	substr_replace( $dag, 'a', $laatsteAPos, 1 );   //Vervangt 'A' met 'a'
            ?>

        </section>

    </body>
</html>
