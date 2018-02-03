<?php
	include 'DBConnection.php';
	$conn=new DBConnection();

    // VALIDAZIONE CREDENZIALI
	if(isset($_POST['u'])) {
    	$num=$conn->validate($_POST['u'], $_POST['p']);
    	if($num==0)
        	header('Location: login.php?error=1');
    	else {
			session_start();
			$_SESSION['username']=$_POST['u'];
			if($num==2)
				$_SESSION['admin']='admin';
			$conn->set_accesses();
			header('Location: index.php');
		}
	}

	// NUOVO UTENTE
	if(isset($_POST['new_user'])) {
		$num=$conn->insert_user();
		if($num!=0)
			header('Location: register.php?error='.$num);
		else {
			session_start();
			$_SESSION['username']=$_POST['new_user'];
			header('Location: index.php');
		}
	}
	
	// MODIFICA UTENTE
	if(isset($_POST['modify_user'])) {
		$num=$conn->modify_user();
		if($num!=0)
			header('Location: info_utente.php?error='.$num);
		else {
			session_start();
			$_SESSION['username']=$_POST['username'];
			header('Location: info_utente.php');
		}
	}

	// MODIFICA UTENTE ADMIN
	if(isset($_POST['admin_mod_user'])) {
		$num=$conn->modify_user();
		if($num!=0)
			header('Location: admin.php?error='.$num.'#utenti');
		else
			header('Location: admin.php#utenti');
	}

	// RIMOZIONE UTENTE
	if(isset($_POST['remove_user'])) {
		if($_POST['remove_user']=='yes') {
			$conn->remove_user($_SESSION['username']);
			header('Location: logout.php');
		}
		else
			header('Location: info_utente.php');
	}

	// RIMOZIONE UTENTE ADMIN
	if(isset($_POST['admin_rem_user'])) {
		$conn->remove_user($_POST['admin_rem_user']);
		header('Location: admin.php#utenti');
	}

	// NUOVO PROGETTO
	if(isset($_POST['new_proj'])) {
		$num=$conn->insert_progetto();
		if($num!=0)
			header('Location: admin.php?error='.$num.'#progetti');
		else
			header('Location: admin.php#progetti');
	}

	// MODIFICA PROGETTO
	if(isset($_POST['modify_proj'])) {
		$num=$conn->modify_progetto();
		if($num!=0)
			header('Location: admin.php?error='.$num.'#progetti');
		else
			header('Location: admin.php#progetti');
	}

	// RIMOZIONE PROGETTO
	if(isset($_POST['remove_proj'])) {
		$proj=$_POST['remove_proj'];
		if($proj!='no') {
			$num=$conn->remove_progetto($proj);
			if($num!=0)
				header('Location: admin.php?error='.$num.'#progetti');
			else
				header('Location: admin.php#progetti');
		}
		else
			header('Location: admin.php#progetti');
	}

	// NUOVO IMPIEGATO
	if(isset($_POST['new_imp'])) {
		$num=$conn->insert_impiegato();
		if($num!=0)
			header('Location: admin.php?error='.$num.'#impiegati');
		else
			header('Location: admin.php#impiegati');
	}

	// MODIFICA IMPIEGATO
	if(isset($_POST['modify_imp'])) {
		$num=$conn->modify_impiegato();
		if($num!=0)
			header('Location: admin.php?error='.$num.'#impiegati');
		else
			header('Location: admin.php#impiegati');
	}

	// RIMOZIONE IMPIEGATO
	if(isset($_POST['remove_imp'])) {
		$imp=$_POST['remove_imp'];
		if($imp!='no') {
			$num=$conn->remove_impiegato($imp);
			if($num!=0)
				header('Location: admin.php?error='.$num.'#impiegati');
			else
				header('Location: admin.php#impiegati');
		}
		else
			header('Location: admin.php#impiegati');
	}

	// NUOVO ARTICOLO
	if(isset($_POST['new_art'])) {
		$num=$conn->insert_articolo();
		if($num!=0)
			header('Location: admin.php?error='.$num.'#articoli');
		else
			header('Location: admin.php#articoli');
	}

	// MODIFICA ARTICOLO
	if(isset($_POST['modify_article'])) {
		$num=$conn->modify_articolo();
		if($num!=0)
			header('Location: admin.php?error='.$num.'#articoli');
		else
			header('Location: admin.php#articoli');
	}

	// RIMOZIONE ARTICOLO
	if(isset($_POST['remove_article'])) {
		$art=$_POST['remove_article'];
		$num=$conn->remove_articolo($art);
		if($num!=0)
			header('Location: admin.php?error='.$num.'#articoli');
		else
			header('Location: admin.php#articoli');
	}

	// NUOVA OFFERTA
	if(isset($_POST['new_off'])) {
		$conn->insert_offerta();
		header('Location: admin.php#offerte');
	}

	// MODIFICA OFFERTA
	if(isset($_POST['modify_offer'])) {
		$conn->modify_offerta();
		header('Location: admin.php#offerte');
	}

	// RIMOZIONE OFFERTA
	if(isset($_POST['remove_offer'])) {
		$conn->remove_offerta($_POST['remove_offer']);
		header('Location: admin.php#offerte');
	}

	// NUOVA PRENOTAZIONE
	if(isset($_POST['candidate'])) {
		if($conn->insert_candidate()){
			header('Location: lavoro.php');
		}
		else {
			echo "<a id='back_link' href='lavoro.php'>Indietro</a>
			Offerta già prenotata e non più disponibile";}
	}

	// RIMOZIONE PRENOTAZIONE
	if(isset($_POST['remove_off'])) {
		$idOffer=$_POST['idOffer'];
		$conn->remove_prenotation($idOffer);
		header('Location: prenotazioni.php');
	}

?>