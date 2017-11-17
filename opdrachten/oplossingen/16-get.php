<?php

$artikels= array(

                array('titel'=> '‘Slimste Mens’-jurylid Marc-Marie moet zwijgen', 
            'datum' => '26 oktober 2017', 
            'inhoud' => 'Marc-Marie Huijbregts is even het zwijgen opgelegd. De Nederlandse cabaretier, die geregeld aanschuift in De Slimste Mens, heeft voor het eerst in 16 jaar tijd zijn theatervoorstelling moeten afzeggen omdat hij zonder stem zit.',
            'afbeelding' =>'Marc-Marie.jpg', 
            'afbeeldingbeschrijving' => 'Marc-Marie Huijbregts'),

                array('titel' => '1 op 12 kan deze aartsmoeilijke wiskundetest oplossen zonder rekenmachine. Lukt het jou?',
            'datum' => '25 oktober 2017',
            'inhoud' => 'Met een rekenmachine in de hand kunnen we het gebrek aan een wiskundeknobbel perfect negeren. Maar wat gebeurt er als we enkele simpele opgaven krijgen en die moeten oplossen zonder een toestelletje. Deze test van Playbuzz ziet er heel gemakkelijk uit, maar slechts één op de twaalf vindt alle juiste antwoorden, zo staat er op de spelletjeswebsite te lezen. Lukt het jou zonder hulpmiddelen?',
            'afbeelding' => 'rekensom.jpg',
            'afbeeldingbeschrijving' => 'aartsmoeilijke wiskunde oefeningen'

),
                array('titel' => 'Noord-Korea waarschuwt: Neem ons dreigement over waterstofbom letterlijk',
          'datum' => '26 oktober 2017',
            'inhoud' => 'De wereld moet het Noord-Koreaanse dreigement over de lancering van een waterstofbom maar beter serieus nemen. Dat heeft een hooggeplaatste functionaris gezegd in een interview met CNN. “Noord-Korea heeft altijd zijn woorden omgezet in daden.',
            'afbeelding' => 'dreigementen.jpg',
            'afbeeldingbeschrijving' => 'dreigementen in van Noord-Korea'
),
);

    $individueelArtikel     = false;
    $nietBestaandArtikel    = false;

    //controleren of de get-variabele ID geset is om een individueel artikel op te halen
    if (isset ($_GET['id'])){

        $id = $_GET['id'];

        //controleren of de opgevraagde key (=id) bestaat in de array $artikels
        if( array_key_exists($id, $artikels)){
            $artikels   = array( $artikels[$id]);
            $individueelArtikel = true;
        } else {

            $nietBestaandArtikel = true;
        }
    }
?>



<!doctype html>
<html>
    <head>
        <meta charset="utf-8">

        <?php if (!$individueelArtikel ): ?>
            <title>Oplossing get: deel1</title>
        <?php elseif ($nietBestaandArtikel): ?>
            <title>Oplossing get:deel 1 - Het artikel met id <?php echo $id ?> bestaat niet</title>
        <?php else: ?>
            <title>Oplossing get: deel1. Artikel: <?php echo $artikels[0]['title']?></title>
        <?php endif ?>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht get</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>

    <body class="web-backend-opdracht">
        
        <section class="body">

            <style>
            
            .container{
                width: 1024px;
                margin: 0 auto;
            }

            img{

                max-width: 100%;
            }

            .multiple{
                float:left;
			    width:288px;
			    margin:16px;
			    padding:16px;
			    box-sizing:border-box;
			    background-color:#7ab82c;
            }

            .multiple:nth-child(3n+1){
			    margin-left:0px;
		    }

		    .multiple:nth-child(3n){
			    margin-right:0px;
		    }

		    .single img{
			    float:right;
			    margin-left: 16px;
		    }
            </style>
        
        </section>

        <h1>oplossing get: deel1</h1>

        <pre>
            <?php //echo  var_dump($artikels) ?>
        </pre>

        <?php if (!$nietBestaandArtikel): ?>
            <div class = "container">
                <?php foreach ($artikels as $id => $artikel): ?>
                    <article class = "<?php echo ( !$individueelArtikel)? 'multiple': 'single'; ?>">
                    <h1><?php echo $artikel['titel'] ?></h1>
                    <p><?php echo $artikel['datum'] ?></p>
                    <img src="images/<?php echo $artikel['afbeelding']?>" alt=" <?php echo $artikel['afbeeldingbeschrijving']?>">
                    <p><?php echo (!$individueelArtikel) ? str_replace ( "\r\n", "</p><p>",substr($artikel['inhoud'],0,50)). '...': str_replace("\r\n", "</p><p>", $artikel['inhoud']); ?> </p>
                    <?php if ($individueelArtikel): ?>
                        <a href="oplossing-get-deel1.php?id=<?php echo $id ?>"> Lees meer</a>
                    <?php endif ?>

        </article>
            <?php endforeach ?>

            </div>

        <?php else: ?>
            <p>Het artikel met id <?php echo $id ?> bestaat niet. Probeer een ander artikel. </p>
        <?php endif ?>
    </body>
</html>
