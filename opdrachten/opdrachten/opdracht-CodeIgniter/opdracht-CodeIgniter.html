<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CodeIgniter</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">  

    		<h1>Opdracht CodeIgniter</h1>

    		<ul>
    			<li>Deze opdracht is een herwerking van de Opdracht Security Login in CodeIgniter. Je maakt best een kopie van de Security Login database opdracht vooralleer met deze opdracht verder te gaan. Een registratiepagina is niet vereist.</li>

                <li>Het is best van dit volledig op eigen houtje proberen te herwerken, maar als je niet anders kan kan je altijd het stappenplan volgen.</li>

                <li>
                    Mappenstructuur
                    <ul class="directory">
                        <li class="folder">
                            application
                            <ul>
                                <li class="folder">
                                    controllers
                                    <ul>
                                        <li class="file">dashboard_controller.php</li>
                                        <li class="file">login_controller.php</li>
                                        <li class="file">logout_controller.php</li>
                                    </ul>

                                </li>
                                <li class="folder">
                                    models
                                    <ul>
                                        <li class="file">dashboard_model.php</li>
                                        <li class="file">login_model.php</li>
                                        <li class="file"></li>
                                    </ul>

                                </li>
                                <li class="folder">
                                    views
                                    <ul>
                                        <li class="folder">
                                            dashboard
                                            <ul>
                                                <li class="folder">
                                                    templates
                                                    <ul>
                                                        <li class="file">dashboard_footer.php</li>
                                                        <li class="file">dashboard_header.php</li>
                                                    </ul>
                                                </li>

                                                <li class="file">dashboard_index.php</li>   
                                            </ul>
                                        </li>
                                        <li class="folder">
                                            login

                                            <ul>
                                                <li class="file">login_index.php</li>
                                            </ul>
                                        </li>
                                        <li class="folder">templates

                                            <ul>
                                                <li class="file">footer.php</li>
                                                <li class="file">header.php</li>
                                            </ul>

                                        </li>
                                    </ul>

                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </li>

                <li>Pas de <span class="directory-sa-file">config/database.php</span> aan met de juiste gegevens</li>

                <li>Stel de routes in <span class="directory-sa-file">config/routes.php</span> in:

<pre>
$route['dashboard'] = "dashboard_controller";
$route['dashboard/(:any)'] = "dashboard_controller/$1";

$route['logout'] = "logout_controller";

