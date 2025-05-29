const menu = document.querySelector("#menu");
const nav_menu = document.querySelector("#nav_menu");
const main = document.querySelector("#main");

menu.addEventListener("click", function (e) {
    if (nav_menu.classList.contains("hidden")) {
        nav_menu.classList.add("mobile");
        nav_menu.classList.remove("hidden");
        main.classList.add("margine");
    } else {
        nav_menu.classList.add("hidden");
        main.classList.remove("margine");
        nav_menu.classList.remove("mobile");
    }
});
