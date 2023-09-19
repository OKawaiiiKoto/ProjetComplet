let menuBurger = document.querySelector(".burger")
let navLinks = document.querySelector (".links")
menuBurger.addEventListener('click',()=>{
navLinks.classList.toggle('menu-mobile')
})