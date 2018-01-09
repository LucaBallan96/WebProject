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
			header('Location: index.php');
		}
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

?>