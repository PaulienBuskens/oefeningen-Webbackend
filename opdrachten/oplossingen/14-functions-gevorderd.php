<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht functies gevorderd</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht functies gevorderd: deel 1</h1>

            <ul>
                <li>Maak een global variable <code>$md5HashKey</code> met als value <code>'d1fa402db91a7a93c4f414b8278ce073'</code></li>

                <?php

                    $md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';

                ?>


                <li>Maak drie verschillende functies die de global variable <code>$md5HashKey</code> telkens op een andere manier aanspreken. </li>

                <li>Het doel van deze functie is altijd hetzelfde: tellen hoeveel procent een bepaalde parameter voorkomt in <code>$md5HashKey</code>.</li>

                <li>Spreek elke functie één keer aan, telkens met een ander argument:
                    <ul>
                        <li>Argument Functie 1: <code>'2'</code></li>
                        <li>Argument Functie 2: <code>'8'</code></li>
                        <li>Argument Functie 3: <code>'a'</code></li>
                    </ul>
                </li>

                <?php
                function functie1 ($string, $karakter){

                    //bereken de lengte van de string
                    $count =  strlen( $string );
                    
                    //bereken hoevaak het karakter in de string voorkomt
                    $karakterAantal = substr_count ( $string, $karakter );
                    
                    //bereken het percentage
                    $karakterProcent = ( $karakterAantal / $count ) * 100;
                    
                    return $karakterProcent;

                }

                function functie2 ($karakter){
                    
                    //aanspreken van de globale variabele $md5HashKey
                    GLOBAL $md5HashKey;
                    
                    $count = strlen($md5HashKey);

                    $karakterAantal = substr_count ($md5HashKey, $karakter);

                    $karakterProcent = ($karakterAantal / $count) * 100;

                    return $karakterProcent;

                }

                function functie3 ($karakter){
                                    //aanspreken van de globale variabele $md5HashKey
                        $string = $GLOBALS ['md5HashKey'];

                        $count = strlen($string);
                        
                        $karakterAantal = substr_count ($string, $karakter);
                        
                        $karakterProcent = ($karakterAantal / $count) * 100;
                        
                        return $karakterProcent;


                }

                $eersteFunctie = functie1($md5HashKey,"2");
                $tweedeFunctie = functie2("8");
                $derdeFunctie  = functie3('a');

                ?>

                <p>Het karakter "<?php echo "2"?>" komt <?php echo $eersteFunctie ?>% voor in de hash key "<?php echo $md5HashKey ?>"</p>
                <p>Het karakter "<?php echo "8"?>" komt <?php echo $tweedeFunctie ?>% voor in de hash key "<?php echo $md5HashKey ?>"</p>
                <p>Het karakter "<?php echo "a"?>" komt <?php echo $derdeFunctie ?>% voor in de hash key "<?php echo $md5HashKey ?>"</p>

            <h1 class="extra">Opdracht functies gevorderd: deel 2 (Angry Birds)</h1>

            <ul>
               
                <li>De bedoeling is om een versimpelde tekstversie van Angry Birds te maken (<a href="http://chrome.angrybirds.com/" target="_blank">http://chrome.angrybirds.com/</a>)</li>

                <li>Maak een global variable <code>$pigHealth</code> met value <code>5</code> en een global variable <code>$maximumThrows</code> met value <code>8</code></li>


                    <?php

                    $pigHealth        = 5;
                    $maximumThrows    = 8;

                    $spelverloop      = array();

                    ?>

                <li>Maak een functie <code>calculateHit</code>. Deze functie staat in voor:
                    <ul>
                        <li>Het berekenen van de raakkans (40%). Gebruik hiervoor de functie <code>rand</code>.

                        <li>Het verminderen van de <code>$pigHealth</code> variable met één van zodra er raak is geschoten.

                        <li>Het teruggeven van de string <code>'Raak! Er zijn nog maar xxx varkens over.'</code> of <code>'Mis! Nog xxx varkens in het team.'</code> naargelang het resultaat van het willekeurige getal. De xxx moet vervangen worden door het effectieve getal.
                    </li>
                </li>

                <?php

                function calculateHit (){
                    
                    $dataArray  = array();
                    $raakkans   = rand(0,9);
                    $raak       = ($raakkans <= 3) ? true : false;
                    GLOBAL $pigHealth;

                    if ($raak){
                        $pigHealth--;
                        
                        $dataArray['hit']       = true;
                        $dataArray['string']    = "Raak! Er zijn nog maar ".  $pigHealth ." varkens over.";

                    } else {
                    
                       $dataArray['hit']        = false;
                       $dataArray['string']     = "Mis! Nog ". $pigHealth ." varkens in het team.";
                    }

                    return $dataArray;

                }

                ?>

                <li>Maak een functie <code>launchAngryBird</code>. Deze functie staat in voor:
                    <ul>
                        <li>Deze functie bevat een static variable om bij te houden hoeveel keer de functie reeds is aangeroepen.

                        <li>Zolang deze static variable kleiner is dan het aantal <code>$maximumThrows</code> wordt de static variable met één vermeerderd en spreekt de functie <code>launchAngryBird</code> zichzelf weer aan.

                        <li>Van zodra de static variabele gelijk is de <code>$maximumThrows</code> wordt er gekeken of het <code>$pigHealth</code> gelijk is aan nul. Als dit het geval is moet de boodschap <code>'Gewonnen!'</code> verschijnen. Is de variable pigHealth groter dan nul verschijnt de boodschap <code>'Verloren!'</code>
                        </li>
                    </ul>
                </li>

                <?php

                function launchAngryBird(){

                    GLOBAL $pigHealth;
                    GLOBAL $maximumThrows;
                    global  $spelverloop;

                    if($maximumThrows != 0 && $pigHealth > 0){

                        $hitResult = calculateHit ();

                        $maximumThrows--;

                        $spelverloop[] = $hitResult['string'];

                        launchAngryBird();

                    } else {

                        if ($pigHealth >0){

                            $spelverloop[] = 'Helaas, je hebt verloren,';

                        } else {

                            $spelverloop[] = 'Hoera! Je hebt gewonnen!';
                        }

                    }

                }

                launchAngryBird();

                ?>

            <h1>Angry Birds</h1>

            <ul>
                <?php foreach ($spelverloop as $resultaat): ?>
                    <li><?=$resultaat?></li>
                <?php endforeach ?>
            
            </ul>
        </section>

    </body>
</html>
