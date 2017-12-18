<?php
    echo '<button id="compact_menu" onclick="display_navbar(this)">
            <div class="cm_line"></div>
            <div class="cm_line"></div>
            <div class="cm_line"></div>
        </button>

        <div id="navbar">
            <a id="home_link" href="index.html"><img id="logo" src="images/logo.png"></a>
            <div class="dropdown">
                <button id="menu_bt1" class="drop_button" onclick="display_content(this)">Azienda</button>
                <div id="content_menu_bt1" class="drop_content">
                    <a href="#"><pre>Storia&#9&#9&gt</pre></a>
                    <a href="#"><pre>Sedi&#9&#9&#9&gt</pre></a>
                    <a href="#"><pre>Persone&#9&#9&gt</pre></a>
                </div>
            </div>
            <div class="dropdown">
                <button id="menu_bt2" class="drop_button" onclick="display_content(this)">Progetti</button>
                <div id="content_menu_bt2" class="drop_content">
                    <a href="progetti.html"><pre>In corso&#9&#9&gt</pre></a>
                    <a href="#"><pre>Terminati&#9&#9&gt</pre></a>
                </div>
            </div>
            <div class="dropdown">
                <button id="menu_bt3" class="drop_button" onclick="display_content(this)">Iniziative</button>
                <div id="content_menu_bt3" class="drop_content">
                    <a href="#"><pre>Sponsor&#9&#9&#9&gt</pre></a>
                    <a href="#"><pre>Stampa&#9&#9&#9&gt</pre></a>
                    <a href="#"><pre>Lavora con Noi&#9&gt</pre></a>
                </div>	
            </div>
            <button id="contacts">Contatti</button>
            <button id="admin">Area Privata</button>
            <button id="close" onclick="close_navbar(this)">X</button>
        </div>';
?>