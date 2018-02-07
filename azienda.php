<?php
    include 'DBConnection.php';
    $conn=new DBConnection();
?>

<!DOCTYPE html>
<html>
    <head>
		<title>Costruzioni Bordignon S.r.l.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<meta name="description" content="Costruzioni Bordignon S.r.l., con oltre tre generazioni di storia alle spalle, opera nel settore edile residenziale, industriale, pubblico, nei restauri e nelle infrastrutture mirando ed ottenendo sempre grande apprezzamento dai suoi Clienti, grazie alla sua esperienza, dedizione e continua innovazione">
		<meta name="keywords" content="Edilizia, settore edile, Treviso, Costruzioni Bordignon">
		<meta name="author" content="Luca Ballan, Giovanni Calore">
		<link rel="stylesheet" media="screen and (min-width:1025px)" href="style/azienda/azienda_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:721px)" href="style/azienda/azienda_tablet.css">
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/azienda/azienda_mobile.css">
		<link rel="stylesheet" media="print" href="style/azienda/azienda_print.css">
	</head>
	<body>
		<!--SCRIPT-->
		<script type="text/javascript" src="script/menuScript.js"></script>

		<!-- NAVIGATION -->
		<input id='compact_menu' type='checkbox'/>
		<label id='cm_label' for='compact_menu' title='Visualizza le opzioni del menu'>
			<div class="cm_line"></div>
            <div class="cm_line"></div>
            <div class="cm_line"></div>
		</label>

        <div id="navbar">
            <a id="home_link" href="index.php"><img id="logo" src="images/logo.png" title="Vai alla pagina iniziale"></a>
            <div class="dropdown">
                <a id="menu_bt1" class="drop_button" href="azienda.php" title="Visualizza le informazioni sull'azienda">Azienda</a>
                <div id="content_menu_bt1" class="drop_content">
                    <a href="azienda.php#storia" title="Leggi la storia dell'azienda"><pre>Storia&#9&#9&gt</pre></a>
                    <a href="azienda.php#sedi" title="Visualizza le sedi in cui opera l'azienda"><pre>Sedi&#9&#9&#9&gt</pre></a>
                    <a href="azienda.php#persone" title="Visualizza gli impiegati dell'azienda"><pre>Persone&#9&#9&gt</pre></a>
                </div>
            </div>
            <div class="dropdown">
                <a id="menu_bt2" class="drop_button" href="progetti.php" title="Visualizza i progetti in cui si impegna l'azienda">Progetti</a>
                <div id="content_menu_bt2" class="drop_content">
                    <a href="progetti.php" title="Visualizza i progetti in corso"><pre>In corso&#9&#9&gt</pre></a>
                    <a href="progetti.php#terminati" title="Visualizza i progetti terminati"><pre>Terminati&#9&#9&gt</pre></a>
                </div>
            </div>
            <div class="dropdown">
                <a id="menu_bt3" class="drop_button" href="iniziative.php" title="Visualizza gli articoli sull'azienda e le certificazioni ricevute">Iniziative</a>
                <div id="content_menu_bt3" class="drop_content">
					<a href="iniziative.php#stampa" title="Leggi gli articoli che trattano dell'azienda"><pre>Stampa&#9&#9&#9&gt</pre></a>
                    <a href="iniziative.php#certificazioni" title="Visualizza le certificazioni"><pre>Certificazioni&#9&#9&gt</pre></a>
                </div>
			</div>
			<a href="lavoro.php" id="work" title="Visualizza le offerte di lavoro e fissa un colloquio con l'azienda">Lavora con noi</a>
			<a href="#div_container_contatti" id="contacts" title="Visualizza i nostri contatti, potrai chiamarci o mandare una mail per ricevere ulteriori informazioni">Contatti</a>
			<?php
				if(!isset($_SESSION['username']))
					echo "<a href='login.php' id='login' title='Accedi con le tue credenziali oppure registrati se ancora non possiedi un account'>Login</a>";
				else {
					echo "<a href='logout.php' id='login' title='Effettua il logout dal sito'>Logout</a>
						<a href='info_utente.php' id='user' title='Visualizza le informazioni relative al tuo account'>".$_SESSION['username']."</a>";
				}
				if(isset($_SESSION['admin']))
					echo "<a href='admin.php' id='admin' title='Entra nell&#39area amministrativa del sito'>Area privata</a>";
			?>
        </div>

        <!--TITLE-->
        <div id="title">La Nostra Azienda</div>
         
        <!--STORIA-->
        <div class="container">
            <div id="storia"class="subtitle">Storia</div>
            <div class="divisor"></div>
            <div id="text_storia" class="text_general">
                <div class="text">La <a href="index.php" title="home sito web azienda Costruioni Bordignon S.r.l.">Costruzioni Bordignon S.r.l.</a> nasce nel 1998, sulle orme della tradizione iniziata nei primi anni del 1900 dal nonno degli attuali titolari, e proseguita poi per mano del padre degli stessi, fino all’avvicendamento generazionale. 
                    </br></br>Nel corso di <em>tre generazioni</em> l’azienda si è continuamente distinta per la professionalità dimostrata, puntando sempre sulla qualità delle opere fornite, nel rispetto delle condizioni e dei tempi stabiliti. Grazie all’impegno di attrezzature e macchinari altamente specializzati, e al supporto di uno staff tecnico specializzato, è in grado di offrire un servizio che le permette di primeggiare nel settore. La <a href="https://it.wikipedia.org/wiki/Norme_della_serie_ISO_9000" target="_blanck" title="certificazione ISO wikipedia">certificazione di qualità ISO</a>, l'<a href="https://it.wikipedia.org/wiki/Societ%C3%A0_organismi_di_attestazione" class="link_generico" target="_black" title="certificazione SOA wikipedia">attestazione SOA</a> e
			        l'<a href="https://it.wikipedia.org/wiki/OHSAS_18001" class="link_generico" target="_blanck" title="certificazione OHSAS wikipedia">attestazione OHSAS</a> sono la conferma dell’impegno profuso al raggiungimento di livelli costruttivi all’avanguardia, che consentono di realizzare opere che vanno dai grandi complessi residenziali ed industriali, ai piccoli lavori civili che tuttavia contribuiscono ad accrescere l’esperienza, fondamentale per un continuo miglioramento professionale. 
                    </br></br>La continua qualificazione e l’incremento dell’organico permettono inoltre di rendere l’azienda sempre più <em>flessibile ed attenta</em> alle esigenze, ai particolari e agli standard richiesti dalla committenza al giorno d’oggi. 
                    </br></br>
                    <em>Puntualità, professionalità e qualità</em> sono i segni di riconoscimento che la <a href="index.php" title="home sito web azienda Costruioni Bordignon S.r.l.">Costruzioni Bordignon S.r.l.</a> si è guadagnata nel corso degli anni distinguendosi sempre, grazie soprattutto ai continui investimenti in tecnologia, attrezzatura, ricerca e sviluppo e al supporto di uno staff tecnico interno specializzato e in continuo aggiornamento. 
                    </br></br>Con tali competenze l’azienda si immette nel mercato con grande autorità, conquistando un posto di rilievo nel settore. Per soddisfare tutte le esigenze, l'azienda ha selezionato i settori di attività onde garantire al cliente qualunque servizio in modo autonomo e senza vincoli da terzi, ottenendo così il controllo diretto ed assoluto della qualità fornita ed una maggiore essibilità d’intervento. 
                    Sulla base degli insegnamenti e del <em>know now</em> di <a href="index.php" title="home sito web azienda Costruioni Bordignon S.r.l.">Costruzioni Bordignon S.r.l.</a> , nasce nel 2013 la <a href="#sedi" title="sedi Costruzioni Bordignon S.r.l.">B.G.P General Bau S.r.l.</a>  per garantire la stessa competenza, professionalità e vicinanza anche nell’esecuzione di opere site nell’area Altoatesina. 
                    </br></br>Conferma dell’alto standard qualitativo e professionale con cui le aziende si presentano nel mercato sono le certi cazioni del sistema di qualità rispondente alle <a href="https://it.wikipedia.org/wiki/Norme_della_serie_ISO_9000" target="_blanck" title="certificazione ISO wikipedia">norme UNI EN ISO 9001</a>, le <a href="https://it.wikipedia.org/wiki/Societ%C3%A0_organismi_di_attestazione" class="link_generico" target="_black" title="certificazione SOA wikipedia">certificazioni SOA</a> e la <a href="https://it.wikipedia.org/wiki/OHSAS_18001" class="link_generico" target="_blanck" title="certificazione OHSAS wikipedia">certificazione OHSAS 18001</a>, implementazione del Sistema di Gestione per la Salute e Sicurezza sul Lavoro ottentuta nel 2012. 
                    A Gennaio 2017 si è ottenuta un’ulteriore conferma della qualità e della professionalità di <a href="index.php" title="home sito web azienda Costruioni Bordignon S.r.l.">Costruzioni Bordignon S.r.l.</a>, dimostrata dall’inserimento della società nell’elenco delle imprese con Rating di Legalità, per cui ha ottenuto il punteggio di: ★++ .
                </div>
            </div>
            <div id="container_img_storia">
                <div class="container_img"><img class="img_storia"src="images/1.png" title="infrastruttura per turbina elettrica"/></div>
                <div class="container_img"><img class="img_storia"src="images/2.png" title="cantiere vecchia cava"/></div>
                <div class="container_img"><img class="img_storia"src="images/3.png" title="prime impalcature usate in azienda"/></div>
            </div>
        </div>

        <!--SEDI-->
        <div class="container">
            <div id="sedi"class="subtitle">Sedi</div>
            <div class="divisor"></div>
            <div id="introduction_text" class="text_general">
                <div class="text">
                    Le aree Costruzioni Bordignon S.r.l. e B.G.P. General Bau S.r.l. sono così suddivise:</br></br>            
                    <ul>
                        <li>
                            <span>Sede Legale Costruzioni Bordignon S.r.l.</span> - con superficie di mq 700,00 ove è ben 
                            chiara la distinzione tra i settori <em>amministrativo, tecnico, direzionale ed immobiliare con show-room</em>. 
                            Tale organizzazione permette di lavorare in armonia, in maniera 
                            indipendente e autonoma, ma nel contempo consente una stretta collaborazione costruttiva tra le parti.</br></br>
                        </li>
                        <li>
                            <span>Sede Legale General Bau S.r.l.</span> - situata nel centro di Bressanone, sede nevralgica per la gestione dei lavori nell'area altoatesina.</br></br>
                        </li>
                        <li>
                            <span>Laboratori Prove</span> - attrezzati per poter testare materiali quali inerti, cementi, componenti in cotto e finiture, nonchè provini di 
                            calcestruzzo e acciai per cemento armato per il continuo monitoraggio dei processi produttivi interni ed esterni. </br></br>
                        </li>
                        <li>
                            <span>Officine-Depositi</span> - indispensabili per poter garantire l'efficenza e la reperibilità dell'attrezzatura, in particolare meccanica ed elettronica. </br></br>
                        </li>
                        <li>
                            <span>Magazzini</span> - con superficie di mq 2.550,00 dedicati alla custodia e allo stoccaggio degli automezzi, delle macchine operatrici e dell'attrezzatura varia nelle diverse 
                            sedi aziendali, soprattutto nei periodi di trasferimento dei cantieri. </br></br>
                        </li>
                        <li> <span>Aree Scoperte</span> - con superficie di mq 12.100,00 adibite a parcheggio, lavorazione ferro,
                            stoccaggio materiali, scarico e carico merci per una maggiore efficienza operativa.</br></br>
                        </li>
                    </ul>
                    Oltre a queste strutture, fanno parte integrante dell' azienda altre sedi dislocate nel
                    territorio con funzione di supporto logistico.
                </div>
            </div>
            <div id="container_img_sedi">
                <iframe id ="map" title="mappa della sede principale Costruzioni Bordignon S.r.l."src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44522.22438841073!2d12.051779077956512!3d45.778424079105896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47793ae8658b48a7%3A0x94926af6ccab5215!2sCostruzioni+Bordignon+Srl!5e0!3m2!1sit!2sit!4v1514980483579"  frameborder="0" style="border:0" allowfullscreen></iframe>
                <img id="img_persone"src="images/sede.png"title="sede Costruzioni Bordignon S.r.l."/>
            </div>
        </div>
    
        <!--PERSONE-->
        <div class="container">
            <div id="persone"class="subtitle">Persone</div>
            <div class="divisor"></div>
            <div id="text_persone" class="text_general">
                <div class="text">
                <a href="index.php" title="home sito web azienda Costruioni Bordignon S.r.l.">Costruzioni Bordignon S.r.l.</a> è costituita sotto forma di società a responsabilità limitata il cui capitale sociale è diviso al 50% tra i due soci.
                    La società è governata attraverso un consiglio di amministrazione i cui componenti attualmente in carica sono:</br></br>
                    Geom. <span>Bordignon Paolo</span> - Presidente</br>
                    Geom. <span>Bordignon Gianantonio</span> - Vicepresidente</br>
                    </br></br>
                    È presente inoltre un collegio sindacale composto da:</br></br>
                    Dott. BASSO Ermanno – Presidente</br>
                    Dott. BAGGIO Roberto – Sindaco effettivo</br>
                    Dott. INNOCENTE Mauro – Sindaco effettivo</br>
                    Dott.ssa CARRARO Cristina – Sindaco supplente</br>
                    Dott.ssa MISCIATTELLI Alessandra – Sindaco Supplente</br>
                    </br></br>
                    <a href="index.php" title="home sito web azienda Costruioni Bordignon S.r.l.">Costruzioni Bordignon S.r.l.</a> ha inoltre le seguenti partecipazioni societarie:</br></br>
                    Bordignon Service Srl con sede a Volpago del Montello (TV) – Quota capitale partecipato 100%;</br>
                    Immobiliare Amalia Srl con sede a Volpago del Montello (TV)- Quota capitale partecipato 100%;</br>
                    B.G.P. General Bau Srl con sede a Bressanone (BZ) – Quota capitale partecipato 100%.</br></br>
                </div>
            </div>
            <div id="container_img_persone"><img id="organigramma"src="images/organigramma.png" title="organigramma aziendale"/></div>
        </div>

        <!--IMPIEGATI-->
        <div id="container_impiegati" class="container">
            <div id="impiegati" class="subtitle">Impiegati</div>
            <div class="divisor"></div>
            <div id="div_impiegati">
                <?php
                    $conn->get_impiegati_azienda();
                ?>
            </div>
        </div>

		<!--CONTATTI-->
		<div id="div_container_contatti">
			<div id="div_contatti">
				<div id="div_bordignon" class="div_contatto">
					<b>COSTRUZIONI BORDIGNON S.r.l</b></br></br>
					Via Monte Grappa,21/A</br>
					31040 Volpago del Montello(TV)</br>
					Tel : 0423 620077</br>
					Fax : 0423 620356</br></br>
					Mail : <a href="mailto:info@costruzionibordignon.it" title="Invia una mail a COSTRUZIONI BORDIGNON S.r.l.">info@costruzionibordignon.it</a>
				</div>
				<div id="div_generalbau" class="div_contatto">
					<b>B.G.P. GENERAL BAU S.r.l.</b></br></br>
					Via S. Cassiano, 2</br>
					39042 Bressanone (BZ)</br>
					Tel : 0472 838669</br>
					Fax : 0472 838669</br></br>
					Mail : <a href="mailto:info@bgpgeneralbau.com" title="Invia una mail a B.G.P. GENERAL BAU S.r.l.">info@bgpgeneralbau.com</a>
				</div>
				<div id="div_service" class="div_contatto">
					<b>BORDIGNON SERVICE S.r.l.</b></br></br>
					Corso Mazzini, 61</br>
					31044 Montebelluna (TV)</br>
					Tel : 0423 604592</br>
					Fax : 0423 247699</br></br>
					Mail : <a href="mailto:info@immobiliarebordignon.eu" title="Invia una mail a BORDIGNON SERVICE S.r.l.">info@immobiliarebordignon.eu</a>
				</div>
			</div>
		</div>

	    <!-- FOOT -->
	    <div id="div_foot">
		    <div id="div_text_foot">
			    @Copyright 2012-2017 &nbsp&nbsp&nbsp| &nbsp&nbsp&nbspCostruzioni Bordignon S.r.l &nbsp&nbsp&nbsp| &nbsp&nbsp&nbspC.F. e P.IVA 0334405269 
		    </div>
	    </div>

    </body>
</html>