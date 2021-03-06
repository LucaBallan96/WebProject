<?php
	include 'DBConnection.php';
    $conn=new DBConnection();

	if(isset($_SESSION['username'])) // se è già stato effettuato il login
        header('Location: index.php');
?>

<!DOCTYPE html>
<html lang="it">
    <head>
		<title>Costruzioni Bordignon S.r.l.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<meta name="description" content="Costruzioni Bordignon S.r.l., con oltre tre generazioni di storia alle spalle, opera nel settore edile residenziale, industriale, pubblico, nei restauri e nelle infrastrutture mirando ed ottenendo sempre grande apprezzamento dai suoi Clienti, grazie alla sua esperienza, dedizione e continua innovazione">
		<meta name="keywords" content="Edilizia, settore edile, Treviso, Costruzioni Bordignon">
		<meta name="author" content="Luca Ballan, Giovanni Calore">
		<link rel="stylesheet" media="screen and (min-width:1025px)" href="style/register/register_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:721px)" href="style/register/register_tablet.css">	
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/register/register_mobile.css">	
		<link rel="stylesheet" media="print" href="style/register/register_print.css">
	</head>
	<body>
        <div class="nascosto"><div class="logo_nascosto"><img src="images/logo_azzurro.png" alt="logo Costruzioni Bordignon S.r.l."/></div>Ti trovi in: Home > Login > Nuovo Account</div>

        <?php
            if(isset($_SERVER['HTTP_REFERER'])) {
                if(!strpos($_SERVER['HTTP_REFERER'],'register.php'))
                    echo "<a id='back_link' href='".$_SERVER['HTTP_REFERER']."' title='Torna alla pagina precedente'>Indietro</a>";
                else
                    echo "<a id='back_link' href='login.php' title='Torna alla pagina di Login'>Login</a>";
            }
            else
                echo "<a id='back_link' href='login.php' title='Torna alla pagina di Login'>Login</a>";
        ?>

        <h1 class="header">Registrazione nuovo account</h1>
        <form action="form_control.php" method="post">
            <fieldset id="user_data">
                <label class="data_input"><strong>Username: </strong><input type="text" placeholder="Inserisci username" name="new_user" autofocus maxlength="30" pattern="([a-zA-Z])[a-zA-Z0-9._%@#+-]{5,}" title="Username: deve iniziare con una lettera e contenere almeno 6 caratteri. Sono accettati i simboli . + - _ % @ e #" required/></label>
                <label class="data_input"><strong>Password: </strong><input type="password" placeholder="Inserisci password" name="password" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9._%@#+-]{8,}" title="Password: deve contenere almeno un numero, una lettera maiuscola ed una minuscola, e deve avere complessivamente almeno 8 caratteri. Sono accettati i simboli . + - _ % @ e #" required/></label>
                <label class="data_input"><strong>Ripeti password: </strong><input type="password" placeholder="Ripeti password" name="rep_password" title='Inserisci nuovamente la password' required/></label>
                <label class="data_input"><strong>E-mail: </strong><input type="email" placeholder="Inserisci e-mail" name="mail" maxlength="50" pattern="[a-z0-9._%+-]+@[a-z0-9._%+-]+\.[a-z]{2,3}$" title="E-mail: il formato è quello standard. Sono accettati i simboli . + - _ e %" required/></label>
            </fieldset>
            <div id="div_buttons">
                <input class="btns" type="submit" value="Crea account" title='Salva i dati del nuovo account'/>
                <input class="btns" type="reset" id="cancel_btn" value="Cancel" title='Resetta i dati inseriti'/>
            </div>
        </form>
        <?php
            if(isset($_GET['error'])) {
                if($_GET['error']==1)
                    echo "<p class='error'><strong>Le password inserite non coincidono</strong></p>";
                else
                    echo "<p class='error'><strong>Nome utente già esistente</strong></p>";
            }
        ?>

    </body>
</html>