let menuBurger = document.querySelector(".burger")
let navLinks = document.querySelector (".links")
menuBurger.addEventListener('click',()=>{
navLinks.classList.toggle('menu-mobile')
})


const scrollToTopButton = document.getElementById("scrollToTopButton");
const scrollDuration = 400; 
function scrollToTop() {
    const scrollStep = window.scrollY / (scrollDuration / 15);
    
    requestAnimationFrame(function smoothScroll() {
        if (window.scrollY > 0) {
            window.scrollTo(0, window.scrollY - scrollStep);
            requestAnimationFrame(smoothScroll);
        }
    });
}
scrollToTopButton.addEventListener("click", function () {
    scrollToTop();
});
window.onscroll = function () {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollToTopButton.style.display = "block";
    } else {
        scrollToTopButton.style.display = "none";
    }
};

