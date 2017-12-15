window.addEventListener("resize", function() {
    var x=screen.width.valueOf();
    if(window.matchMedia("screen and (min-width:720px)").matches) {
        document.getElementById("navbar").style.left="0%";
        document.getElementById("compact_menu").style.display="none";
    }
    else {
        document.getElementById("navbar").style.left="-100%";
        document.getElementById("compact_menu").style.display="block";
    }
});

function display_navbar(cm) {
    document.getElementById("navbar").style.left="0%";
    cm.style.display="none";
}
function close_navbar(cl) {
    document.getElementById("navbar").style.left="-100%";
    document.getElementById("compact_menu").style.display="block";
}