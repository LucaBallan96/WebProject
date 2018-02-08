<?php
	include 'DBConnection.php';
	$conn=new DBConnection();

	if(isset($_SESSION['username'])) // se è già stato effettuato il login
		header('Location: '.$_SESSION['page']);
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
		<link rel="stylesheet" media="screen and (min-width:1025px)" href="style/login/login_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:721px)" href="style/login/login_tablet.css">	
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/login/login_mobile.css">	
		<link rel="stylesheet" media="print" href="style/login/login_print.css">
	</head>
	<body>
        <div class="nascosto">Ti trovi in: Home > Login</div>
        <?php
            if(isset($_SESSION['page']))
                echo "<a id='back_link' href='".$_SESSION['page']."' title='Torna alla ".$_SESSION['page']." precedente'>Indietro</a>";
        ?>        
        <h1 class="header">Login</h1>
        <form action="form_control.php" method="post">
            <div id="container">
                <div id="div_img">
                    <img src="images/login.png" id="user_img">
                </div>
                <div id="div_data">
                    <div class="data"><strong>Username</strong>
                        <input type="text" placeholder="Inserisci username" name="u" autofocus title='Inserisci il tuo nome utente' required>
                    </div>
                    <div class="data"><strong>Password</strong>
                        <input type="password" placeholder="Inserisci password" name="p" title='Inserisci la password' required>
                    </div>
                    <div class="data">
                        Non hai ancora un account? <a href="register.php" title='Clicca per andare alla pagina di registrazione'>Registrati</a>
                    </div>
                    <div id="div_buttons">
                        <input type="submit" value="Login" title='Accedi con queste credenziali'/>
                        <input type="reset" value="Cancella" id="cancel_btn" title='Resetta le credenziali inserite'/>
                    </div> 
                </div>
            </div>
        </form>
        <?php
            if(isset($_GET['error'])) {
                echo "<p class='error'><b>Errore nelle credenziali, riprovare</b></p>";
            }
        ?>

        <?php
			$_SESSION['page']='login.php';
		?>
    </body>
</html>