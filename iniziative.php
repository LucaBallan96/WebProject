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
		<link rel="stylesheet" media="screen and (min-width:1025px)" href="style/iniziative/iniziative_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:721px)" href="style/iniziative/iniziative_tablet.css">	
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/iniziative/iniziative_mobile.css">	
		<link rel="stylesheet" media="print" href="style/iniziative/iniziative_print.css">
	</head>
	<body>
		<!--SCRIPT-->
		<script type="text/javascript" src="script/menuScript.js"></script>

		<!-- NAVIGATION -->
		<input id='compact_menu' type='checkbox'/>
		<label id='cm_label' for='compact_menu'>
			<div class="cm_line"></div>
            <div class="cm_line"></div>
            <div class="cm_line"></div>
		</label>

        <div id="navbar">
            <a id="home_link" href="index.php"><img id="logo" src="images/logo.png"></a>
            <div class="dropdown">
                <a id="menu_bt1" class="drop_button" href="azienda.php">Azienda</a>
                <div id="content_menu_bt1" class="drop_content">
                    <a href="azienda.php#storia"><pre>Storia&#9&#9&gt</pre></a>
                    <a href="azienda.php#sedi"><pre>Sedi&#9&#9&#9&gt</pre></a>
                    <a href="azienda.php#persone"><pre>Persone&#9&#9&gt</pre></a>
                </div>
            </div>
            <div class="dropdown">
                <a id="menu_bt2" class="drop_button" href="progetti.php">Progetti</a>
                <div id="content_menu_bt2" class="drop_content">
                    <a href="progetti.php"><pre>In corso&#9&#9&gt</pre></a>
                    <a href="progetti.php#terminati"><pre>Terminati&#9&#9&gt</pre></a>
                </div>
            </div>
            <div class="dropdown">
                <a id="menu_bt3" class="drop_button" href="iniziative.php">Iniziative</a>
                <div id="content_menu_bt3" class="drop_content">
					<a href="iniziative.php#stampa"><pre>Stampa&#9&#9&#9&gt</pre></a>
                    <a href="iniziative.php#certificazioni"><pre>Certificazioni&#9&#9&gt</pre></a>
                </div>
			</div>
			<a href="lavoro.php" id="work">Lavora con noi</a>
			<a href="#div_container_contatti" id="contacts">Contatti</a>
			<?php
				if(!isset($_SESSION['username']))
					echo "<a href='login.php' id='login'>Login</a>";
				else {
					echo "<a href='logout.php' id='login'>Logout</a>
						<a href='info_utente.php' id='user'>".$_SESSION['username']."</a>";
				}
				if(isset($_SESSION['admin']))
					echo "<a title='Area privata' href='admin.php' id='admin'>Area privata</a>";
			?>
        </div>

        <!--STAMPA-->
        <div id="stampa" class="title">Rassegna Stampa</div>
        <?php 
            $conn->get_articles();
        ?>
        
        <!--CERTIFICAZIONI-->
        <div id="certificazioni" class="title">Certificazioni</div>
		<div class="container_certificazioni">
			<div id="text_certificazioni">
				<div id="text_c">
					Puntualità, professionalità e qualità sono i segni di riconoscimento che <a href="index.php" class="link_generico" title="home sito web azienda Costruioni Bordignon S.r.l.">Costruzioni Bordignon s.r.l.</a> si è guadagnata nel corso degli anni distinguendosi sempre, grazie soprattutto ai continui investimenti in tecnologia, attrezzatura, ricerca e sviluppo e al supporto di uno staff tecnico interno specializzato e in continuo aggiornamento.</br></br>
					Con tali competenze l’azienda si immette nel mercato con grande autorità, conquistando un posto di rilievo nel settore. Al fine di soddisfare tutte le esigenze, <a href="index.php" class="link_generico" title="home sito web azienda Costruioni Bordignon S.r.l.">Costruzioni Bordignon s.r.l.</a> ha selezionato i settori di attività onde garantire al cliente qualunque servizio in modo autonomo e senza vincoli da terzi, ottenendo così il controllo diretto ed assoluto della qualità fornita ed una maggiore flessibilità d’intervento.</br></br>
					Sulla base degli insegnamenti e del know now di <a href="index.php" class="link_generico" title=" home sito web azienda Costruioni Bordignon S.r.l.">Costruzioni Bordignon s.r.l.</a>, nasce nel 2013 <a href="azienda.php#sedi" class="link_generico"title="sedi Costruzioni Bordignon S.r.l.">B.G.P General Bau S.r.l.</a> per garantire la stessa competenza, professionalità e vicinanza anche nell’esecuzione di opere site nell’area Altoatesina.</br></br>
					Conferma dell’alto standard qualitativo e professionale con cui le aziende si presentano nel mercato sono le certificazioni del sistema di qualità rispondente alle norme <a href="https://www.uni.com/" class="link_generico" target="_blanck" title="sito ufficiale UNI">UNI EN ISO</a> 9001:2008, le Certificazioni <a href="https://it.wikipedia.org/wiki/Societ%C3%A0_organismi_di_attestazione" class="link_generico" target="_blanck" title="certificazione SOA wikipedia">SOA</a> e la certificazione<a href="https://it.wikipedia.org/wiki/OHSAS_18001" class="link_generico" target="_blanck" title="certificazione OHSAS wikipedia"> OHSAS</a> 18001, implementazione del Sistema di Gestione per la Salute e Sicurezza sul Lavoro ottenuta nel 2012.
				</div>
			</div>
			<div id="image_certificazioni"></div>
			<div id="storia" class="subtitle">Certificazioni Costruzioni Bordignon S.r.l.</div>
			<div class="divisor"></div>
			<div id="container_img_cb">
				<div class="cont_img_cert"><a class="a_img" href="images/iso.jpeg" ><img class="img_certification" src="images/iso.jpeg" title=" certificazione iso"/></a></div>
				<div class="cont_img_cert"><a class="a_img" href="images/ohsas.jpeg" ><img class="img_certification" src="images/ohsas.jpeg" title="certificazione ohsas"/></a></div>
				<div class="cont_img_cert"><a class="a_img" href="images/soa.jpeg" ><img class="img_certification" src="images/soa.jpeg" title="certificazione soa"/></a></div>
			</div>
			<div id="cont_cert">
				<div id="text_cert">
					UNI EN ISO 9001:2015 – Sistema di gestione per la qualità – Certificato n° FM591568</br></br>
					OHSAS 18001:2007 – Sistema di gestione per la salute e la sicurezza  – Certificato n° OHS 591569</br></br>
					ATTESTAZIONE SOA – Certificato n° 48249/10/00</br></br>
					<div id="storia" class="subtitle">Categorie SOA</div>
					<div class="divisor"></div>
					OG1 Edifici civili e industriali. – Classifica VIII°</br></br>
					OG2 Restauro e manutenzione dei beni immobili. – Classifica III° Bis</br></br>
					OG3 Strade, autostrade, ponti, viadotti, ferrovie, metropolitane. – Classifica V°</br></br>
					OG6 Acquedotti, gasdotti, oleodotti, opere di irrigazione e di evacuazione. – Classifica V°</br></br>
					OG8 Opere fluviali, di difesa, di sistemazione idraulica e di bonifica. – Classifica II°</br></br>
					OG11 Impianti tecnologici. – Classifica I°</br></br>
					OS6 Finiture di opere generali in materiali lignei, plastici, metallici e vetrosi. – Classifica V°</br></br>
					OS7 Finitura di opere generali di natura edile. – Classifica II°</br></br>
					OS8 Opere di impermeabilizzazione. – Classifica II°</br></br>
					OS23 Demolizioni di opere. – Classifica I°</br></br>
					OS28 Impianti termici e di condizionamento. – Classifica II°</br></br>
					OS30 Impianti interni elettrici, telefonici, radiotelefonici e televisivi. – Classifica III°</br></br>
				</div>
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
					Mail : <a href="mailto:giovannicalore96@gmail.com">giovannicalore96@gmail.com</a>
				</div>
				<div id="div_generalbau" class="div_contatto">
					<b>B.G.P. GENERAL BAU S.r.l.</b></br></br>
					Via S. Cassiano, 2</br>
					39042 Bressanone (BZ)</br>
					Tel : 0472 838669</br>
					Fax : 0472 838669</br></br>
					Mail : <a href="mailto:giovannicalore96@gmail.com">giovannicalore96@gmail.com</a>
				</div>
				<div id="div_service" class="div_contatto">
					<b>BORDIGNON SERVICE S.r.l.</b></br></br>
					Corso Mazzini, 61</br>
					31044 Montebelluna (TV)</br>
					Tel : 0423 604592</br>
					Fax : 0423 247699</br></br>
					Mail : <a href="mailto:giovannicalore96@gmail.com">giovannicalore96@gmail.com</a>
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