<?php include "DBConnection.php";

    // VALIDAZIONE CREDENZIALI
	if(isset($_POST['u'])) {
    	$conn=new DBConnection();
    	$num=$conn->validate($_POST['u'], $_POST['p']);
    	if($num==2)
        	header('Location: admin.php');
    	else if($num==0)
        	header('Location: login.php?error=0');
    	else if($num==1)
			header('Location: login.php?error=1');
	}

	// RIMOZIONE PROGETTO
	if(isset($_POST['remove_proj'])) {
		$proj=$_POST['remove_proj'];
		if($proj!='no') {
			$conn=new DBConnection();
			$conn->remove_progetto($proj);
		}
		header('Location: admin.php');
	}

	// RIMOZIONE IMPIEGATO
	if(isset($_POST['remove_imp'])) {
		$imp=$_POST['remove_imp'];
		if($imp!='no') {
			$conn=new DBConnection();
			$conn->remove_impiegato($imp);
		}
		header('Location: admin.php');
	}

	// MODIFICA PROGETTO
	if(isset($_POST['modify_proj'])) {
		$conn=new DBConnection();
		$conn->modify_progetto();
		header('Location: admin.php');
	}

	// MODIFICA IMPIEGATO
	if(isset($_POST['modify_imp'])) {
		$conn=new DBConnection();
		$conn->modify_impiegato();
		header('Location: admin.php');
	}

	// NUOVO PROGETTO
	if(isset($_POST['new_proj'])) {
		$conn=new DBConnection();
		$conn->insert_progetto();
		header('Location: admin.php');
	}

	// NUOVO IMPIEGATO
	if(isset($_POST['new_imp'])) {
		$conn=new DBConnection();
		$conn->insert_impiegato();
		header('Location: admin.php');
    }

?>