<?php 
	include 'DBConnection.php';
	$conn=new DBConnection();

	if(!isset($_SESSION['admin'])) {
		if(isset($_SESSION['username']))
			header('Location: index.php');
		else
			header('Location: login.php');
	}
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
		<link rel="stylesheet" media="screen and (min-width:1025px)" href="style/admin/admin_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:721px)" href="style/admin/admin_tablet.css">
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/admin/admin_mobile.css">
		<link rel="stylesheet" media="print" href="style/admin/admin_print.css">
	</head>
	<body>
		<!-- NAVIGATION -->
		<div id="nav">
			<a title="Home" href="index.php" id="nav_home" class="nav_link"><div>Home</div></a>
			<a title="Impiegati dell'azienda" href="#impiegati" id="nav_people" class="nav_link"><div>Impiegati</div></a>
			<a title="Progetti" href="#progetti" id="nav_projects" class="nav_link"><div>Progetti</div></a>
			<a title="Articoli di stampa" href="#articoli" id="nav_articles" class="nav_link"><div>Articoli</div></a>
			<a title="Utenti del sito" href="#utenti" id="nav_users" class="nav_link"><div>Utenti</div></a>
			<a title="Proposte di lavoro" href="#lavoro" id="nav_work" class="nav_link"><div>Lavoro</div></a>
		</div>

		<!-- TMP ERROR -->
		<?php
            if(isset($_GET['error'])) {
                if($_GET['error']==4) {
                    echo "<div id='tmp_error'>
							<div id='error_image'></div>
							<div id='error_text'>Nome utente non disponibile, modifica annullata</div>
						</div>";
				}
            }
		?>

		<!-- NUOVO IMPIEGATO -->
		<input type='checkbox' id='new_imp_control'/>
		<label id='new_imp_btn' title='Inserisci un nuovo impiegato' for='new_imp_control'></label>
		<div id='new_imp_form_div'>
			<form id='new_imp_form' action='form_control.php' method='post' enctype='multipart/form-data'>
				<fieldset id='new_imp_personal_info'>
					<legend>Informazioni personali</legend>
					<input class='identity' type='text' name='new_imp' value='new_imp'/>
					<div>Nome:<input type='text' name='firstname' required/></div>
					<div>Cognome:<input type='text' name='lastname' required/></div>
					<div>Data di nascita:<input type='date' name='birth'/></div>
					<div>Età:<input type='number' name='age' min='18' max='99'/></div>
					<div>e-mail:<input type='email' name='mail'/></div>
					<div>Foto:<input type='file' name='image' accept='.jpg, .jpeg, .png'/></div>
					<div>Settore:<input type='text' name='branch'/></div>
					<div>Anno di inizio:<input type='number' name='begin' min='1900' max='2018'/></div>
				</fieldset>
				<fieldset id='new_imp_company_info'>
					<legend>Ruolo nell'azienda:</legend>
					<div><label><input type='radio' name='role' value='Presidente' checked/>Presidente</label></div>
					<div><label><input type='radio' name='role' value='Vicepresidente'/>Vicepresidente</label></div>
					<div><label><input type='radio' name='role' value='Segretario'/>Segretario</label></div>
					<div><label><input type='radio' name='role' value='Ingegnere'/>Ingegnere</label></div>
					<div><label><input type='radio' name='role' value='Architetto'/>Architetto</label></div>
					<div><label><input type='radio' name='role' value='Geometra'/>Geometra</label></div>
					<div><label><input type='radio' name='role' value='Progettista'/>Progettista</label></div>
					<div><label><input type='radio' name='role' value='Muratore'/>Muratore</label></div>
					<div><label><input type='radio' name='role' value='Carpentiere'/>Carpentiere</label></div>
					<div><label><input type='radio' name='role' value='Magazziniere'/>Magazziniere</label></div>
				</fieldset>
				<div class='submit_reset_div'>
					<input class='submit_btn' type='submit' value='Salva impiegato'/>
					<input class='reset_btn' type='reset' value='Reset'/>
				</div>
			</form>
		</div>

		<!-- NUOVO PROGETTO -->
		<input type='checkbox' id='new_proj_control'/>
		<label id='new_proj_btn' title='Inserisci un nuovo progetto' for='new_proj_control'></label>
		<div id='new_proj_form_div'>
			<form id='new_proj_form' action='form_control.php' method='post'>
				<div class='project_info'>
					<div class='new_proj_data'>
						<input class='identity' type='text' name='new_proj' value='new_proj'/>
						<div>Nome:<input type='text' name='name' required/></div>
						<div>Immagine:<input class='new_proj_image' type='file' name='image' accept='.jpg, .jpeg, .png' required/></div>
						<div>Stato:
							<label><input type='radio' name='status' value='In corso' checked/> In corso</label>
							<label><input type='radio' name='status' value='Terminato'/> Terminato</label>
						</div>
						<div>Committente:<input type='text' name='client'/></div>
						<div>Tipologia:<input type='text' name='type'/></div>
						<div>Luogo:<input type='text' name='location'/></div>
						<div>Direttore dei lavori:<input type='text' name='director'/></div>
					</div>
					<div class='new_proj_description'>
						Descrizione:</br>
						<textarea class='new_proj_desc' name='description' form='new_proj_form'></textarea>
					</div>
				</div>
				<div class='proj_form_btns'>
					<input class='submit_btn' type='submit' value='Salva progetto'/>
					<input class='reset_btn' type='reset' value='Reset'/>
				</div>
			</form>
		</div>

		<!-- IMPIEGATI -->
		<h1 id="impiegati" class="header">Impiegati e dirigenti d'azienda</h1>
		<div class="container_est">
			<?php
            	$conn->get_impiegati_admin();
        	?>
		</div>

		<!-- PROGETTI -->
		<h1 id="progetti" class="header">Progetti in cui si impegna l'azienda</h1>
		<div class="container_est">
			<?php
            	$conn->get_progetti_admin();
        	?>
		</div>

		<!-- ARTICOLI -->
		<h1 id="articoli" class="header">Articoli e news</h1>
		<div class="container_est">
		</div>

		<!-- UTENTI -->
		<h1 id="utenti" class="header">Utenti del sito</h1>
		<div id="container_est_users" class="container_est">
			<?php
				$conn->get_utenti_admin();
			?>
		</div>

		<!-- LAVORO -->
		<h1 id="lavoro" class="header">Offerte e domande di lavoro</h1>
		<div class="container_est">
		</div>
    </body>
</html>