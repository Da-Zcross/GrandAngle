
<footer>
    <ul>
        <li><a href="">Mentions légales</a></li>
        <li>Gallerie Grand Angle &copy 2024</li>
    </ul>
</footer>
<script src="../assets/js/trad.js"></script>
<script src="../assets/js/script.js"></script>
<script>
    function selectType() {
    document.getElementById('select_type').submit();
}
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const boutonLecture = document.getElementById('lectureVocale');
        let syntheseVocale = null;

        boutonLecture.addEventListener('click', function() {
            if (syntheseVocale && window.speechSynthesis.speaking) {
                window.speechSynthesis.cancel();
                syntheseVocale = null;
                return;
            }

            const elementsDimensions = document.querySelectorAll('.Dimensions');
            const contenuTotal = Array.from(elementsDimensions).map(element => element.innerText).join(' ');

            // Correction pour récupérer la valeur du sélecteur de langue
            const selectedLang = document.querySelector('#select_lang select').value.toUpperCase();
            syntheseVocale = new SpeechSynthesisUtterance(contenuTotal);
            syntheseVocale.lang = selectedLang;
            window.speechSynthesis.speak(syntheseVocale);
        });
    });
</script>
<script>
  const AUTO_PLAY_SECOND = 4000;

let carousel = document.querySelector(".carousel");
let dots = document.querySelectorAll(".dot a");
let slides = document.querySelector(".slides");
let slideCount = dots.length;

let setActiveIndex = (activeIndex) => {
  dots.forEach(dot => dot.classList.remove("active"));
  dots[activeIndex].classList.add("active");
  carousel.style.setProperty("--active-index", `${activeIndex}`);
};

let scrollLeft = () => {
  let minIndex = false;
  let activeIndex = Number(carousel.style.getPropertyValue("--active-index"));
  activeIndex--;
  if (activeIndex === -1) {
    minIndex = true;
    activeIndex = slideCount - 1;
  }
  setActiveIndex(activeIndex);
  if (minIndex) {
    slides.scrollBy(carousel.offsetWidth * (slideCount - 1), 0);
  } else {
    slides.scrollBy(-carousel.offsetWidth, 0);
  }
};

let scrollRight = () => {
  let maxIndex = false;
  let activeIndex = Number(carousel.style.getPropertyValue("--active-index"));
  activeIndex++;
  if (activeIndex === slideCount) {
    maxIndex = true;
    activeIndex = 0;
  }
  setActiveIndex(activeIndex);
  if (maxIndex) {
    slides.scrollBy(-carousel.offsetWidth * (slideCount - 1), 0);
  } else {
    slides.scrollBy(carousel.offsetWidth, 0);
  }
};

// auto play
let autoPlayTimer = setInterval(scrollRight, AUTO_PLAY_SECOND);
let canAutoPlay = carousel.classList.contains("auto-play");
if (!canAutoPlay) {
  clearInterval(autoPlayTimer);
}

let resetTimer = () => {
  if (canAutoPlay) {
    clearInterval(autoPlayTimer);
    autoPlayTimer = setInterval(scrollRight, AUTO_PLAY_SECOND);
  }
};

// dots
dots[0].classList.add("active");
dots.forEach((dot, activeIndex) => {
  dot.addEventListener("click", () => {
    resetTimer();
    setActiveIndex(activeIndex);
  });
});


</script>
    </body>

</html>