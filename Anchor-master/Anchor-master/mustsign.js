var buttons2 = document.querySelectorAll(".mustsign");

for (var i = 0; i < buttons2.length; i++) {

    buttons2[i].addEventListener("click", function(event) {
        event.preventDefault();
        var popup2 = document.querySelector(".popupmustsign");
        popup2.style.display = "flex";
        popup2.style.top = window.pageYOffset + "px";
        popup2.style.left = window.pageXOffset + "px";

        document.body.style.overflow = "hidden";
    });
}

document.getElementById("close2").addEventListener("click", function() {
    document.querySelector(".popupmustsign").style.display = "none";
    document.body.style.overflow = "auto";
});

// xx

