<?php
	include 'DBConnection.php';
	$conn=new DBConnection();

	if(isset($_SESSION['username'])) // se è già stato effettuato il login
		header('Location: index.php');
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
		<link rel="stylesheet" media="screen and (min-width:1025px)" href="style/register/register_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:721px)" href="style/register/register_tablet.css">	
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/register/register_mobile.css">	
		<link rel="stylesheet" media="print" href="style/register/register_print.css">
	</head>
	<body>
        <a id="back_link" href="index.php">Indietro</a>
        <h1 class="header">REGISTRAZIONE NUOVO ACCOUNT</h1>
        <form action="form_control.php" method="post">
            <fieldset id="user_data">
                <label class="data_input">Username: <input type="text" placeholder="Inserisci username" name="new_user" autofocus required/></label>
                <label class="data_input">Password: <input type="password" placeholder="Inserisci password" name="password" required/></label>
                <label class="data_input">Ripeti password: <input type="password" placeholder="Ripeti password" name="rep_password" required/></label>
                <label class="data_input">E-mail: <input type="email" placeholder="Inserisci e-mail" name="mail" required/></label>
            </fieldset>
            <div id="div_buttons">
                <input class="btns" type="submit" value="Crea account"/>
                <input class="btns" type="reset" id="cancel_btn" value="Cancel"/>
            </div>
        </form>
        <?php
            if(isset($_GET['error'])) {
                if($_GET['error']==1)
                    echo "<p class='error'><b>Le password inserite non coincidono</b></p>";
                else
                    echo "<p class='error'><b>Nome utente già esistente</b></p>";
            }
        ?>
    </body>
</html>