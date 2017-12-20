<!DOCTYPE html>
<html>
	<head>
		<title>Costruzioni Bordignon S.r.l.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<meta name="description" content="Costruzioni Bordignon S.r.l., con oltre tre generazioni di storia alle spalle, opera nel settore edile residenziale, industriale, pubblico, nei restauri e nelle infrastrutture mirando ed ottenendo sempre grande apprezzamento dai suoi Clienti, grazie alla sua esperienza, dedizione e continua innovazione">
		<meta name="keywords" content="Edilizia, settore edile, Treviso, Costruzioni Bordignon">
		<meta name="author" content="Luca Ballan, Giovanni Calore">
		<link rel="stylesheet" media="screen and (min-width:1024px)" href="style/progetti/progetti_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:720px)" href="style/progetti/progetti_tablet.css">
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/progetti/progetti_mobile.css">
		<link rel="stylesheet" media="print" href="style/progetti/progetti_print.css">
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
            <a id="home_link" href="index.html"><img id="logo" src="images/logo.png"></a>
            <div class="dropdown">
                <button id="menu_bt1" class="drop_button" onclick="display_content(this)">Azienda</button>
                <div id="content_menu_bt1" class="drop_content">
                    <a href="azienda.php"><pre>Storia&#9&#9&gt</pre></a>
                    <a href="azienda.php"><pre>Sedi&#9&#9&#9&gt</pre></a>
                    <a href="azienda.php"><pre>Persone&#9&#9&gt</pre></a>
                </div>
            </div>
            <div class="dropdown">
                <button id="menu_bt2" class="drop_button" onclick="display_content(this)">Progetti</button>
                <div id="content_menu_bt2" class="drop_content">
                    <a href="progetti.php"><pre>In corso&#9&#9&gt</pre></a>
                    <a href="progetti.php"><pre>Terminati&#9&#9&gt</pre></a>
                </div>
            </div>
            <div class="dropdown">
                <button id="menu_bt3" class="drop_button" onclick="display_content(this)">Iniziative</button>
                <div id="content_menu_bt3" class="drop_content">
                    <a href="iniziative.php"><pre>Sponsor&#9&#9&#9&gt</pre></a>
                    <a href="iniziative.php"><pre>Stampa&#9&#9&#9&gt</pre></a>
                    <a href="iniziative.php"><pre>Lavora con Noi&#9&gt</pre></a>
                </div>	
            </div>
            <a href="contatti.html" id="contacts">Contatti</a>
            <a href="admin.php" id="admin">Area Privata</a>
            <button id="close" onclick="close_navbar(this)">X</button>
        </div>

		<!-- HEADER -->
		<h1 id="header1">PROGETTI IN CORSO</h1>

		<!-- PROGETTI -->

		<?php include 'get_progetti.php';?>

		<!--
		<div class="project">
			<img class="pr_image" src="images/progetto1.jpg"/>
			<div class="pr_title"><div>Titolo progetto</div></div>
		</div>
		<div class="project">
			<img class="pr_image" src="images/progetto2.jpg"/>
		</div>
		<div class="project">
			<img class="pr_image" src="images/progetto3.jpg"/>
		</div>
		<div class="project">
			<img class="pr_image" src="images/progetto4.jpg"/>
		</div>
		<div class="project">
			<img class="pr_image" src="images/progetto5.jpg"/>
		</div>
		<div class="project">
			<img class="pr_image" src="images/progetto6.jpg"/>
		</div>
		<div class="project">
			<img class="pr_image" src="images/progetto7.jpg"/>
		</div>
		-->

		<!-- HEADER -->
		<h1 id="header2">PROGETTI TERMINATI</h1>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<p>Ciao</p>
	</body>
</html>