var buttons1 = document.querySelectorAll(".joinNow");

for (var i = 0; i < buttons1.length; i++) {

    buttons1[i].addEventListener("click", function(event) {
        event.preventDefault();

        var popup1 = document.querySelector(".popupjoin");
        popup1.style.display = "flex";
        popup1.style.top = window.pageYOffset + "px";
        popup1.style.left = window.pageXOffset + "px";

        document.body.style.overflow = "hidden";
    });
}

document.getElementById("close1").addEventListener("click", function() {
    document.querySelector(".popupjoin").style.display = "none";
    document.body.style.overflow = "auto";
});
//


