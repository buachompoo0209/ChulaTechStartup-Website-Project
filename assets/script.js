// rev
$('.testimonials-container').owlCarousel({
    loop:true,
  autoplay:true,
  autoplayTimeout:4000,
    margin:10,
    nav:true,
    navText:["<i class='fa-solid fa-arrow-left'></i>","<i class='fa-solid fa-arrow-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        768:{
            items:3
        },
    }
})


// image slide
var slideIndex =1;
showSlides(slideIndex);

function plusSlides(n){
  showSlides(slideIndex += n);
}

function currentSlide(n){
  showSlides(slideIndex = n);
}

function showSlides(n){
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if(n > slides.length){
    slideIndex = 1;
  }
  if(n < 1){
    slideIndex = slides.length;
  }
  for(i = 0; i < slides.length; i++){
    slides[i].style.display = "none";
  }
  for(i = 0; i < dots.length; i++){
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
