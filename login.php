<!DOCTYPE html>
<html>
    <head>
		<title>Costruzioni Bordignon S.r.l.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<meta name="description" content="Costruzioni Bordignon S.r.l., con oltre tre generazioni di storia alle spalle, opera nel settore edile residenziale, industriale, pubblico, nei restauri e nelle infrastrutture mirando ed ottenendo sempre grande apprezzamento dai suoi Clienti, grazie alla sua esperienza, dedizione e continua innovazione">
		<meta name="keywords" content="Edilizia, settore edile, Treviso, Costruzioni Bordignon">
		<meta name="author" content="Luca Ballan, Giovanni Calore">
		<link rel="stylesheet" media="screen and (min-width:721px)" href="style/login/login_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/login/login_mobile.css">
		<link rel="stylesheet" media="print" href="style/login/login_print.css">
	</head>
	<body>
        <a id="back_link" href="index.html">Indietro</a>
        <form action="DBConnection.php" method="post">
            <div id="container">
                <div id="div_img">
                    <img src="images/login.png" id="user_img">
                </div>
                <div id="div_data">
                    <div class="data"><b>Username</b>
                        <input type="text" placeholder="Enter Username" name="u" required>
                    </div>
                    <div class="data"><b>Password</b>
                        <input type="password" placeholder="Enter Password" name="p" required>
                    </div>
                    <div class="data">
                        Forgot <a href="">password</a>?
                    </div>
                    <div id="div_buttons">
                        <button type="submit">Login</button>
                        <button type="reset" id="cancel_btn">Cancel</button>
                    </div> 
                </div>
            </div>
        </form>
        <?php
            if(isset($_GET['error'])) {
                if($_GET['error']==0)
                    echo "<p class='error'><b>Errore nelle credenziali, riprovare</b></p>";
                if($_GET['error']==1)
                    echo "<p class='error'><b>L'utente non ha i permessi necessari per accedere come amministratore!</b></p>";
            }
        ?>
    </body>
</html>