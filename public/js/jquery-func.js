function changeLight() {
    var element = document.getElementById("light");
    element.classList.toggle("lightsoff");
    var x = document.getElementById("onover");
    if (!x.style.display||x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }


}
