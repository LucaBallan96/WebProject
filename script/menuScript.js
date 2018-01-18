window.addEventListener("resize", function() {
    if(window.matchMedia("screen and (min-width:1025px)").matches) {
        document.getElementById("navbar").style.left="0%";
        document.getElementById("compact_menu").style.display="none";
    }
    else {
        document.getElementById("navbar").style.left="-100%";
        document.getElementById("compact_menu").style.display="block";
    }
});

// DATA CORRENTE PER RESTRIZIONI INPUT
var today = new Date();
var todayString = today.toISOString().substring(0, 10);
document.getElementById("art_pub_date").max = todayString;
var offerDates=document.getElementsByClassName('new_off_date');
for(var i=0; i<offerDates.length; i++)
    offerDates[i].min = todayString;

// CAMBIO NAVBAR DESKTOP <-> TABLET/MOBILE
function display_navbar(cm) {
    document.getElementById("navbar").style.left="0%";
    cm.style.display="none";
}
function close_navbar(cl) {
    document.getElementById("navbar").style.left="-100%";
    document.getElementById("compact_menu").style.display="block";
}
function display_content(dropbtn) {
    if(dropbtn.id.endsWith("_open")) {
        dropbtn.id=dropbtn.id.replace("_open","");
        document.getElementById("content_"+dropbtn.id).style.display="none";
    }
    else {
        document.getElementById("content_"+dropbtn.id).style.display="block";
        dropbtn.id += "_open";
    }
}

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