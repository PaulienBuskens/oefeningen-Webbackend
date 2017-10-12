<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht for</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

        <style>
            .oneven
            {
                background-color    :   lightgreen;
            }
        </style>

            <h1>Opdracht for: deel 1</h1>

            <ul>

                <li>Bouw een <code>&lt;table&gt;</code> door gebruik te maken van een for-loop.</li>

                <li>Maak een variabele <code>$rijen</code> met waarde <code>10</code> en maak een variabele <code>$kolommen</code> met waarde <code>10</code>.</li>

                <li>
                    Probeer eerst 10 rijen in de <code>&lt;table&gt;</code> te tonen. Plaats hier voorlopig één kolom met het woordje rij in. Het resultaat ziet er ongeveer als volgt uit:

                    <div class="facade-minimal" data-url="http://www.app.local/index.php">
                    
                    </div>

                    <?php

                    $rijen = 10;
                    $kolommen = 10;

                    ?>
                <table>
                    <?php for ( $i = 0; $i < $rijen; $i++): ?>
                        <tr>
                            
                                <td>rij</td>
                             
                        </tr>
                    <?php endfor; ?>
                </table>
                

                </li>

                <li>Werk verder met een geneste for-loop om de kolommen weer te geven.</li>

                <li>
                    Vervang de <code>&lt;td&gt;rij&lt;td&gt;</code> in je code door een for-loop die 10 kolommen zal afdrukken. Plaat hierin telkens het woord "kolom". Het resultaat ziet er ongeveer als volgt uit:

                     <div class="facade-minimal" data-url="http://www.app.local/index.php">
                        
                       
                    </div>
                </li>

                <table>
                    <?php for ( $i = 0; $i < $rijen; $i++): ?>
                        <tr>
                            <?php for ( $j = 0; $j < $kolommen; $j++): ?>
                                <td>kolom</td>
                             <?php endfor; ?>
                        </tr>
                    <?php endfor; ?>
                </table>

            </ul> 
            
            <h1>Opdracht for: deel 2</h1>

            <ul>

                <li>Maak een <code>&lt;table&gt;</code> met daarin de tafels van 0 tot 10 naast elkaar.
                
                    <div class="facade-minimal" data-url="http://www.app.local/index.php">
                        
                    <table>
			            <?php for( $t = 0; $t < 10 ; ++$t ):  ?>
				
				            <tr>	
					            <?php for( $p = 1; $p <= 10; $p++ ):  ?>
						            <td class="<?= ( ( $t * $p ) % 2 > 0 ) ? 'oneven' : '' ?>"><?= $t * $p ?></td>
					            <?php endfor ?>
				            </tr>
			            <?php endfor ?>
		            </table>
                    </div>
                    
                </li>

                <li>Werk verder op het vorige deel.</li>

                <li>
                    Zorg er nu voor dat de cellen met oneven getallen een groene achtergrond krijgen, maak hiervoor gebruik van een css klasse en geen inline styles. 
                    <span class="tip">Werk met een shorthand if-statement</span>
                </li>                

            </ul> 

        <h1 class="extra">Opdracht for: deel3 - uitbreiding</h1>

        <ul>
            <li>Uitbreiding: zorg er nu voor dat er bovenaan in de PHP-logica een multi-dimensionele array wordt aangemaakt met alle nodige data van de tafels. Deze ziet er uiteindelijk als volgt uit:
                
                <ul class="array-notation pre"></ul>
                

                

            </li>

            <li>
                Loop in de HTML deze data uit met een foreach-loop. De value van de eerste foreach-loop zal opnieuw een array zijn, dus: opnieuw een geneste foreach-loop.
            </li>
        </ul>

        <h1 class="extra">Opdracht for: deel4 - uitbreiding</h1>

        <ul>
            
            <li>Maak een <code>&lt;thead&gt;</code> aan en plaats in een <code>&lt;th&gt;</code>  op de eerste kolom het woord "tafel" en op de volgende kolommen de producten waarmee de tafel wordt vermenigvuldigd.</li>

            <li>Zorg ervoor dat in de <code>&lt;tbody&gt;</code> op de eerste <code>&lt;td&gt;</code> de tafel komt te staan en op de volgende <code>&lt;thead&gt;</code>'s het product van de tafel.</li>

            <li>
                Het resultaat ziet er ongeveer als volgt uit:

                <div class="facade-minimal" data-url="http://www.app.local/index.php">
                        
                    <table>
                
                        <thead>
                            <th>Tafel</th>
                            <th>0</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>        
                        </thead>

                        <tbody>
                            <tr>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            
                            <tr>
                                <td>1</td>
                                <td>0</td>
                                <td class="oneven">1</td>
                                <td>2</td>
                                <td class="oneven">3</td>
                                <td>4</td>
                                <td class="oneven">5</td>
                                <td>6</td>
                                <td class="oneven">7</td>
                                <td>8</td>
                                <td class="oneven">9</td>
                                <td>10</td>
                            </tr>
                            
                            <tr>
                                <td>2</td>
                                <td>0</td>
                                <td>2</td>
                                <td>4</td>
                                <td>6</td>
                                <td>8</td>
                                <td>10</td>
                                <td>12</td>
                                <td>14</td>
                                <td>16</td>
                                <td>18</td>
                                <td>20</td>
                            </tr>
                            
                            <tr>
                                <td>3</td>
                                <td>0</td>
                                <td class="oneven">3</td>
                                <td>6</td>
                                <td class="oneven">9</td>
                                <td>12</td>
                                <td class="oneven">15</td>
                                <td>18</td>
                                <td class="oneven">21</td>
                                <td>24</td>
                                <td class="oneven">27</td>
                                <td>30</td>
                            </tr>

                            <tr>
                                <td>4</td>   
                                <td>0</td>
                                <td>4</td>
                                <td>8</td>
                                <td>12</td>
                                <td>16</td>
                                <td>20</td>
                                <td>24</td>
                                <td>28</td>
                                <td>32</td>
                                <td>36</td>
                                <td>40</td>
                            </tr>
                                                    
                            <tr>
                                <td>5</td>    
                                <td>0</td>
                                <td class="oneven">5</td>
                                <td>10</td>
                                <td class="oneven">15</td>
                                <td>20</td>
                                <td class="oneven">25</td>
                                <td>30</td>
                                <td class="oneven">35</td>
                                <td>40</td>
                                <td class="oneven">45</td>
                                <td>50</td>
                            </tr>
                                                        
                            <tr>
                                <td>6</td>    
                                <td>0</td>
                                <td>6</td>
                                <td>12</td>
                                <td>18</td>
                                <td>24</td>
                                <td>30</td>
                                <td>36</td>
                                <td>42</td>
                                <td>48</td>
                                <td>54</td>
                                <td>60</td>
                            </tr>
                                                        
                            <tr>
                                <td>7</td>    
                                <td>0</td>
                                <td class="oneven">7</td>
                                <td >14</td>
                                <td class="oneven">21</td>
                                <td>28</td>
                                <td class="oneven">35</td>
                                <td>42</td>
                                <td class="oneven">49</td>
                                <td>56</td>
                                <td class="oneven">63</td>
                                <td>70</td>
                            </tr>
                                                        
                            <tr>
                                <td>8</td>    
                                <td>0</td>
                                <td>8</td>
                                <td>16</td>
                                <td>24</td>
                                <td>32</td>
                                <td>40</td>
                                <td>48</td>
                                <td>56</td>
                                <td>64</td>
                                <td>72</td>
                                <td>80</td>
                            </tr>
                                                        
                            <tr>
                                <td>9</td>    
                                <td>0</td>
                                <td class="oneven">9</td>
                                <td>18</td>
                                <td class="oneven">27</td>
                                <td>36</td>
                                <td class="oneven">45</td>
                                <td>54</td>
                                <td class="oneven">63</td>
                                <td>72</td>
                                <td class="oneven">81</td>
                                <td>90</td>
                            </tr>
                                                        
                            <tr>
                                <td>10</td>
                                <td>0</td>
                                <td>10</td>
                                <td>20</td>
                                <td>30</td>
                                <td>40</td>
                                <td>50</td>
                                <td>60</td>
                                <td>70</td>
                                <td>80</td>
                                <td>90</td>
                                <td>100</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </li>
        </ul>

        </section>

    </body>
</html>
