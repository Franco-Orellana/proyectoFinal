window.addEventListener("scroll", function(){

    // efecto de scroll cambia la apariencia del nav//
    var header = document.querySelector("header");
    header.classList.toggle("abajo", window.scrollY > 0);
});