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

	// RIMOZIONE PROGETTO
	if(isset($_POST['remove_proj'])) {
		$proj=$_POST['remove_proj'];
		if($proj!='no') {
			$conn->remove_progetto($proj);
		}
		header('Location: admin.php#progetti');
	}

	// RIMOZIONE IMPIEGATO
	if(isset($_POST['remove_imp'])) {
		$imp=$_POST['remove_imp'];
		if($imp!='no') {
			$conn->remove_impiegato($imp);
		}
		header('Location: admin.php#impiegati');
	}

	// RIMOZIONE ARTICOLO
	if(isset($_POST['remove_article'])) {
		$conn->remove_articolo($_POST['remove_article']);
		header('Location: admin.php#articoli');
	}

	// RIMOZIONE OFFERTA
	if(isset($_POST['remove_offer'])) {
		$conn->remove_offerta($_POST['remove_offer']);
		header('Location: admin.php#offerte');
	}

	// MODIFICA PROGETTO
	if(isset($_POST['modify_proj'])) {
		$conn->modify_progetto();
		header('Location: admin.php#progetti');
	}

	// MODIFICA IMPIEGATO
	if(isset($_POST['modify_imp'])) {
		$conn->modify_impiegato();
		header('Location: admin.php#impiegati');
	}

	// MODIFICA ARTICOLO
	if(isset($_POST['modify_article'])) {
		$conn->modify_articolo();
		header('Location: admin.php#articoli');
	}

	// MODIFICA OFFERTA
	if(isset($_POST['modify_offer'])) {
		$conn->modify_offerta();
		header('Location: admin.php#offerte');
	}

	// NUOVO PROGETTO
	if(isset($_POST['new_proj'])) {
		$conn->insert_progetto();
		header('Location: admin.php#progetti');
	}

	// NUOVO IMPIEGATO
	if(isset($_POST['new_imp'])) {
		$conn->insert_impiegato();
		header('Location: admin.php#impiegati');
	}

	// NUOVO ARTICOLO
	if(isset($_POST['new_art'])) {
		$conn->insert_articolo();
		header('Location: admin.php#articoli');
	}

	// NUOVA OFFERTA
	if(isset($_POST['new_off'])) {
		$conn->insert_offerta();
		header('Location: admin.php#offerte');
	}

	// INSERT CANDIDATO
	if(isset($_POST['candidate'])) {
		if($conn->insert_candidate()){
			header('Location: lavoro.php');
		}
		else{
			echo "<a id='back_link' href='lavoro.php'>Indietro</a>
			offerta già prenotata e non più disponibile";}
	}

	// RIMOZIONE PRENOTAZIONE
	if(isset($_POST['remove_off'])) {
		$idOffer=$_POST['idOffer'];
		$conn->remove_prenotation($idOffer);
		header('Location: prenotazioni.php');
	}

?>