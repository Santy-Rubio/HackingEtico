const SideBarNav = document.getElementById("SideBar");
const HouseOpen = document.getElementById("HouseOpen");
const HouseClose = document.getElementById("HouseClose");

function SideBar(event) {
    event.preventDefault();
    SideBarNav.classList.toggle("OpenBtn");
    HouseOpen.classList.toggle("CloseBtn");
    HouseClose.classList.toggle("CloseBtn");   
}

window.addEventListener("scroll" , function() {
    var navbar = HouseOpen;
    navbar.classList.toggle("Down", window.scrollY > 0);
});

document.addEventListener("DOMContentLoaded", function() {
    window.addEventListener("scroll", function() {
        var scrollPosition = window.scrollY;
        
        // Cambia el valor 60 según sea necesario
        if (scrollPosition > 80) {
            document.getElementById("content").classList.add("effect");
            document.getElementById("content1").classList.add("effect");
        } else {
            document.getElementById("content").classList.remove("effect");
            document.getElementById("content1").classList.remove("effect");
        }
    });
});


function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

function handleScroll() {
    var elements = document.querySelectorAll(".slide-in-bck-left, .slide-in-bck-right");

    elements.forEach(function (element) {
        if (isElementInViewport(element)) {
            element.classList.add("visible");
        }
    });
}

// Manejar el evento de scroll
window.addEventListener("scroll", handleScroll);
window.addEventListener("resize", handleScroll);

// Inicializar al cargar la página
handleScroll();

