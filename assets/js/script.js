const video = document.getElementById("video");

video.addEventListener("timeupdate", function(){
   
    if(this.currentTime >=  69){
        this.pause();
        this.currentTime = 0;
        this.play();
    }
});


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

document.addEventListener("DOMContentLoaded", function () {
    const slider = document.querySelector("#projets .slider");
  
    function activate(e) {
      const items = document.querySelectorAll(".item2");
      e.target.matches(".next") && slider.append(items[0]);
      e.target.matches(".prev") && slider.prepend(items[items.length - 1]);
    }
  
    document.addEventListener("click", activate,);
  });
  $(document).ready(function () {
    
    function adjustBehavior() {
      if ($(window).width() > 1100) {
        $("nav").on("mouseleave", function () {
          $("nav").slideUp("2000", function () {
            $(".vide").fadeIn("slow");
          });
        });
  
        $(".vide").on("mouseover", function () {
          $(".vide").fadeOut("slow", function () {
            $("nav").slideDown("2000");
          });
        });
  
        
        if ($("nav").is(":hidden")) {
          $("nav").show();
        }
      } else {
        
        $("nav").off("mouseleave");
        $(".vide").off("mouseover");
      }
    }
  
    
    adjustBehavior();
  
    
    $(window).resize(function () {
      
      adjustBehavior();
    });
  });

  
