<?php
    include 'DBConnection.php';
    $conn=new DBConnection();

    if(!isset($_SESSION['username']))
    header('Location: login.php');
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
		<link rel="stylesheet" media="screen and (min-width:1025px)" href="style/info_utente/info_utente_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:721px)" href="style/info_utente/info_utente_tablet.css">	
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/info_utente/info_utente_mobile.css">	
		<link rel="stylesheet" media="print" href="style/info_utente/info_utente_print.css">
	</head>
	<body>
        <a id="back_link" href="index.php">Indietro</a>
        <h1 class="header"><?php echo $_SESSION['username']; ?> - Informazioni sul tuo account</h1>
        <form action="form_control.php" method="post">
            <?php
                $conn->get_user_info();
            ?>
        </form>
        <?php
            if(!isset($_SESSION['admin']))
                echo "<input type='checkbox' id='remove' class='remove_control'/>
                    <label title='Rimuovi questo account' class='remove_btn' for='remove'></label>
                    <div class='remove_form_div'>
                        <form class='remove_form' action='form_control.php' method='post'>
                            <fieldset class='remove_fieldset'>
                                <legend>Rimuovere definitivamente l'utente ".$_SESSION['username']." e tutti i suoi dati?</legend>
                                <div class='yes_no_div'>
                                    <input id='yes' class='radio_choice' type='radio' name='remove_user' value='yes' checked/>
                                    <label for='yes'>Si, rimuovi</label>
                                    <input id='no' class='radio_choice' type='radio' name='remove_user' value='no'/>
                                    <label for='no'>No, mantieni</label>
                                </div>
                            </fieldset>
                            <input class='apply_btn' type='submit' value='Applica'/>
                        </form>
                    </div>";
        ?>

        <?php
            if(isset($_GET['error'])) {
                if($_GET['error']==1)
                    echo "<p class='error'><b>Non sono permessi campi dati nulli per le credenziali</b></p>";
                else if($_GET['error']==2)
                    echo "<p class='error'><b>Le password inserite non coincidono</b></p>";
                else if($_GET['error']==3)
                    echo "<p class='error'><b>La vecchia password è errata</b></p>";
                else if($_GET['error']==4)
                    echo "<p class='error'><b>Nome utente non disponibile, riprovare</b></p>";
            }
        ?>
    </body>
</html>