const hambuger_btn = document.querySelector("#hamburger"),
    header = document.querySelector("header");

hambuger_btn.addEventListener("click",function (e) {
    const nav_menu = hambuger_btn.nextElementSibling;
    hambuger_btn.classList.toggle("hamburger-active");
    nav_menu.classList.toggle("hidden");
})

window.addEventListener("scroll",function (e){
    const fixed_nav = header.offsetTop;
    window.pageYOffset > fixed_nav ? header.classList.add("navbar-fixed") : header.classList.remove("navbar-fixed");
})