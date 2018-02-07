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
		<link rel="stylesheet" media="screen and (min-width:1025px)" href="style/articolo/articolo_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:721px)" href="style/articolo/articolo_tablet.css">	
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/articolo/articolo_mobile.css">	
		<link rel="stylesheet" media="print" href="style/iniziative/iniziative_print.css">
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

		<!--TITLE SUBTITLE-->
        <?php
            $conn->get_article();
        ?>
            
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