$route['login'] = "login_controller";
$route['login/(:any)'] = "login_controller/$1";
</pre>

                </li>

    		</ul>

            <h1>Opdracht CodeIgniter: Deel 1 - views opbouwen</h1>

            <ul>
                <li>Maak een algemene <span class="directory-sa-file">views/templates/header.php</span> en <span class="directory-sa-file">views/templates/footer.php</span> aan. Deze bevatten de nodige html-elementen en best ook de woorden 'algemene header' en 'algemene footer'</li>

                <li>Doe hetzelfde voor het dashboard: <span class="directory-sa-file">views/dashboard/templates/header.php</span> en <span class="directory-sa-file">views/dashboard/templates/header.php</span> maar geef deze de titels 'dashboard header' en 'dashboard footer'</li>

                <li>Maak de <span class="directory-sa-file">views/login/login_index.php</span> pagina aan.

                    <ul>
                        <li>Dit bevat een geldig login-formulier. Vergeet niet om het formulier te openen door middel van de CI <code>form_open()</code> methode. Verwijs hierbij naar de juiste pagina (login)</li>

                        <li>Deze pagina wordt later nog gewijzigd voor validatie</li>
                    </ul>
                </li>
            </ul>

            <h1>Opdracht CodeIgniter: Deel 2 - login_controller.php</h1>

            <ul>
                <li>Vergeet niet de routes aan te passen bij het aanmaken van methodes.</li>

                <li>Deze klasse heeft een methode index.

                    <ul>
                        <li>Deze methode zet de data-titel op "Loginformulier"</li>

                        <li>Controleert of de post geset is dmv. <code>$this->input->post()</code></li>

                        <li>Als deze post geset is moet het formulier gevalideerd worden
                            <ul>
                                <li>De validatie vereist het inladen van de <code>form_validation</code> library</li>

                                <li>Zet de validatie van het emailadres op <code>required</code> en <code>valid_email</code></li>

                                <li>Zet de validatie van het paswoord op <code>required</code></li>

                                <li>Voer de validatie uit dmv <code>$this->form_validation->run()</code></li>

                                <li>Als de validatie niet correct is, moet er een standaard boodschap verschijnen ONDER de inputvelden.</li>

                                <li>Hiervoor kan je in de login_index.php gebruik maken van <code>form_error('inputname')</code> waarbij de inputname gelijk staat aan de name-value van het te controleren veld. Dit gebruik je om te controleren of er een fout heeft plaatsgevonden voor dat bepaalde inputveld.</li>

                                <li>Plaats ook de eventueel reeds ingevulde waarden terug in het veld dmv <code>set_value('inputname')</code></li>
                            </ul>
                        </li>

                        <li>Als de validatie correct is, moet gecontroleerd worden of de gebruiker juist is ingelogd (juiste pw, juiste username)</li>

                        <li>Haal hiervoor de gegevens van de gebruiker op uit de database op basis van het e-mailadres (=meegeven als argument aan een methode uit het model)</li>

                        <li>Spreek hiervoor de <span class="directory-sa-file">models/login_models.php</span> aan.</li>
                    </ul>
                </li>

            </ul>

            <h1>Opdracht CodeIgniter: Deel 3 - login_model.php</h1>

            <ul>

                <li>Deze pagina laadt de database dmv <code>$this->load->database()</code></li>

                <li>Deze pagina heeft een methode <code>getUserData()</code> die het e-mailadres als argument moet opvangen en returnt een array van alle gegevens van de gebruiker met dat specifieke e-mailadres </li>

            </ul>

            <h1>Opdracht CodeIgniter: Deel 4 - login_controller.php</h1>

            <ul>
                
                <li>Op basis van de gereturnde data van de methode <code>getUserData()</code> wordt er gecontroleerd of de user correct is ingelogd.</li>

                <li>Is dit niet het geval werk dan met flashdata om de nodige boodschappen op de juiste pagina te tonen. Vergeet daarbij niet <span class="directory-sa-file">views/login/login_index.php</span> zo aan te passen dat er eventuele foutboodschappen getoond kunnen worden.</li>

                <li>Is dit wel het geval moet er een cookie geset worden met de juiste data zoals we reeds voordien gezien hebben. Redirect daarna naar het dashboard dmv <code>UrlHelper</code></li>

            </ul>

            <h1>Opdracht CodeIgniter: Deel 5 - dashboard_controller.php</h1>

            <ul>
                
                <li>Deze pagina controleert of de cookie geset is en of de data in de cookie correct is. Je werkt nu met klasses, de validatie kan nu bv. in de <code>__construct()</code> method gebeuren zodat deze validatie wordt uitgevoerd worden iedere keer iemand naar het dashboard surft.</li>

                <li>Maak hiervoor een <span class="directory-sa-file">models/dashboard_model.php</span> aan met de methode <code>getUserData()</code> die het email als argument kan opvangen en een array returnt met de data op basis van het e-mailadres</li>

                <li>Probeer nu in de <code>index()</code> method op te vangen wat je in de constructor berekend hebt -> of de gebruiker al dan niet correct is ingelogd of niet</li>

                <li>Als de cookie niet correct geset is, moet er geredirect worden naar de logout pagina</li>

                <li>Als de cookie wel correct geset is, mag de dashboard header, dashboard index en dashboard footer getoond worden. Dit ziet er ongeveer als volgt uit:

                      <div class="facade-minimal" data-url="http://www.app.local/dashboard/">
                        
                        <p><a href="">Ingelogd als test@test.be | <a href="">uitloggen</a></p>   
                 
                        <h1>Dashboard </h1>

                        <ul>
                            <li><a href="">Overzicht van alle artikels</a></li>
                            <li><a href="">Gegevens wijzigen</a></li>
                        </ul>

                        <p>Dit is de dashboard footer</p>

                    </div>

                </li>

            </ul>

            <h1>Opdracht CodeIgniter: Deel 6 - logout_controller.php</h1>

            <ul>
                
                <li>Deze pagina heeft een <code>index()</code> method</li>
                
                <li>Staat in voor het unsetten van de cookie</li>
               
                <li>Redirect naar de login-pagina</li>

                <li>Als dit werkt kan je deze oefening eindeloos uitbreiden met JS validatie, registratie-pagina, extra dashboard-pagina's</li>
            </ul>

        </section>

    </body>
</html>
