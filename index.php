<?php
	include 'DBConnection.php';
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
		<button id="compact_menu" onclick="display_navbar(this)">
            <div class="cm_line"></div>
            <div class="cm_line"></div>
            <div class="cm_line"></div>
        </button>

        <div id="navbar">
            <a id="home_link" href="index.php"><img id="logo" src="images/logo.png"></a>
            <div class="dropdown">
                <button id="menu_bt1" class="drop_button" onclick="display_content(this)">Azienda</button>
                <div id="content_menu_bt1" class="drop_content">
                    <a href="azienda.php#storia"><pre>Storia&#9&#9&gt</pre></a>
                    <a href="azienda.php#sedi"><pre>Sedi&#9&#9&#9&gt</pre></a>
                    <a href="azienda.php#persone"><pre>Persone&#9&#9&gt</pre></a>
                </div>
            </div>
            <div class="dropdown">
                <button id="menu_bt2" class="drop_button" onclick="display_content(this)">Progetti</button>
                <div id="content_menu_bt2" class="drop_content">
                    <a href="progetti.php"><pre>In corso&#9&#9&gt</pre></a>
                    <a href="progetti.php#header2"><pre>Terminati&#9&#9&gt</pre></a>
                </div>
            </div>
            <div class="dropdown">
                <button id="menu_bt3" class="drop_button" onclick="display_content(this)">Iniziative</button>
                <div id="content_menu_bt3" class="drop_content">
                    <a href="iniziative.php"><pre>Sponsor&#9&#9&gt</pre></a>
                    <a href="iniziative.php"><pre>Stampa&#9&#9&gt</pre></a>
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
            <button id="close" onclick="close_navbar(this)">X</button>
        </div>
	
	
	<!--HOME-->


	<h1 id="div_one" title="Costruzioni Bordignon General Bau">
		<img id="img_logo" src="images/logo_azzurro.png"/>
	</h1>



	<!--THREE DIV-->


	<div id="div_container_three">
	<a href="#"id="div_two" class="div_group">
		<div id="div_title_two" class="div_title_group">
			<div class="title_div">Ultimo Articolo</div>
		</div>
		<div class="div_container_img">
			<img src="images/home2.jpg"/>
			<div class="div_overlay">
				<div class="div_text_inside_group">Aggiornamento dinamico in php</div>
			</div>
		</div>

	</a>

	<a href="#"id="div_three" class="div_group">
		<div id="div_title_three"class="div_title_group">
				<div class="title_div">Ultimo Progetto</div>
		</div>
		<div class="div_container_img">
			<img src="images/home2.jpg"/>
			<div class="div_overlay">
			
				<div class="div_text_inside_group">Aggiornamento dinamico in php</div>
			</div>
		</div>
		
	</a>

	<a href="#"id="div_four" class="div_group">
		<div id="div_title_four"class="div_title_group">
				<div class="title_div">Lavora con Noi</div>
		</div>
		<div class="div_container_img">
			<img src="images/home2.jpg"/>
			<div class="div_overlay">
				<div class="div_text_inside_group">Aggiornamento dinamico in php</div>
			</div>
		</div>
	</a>
	</div>











	<!--SLOGAN-->


	<div id="div_container_img_slogan">
	</div>
	<div id="div_slogan">
		<div id="div_text_slogan">
		<div id="div_text_slogan1" >
			<i>Oltre due generazioni di </br> costruttori edili. </br></br>
			La terza generazione siamo noi,</br>
			la quarta è nata e sta crescendo.</i></br>
			<hr>
			</div>
			
			<div id="div_text_slogan2" >
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
			<div id="div_img_storia">
				</div>
	<div id="div_storia">
		
		<a href="#" id="div_button_storia" >
			<div class="title_div">Scopri di più</div> 
		</a>
		<h1 id="h1_storia">LA NOSTRA STORIA</h1>
		<div id="div_text_storia">
			La <a href="index.php" class="link_generico">Costruzioni Bordignon s.r.l.</a> nasce nel 1998, sulle orme della tradizione iniziata nei primi anni del 1900 da nonno degli attuali titolari 
			e proseguita poi per mano del padre degli stessi, fino all'avvicendamento generazionale.</br></br></br></br>
			Nel corso di <i>tre generazioni</i> l'azienda si è continuamente distinta per la professionalità dimostrata, puntanto sempre sulla qualità delle opere fornite, nel rispetto delle condizioni e dei tempi stabiliti.
			Grazie all'impegno di attrezzature e macchinari altamente specializzati e al supporto di uno staff tecnico specializzato, sa offrire un servizio che le permette di primeggiare nel settore.
			La <a href="https://it.wikipedia.org/wiki/Norme_della_serie_ISO_9000" class="link_generico" target="_blanck">certificazione di qualità ISO</a>, l'<a href="https://it.wikipedia.org/wiki/Societ%C3%A0_organismi_di_attestazione" class="link_generico" target="_black">attestazione SOA</a> e
			l'<a href="https://it.wikipedia.org/wiki/OHSAS_18001" class="link_generico" target="_blanck">attestazione OHSAS</a> sono la conferma dell'impegno profuso al raggiungimento di livelli costruttivi all'avanguardia, che consentono di realizzare opere che vanno dai grandi complessi residenziali e industriali, ai
			piccoli lavori civili che tuttavia contribuiscono ad accrescere l'esperienza, fondamentale per un continuo miglioramento professionale.</br></br></br></br>
			La continua <i>qualificazione</i> e l'<i>incremento dell'organico </i>permettono inoltre di rendere l'azienda sempre più <i>flessibile e attenta </i> alle esigenze, ai particolari e agli standard richiesti dalla committenza. 
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
			@Copiright 2012-2017 &nbsp&nbsp&nbsp| &nbsp&nbsp&nbspCostruzioni Bordignon S.r.l &nbsp&nbsp&nbsp| &nbsp&nbsp&nbspC.F. e P.IVA 0334405269 
		</div>
	</div>









	</body>
</html>