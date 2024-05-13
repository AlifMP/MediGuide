// navbar
const header = document.querySelector("header");
window.addEventListener("scroll", function () {
    header.classList.toggle("sticky", this.window.scrollY > 100);
});
window.onload = function () {
    window.scrollTo(0, 0);
};
