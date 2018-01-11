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
		<link rel="stylesheet" media="screen and (min-width:1025px)" href="style/prenotazioni/prenotazioni_desktop.css">
		<link rel="stylesheet" media="screen and (max-width:1024px) and (min-width:721px)" href="style/prenotazioni/prenotazioni_tablet.css">
		<link rel="stylesheet" media="screen and (max-width:720px)" href="style/prenotazioni/prenotazioni_mobile.css">
		<link rel="stylesheet" media="print" href="style/prenotazioni/prenotazioni_print.css">
	</head>
	<body>
    <body>
        
        <a id="back_link" href="lavoro.php">Indietro</a>
        
        <?php
            $conn->get_prenotation();
        ?>
	</body>
</html>