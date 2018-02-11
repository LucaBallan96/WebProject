<?php
	include 'DBConnection.php';
	$conn=new DBConnection();

	$_SESSION['next']='index.php';
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
		<link rel="stylesheet" media="screen and (min-width:1025px)" href="style/index/index_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:721px)" href="style/index/index_tablet.css">	
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/index/index_mobile.css">	
		<link rel="stylesheet" media="print" href="style/index/index_print.css">
	</head>
	<body>
		<!--SCRIPT-->
		<script type="text/javascript" src="script/menuScript.js"></script>

		<!-- NAVIGATION -->
		<?php include 'navbar.php';?>

	
		<div class="nascosto"><div class="logo_nascosto"><img src="images/logo_azzurro.png"/></div>Ti trovi in: Home</div>
		<div class="contall">
		<!--MESSAGGI-->
		<?php
			if(isset($_SESSION['username']) && !isset($_SESSION['messages'])) { 
				$conn->get_messages();
				$_SESSION['messages']='seen';
			}
		?>

		<!--LOGO-->
		<h1 id="div_one" title="Costruzioni Bordignon General Bau">
			<img id="img_logo" src="images/logo_azzurro.png" alt="logo Costruzioni Bordignon S.r.l."/>
		</h1>
		
		<!--AGGIORNAMENTI-->
		<div id="cont_three">
			<?php
				
				$conn->get_last_article();
				$conn->get_last_project();
				$conn->get_last_offer();
			?>
			</div>
			<div class="contgiu"><div id="giu_link"><a id="agiu" href="#div_slogan" ><img src="images/giu.png" title="esplora pagina" alt="esplora pagina"/></a></div></div>
		
		
		<!--SLOGAN-->
		<div id="div_container_img_slogan">
		</div>
		<div id="div_slogan">
			<div id="div_text_slogan">
				<div id="div_text_slogan1">
					<em>Oltre due generazioni di </br> costruttori edili. </br></br>
					La terza generazione siamo noi,</br>
					la quarta è nata e sta crescendo.</em></br>
					<div class="hr"></div>
				</div>
				<div id="div_text_slogan2">
					Costruzioni Bordignon S.r.l., con oltre tre generazioni di storia alle spalle,</br>
					opera nel settore edile residenziale, industriale, pubblico, nei restauri e</br>
					nelle infrastrutture, ottenendo sempre grande apprezzamento</br>
					dai suoi Clienti, grazie alla sua esperienza, dedizione e continua </br>
					innovazione.
				</div>
			</div>
		</div>

		<!--STORIA-->
		<div id=div_container_storia>
			<div id="div_img_storia"></div>
			<div id="div_storia">
				<h1 id="h1_storia">La Nostra Storia</h1>
				<div id="div_text_storia">
					La <a href="index.php" class="link_generico" title="sito web azienda Costruioni Bordignon S.r.l.">Costruzioni Bordignon s.r.l.</a> nasce nel 1998, sulle orme della tradizione iniziata nei primi anni del 1900 da nonno degli attuali titolari 
					e proseguita poi per mano del padre degli stessi, fino all'avvicendamento generazionale.</br></br></br></br>
					Nel corso di <em>tre generazioni</em> l'azienda si è continuamente distinta per la professionalità dimostrata, puntanto sempre sulla qualità delle opere fornite, nel rispetto delle condizioni e dei tempi stabiliti.
					Grazie all'impegno di attrezzature e macchinari altamente specializzati e al supporto di uno staff tecnico specializzato, sa offrire un servizio che le permette di primeggiare nel settore.
					La <a href="https://it.wikipedia.org/wiki/Norme_della_serie_ISO_9000" class="link_generico" target="_blanck" title="certificazione ISO wikipedia">certificazione di qualità ISO</a>, l'<a href="https://it.wikipedia.org/wiki/Societ%C3%A0_organismi_di_attestazione" class="link_generico" target="_blanck" title="certificazione SOA wikipedia">attestazione SOA</a> e
					l'<a href="https://it.wikipedia.org/wiki/OHSAS_18001" class="link_generico" target="_blanck" title="certificazione OHSAS wikipedia">attestazione OHSAS</a> sono la conferma dell'impegno profuso al raggiungimento di livelli costruttivi all'avanguardia, che consentono di realizzare opere che vanno dai grandi complessi residenziali e industriali, ai
					piccoli lavori civili che tuttavia contribuiscono ad accrescere l'esperienza, fondamentale per un continuo miglioramento professionale.</br></br></br></br>
					La continua <em>qualificazione</em> e l'<em>incremento dell'organico </em>permettono inoltre di rendere l'azienda sempre più <em>flessibile e attenta </em> alle esigenze, ai particolari e agli standard richiesti dalla committenza. 
					<div id="div_scopri" >
						<a href="azienda.php#storia" id="div_button_storia" title="Esplora la nostra azienda">
							Scopri di più
						</a>
					</div> 
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
		</div>
		<?php
			$_SESSION['page']='index.php';
		?>
		
	</body>
</html>