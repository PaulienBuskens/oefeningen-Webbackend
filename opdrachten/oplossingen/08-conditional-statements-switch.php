<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht switch</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht switch: deel 1</h1>

            <ul>
                <li>Maak een HTML-document met een PHP code-block</li>
                <li>Maak een PHP-script dat aan de hand van een getal ( tussen 1 en 7 ) de bijhorende dag afprint in kleine letters (geen hoofdletters!)</li>
                <li>Maak gebruik van een switch en probeer alles te herschrijven i.p.v. te kopiëren.</li>
            </ul>  

            <?php

            $getal = 4;

            switch ($getal){

                case 1:
                echo "maandag";
                break;
                case 2:
                echo "dinsdag";
                break;
                case 3:
                echo "woensdag";
                break;
                case 4:
                echo "donderdag";
                break;
                case 5:
                echo "vrijdag";
                break;
                case 6:
                echo "zaterdag";
                break;
                case 7:
                echo "zondag";
                break;
                default :
                echo " Geen getal tussen 0 en 7";
                break;
            }

            ?>
        </section>

    </body>
</html>
