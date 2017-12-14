function display_navbar(cm) {
    document.getElementById("navbar").style.left="0%";
    cm.style.display="none";
}
function close_navbar(cl) {
    document.getElementById("navbar").style.left="-100%";
    document.getElementById("compact_menu").style.display="block";
}