<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht if else</title> 
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht if else: deel 1</h1>

            <ul>
                <li>Maak een PHP-script dat kan bepalen of de variabele 'jaartal' al dan niet een schrikkeljaar is
                    <ul>
                        <li>Een jaar is een schrikkeljaar als het deelbaar is door 4.</li>
                        <li>Een jaar is géén schrikkeljaar als het deelbaar is door 100, TENZIJ het wel deelbaar is door 400.</li>
                    </ul>
                </li>
            </ul>  

            <?php
                $jaartal = 2017;
                $schrikkeljaar = false;


                if ((($jaartal % 4 == 0) && ($jaartal % 100 != 0)) || ($jaartal % 400 == 0 )){

                 $schrikkeljaar = true;

                } else {

                 $schrikkeljaar = false;
                }

                if ($schrikkeljaar == true){

                    echo "Schrikkeljaar";

                } else {

                    echo "Geen schrikkeljaar";

                }


            ?>



    		<h1 class="extra">Opdracht if else: deel 2</h1>

    		<ul>
                <li>Maak een PHP-script dat achterhaalt hoeveel volledige jaren, maanden, weken, dagen, uren, minuten en seconden er in een gegeven aantal seconden zit (bv. 221108521). Hoeft niet met if-statement.</li>

                <li>
                    Ga er van uit dat een maand 31 dagen kent en een jaar 365 dagen. Het resultaat ziet er ongeveer als volgt uit:
                    
                    <div class="facade-minimal" data-url="http://www.app.local/index.php">
                        
                        <h1>Jaren, maanden, weken, dagen, uren, minuten en seconden</h1>

                        <p>in 221108521 seconden</p>

                        <ul>
                            <li>minuten: 3685142</li>
                            <li>uren: 61419</li>
                            <li>dagen: 2559</li>
                            <li>weken: 365</li>
                            <li>maanden (31): 82</li>
                            <li>jaren (365): 7</li>
                        </ul>
                    </div>

                    <?php

                    // Aantal seconden in ...    
                     $minuut         =   60; 
                     $uur            =   60 * $minuut; 
                     $dag            =   24 * $uur; 
                     $week           =   7 * $dag; 
                     $maand          =   31 * $dag; 
                     $jaar           =   365 * $dag; // officieel 365.2425 
  
                     $gegevenSeconden    =   221108521; 
          
                     $aantalMinuten  =   floor( $gegevenSeconden / $minuut ); 
                     $aantalUren     =   floor( $gegevenSeconden / $uur );    
                     $aantalDagen    =   floor( $gegevenSeconden / $dag ); 
                     $aantalWeken    =   floor( $gegevenSeconden / $week ); 
                     $aantalMaanden  =   floor( $gegevenSeconden / $maand ); 
                     $aantalJaren    =   floor( $gegevenSeconden / $jaar ); 

                    ?>

                </li>
    		</ul>

        </section>

    </body>
</html>
