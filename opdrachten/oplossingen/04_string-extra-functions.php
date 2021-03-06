<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht string extra functions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht string extra functions: deel 1</h1>

            <ul>
                <li>Maak een variabele <code>$fruit</code> met <code>'kokosnoot'</code> als value</li>
                <li>Bereken hoeveel karakters de variabele fruit telt, uiteraard door middel van een PHP-functie.</li>
                <li>Druk deze waarde af.</li>
                <li>Bepaal de positie van de eerste 'o' in de variabele <code>$fruit</code>. Druk deze waarde af.</li>
            </ul>

            <?php 
            $fruit = 'kokosnoot';
            $lengtefruit = strlen ($fruit);
            echo "De lengte van kokosnoot is: ";
            echo $lengtefruit;
            ?>

            <p><?php
            echo "De eerste plaats waarop 0 staat is: ";
            echo (strpos($fruit,"o"))+1;
            
            ?></p>
      
            <h1>Opdracht string extra functions: deel 2</h1>

            <ul>
                <li>Maak een variabele <code>fruit</code> met waarde <code>'ananas'</code></li>
                <li>Bepaal de positie van de laatste 'a' in de variabele <code>$fruit</code>.</li>
                <li>Druk deze waarde af.</li>
                <li>Zet het de value van de <code>$fruit</code> variable in hoofdletters enkel door gebruik te maken van een PHP-functie.</li>
            </ul>

            <?php 
                $fruit = 'ananas';

                echo "De laatste plaats waar 'a' staat is: ";
                echo (strripos($fruit,"a"))+1;

                ?>
                <p></p>

                <?php
                echo strtoupper ($fruit);
                ?>
            
      
    		<h1>Opdracht string extra functions: deel 3</h1>

    		<ul> 
                <li>Maak een variabele <code>$lettertje</code> met <code>'e'</code> als value</li>
                <li>Maak een variabele <code>$cijfertje</code> met <code>3</code> als value</li>
                <li>Maak een variabele <code>$langsteWoord</code> met <code>'zandzeepsodemineralenwatersteenstralen'</code> als value</li>
                <li>Vervang nu alle e’s in de <code>$langsteWoord</code> variable door 3's. 
                    <p class="remark">Je mag enkel gebruik maken van de variable names. De values  <code>'e'</code>, <code>'3'</code> en <code>'zandzeepsodemineralenwatersteenstralen'</code> mogen in totaal maar één keer in het php-document voorkomen.</p>
                </li>
    		</ul>

            <?php

            $lettertje = "e";
            $cijfertje = 3;
            $langsteWoord = "zandzeepsodemineralenwatersteenstralen";

            echo str_replace($lettertje,$cijfertje,$langsteWoord);
            


            ?>
        </section>

    </body>
</html>
