<?php
    include 'DBConnection.php';
	$conn=new DBConnection();

	$_SESSION['next']='progetti.php';
?>

<!DOCTYPE html>
<html lang="it">
	<head>
		<title>Costruzioni Bordignon S.r.l.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<meta name="description" content="Costruzioni Bordignon S.r.l., con oltre tre generazioni di storia alle spalle, opera nel settore edile residenziale, industriale, pubblico, nei restauri e nelle infrastrutture mirando ed ottenendo sempre grande apprezzamento dai suoi Clienti, grazie alla sua esperienza, dedizione e continua innovazione">
		<meta name="keywords" content="Edilizia, settore edile, Treviso, Costruzioni Bordignon">
		<meta name="author" content="Luca Ballan, Giovanni Calore">
		<link rel="stylesheet" media="screen and (min-width:1025px)" href="style/progetti/progetti_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:721px)" href="style/progetti/progetti_tablet.css">
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/progetti/progetti_mobile.css">
		<link rel="stylesheet" media="print" href="style/progetti/progetti_print.css">
	</head>
	<body>
        <!--SCRIPT-->
		<script type="text/javascript" src="script/menuScript.js"></script>

		<!-- NAVIGATION -->
		<?php include 'navbar.php';?>

        <div id="navbar_bottom_padding"></div>
        <div class="nascosto"><div class="logo_nascosto"><img src="images/logo_azzurro.png" alt="logo Costruzioni Bordignon S.r.l."/></div>Ti trovi in: Home > Progetti</div>
		<div class="contall">

        <input id="grid_control" class="view_control" type="radio" name="view_control" checked/>
        <label id="grid_view" class="view" for="grid_control" tabindex="0" title="Visualizza i progetti come griglia">Griglia</label>
        <input id="list_control" class="view_control" type="radio" name="view_control"/>
        <label id="list_view" class="view" for="list_control" tabindex="0" title="Visualizza i progetti come elenco">Lista</label>
        <label id="search_label">Cerca <input id="text_search" type="text" placeholder="Filtra per nome o città" oninput="project_filter(this.value)" title="Inserisci un testo per filtrare i progetti secondo il nome o la località"/></label>

		<!-- PROGETTI -->
        <?php
            $conn->get_progetti();
        ?>

		<!--CONTATTI-->
		<div id="div_container_contatti">
			<div id="div_contatti">
				<div id="div_bordignon" class="div_contatto">
					<strong>COSTRUZIONI BORDIGNON S.r.l</strong><br/><br/>
					Via Monte Grappa,21/A<br/>
					31040 Volpago del Montello(TV)<br/>
					Tel : 0423 620077<br/>
					Fax : 0423 620356<br/><br/>
					Mail : <a href="mailto:info@costruzionibordignon.it" title="Invia una mail a COSTRUZIONI BORDIGNON S.r.l.">info@costruzionibordignon.it</a>
				</div>
				<div id="div_generalbau" class="div_contatto">
					<strong>B.G.P. GENERAL BAU S.r.l.</strong><br/><br/>
					Via S. Cassiano, 2<br/>
					39042 Bressanone (BZ)<br/>
					Tel : 0472 838669<br/>
					Fax : 0472 838669<br/><br/>
					Mail : <a href="mailto:info@bgpgeneralbau.com" title="Invia una mail a B.G.P. GENERAL BAU S.r.l.">info@bgpgeneralbau.com</a>
				</div>
				<div id="div_service" class="div_contatto">
					<strong>BORDIGNON SERVICE S.r.l.</strong><br/><br/>
					Corso Mazzini, 61<br/>
					31044 Montebelluna (TV)<br/>
					Tel : 0423 604592<br/>
					Fax : 0423 247699<br/><br/>
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

	</body>
</html>