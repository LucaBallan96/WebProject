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

        <!--TITLE-->
        <div class="title">Rassegna Stampa</div>

        <!--LINK DINAMICI-->

        <?php 
            $conn->get_articles();
        ?>
        
        <!--CERTIFICAZIONI-->
        <div class="title">Certificazioni</div>
     
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