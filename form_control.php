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

	// RIMOZIONE UTENTE
	if(isset($_POST['remove_user'])) {
		if($_POST['remove_user']=='yes') {
			$conn->remove_user($_SESSION['username']);
			header('Location: logout.php');
		}
		else
			header('Location: info_utente.php');
	}

	// RIMOZIONE PROGETTO
	if(isset($_POST['remove_proj'])) {
		$proj=$_POST['remove_proj'];
		if($proj!='no') {
			$conn->remove_progetto($proj);
		}
		header('Location: admin.php');
	}

	// RIMOZIONE IMPIEGATO
	if(isset($_POST['remove_imp'])) {
		$imp=$_POST['remove_imp'];
		if($imp!='no') {
			$conn->remove_impiegato($imp);
		}
		header('Location: admin.php');
	}

	// MODIFICA PROGETTO
	if(isset($_POST['modify_proj'])) {
		$conn->modify_progetto();
		header('Location: admin.php');
	}

	// MODIFICA IMPIEGATO
	if(isset($_POST['modify_imp'])) {
		$conn->modify_impiegato();
		header('Location: admin.php');
	}

	// NUOVO PROGETTO
	if(isset($_POST['new_proj'])) {
		$conn->insert_progetto();
		header('Location: admin.php');
	}

	// NUOVO IMPIEGATO
	if(isset($_POST['new_imp'])) {
		$conn->insert_impiegato();
		header('Location: admin.php');
	}
	//INSERT CANDIDATO
	if(isset($_POST['candidate'])) {
		if($conn->insert_candidate()){
			header('Location: lavoro.php');
		}
		else{
			echo "<a id='back_link' href='lavoro.php'>Indietro</a>
			offerta già prenotata e non più disponibile";}

	}


?>