<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht recursive</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <style>
                img
                {
                    display:block;
                    padding:6px;
                    margin:24px auto;
                }
            </style>
        
            <h1>Opdracht recursive: deel 1</h1>

            <ul>
                <li>Een old school vraagstuk!</p>
                </li>

                <li>Hans heeft 100 000€ geërfd. Hij kan zijn geld aan de bank geven tegen een rentevoet van 8%. Als hij dat doet is hij wel verplicht om zijn geld 10 jaar op de bank te laten staan. Hans wil weten hoeveel geld hij na 10 jaar zal overhouden.</li>

                <li>Maak gebruik van een recursieve functie om te berekenen hoeveel geld Hans na 10 jaar zal overhouden</li>

                <li>Zorg er ook voor dat Hans kan ziet hoeveel zijn geld na elk jaar waard is. Rond daarbij alle getallen af naar beneden.</li>

                <li>Je mag hiervoor -voorlopig- met static variabelen werken</li>

                <li>
                    Als je je verbonden voelt met de onderstaande meme, vraag dan even wat uitleg om je op weg te helpen.
                    <img src="http://web-backend.local/img/opdracht-recursive-meme.png" alt="Math problems meme">   
                </li>

            </ul>


            <?php

                $startbedrag     = 100000;
                $rentevoet       = 8;
                $belegingstijd   = 10;

                function kapitaalBerekenen ($bedrag, $renteProcent, $looptijd){
                    
                    static $teller    = 1;
                    static $historiek = array();

                    if( $teller <= $looptijd){

                        $renteBedrag    = floor ($bedrag * ($renteProcent / 100));
                        $nieuwBedrag = $bedrag + $renteBedrag;
                        $historiek[$teller] = 'Het nieuwe bedrag bedraagt ' .$nieuwBedrag . '€ (waarvan '.$renteBedrag. '€ onze rente is)';
                         $teller++;

                         return kapitaalBerekenen($nieuwBedrag,$renteProcent,$looptijd);

                    } else {

                        return $historiek;

                    }

                }

                $winstHans =kapitaalBerekenen($startbedrag,$rentevoet,$belegingstijd);


            ?>

            <h1>winst berekenen Hans</h1>

            <ul>

                <?php foreach ($winstHans as $value): ?>
                    <li><?php echo $value ?></li>
                <?php endforeach ?>

            </ul>

           
        </section>

    </body>
</html>
