<h1>Opdracht recursive: deel 2</h1>

            <ul>
                <li>Probeer nu de statics (moest je die gebruikt hebben), volledig weg te werken zodat je op dezelfde pagina voor meerdere personen een individueel interestplan kan berekenen</li>

                <li>Je kan hiervoor de statics verplaatsen naar een paramter, of je kan, zoals in JavaScript vaak het geval is, alle parameters in een array steken en deze array als parameter opgeven in de functie.</li>

                <li>Op het einde van de berekening krijg je dan de volledige array met alle informatie terug.</li>
            </ul>

            <?php



                $startbedrag     = 100000;
                $rentevoet       = 8;
                $belegingstijd   = 10;

                function kapitaalBerekenen ($dataArray){
                    

                    if( $dataArray['teller'] <= $dataArray ['looptijd']){

                        $renteBedrag    = floor ($dataArray['bedrag'] * ($dataArray['renteProcent'] / 100));
                        $dataArray['kapitaal'] += $renteBedrag;
                        $dataArray ['historiek'][$dataArray ['teller']] = 'Het nieuwe bedrag bedraagt ' .$dataArray ['nieuwBedrag'] . '€ (waarvan '.$renteBedrag. '€ onze rente is)';
                        $DataArray ['teller']++;

                         return kapitaalBerekenen($dataArray);

                    } else {

                        return $dataArray;

                    }

                }

                $winstHans =kapitaalBerekenen(array('bedrag' =>$startbedrag, 'renteProcent' => $rentevoet,'looptijd'=>$belegingstijd,'teller' =>1, 'historiek'=> array()));


            ?>

            <h1>winst berekenen Hans</h1>

            <ul>

                <?php foreach ($winstHans as $value): ?>
                    <li><?php echo $value ?></li>
                <?php endforeach ?>

            </ul>