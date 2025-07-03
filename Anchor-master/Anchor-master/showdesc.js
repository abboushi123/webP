var buttons = document.querySelectorAll(".button");

for (var i = 0; i < buttons.length; i++) {

    buttons[i].addEventListener("click", function(event) {
        event.preventDefault();
        var popup = document.querySelector(".popup");
        popup.style.display = "flex";
        popup.style.top = window.pageYOffset + "px";
        popup.style.left = window.pageXOffset + "px";

        document.body.style.overflow = "hidden";
    });
}

document.getElementById("close").addEventListener("click", function() {
    document.querySelector(".popup").style.display = "none";
    document.body.style.overflow = "auto";
});


//