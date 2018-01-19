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
			<a title="Proposte di lavoro" href="#offerte" id="nav_work" class="nav_link"><div>Lavoro</div></a>
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
					<div>Data di nascita:<input type='date' min='1900-01-01' max='2000-01-01' name='birth'/></div>
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
						<div>Data di inizio:<input type='date' name='begin' min='1900-01-01' max='2100-01-01' required/></div>
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

		<!-- NUOVO ARTICOLO -->
		<input type='checkbox' id='new_art_control'/>
		<label id='new_art_btn' title='Inserisci un nuovo articolo' for='new_art_control'></label>
		<div id='new_art_form_div'>
			<form id='new_art_form' action='form_control.php' method='post'>
				<input class='identity' type='text' name='new_art' value='new_art'/>
				<fieldset class='new_art_data'>
					<legend>Informazioni sull'articolo:</legend>
					<div class='new_art_info'>Data di pubblicazione:<input id='art_pub_date' type='date' name='date' min='1900-01-01' required/></div>
					<div class='new_art_info'>Autore:<input type='text' name='author' placeholder='Autore' required/></div>
					<div class='new_art_info'>Ente di stampa:<input type='text' name='house' placeholder='Ente di stampa' required/></div>
					<div class='new_art_info'>Titolo:<input type='text' name='title' placeholder='Titolo' required/></div>
					<div class='new_art_info'>Sottotitolo:<input type='text' name='subtitle' placeholder='Sottotitolo' required/></div>
					<div class='new_art_info'>Immagine: <input type='file' name='image' accept='.jpg, .jpeg, .png'/ required></div>
				</fieldset>
				<div class='new_art_text_div'>
					Descrizione:<textarea class='new_art_text' form='new_art_form' name='text' placeholder='Inserisci il testo'></textarea>
				</div>
				<div class='new_art_btns'>
					<input class='submit_btn' type='submit' value='Salva articolo'/>
					<input class='reset_btn' type='reset' value='Reset'/>
				</div>
			</form>
		</div>

		<!-- NUOVA OFFERTA -->
		<input type='checkbox' id='new_off_control'/>
		<label id='new_off_btn' title='Inserisci una nuova offerta di lavoro' for='new_off_control'></label>
		<div id='new_off_form_div'>
			<form id='new_off_form' action='form_control.php' method='post'>
				<input class='identity' type='text' name='new_off' value='new_off'/>
				<fieldset class='new_off_data'>
					<legend>Informazioni sull'offerta:</legend>
					<div class='new_off_info'>Settore di impiego:<input type='text' name='branch' placeholder='Settore di impiego' required/></div>
					<div class='new_off_info'>Ruolo professionale:
						<select form='new_off_form' name='role' required/>
  							<option value='Presidente'>Presidente</option>
  							<option value='Vicepresidente'>Vicepresidente</option>
  							<option value='Segretario'>Segretario</option>
							<option value='Ingegnere'>Ingegnere</option>
							<option value='Architetto'>Architetto</option>
							<option value='Geometra'>Geometra</option>
							<option value='Progettista'>Progettista</option>
							<option value='Muratore'>Muratore</option>
							<option value='Carpentiere'>Carpentiere</option>
							<option value='Magazziniere'>Magazziniere</option>
						</select>
					</div>
					<div class='new_off_info'>Tipo di contratto:<input type='text' name='contract' placeholder='Tipo di contratto' required/></div>
					<div class='new_off_info'>Data 1° colloquio:<input class='new_off_date' type='date' name='date1' min='' max='2100-01-01'/></div>
					<div class='new_off_info'>Data 2° colloquio:<input class='new_off_date' type='date' name='date2' min='' max='2100-01-01'/></div>
					<div class='new_off_info'>Data 3° colloquio:<input class='new_off_date' type='date' name='date3' min='' max='2100-01-01'/></div>
					<div class='new_off_info'>Data 4° colloquio:<input class='new_off_date' type='date' name='date4' min='' max='2100-01-01'/></div>
				</fieldset>
				<div class='new_off_mex_div'>
					Descrizione:<textarea class='new_off_mex' form='new_off_form' name='message' placeholder='Inserisci il messaggio'></textarea>
				</div>
				<div class='new_off_btns'>
					<input class='submit_btn' type='submit' value='Salva articolo'/>
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
		<div id='container_est_articles' class="container_est">
			<?php
				$conn->get_articoli_admin();
			?>
		</div>

		<!-- UTENTI -->
		<h1 id="utenti" class="header">Utenti del sito</h1>
		<div id="container_est_users" class="container_est">
			<?php
				$conn->get_utenti_admin();
			?>
		</div>

		<!-- LAVORO -->
		<h1 id="offerte" class="header">Offerte di lavoro e colloqui</h1>
		<div class="container_est">
			<form class='mod_off_form' action='form_control.php' method='post'>
				<input class='identity' type='text' name='modify_offer' value='AAAAA'/>
				<fieldset class='mod_off_info'>
					<div class='mod_off_data'>Settore di impiego:<input type='text' name='branch' placeholder='Settore di impiego' value='AAAAA' required/></div>
					<div class='mod_off_data'>Ruolo professionale:
						<select form='mod_off_form' name='role' required/>
  							<option value='Presidente'>Presidente</option>
  							<option value='Vicepresidente'>Vicepresidente</option>
  							<option value='Segretario'>Segretario</option>
							<option value='Ingegnere'>Ingegnere</option>
							<option value='Architetto' selected>Architetto</option>
							<option value='Geometra'>Geometra</option>
							<option value='Progettista'>Progettista</option>
							<option value='Muratore'>Muratore</option>
							<option value='Carpentiere'>Carpentiere</option>
							<option value='Magazziniere'>Magazziniere</option>
						</select>
					</div>
					<div class='mod_off_data'>Tipo di contratto:<input type='text' name='contract' placeholder='Tipo di contratto' value='AAAAA' required/></div>
				</fieldset>
				<fieldset class='mod_off_dates'>
					<legend>Date colloqui:</legend>
					<div>1°:<input class='mod_off_date' type='date' name='date1' min='' max='2100-01-01' value='2018-12-31'/></div>
					<div>2°:<input class='mod_off_date' type='date' name='date2' min='' max='2100-01-01' value='2019-01-01'/></div>
					<div>3°:<input class='mod_off_date' type='date' name='date3' min='' max='2100-01-01'/></div>
					<div>4°:<input class='mod_off_date' type='date' name='date4' min='' max='2100-01-01'/></div>
				</fieldset>
				<div class='mod_off_mex'>
					Descrizione:<textarea class='mod_off_text' form='mod_off_form' name='message' placeholder='Inserisci il messaggio' value='AAAAA'></textarea>
				</div>
				<input class='mod_off_btn' type='submit' value='Salva'/>
				<input class='mod_off_btn' type='reset' value='Annulla'/>
				
				<input id='rem_off_checkbox1' class='rem_off_control' type='checkbox'/>
				<label for='rem_off_checkbox1' class='mod_off_btn'>Elimina</label>
				<form class='rem_off_form' action='form_control.php' method='post'>
					<div>Vuoi eliminare definitivamente questa offerta, i colloqui e le relative prenotazioni degli utenti?</div>
					<input class='identity' type='text' name='remove_offer' value='AAAAA'/>
					<input type='submit' class='rem_off_form_btn' value='Elimina'/>
				</form>
			</form>
			<div class='mod_off_form'>
			</div>
			<div class='mod_off_form'>
			</div>
			<div class='mod_off_form'>
			</div>
		</div>

		<!--SCRIPT-->
		<script type="text/javascript" src="script/menuScript.js"></script>
    </body>
</html>