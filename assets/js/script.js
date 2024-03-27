/* const video = document.getElementById("video");

video.addEventListener("timeupdate", function(){
   
    if(this.currentTime >=  69){
        this.pause();
        this.currentTime = 0;
        this.play();
    }
}); */


const menu = document.querySelector(".nav_menu");
const menuItems = document.querySelectorAll(".menuItem");
const hamburger= document.querySelector(".hamburger");
const closeIcon= document.querySelector(".closeIcon");
const menuIcon = document.querySelector(".menuIcon");

document.addEventListener('DOMContentLoaded', function(){
    const closeIcon = document.querySelector(".closeIcon");
    closeIcon.style.display = "none";
    menu.classList.remove("showMenu");
})

function toggleMenu() {
  if (menu.classList.contains("showMenu")) {
    menu.classList.remove("showMenu");
    closeIcon.style.display = "none";
    menuIcon.style.display = "block";
  } else {
    menu.classList.add("showMenu");
    closeIcon.style.display = "block";
    menuIcon.style.display = "none";
  }
}

hamburger.addEventListener("click", toggleMenu);


