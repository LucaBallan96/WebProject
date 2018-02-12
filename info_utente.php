<?php
    include 'DBConnection.php';
    $conn=new DBConnection();

    if(!isset($_SESSION['username'])) {
        header('Location: login.php');
        $_SESSION['next']='info_utente.php';
    }
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
		<link rel="stylesheet" media="screen and (min-width:1025px)" href="style/info_utente/info_utente_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:721px)" href="style/info_utente/info_utente_tablet.css">	
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/info_utente/info_utente_mobile.css">	
		<link rel="stylesheet" media="print" href="style/info_utente/info_utente_print.css">
	</head>

	<body>
     <!--SCRIPT-->
		<script type="text/javascript" src="script/menuScript.js"></script>

        <div class="nascosto"><div class="logo_nascosto"><img src="images/logo_azzurro.png" alt="logo Costruzioni Bordignon S.r.l."/></div>Ti trovi in: Home > Info Account</div>
       
        <?php
            if(!isset($_SESSION['admin']))
                echo "<input type='checkbox' id='remove' class='remove_control'/>
                <label id='rmv' class='remove_btn' for='remove' tabindex='0' title='Rimuovi questo account'></label>
                    <div class='remove_form_div'>
                        <form class='remove_form' action='form_control.php' method='post'>
                            <fieldset class='remove_fieldset'>
                                <legend>Rimuovere definitivamente l'utente ".$_SESSION['username']." e tutti i suoi dati?</legend>
                                <div class='yes_no_div'>
                                    <input id='yes' class='radio_choice' type='radio' name='remove_user' value='yes' checked/>
                                    <label id='yl' for='yes' tabindex='0' title='Rimuovi'>Si, rimuovi</label>
                                    <input id='no' class='radio_choice' type='radio' name='remove_user' value='no'/>
                                    <label id='nl' for='no' tabindex='0' title='Mantieni'>No, mantieni</label>
                                </div>
                                <input class='apply_btn' type='submit' value='Applica' title='Applica la scelta'/>
                            </fieldset>
                            
                        </form>
                    </div>";
        ?>

        <div class="contall">

        <?php
            if(isset($_SERVER['HTTP_REFERER'])) {
                if(!strpos($_SERVER['HTTP_REFERER'],'info_utente.php'))
                    echo "<a id='back_link' href='".$_SERVER['HTTP_REFERER']."' title='Torna alla pagina precedente'>Indietro</a>";
                else
                    echo "<a id='back_link' href='index.php' title='Torna alla pagina iniziale'>Home</a>";
            }
            else
                echo "<a id='back_link' href='index.php' title='Torna alla pagina iniziale'>Home</a>";
        ?>
        
        <h1 class="header"><?php echo $_SESSION['username']; ?> - Informazioni sul tuo account</h1>
        <form action="form_control.php" method="post">
            <?php
                $conn->get_user_info();
            ?>
        </form>
        </div>

        <?php
            if(isset($_GET['error'])) {
                if($_GET['error']==1)
                    echo "<p class='error'><strong>Non sono permessi campi dati nulli per le credenziali</strong></p>";
                else if($_GET['error']==2)
                    echo "<p class='error'><strong>Le password inserite non coincidono</strong></p>";
                else if($_GET['error']==3)
                    echo "<p class='error'><strong>La vecchia password è errata</strong></p>";
                else if($_GET['error']==4)
                    echo "<p class='error'><strong>Nome utente non disponibile, riprovare</strong></p>";
            }
        ?>

    </body>
</html>