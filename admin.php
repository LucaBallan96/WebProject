<!DOCTYPE html>
<html>
    <head>
		<title>Costruzioni Bordignon S.r.l.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<meta name="description" content="Costruzioni Bordignon S.r.l., con oltre tre generazioni di storia alle spalle, opera nel settore edile residenziale, industriale, pubblico, nei restauri e nelle infrastrutture mirando ed ottenendo sempre grande apprezzamento dai suoi Clienti, grazie alla sua esperienza, dedizione e continua innovazione">
		<meta name="keywords" content="Edilizia, settore edile, Treviso, Costruzioni Bordignon">
		<meta name="author" content="Luca Ballan, Giovanni Calore">
		<link rel="stylesheet" media="screen and (min-width:1025px)" href="style/admin/admin_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:721px)" href="style/admin/admin_tablet.css">
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/admin/admin_mobile.css">
		<link rel="stylesheet" media="print" href="style/admin/admin_print.css">
	</head>
	<body>
		<!-- NAVIGATION -->
		<div id="nav">
			<a title="Home" href="index.html" id="nav_home" class="nav_link"><div>Home</div></a>
			<a title="Impiegati" href="#impiegati" id="nav_people" class="nav_link"><div>Impiegati</div></a>
			<a title="Progetti" href="#progetti" id="nav_projects" class="nav_link"><div>Progetti</div></a>
			<a title="Articoli" href="#articoli" id="nav_articles" class="nav_link"><div>Articoli</div></a>
			<a title="Utenti" href="#utenti" id="nav_users" class="nav_link"><div>Utenti</div></a>
			<a title="Lavoro" href="#lavoro" id="nav_work" class="nav_link"><div>Lavoro</div></a>
		</div>

		<!-- IMPIEGATI -->
		<h1 id="impiegati" class="header">Impiegati e dirigenti d'azienda</h1>
		<div id="container_imp">
			<?php include "DBConnection.php";
            	$conn=new DBConnection();
            	$conn->get_impiegati();
        	?>
		</div>

		<h1 id="progetti" class="header">Progetti in cui si impegna l'azienda</h1>
		<h1 id="articoli" class="header">Articoli e news</h1>
		<h1 id="utenti" class="header">Utenti del sito</h1>
		<h1 id="lavoro" class="header">Offerte e domande di lavoro</h1>
    </body>
</html>