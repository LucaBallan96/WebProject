<?php

echo"<input id='compact_menu' onclick='changeTitle()' type='checkbox'/>
<label id='cm_label' tabindex='0'  for='compact_menu' title='Visualizza le opzioni del menu'>
    <div id='cont_cm_line'>
    <div class='cm_line'></div>
    <div class='cm_line'></div>
    <div class='cm_line'></div>
    </div>
    <div id='cont_img'><img id ='imgl' src='images/logo.png'/></div>
</label>

<div id='navbar'>
    <a id='home_link' href='index.php' ><img id='logo' src='images/logo.png' title='Vai alla pagina iniziale' alt='logo Costruzioni Bordignon S.r.l.' ></a>
    <div class='dropdown'>
        <a id='menu_bt1' class='drop_button' href='azienda.php' title='Visualizza le informazioni sull'azienda'>Azienda</a>
        <div id='content_menu_bt1' class='drop_content'>
            <a href='azienda.php#storia' title='Leggi la storia dell'azienda'>Storia<div>&gt</div></a>
            <a href='azienda.php#sedi' title='Visualizza le sedi in cui opera l'azienda'>Sedi<div>&gt</div></a>
            <a href='azienda.php#persone' title='Visualizza gli impiegati dell'azienda'>Persone<div>&gt</div></a>
        </div>
    </div>
    <div class='dropdown'>
        <a id='menu_bt2' class='drop_button' href='progetti.php' title='Visualizza i progetti in cui si impegna l'azienda'>Progetti</a>
        <div id='content_menu_bt2' class='drop_content'>
            <a href='progetti.php' title='Visualizza i progetti in corso'>In corso<div>&gt</div></a>
            <a href='progetti.php#terminati' title='Visualizza i progetti terminati'>Terminati<div>&gt</div></a>
        </div>
    </div>
    <div class='dropdown'>
        <a id='menu_bt3' class='drop_button' href='iniziative.php' title='Visualizza gli articoli sull'azienda e le certificazioni ricevute'>Iniziative</a>
        <div id='content_menu_bt3' class='drop_content'>
            <a href='iniziative.php#stampa' title='Leggi gli articoli che trattano dell'azienda'>Stampa<div>&gt</div></a>
            <a href='iniziative.php#certificazioni' title='Visualizza le certificazioni'>Certificazioni<div>&gt</div></a>
        </div>
    </div>
    <a href='lavoro.php' id='work' title='Visualizza le offerte di lavoro e fissa un colloquio con l'azienda'>Lavora con noi</a>
    <a href='#div_container_contatti' id='contacts' title='Visualizza i nostri contatti, potrai chiamarci o mandare una mail per ricevere ulteriori informazioni'>Contatti</a>";
    
        if(!isset($_SESSION['username']))
            echo "<a href='login.php' id='login' title='Accedi con le tue credenziali oppure registrati se ancora non possiedi un account'>Login</a>";
        else {
            echo "<a href='logout.php' id='login' title='Effettua il logout dal sito'>Logout</a>
                <a href='info_utente.php' id='user' title='Visualizza le informazioni relative al tuo account'>".$_SESSION['username']."</a>";
        }
        if(isset($_SESSION['admin']))
            echo "<a href='admin.php' id='admin' title='Entra nell&#39area amministrativa del sito'>Area privata</a>";

    echo"</div> ";

?>