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
		<div id="nav">
			<a title="Home" href="index.html" id="nav_home" class="nav_link"><div>Home</div></a>
			<a title="Impiegati" href="#impiegati" id="nav_people" class="nav_link"><div>Impiegati</div></a>
			<a title="Progetti" href="#progetti" id="nav_projects" class="nav_link"><div>Progetti</div></a>
			<a title="Articoli" href="#articoli" id="nav_articles" class="nav_link"><div>Articoli</div></a>
			<a title="Utenti" href="#utenti" id="nav_users" class="nav_link"><div>Utenti</div></a>
			<a title="Lavoro" href="#lavoro" id="nav_work" class="nav_link"><div>Lavoro</div></a>
		</div>
		<h1 id="impiegati" class="header">Impiegati e dirigenti d'azienda</h1>
		<div id="container_imp">
			<div id="left_container">

				<div class="div_impiegato">
					<input type="checkbox" id="modify1" class="modify_control"/>
					<label class="modify_btn" for="modify1"></label>
					<div class="form_div">
						<form class="modify_form" action="">
							<fieldset class="modify_personal_info">
								<legend>Informazioni personali</legend>
								<div>Nome:<input type="text" name="firstname" value="Mario" required/></div>
								<div>Cognome:<input type="text" name="lastname" value="Rossi" required/></div>
								<div>Data di nascita:<input type="date" value="1970-01-01" name="birth"/></div>
								<div>Età<input type="number" name="age" value="48" min="18" max="99"/></div>
								<div>e-mail<input type="email" name="mail"/></div>
								<div class="file_select">Foto:<input type="file" name="image" value="../../images/impiegato1.jpg"/></div>
								<div>Settore:<input type="text" name="branch" value="direzione"/></div>
								<div>Anno di inizio:<input type="number" name="begin" value="2002" min="1900" max="2018"/></div>
							</fieldset>
							<fieldset class="modify_company_info">
								<legend>Ruolo nell'azienda:</legend>
								<div><label><input type="radio" name="role" value="Presidente" checked> Presidente</label></div>
								<div><label><input type="radio" name="role" value="Vicepresidente"> Vicepresidente</label></div>
								<div><label><input type="radio" name="role" value="Segretario"> Segretario</label></div>
								<div><label><input type="radio" name="role" value="Ingegnere"> Ingegnere</label></div>
								<div><label><input type="radio" name="role" value="Architetto"> Architetto</label></div>
								<div><label><input type="radio" name="role" value="Geometra"> Geometra</label></div>
								<div><label><input type="radio" name="role" value="Progettista"> Progettista</label></div>
								<div><label><input type="radio" name="role" value="Muratore"> Muratore</label></div>
								<div><label><input type="radio" name="role" value="Carpentiere"> Carpentiere</label></div>
								<div><label><input type="radio" name="role" value="Magazziniere"> Magazziniere</label></div>
							</fieldset>
							<div class="submit_reset_div">
								<input class="submit_btn" type="submit" value="Salva modifiche"/>
								<input class="reset_btn" type="reset" value="Annulla modifiche"/>
							</div>
						</form>
					</div>
					<div class="imp_image" style="background-image:url('../../images/impiegato1.jpg')"></div>
					<div class="imp_info">
						<div class="imp_name"><div>Mario Rossi</div></div>
						<div class="imp_birth"><div>01-01-1970</div></div>
						<div class="imp_role"><div>Presidente</div></div>
						<div class="imp_mail"><div><a href="mailto:mario.rossi@gmail.com">mario.rossi@gmail.com</a></div></div>
					</div>
				</div>
				<input type="checkbox" id="check1" class="check_control"/>
				<label class="btn" for="check1">
					<div class="magic">
						<div class="imp_more"><div>48 anni</div></div>
						<div class="imp_more"><div>Settore: direzione</div></div>
						<div class="imp_more"><div>Impiegato dell'azienda dal 2002</div></div>		
					</div>
					<div class="more_info"><div>+</div></div>
				</label>

				<div class="div_impiegato">
					<input type="checkbox" id="modify2" class="modify_control"/>
					<label class="modify_btn" for="modify2"></label>
					<div class="form_div">
					</div>
					<div class="imp_image" style="background-image:url('../../images/impiegato2.jpg')"></div>
					<div class="imp_info">
						<div class="imp_name"><div></div></div>
						<div class="imp_birth"><div></div></div>
						<div class="imp_role"><div></div></div>
						<div class="imp_mail"><div><a href="mailto:"></a></div></div>
					</div>
				</div>
				<input type="checkbox" id="check2" class="check_control"/>
				<label class="btn" for="check2">
					<div class="magic">
						<div class="imp_more"><div></div></div>
						<div class="imp_more"><div></div></div>
						<div class="imp_more"><div></div></div>		
					</div>
					<div class="more_info"><div>+</div></div>
				</label>

				<div class="div_impiegato">
					<input type="checkbox" id="modify3" class="modify_control"/>
					<label class="modify_btn" for="modify3"></label>
					<div class="form_div">
					</div>
					<div class="imp_image" style="background-image:url('../../images/impiegato3.jpg')"></div>
					<div class="imp_info">
						<div class="imp_name"><div></div></div>
						<div class="imp_birth"><div></div></div>
						<div class="imp_role"><div></div></div>
						<div class="imp_mail"><div><a href="mailto:"></a></div></div>
					</div>
				</div>
				<input type="checkbox" id="check3" class="check_control"/>
				<label class="btn" for="check3">
					<div class="magic">
						<div class="imp_more"><div></div></div>
						<div class="imp_more"><div></div></div>
						<div class="imp_more"><div></div></div>		
					</div>
					<div class="more_info"><div>+</div></div>
				</label>

				<div class="div_impiegato">
					<input type="checkbox" id="modify4" class="modify_control"/>
					<label class="modify_btn" for="modify4"></label>
					<div class="form_div">
					</div>
					<div class="imp_image" style="background-image:url('../../images/impiegato4.jpg')"></div>
					<div class="imp_info">
						<div class="imp_name"><div></div></div>
						<div class="imp_birth"><div></div></div>
						<div class="imp_role"><div></div></div>
						<div class="imp_mail"><div><a href="mailto:"></a></div></div>
					</div>
				</div>
				<input type="checkbox" id="check4" class="check_control"/>
				<label class="btn" for="check4">
					<div class="magic">
						<div class="imp_more"><div></div></div>
						<div class="imp_more"><div></div></div>
						<div class="imp_more"><div></div></div>		
					</div>
					<div class="more_info"><div>+</div></div>
				</label>
			</div>

			<div id="right_container">

				<div class="div_impiegato">
					<input type="checkbox" id="modify5" class="modify_control"/>
					<label class="modify_btn" for="modify5"></label>
					<div class="form_div">
					</div>
					<div class="imp_image" style="background-image:url('../../images/impiegato5.jpg')"></div>
					<div class="imp_info">
						<div class="imp_name"><div></div></div>
						<div class="imp_birth"><div></div></div>
						<div class="imp_role"><div></div></div>
						<div class="imp_mail"><div><a href="mailto:"></a></div></div>
					</div>
				</div>
				<input type="checkbox" id="check5" class="check_control"/>
				<label class="btn" for="check5">
					<div class="magic">
						<div class="imp_more"><div></div></div>
						<div class="imp_more"><div></div></div>
						<div class="imp_more"><div></div></div>		
					</div>
					<div class="more_info"><div>+</div></div>
				</label>

				<div class="div_impiegato">
					<input type="checkbox" id="modify6" class="modify_control"/>
					<label class="modify_btn" for="modify6"></label>
					<div class="form_div">
					</div>
					<div class="imp_image" style="background-image:url('../../images/impiegato6.jpg')"></div>
					<div class="imp_info">
						<div class="imp_name"><div></div></div>
						<div class="imp_birth"><div></div></div>
						<div class="imp_role"><div></div></div>
						<div class="imp_mail"><div><a href="mailto:"></a></div></div>
					</div>
				</div>
				<input type="checkbox" id="check6" class="check_control"/>
				<label class="btn" for="check6">
					<div class="magic">
						<div class="imp_more"><div></div></div>
						<div class="imp_more"><div></div></div>
						<div class="imp_more"><div></div></div>		
					</div>
					<div class="more_info"><div>+</div></div>
				</label>

				<div class="div_impiegato">
					<input type="checkbox" id="modify7" class="modify_control"/>
					<label class="modify_btn" for="modify7"></label>
					<div class="form_div">
					</div>
					<a class="modify_btn" href=""></a>
					<div class="imp_image" style="background-image:url('../../images/impiegato7.jpg')"></div>
					<div class="imp_info">
						<div class="imp_name"><div></div></div>
						<div class="imp_birth"><div></div></div>
						<div class="imp_role"><div></div></div>
						<div class="imp_mail"><div><a href="mailto:"></a></div></div>
					</div>
				</div>
				<input type="checkbox" id="check7" class="check_control"/>
				<label class="btn" for="check7">
					<div class="magic">
						<div class="imp_more"><div></div></div>
						<div class="imp_more"><div></div></div>
						<div class="imp_more"><div></div></div>		
					</div>
					<div class="more_info"><div>+</div></div>
				</label>

				<div class="div_impiegato">
					<input type="checkbox" id="modify8" class="modify_control"/>
					<label class="modify_btn" for="modify8"></label>
					<div class="form_div">
					</div>
					<div class="imp_image" style="background-image:url('../../images/impiegato8.jpg')"></div>
					<div class="imp_info">
						<div class="imp_name"><div></div></div>
						<div class="imp_birth"><div></div></div>
						<div class="imp_role"><div></div></div>
						<div class="imp_mail"><div><a href="mailto:"></a></div></div>
					</div>
				</div>
				<input type="checkbox" id="check8" class="check_control"/>
				<label class="btn" for="check8">
					<div class="magic">
						<div class="imp_more"><div></div></div>
						<div class="imp_more"><div></div></div>
						<div class="imp_more"><div></div></div>		
					</div>
					<div class="more_info"><div>+</div></div>
				</label>
			</div>
		</div>

		<h1 id="progetti" class="header">Progetti in cui si impegna l'azienda</h1>
		<h1 id="articoli" class="header">Articoli e news</h1>
		<h1 id="utenti" class="header">Utenti del sito</h1>
		<h1 id="lavoro" class="header">Offerte e domande di lavoro</h1>
    </body>
</html>