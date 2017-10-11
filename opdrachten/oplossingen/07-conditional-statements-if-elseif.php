<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht if else if</title> 
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht if else if: deel 1</h1>

            <ul>
                <li>Maak een getal met een waarde tussen 1-100</li>
                <li>Zorg ervoor dat het script kan zeggen tussen welke tientallen het getal ligt, bv 'Het getal ligt tussen 20 en 30'.</li>
                <li>Zorg er vervolgens voor dat de boodschap omgekeerd afgedrukt wordt, bv '03 ne 02 nessut tgil lateg teH'.</li>
            </ul>  


            <?php

            $getal = 55;

            if ($getal < 10){
                
                echo strrev ("Het getal ligt tussen 0 en 10.");

            } elseif (10 < $getal  && $getal < 20){

                echo strrev ("Het getal ligt tussen 10 en 20.");
            } elseif (20<$getal && $getal < 30){
                
                echo strrev ("Het getal ligt tussen 20 en 30.");
            }elseif (30<$getal && $getal < 40){
                
                 echo strrev ("Het getal ligt tussen 30 en 40.");
            } elseif (40<$getal && $getal < 50){
                
                 echo strrev ("Het getal ligt tussen 40 en 50.");
            } elseif (50<$getal && $getal < 60){
                                
                 echo strrev ("Het getal ligt tussen 50 en 60.");
            } elseif (60<$getal && $getal < 70){
                                                
                 echo strrev ("Het getal ligt tussen 60 en 70.");
            } elseif (70<$getal && $getal < 80){
                
                 echo strrev ("Het getal ligt tussen 70 en 80.");
            } elseif (80<$getal && $getal < 90){
                                
                 echo strrev ("Het getal ligt tussen 80 en 90.");
            } else {

                echo strrev ("Het getal ligt tussen 90 en 100.");
            }


            ?>
        
        </section>

    </body>
</html>
