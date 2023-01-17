
let slideIndex = 0;
let slideIndex1= 0;
showSlides();
function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  slideIndex1++;
  if (slideIndex > slides.length ) {slideIndex = 1;}  
  if (slideIndex1 > 3){ slideIndex1 = 1;}
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex1-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 5 seconds
}

$(document).ready(function () {
  // typing animation
  (function ($) {
    $.fn.writeText = function (content) {
      var contentArray = content.split(""),
        current = 0,
        elem = this;
      setInterval(function () {
        if (current < contentArray.length) {
          elem.text(elem.text() + contentArray[current++]);
        }
      }, 80);
    };
  })(jQuery);

  // input text for typing animation
  $("#write").writeText("Nous vous proposons un large éventail de recettes testées : Entrées, plats, desserts et boissons!");

});

$(document).ready(function() {
  var currentSlide = 0;
  var slides = $("#carous1 .slide");
  var numSlides = slides.length;

  function goToSlide(index) {
    slides.removeClass("active").eq(index).addClass("active");
    currentSlide = index;
  }

  function nextSlide() {
    goToSlide((currentSlide + 1) % numSlides);
  }

  function prevSlide() {
    goToSlide((currentSlide - 1 + numSlides) % numSlides);
  }

  $("#prev1").click(prevSlide);
  $("#next1").click(nextSlide);
});

$(document).ready(function() {
  var currentSlide = 0;
  var slides = $("#carous2 .slide");
  var numSlides = slides.length;

  function goToSlide(index) {
    slides.removeClass("active").eq(index).addClass("active");
    currentSlide = index;
  }

  function nextSlide() {
    goToSlide((currentSlide + 1) % numSlides);
  }

  function prevSlide() {
    goToSlide((currentSlide - 1 + numSlides) % numSlides);
  }

  $("#prev2").click(prevSlide);
  $("#next2").click(nextSlide);
});

$(document).ready(function() {
  var currentSlide = 0;
  var slides = $("#carous3 .slide");
  var numSlides = slides.length;

  function goToSlide(index) {
    slides.removeClass("active").eq(index).addClass("active");
    currentSlide = index;
  }

  function nextSlide() {
    goToSlide((currentSlide + 1) % numSlides);
  }

  function prevSlide() {
    goToSlide((currentSlide - 1 + numSlides) % numSlides);
  }

  $("#prev3").click(prevSlide);
  $("#next3").click(nextSlide);
});

$(document).ready(function() {
  var currentSlide = 0;
  var slides = $("#carous4 .slide");
  var numSlides = slides.length;

  function goToSlide(index) {
    slides.removeClass("active").eq(index).addClass("active");
    currentSlide = index;
  }

  function nextSlide() {
    goToSlide((currentSlide + 1) % numSlides);
  }

  function prevSlide() {
    goToSlide((currentSlide - 1 + numSlides) % numSlides);
  }

  $("#prev4").click(prevSlide);
  $("#next4").click(nextSlide);
});

