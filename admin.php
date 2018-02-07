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
			<a title="Torna alla pagina iniziale" href="index.php" id="nav_home" class="nav_link"><div>Home</div></a>
			<a title="Impiegati dell'azienda" href="#impiegati" id="nav_people" class="nav_link"><div>Impiegati</div></a>
			<a title="Progetti dell'azienda" href="#progetti" id="nav_projects" class="nav_link"><div>Progetti</div></a>
			<a title="Articoli di stampa" href="#articoli" id="nav_articles" class="nav_link"><div>Articoli</div></a>
			<a title="Utenti del sito" href="#utenti" id="nav_users" class="nav_link"><div>Utenti</div></a>
			<a title="Offerte di lavoro e prenotazioni degli utenti" href="#offerte" id="nav_work" class="nav_link"><div>Lavoro</div></a>
		</div>

		<!-- TMP ERROR -->
		<?php
            if(isset($_GET['error'])) {
                echo "<div id='tmp_error'>
						<div id='error_image'></div>
							<div id='error_text'>";
				if($_GET['error']==4)
					echo "Nome utente non disponibile, modifica annullata";
				else if($_GET['error']==5)
					echo "Errore nel caricamento dell&#39immagine";
				else if($_GET['error']==6)
					echo "Errore nella rimozione dell&#39immagine";
				echo "</div></div>";
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
					<div>Nome:<input type='text' name='firstname' placeholder="Nome" pattern="[a-zA-Z\s]{1,30}" title="Nome dell&#39impiegato: massimo 30 caratteri alfabetici" required/></div>
					<div>Cognome:<input type='text' name='lastname' placeholder="Cognome" pattern="[a-zA-Z\s]{1,30}" title="Cognome dell&#39impiegato: massimo 30 caratteri alfabetici" required/></div>
					<div>Data di nascita:<input type='date' name='birth' placeholder='yyyy-mm-gg' min='1900-01-01' max='2000-01-01' pattern='(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))' title="Inserisci la data di nascita dell&#39impiegato; il formato è yyyy-mm-dd"/></div>
					<div>Età:<input type='number' name='age' min='18' max='99' placeholder="Età" title="Inserisci l&#39età dell&#39impiegato"/></div>
					<div>E-mail:<input type='email' name='mail' placeholder="E-mail" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9._%+-]+\.[a-z]{2,3}$" title="E-mail dell&#39impiegato: il formato è quello standard. Sono accettati i simboli . + - _ e %"/></div>
					<div>Foto:<input type='file' name='image' accept='.jpg, .jpeg, .png' title="Inserisci una foto dell&#39impiegato"/></div>
					<div>Settore:<input type='text' name='branch' placeholder="Settore di impiego" pattern="[a-zA-Z0-9\s]{1,30}" title="Settore dell&#39impiegato: massimo 30 caratteri alfanumerici"/></div>
					<div>Anno di inizio:<input type='number' name='begin' min='1900' max='2018' placeholder="Anno di inizio" title="Inserisci l&#39anno di inizio dell&#39impiegato"/></div>
				</fieldset>
				<fieldset id='new_imp_company_info'>
					<legend>Ruolo nell'azienda:</legend>
					<div><label title="Presidente"><input type='radio' name='role' value='Presidente' checked/>Presidente</label></div>
					<div><label title="Vicepresidente"><input type='radio' name='role' value='Vicepresidente'/>Vicepresidente</label></div>
					<div><label title="Segretario"><input type='radio' name='role' value='Segretario'/>Segretario</label></div>
					<div><label title="Ingegnere"><input type='radio' name='role' value='Ingegnere'/>Ingegnere</label></div>
					<div><label title="Architetto"><input type='radio' name='role' value='Architetto'/>Architetto</label></div>
					<div><label title="Geometra"><input type='radio' name='role' value='Geometra'/>Geometra</label></div>
					<div><label title="Progettista"><input type='radio' name='role' value='Progettista'/>Progettista</label></div>
					<div><label title="Muratore"><input type='radio' name='role' value='Muratore'/>Muratore</label></div>
					<div><label title="Carpentiere"><input type='radio' name='role' value='Carpentiere'/>Carpentiere</label></div>
					<div><label title="Magazziniere"><input type='radio' name='role' value='Magazziniere'/>Magazziniere</label></div>
				</fieldset>
				<div class='submit_reset_div'>
					<input class='submit_btn' type='submit' value='Salva impiegato' title="Salva i dati dell&#39impiegato"/>
					<input class='reset_btn' type='reset' value='Reset' title="Resetta i dati inseriti"/>
				</div>
			</form>
		</div>

		<!-- NUOVO PROGETTO -->
		<input type='checkbox' id='new_proj_control'/>
		<label id='new_proj_btn' title='Inserisci un nuovo progetto' for='new_proj_control'></label>
		<div id='new_proj_form_div'>
			<form id='new_proj_form' action='form_control.php' method='post' enctype='multipart/form-data'>
				<div class='project_info'>
					<fieldset class='new_proj_data'>
						<legend>Informazioni sul progetto</legend>
						<input class='identity' type='text' name='new_proj' value='new_proj'/>
						<div>Nome:<input type='text' name='name' placeholder='Nome' pattern=".{1,50}" title="Nome del progetto: massimo 50 caratteri" required/></div>
						<div>Immagine:<input class='new_proj_image' type='file' name='image' accept='.jpg, .jpeg, .png' title="Inserisci una immagine per il progetto" required/></div>
						<div>Stato:
							<label title="Progetto in corso"><input type='radio' name='status' value='In corso' checked/> In corso</label>
							<label title="Progetto terminato"><input type='radio' name='status' value='Terminato'/> Terminato</label>
						</div>
						<div>Committente:<input type='text' name='client' placeholder='Committente' pattern=".{1,50}" title="Committente del progetto: massimo 50 caratteri"/></div>
						<div>Tipologia:<input type='text' name='type' placeholder='Tipo di opera' pattern=".{1,30}" title="Tipologia del progetto: massimo 30 caratteri"/></div>
						<div>Luogo:<input type='text' name='location' placeholder='Paese o città' pattern=".{1,30}" title="Località del progetto: massimo 30 caratteri"/></div>
						<div>Direttore dei lavori:<input type='text' name='director' placeholder='Direttore' pattern=".{1,30}" title="Direttore dei lavori: massimo 30 caratteri"/></div>
						<div>Data di inizio:<input type='date' name='begin' min='1900-01-01' max='2100-01-01' title="Data di inizio del progetto" required/></div>
					</fieldset>
					<div class='new_proj_description'>
						Descrizione:</br>
						<textarea class='new_proj_desc' name='description' form='new_proj_form' placeholder='Descrizione del progetto' maxlength="1000" title="Inserisci la descrizione del progetto"></textarea>
					</div>
				</div>
				<div class='new_proj_btns'>
					<input class='submit_btn' type='submit' value='Salva progetto' title="Salva i dati del progetto"/>
					<input class='reset_btn' type='reset' value='Reset' title="Resetta i dati inseriti"/>
				</div>
			</form>
		</div>

		<!-- NUOVO ARTICOLO -->
		<input type='checkbox' id='new_art_control'/>
		<label id='new_art_btn' title='Inserisci un nuovo articolo' for='new_art_control'></label>
		<div id='new_art_form_div'>
			<form id='new_art_form' action='form_control.php' method='post' enctype='multipart/form-data'>
				<input class='identity' type='text' name='new_art' value='new_art'/>
				<fieldset class='new_art_data'>
					<legend>Informazioni sull'articolo:</legend>
					<div class='new_art_info'>Data di pubblicazione:<input id='art_pub_date' type='date' name='date' min='1900-01-01' title="Inserisci la data di pubblicazione dell'articolo" required/></div>
					<div class='new_art_info'>Autore:<input type='text' name='author' placeholder='Autore' pattern=".{1,30}" title="Autore dell'articolo: massimo 30 caratteri" required/></div>
					<div class='new_art_info'>Ente di stampa:<input type='text' name='house' placeholder='Ente di stampa' pattern=".{1,30}" title="Ente di stampa: massimo 30 caratteri" required/></div>
					<div class='new_art_info'>Titolo:<input type='text' name='title' placeholder='Titolo' maxlength="50" title="Inserisci un titolo per l'articolo" required/></div>
					<div class='new_art_info'>Sottotitolo:<input type='text' name='subtitle' placeholder='Sottotitolo' maxlength="100" title="Inserisci un sottotitolo per l'articolo" required/></div>
					<div class='new_art_info'>Immagine: <input type='file' name='image' accept='.jpg, .jpeg, .png' title="Inserisci una immagine per l'articolo" required></div>
				</fieldset>
				<div class='new_art_text_div'>
					Testo:<textarea class='new_art_text' form='new_art_form' name='text' placeholder='Inserisci il testo' maxlength="2000" title="Inserisci il testo dell'articolo"></textarea>
				</div>
				<div class='new_art_btns'>
					<input class='submit_btn' type='submit' value='Salva articolo' title="Salva il nuovo articolo"/>
					<input class='reset_btn' type='reset' value='Reset' title="Resetta i dati inseriti"/>
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
					<div class='new_off_info'>Settore di impiego:<input type='text' name='branch' placeholder='Settore di impiego' pattern="[a-zA-Z0-9\s]{1,30}" title="Settore di impiego: massimo 30 caratteri alfanumerici" required/></div>
					<div class='new_off_info' title="Ruolo professionale">Ruolo professionale:
						<select form='new_off_form' name='role' title="Seleziona il ruolo professionale" required/>
  							<option value='Presidente' title="Presidente">Presidente</option>
  							<option value='Vicepresidente' title="Vicepresidente">Vicepresidente</option>
  							<option value='Segretario' title="Segretario">Segretario</option>
							<option value='Ingegnere' title="Ingegnere">Ingegnere</option>
							<option value='Architetto' title="Architetto">Architetto</option>
							<option value='Geometra' title="Geometra">Geometra</option>
							<option value='Progettista' title="Progettista">Progettista</option>
							<option value='Muratore' title="Muratore">Muratore</option>
							<option value='Carpentiere' title="Carpentiere">Carpentiere</option>
							<option value='Magazziniere' title="Magazziniere">Magazziniere</option>
						</select>
					</div>
					<div class='new_off_info'>Tipo di contratto:<input type='text' name='contract' placeholder='Tipo di contratto' pattern=".{1,30}" title="Tipo di contratto: massimo 30 caratteri" required/></div>
					<div class='new_off_info'>Data 1° colloquio:<input class='new_off_date' type='date' name='date1' min='' max='2100-01-01' title="Seleziona la data del primo colloquio"/></div>
					<div class='new_off_info'>Data 2° colloquio:<input class='new_off_date' type='date' name='date2' min='' max='2100-01-01' title="Seleziona la data del secondo colloquio"/></div>
					<div class='new_off_info'>Data 3° colloquio:<input class='new_off_date' type='date' name='date3' min='' max='2100-01-01' title="Seleziona la data del terzo colloquio"/></div>
					<div class='new_off_info'>Data 4° colloquio:<input class='new_off_date' type='date' name='date4' min='' max='2100-01-01' title="Seleziona la data del quarto colloquio"/></div>
				</fieldset>
				<div class='new_off_mex_div'>
					Descrizione:<textarea class='new_off_mex' form='new_off_form' name='message' placeholder='Inserisci il messaggio' maxlength="1000" title="Inserisci il messaggio"></textarea>
				</div>
				<div class='new_off_btns'>
					<input class='submit_btn' type='submit' value='Salva offerta' title="Salva i dati dell'offerta"/>
					<input class='reset_btn' type='reset' value='Reset' title="Resetta i dati inseriti"/>
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
		<h1 id="offerte" class="header">Offerte di lavoro e prenotazioni</h1>
		<div class="container_est">
			<?php
				$conn->get_offerte_admin();
			?>
		</div>

		<!--SCRIPT-->
		<script type="text/javascript" src="script/menuScript.js"></script>
    </body>
</html>