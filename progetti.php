<!DOCTYPE html>
<html>
	<head>
		<title>Costruzioni Bordignon S.r.l.</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<meta name="description" content="Costruzioni Bordignon S.r.l., con oltre tre generazioni di storia alle spalle, opera nel settore edile residenziale, industriale, pubblico, nei restauri e nelle infrastrutture mirando ed ottenendo sempre grande apprezzamento dai suoi Clienti, grazie alla sua esperienza, dedizione e continua innovazione">
		<meta name="keywords" content="Edilizia, settore edile, Treviso, Costruzioni Bordignon">
		<meta name="author" content="Luca Ballan, Giovanni Calore">
		<link rel="stylesheet" media="screen and (min-width:1025px)" href="style/progetti/progetti_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:721px)" href="style/progetti/progetti_tablet.css">
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/progetti/progetti_mobile.css">
		<link rel="stylesheet" media="print" href="style/progetti/progetti_print.css">
	</head>
	<body>
        <!--SCRIPT-->
		<script type="text/javascript" src="script/menuScript.js"></script>

		<!-- NAVIGATION -->
		<button id="compact_menu" onclick="display_navbar(this)">
            <div class="cm_line"></div>
            <div class="cm_line"></div>
            <div class="cm_line"></div>
        </button>

        <div id="navbar">
            <a id="home_link" href="index.html"><img id="logo" src="images/logo.png"></a>
            <div class="dropdown">
                <button id="menu_bt1" class="drop_button" onclick="display_content(this)">Azienda</button>
                <div id="content_menu_bt1" class="drop_content">
                    <a href="azienda.php"><pre>Storia&#9&#9&gt</pre></a>
                    <a href="azienda.php"><pre>Sedi&#9&#9&#9&gt</pre></a>
                    <a href="azienda.php"><pre>Persone&#9&#9&gt</pre></a>
                </div>
            </div>
            <div class="dropdown">
                <button id="menu_bt2" class="drop_button" onclick="display_content(this)">Progetti</button>
                <div id="content_menu_bt2" class="drop_content">
                    <a href="progetti.php"><pre>In corso&#9&#9&gt</pre></a>
                    <a href="progetti.php#header2"><pre>Terminati&#9&#9&gt</pre></a>
                </div>
            </div>
            <div class="dropdown">
                <button id="menu_bt3" class="drop_button" onclick="display_content(this)">Iniziative</button>
                <div id="content_menu_bt3" class="drop_content">
                    <a href="iniziative.php"><pre>Sponsor&#9&#9&#9&gt</pre></a>
                    <a href="iniziative.php"><pre>Stampa&#9&#9&#9&gt</pre></a>
                    <a href="iniziative.php"><pre>Lavora con Noi&#9&gt</pre></a>
                </div>	
            </div>
            <a href="#div_container_contatti" id="contacts">Contatti</a>
            <a href="login.php?compilato=0" id="admin">Area Privata</a>
            <button id="close" onclick="close_navbar(this)">X</button>
        </div>
        <div id="navbar_bottom_padding"></div>

        <button id="grid_view" class="view">Griglia</button>
        <button id="list_view" class="view">Lista</button>

		<!-- PROGETTI -->
        <?php include "DBConnection.php";
            $conn=new DBConnection();
            $conn->get_progetti();
        ?>
	</body>
</html>