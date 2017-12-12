/*var index = 0;
changeImage();
function changeImage() {
    var i;
    var x = document.getElementsByClassName("home_image");
    for (i = 0; i < x.length; i++) {
       x[i].style.display="none";
    }
    index++;
    if (index > x.length) {index = 1}
    x[index-1].style.display="block";
    setTimeout(changeImage, 5000);
}*/
function display_navbar(cm) {
    document.getElementById("navbar").style.display="block";
    document.getElementById("close_menu").style.display="block";
    cm.style.display="none";
}
function close_navbar(closebtn) {
    document.getElementById("navbar").style.display="none";
    document.getElementById("compact_menu").style.display="block";
    closebtn.style.display="none";
}
