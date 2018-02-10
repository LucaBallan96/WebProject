// CLICK SU CONTATTI
function close_navbar() {
    document.getElementById('cm_label').click();
}

// TASTO INVIO SUGLI ELEMENTI
document.addEventListener("keypress", keypress);
function keypress(k) {
    if(k.keyCode==13) {
        var x=document.activeElement.id;
        document.getElementById(x).click();
    }
}
//CAMBIA TITLE
function changeTitle(){
    input=document.getElementById("compact_menu");
    label=document.getElementById("cm_label");
    if(input.checked == true)
    {
        label.title="Chiudi";
    }
    else{
        label.title="Visualizza le opzioni del menu";
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

// UNCHECKABLE RADIO BUTTONS
last='none';
function uncheck_radio(rad) {
    if(rad.id==last) {
        rad.checked=false;
        window.last='none';
    }
    else
        last=rad.id;
}
