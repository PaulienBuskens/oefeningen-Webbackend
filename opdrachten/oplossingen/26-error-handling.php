<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht error handling: try catch</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
			<h1>Opdracht error handling: try catch: deel 1</h1>

			<ul>
				<li>De bedoeling is om een formulier te maken waar je een code op kan ingeven. Er wordt gecontroleerd op twee dingen: of er niet geknoeid is met het POST-formulier én of de code correct is (= een lengte van 8 karakters). Wanneer een van beide niet klopt, wordt deze opgeworpen in een catch blok waar de afhandeling gebeurt en de fout wordt opgeslagen in een log-file.</li>

                <li>De layout ziet er als volgt uit:

                    <div class="facade-minimal" data-url="http://www.app.local/application.php">
                        <h1>Geef uw kortingscode op</h1>

                        <form action="#">
                            <ul>
                                <li>
                                    <label for="code">Kortingscode</label>
                                    <input type="text" id="code" name="code">
                                </li>
                            </ul>

                            <input type="submit">
                        </form>
                    </div>

                </li>
			</ul>
            

            <h1>Controle op knoeien met formulier</h1>

            <ul>
                <li>Submit het formulier, waarbij je uiteraard gebruik maakt van een <code>POST</code> methode.</li>

                <li>Voer de nodige controles uit, maar na de controle of de <code>$_POST[ 'submit' ]</code> goed is doorgekomen, doe je een extra controle om te kijken of het <code>$_POST[ 'code' ]</code> niet ontbreekt.</li>

                <li>Als het veld ontbreekt:
                    <ul>
                        <li>Dan moet dit gemonitord worden. Dit kan afgehandeld worden via een try/catch blok</li>

                        <li>Plaats een try/catch blok rond de éérste controle van de <code>$_POST[ 'submit' ]</code>.</li>

                        <li>Wanneer je ontdekt dat het veld <code>$_POST[ 'code' ]</code> ontbreekt, werp je een exception op met de error-code 'SUBMIT-ERROR'</li>

                        <li>Deze error vang je op in de <code>catch</code> blok. In deze blok gebeuren twee zaken: de error-code wordt omgezet naar een boodschap die naar de <code>$_SESSION</code> wordt doorverwezen én de boodschap wordt opgeslagen in een logfile <span class="directory-sa-file">log.txt</span></li>
                    </ul>
                </li>
            </ul>

            <h1>Catch-blok</h1>

            <ul>
                <li>
                    maak de volgende variabelen aan:
                    <ul>
                        <li><code>$messageCode</code>, deze spreekt de exception class aan en vangt de error-code </li>

                        <li><code>$message</code>, een array die de textuele boodschap en het type opvangt</li>

                        <li><code>$createMessage</code>, een boolean die standaard op <code>FALSE</code> staat en beslist of er een boodschap in de session geplaatst moet worden</li>
                    </ul>
                </li>

                <li>Maak vervolgens een <code>switch</code> aan die controleert of de <code>$messageCode</code> gelijk is aan 'SUBMIT-ERROR'</li>

                <li>Als dit zo is, dan moet de <code>$message[ 'type' ]</code> op error gezet worden en de <code>$message['text']</code> de boodschap "Er werd met het formulier geknoeid"</li>

                <li>Na de <code>switch</code> voeg je de aanspreking van de functie <code>logToFile()</code> aan en geef je de <code>$message</code> array mee als argument</li>
            </ul>

            <h1>Log to file-functie</h1>

            <ul>
                <li>Maak een functie aan <code>logToFile()</code>, deze staat in voor het opslagen van de errors in de <span class="directory-sa-file">log.txt</span></li>

                <li>Een fout wordt in het volgende formaat weergegeven: <code>[11:12:53 08/08/2015] - 127.0.0.1 - type:[error] Kortingscode is niet correct</code></li>

                <li>Welke data wordt er allemaal bijgehouden in de log?
                    <ul>
                        <li>het uur en de datum</li>
                        <li>het IP-adres</li>
                        <li>het type van fout</li>
                        <li>de foutboodschap zelf</li>
                    </ul>
                </li>

                <li>Zoek zelf op hoe je aan deze informatie kan geraken om ze daaran in de string te steken</li>

                <li>Voeg deze string toe aan het einde van de <span class="directory-sa-file">log.txt</span></li>

                <li>Probeer elke log-regel op een nieuwe lijn te krijgen. Dit kan je doen door op het einde van elke regel de volgende karakters toe te voegen: <code>\n\r</code>. Dit betekent new line of return, de code voor een enter dus. Deze zijn verschillend voor Mac (<code>\n</code>) & Win (<code>\r</code>), vandaar de twee codes. Deze codes moeten kerkwaardig genoeg ook tussen double quotes<code>""</code> en werken niet wanneer ze met single quotes <code>''</code> worden aangeduid</li>
            </ul>

            <h1>Controle op kortingscode</h1>

            <ul>
                
                <li>Ga verder met de controle op de kortingscode in de try/catchblok.</li>

                <li>Controleer of de kortingscode 8 karakters telt</li>

                <li>Als dit het geval is:
                    <ul>
                        <li>Maak een configuratie-variabele aan <code>$isValid</code>, deze staat bovenaan je code gedefiniëerd en staat standaard op <code>FALSE</code>. Als de code 8 karakters is, wordt deze op <code>TRUE</code> gezet</li>

                        <li>Op basis van deze configuratievariabele laat je het formulier verdwijnen en toon je de tekst: "Korting toegekend!"
                        <div class="facade-minimal" data-url="http://www.app.local/application.php">
                            <h1>Geef uw kortingscode op</h1>

                            <p>Korting toegekend!</p>

                        </div>
                        </li>
                    </ul>
                </li>

                <li>Als dit niet het geval is
                    <ul>
                        <li>werp je een nieuwe exception op met de code 'VALIDATION-CODE-LENGTH'.</li>
                        <li>Werk de verdere afhandeling af in de <code>catch</code>-block</li>
                        <li>Voeg een switch case toe die controleert of waarde gelijk is aan VALIDATION-CODE-LENGTH</li>

                        <li>Als dit zo is, dan moet de <code>$message[ 'type' ]</code> op error gezet worden en de <code>$message['text']</code> de boodschap "De kortingscode heeft niet de juiste lengte"</li>

                        <li>Zet ook de <code>$createMessage</code> variabele op <code>TRUE</code></li>

                        <li>Voeg na de switch nog een controle uit op de <code>$createMessage</code> variabele. Als deze <code>TRUE</code> is, wordt de functie <code>createMessage()</code> aangesproken. Deze staat in voor het aanmaken van de message in de session. Geef hier als argument de array <code>$message</code> aan mee</li>

                        <li>Normaalgezien zou met de code die er al stond, ook hier automatisch een error-log bericht bijgehouden moeten worden. Controleer dit in <span class="directory-sa-file">log.txt</span></li>
                    </ul>
                </li>
            </ul>

            <h1>Foutboodschap tonen</h1>

            <ul>
                <li>Hiervoor zijn er twee functies nodig</li>

                <li>de functie <code>createMessage()</code>
                    <ul>
                        <li>Deze heeft een parameter <code>$message</code> die de doorgegeven argumentarray met de boodschapinformatie opvangt.</li>

                        <li>Deze bevolkt <code>$_SESSION[ 'message' ][ 'type' ]</code> en <code>$_SESSION[ 'message' ][ 'message' ]</code> met de juiste waarden.</li>

                        <li>Vergeet dus niet je <code>session_start()</code> bovenaan de code uit te voeren</li>
                    </ul>
                </li>

                <li>De functie <code>showMessage()</code>
                
                    <ul>
                        <li>Deze haalt de message-data uit de <code>$_SESSION</code> en unset daarna deze data zodat ze niet meer in de <code>$_SESSION</code> voorkomt</li>

                        <li>Als er geen message-data in de <code>$_SESSION</code> zit, returnt deze functie <code>FALSE</code></li>

                        <li>Anders wordt de message-data gereturnd</li>

                        <li>Spreek deze functie onderaan de try/catch-block aan en vang het resultaat op in een variabele. Gebruik deze variabele om een gepaste boodschap te tonen.
                            
                            <div class="facade-minimal" data-url="http://www.app.local/application.php">
                                <h1>Geef uw kortingscode op</h1>

                                <div class="modal error">De kortingscode heeft niet de juiste lengte</div>

                                <form action="#">
                                    <ul>
                                        <li>
                                            <label for="code">Kortingscode</label>
                                            <input type="text" id="code" name="code">
                                        </li>
                                    </ul>

                                    <input type="submit">
                                </form>
                            </div>
                        </li>
                    </ul>

                </li>
            </ul>
			
            <h1 class="extra">Opdracht error handling: try/catch: Deel2</h1>

            <ul>
                <li>Er zijn twee functies die instaan voor de message-afhandeling. Probeer deze te bundelen in een klasse <code>Message</code></li>
                
                <li>Maak bij het begin van de applicatie een instantie aan van deze <code>Message</code> class zodat je gebruik kan maken van de methodes <code>getMessage()</code> en <code>setMessage()</code> die je in de klasse verwerkt hebt</li>
            </ul>

            <h1 class="extra">Opdracht error handling: try/catch: Deel3</h1>

            <ul>
                <li>De <code>Exception</code> class laat het enkel toe om een string aan mee te geven.</li>

                <li>Maak een uitbreiding op de <code>Exception</code> class zodat je nu ook een array kan meegeven. Dit doe je door deze de <code>Exception</code> class extenden.</li>

                <li>In plaats van <code>throw new Exception('string')</code> is het de bedoeling dat je nu <code>throw new ExceptionImproved( $array )</code> kan uitvoeren</li>

                <li>Nu kan je zoveel data meegeven met de exceptions en deze opvangen in de catch-blok</li>

                <li>Probeer zo wanneer er een foutieve code is meegegeven, deze code aan de exception mee te geven en ze in de log-file te printen.</li>
            </ul>

		</section>

    </body>
</html>
