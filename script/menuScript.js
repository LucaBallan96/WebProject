// CLICK SU CONTATTI
function close_navbar() {
    document.getElementById('cm_label').click();
}

// UNCHECKABLE RADIO BUTTONS
var last='none';
function uncheck_radio(rad) {
    if(rad.id==last) {
        rad.checked=false;
        window.last='none';
    }
    else
        last=rad.id;
}

// TASTO INVIO SUGLI ELEMENTI
document.addEventListener("keypress", keypress);
function keypress(k) {
    if(k.keyCode==13) {
        var act=document.activeElement.id;
        document.getElementById(act).click();
    }
}

// CAMBIA TITLE
function changeTitle(input){
    if(input.id=="compact_menu") {
        label=document.getElementById("cm_label");
        if(input.checked == true)
            label.title="Chiudi";
        else
            label.title="Visualizza le opzioni del menu";
    }
    // articoli
    else if(input.id.startsWith("mod_art_checkbox")) {
        last_num=input.id.substring(16);
        label=document.getElementById("mod_art_lab".concat(last_num));
        if(input.checked == true)
            label.title="Chiudi";
        else
            label.title="Modifica i dati dell'articolo";
    }
    else if(input.id.startsWith("rem_art_checkbox")) {
        last_num=input.id.substring(16);
        label=document.getElementById("rem_art_lab".concat(last_num));
        if(input.checked == true)
            label.title="Chiudi";
        else
            label.title="Rimuovi i dati dell'articolo";
    }
    // utenti
    else if(input.id.startsWith("mod_u_checkbox")) {
        last_num=input.id.substring(14);
        label=document.getElementById("mod_u_lab".concat(last_num));
        if(input.checked == true)
            label.title="Chiudi";
        else
            label.title="Visualizza l'elenco delle prenotazioni'";
    }
    else if(input.id.startsWith("rem_u_checkbox")) {
        last_num=input.id.substring(14);
        label=document.getElementById("rem_u_lab".concat(last_num));
        if(input.checked == true)
            label.title="Chiudi";
        else
            label.title="Visualizza l'elenco delle prenotazioni'";
    }
    // offerte
    else if(input.id.startsWith("rem_off_checkbox")) {
        last_num=input.id.substring(16);
        label=document.getElementById("rem_off_lab".concat(last_num));
        if(input.checked == true)
            label.title="Chiudi";
        else
            label.title="Rimuovi i dati dell'offerta";
    }
    else if(input.id.startsWith("cand_off_checkbox")) {
        last_num=input.id.substring(17);
        label=document.getElementById("cand_off_lab".concat(last_num));
        if(input.checked == true)
            label.title="Chiudi";
        else
            label.title="Visualizza l'elenco delle prenotazioni'";
    }
}

// CAMBIA VISIBILITA' FORM ADMIN
function changeVisibility(elem) {
    var last_char;
    var contr;
    var to_insert;
    var form;
    if(elem.id=="new_imp_btn") {
        contr=document.getElementById("new_imp_control");
        to_insert="Inserisci un nuovo impiegato";
        form="new_imp_form";
    }
    else if(elem.id=="new_proj_btn") {
        contr=document.getElementById("new_proj_control");
        to_insert="Inserisci un nuovo progetto";
        form="new_proj_form";
    }
    else if(elem.id=="new_art_btn") {
        contr=document.getElementById("new_art_control");
        to_insert="Inserisci un nuovo articolo";
        form="new_art_form";
    }
    else if(elem.id=="new_off_btn") {
        contr=document.getElementById("new_off_control");
        to_insert="Inserisci una nuova offerta di lavoro";
        form="new_off_form";
    }
    else if(elem.id.startsWith("mod_imp_lab")) {
        last_char=elem.id.substring(11);
        contr=document.getElementById("modify".concat(last_char));
        to_insert="Modifica i dati dell'impiegato";
        form="mod_imp_div".concat(last_char);
    }
    else if(elem.id.startsWith("rem_imp_lab")) {
        last_char=elem.id.substring(11);
        contr=document.getElementById("remove".concat(last_char));
        to_insert="Rimuovi i dati dell'impiegato";
        form="rem_imp_div".concat(last_char);
    }
    else if(elem.id.startsWith("rem_proj_lab")) {
        last_char=elem.id.substring(12);
        contr=document.getElementById("removeproj".concat(last_char));
        to_insert="Rimuovi i dati del progetto";
        form="rem_proj_div".concat(last_char);
    }
    // apri o chiudi
    if(contr.checked == true) {
        document.getElementById("contall").style.visibility="visible";
        elem.title=to_insert;
    }
    else {
        document.getElementById("contall").style.visibility="hidden";
        elem.style.visibility="visible";
        document.getElementById(form).style.visibility="visible";
        elem.title="Chiudi";
    }
}

// FILTRO PROGETTI
function project_filter(str) {
    projects=document.getElementsByClassName('grid_project');
    for(i=0; i<projects.length; i++) {
        names=projects[i].getElementsByClassName('grid_pr_name');
        locs=projects[i].getElementsByClassName('grid_pr_location');
        if(names[0].innerHTML.toLowerCase().indexOf(str.toLowerCase())+1 || locs[0].innerHTML.toLowerCase().indexOf(str.toLowerCase())+1)
            projects[i].style.display="block";
        else
            projects[i].style.display="none";
    }
    projects=document.getElementsByClassName('list_project');
    for(i=0; i<projects.length; i++) {
        names=projects[i].getElementsByClassName('list_pr_name');
        locs=projects[i].getElementsByClassName('list_pr_location');
        if(names[0].innerHTML.toLowerCase().indexOf(str.toLowerCase())+1 || locs[0].innerHTML.toLowerCase().indexOf(str.toLowerCase())+1)
            projects[i].style.display="block";
        else
            projects[i].style.display="none";
    }
}

// FILTRO OFFERTE
function offer_filter(str) {
    offers=document.getElementsByClassName('label_offer');
    for(i=0; i<offers.length; i++) {
        texts=offers[i].getElementsByClassName('text');
        if(texts[0].innerHTML.toLowerCase().indexOf(str.toLowerCase())+1)
            offers[i].style.display="table";
        else
            offers[i].style.display="none";
    }
    
}

// DATA CORRENTE PER RESTRIZIONI INPUT
var today = new Date();
var todayString = today.toISOString().substring(0, 10);
document.getElementById("art_pub_date").max = todayString;
var offerDates=document.getElementsByClassName('new_off_date');
for(var i=0; i<offerDates.length; i++)
    offerDates[i].min = todayString;
