const navCancel = document.getElementById("nav-cancel");
const navBurger = document.getElementById("nav-burger");
const nav = document.getElementById("nav");
    
navBurger.addEventListener("click", function(){
  navBurger.classList.toggle("is-active");
  navCancel.classList.toggle("is-active");
  nav.classList.toggle("is-active");
});
navCancel.addEventListener("click", function(){
  navBurger.classList.toggle("is-active");
  navCancel.classList.toggle("is-active");
  nav.classList.toggle("is-active");
});