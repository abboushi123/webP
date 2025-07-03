var buttons3 = document.querySelectorAll(".addevent");

for (var i = 0; i < buttons3.length; i++) {

    buttons3[i].addEventListener("click", function(event) {
        event.preventDefault();
        var popup3 = document.querySelector(".popupaddevent");
        popup3.style.display = "flex";
        popup3.style.top = window.pageYOffset + "px";
        popup3.style.left = window.pageXOffset + "px";

        document.body.style.overflow = "hidden";
    });
}

document.getElementById("close3").addEventListener("click", function() {
    document.querySelector(".popupaddevent").style.display = "none";
    document.body.style.overflow = "auto";
});


//