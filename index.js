// для слайд-шоу
let slideIndex = 1;
showSlides(slideIndex);


function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    const slides = document.getElementsByClassName("mySlides");
    const dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}

//для кнопки на главной странице
function show_info(num) {
    const season = document.getElementsByClassName('season_about');
    season[num].classList.toggle('have');
    const name = document.getElementsByClassName('season_name');
    name[num].classList.toggle('new_color_text');
}

//для кнопки на странице Обсуждения
function show_discuss(num) {
    const dis = document.getElementsByClassName('discuss');
    dis[num].classList.toggle('not_show');
}

function comm(num) {
    const com = document.getElementsByClassName('form');
    com[num].submit();
    return false;
}


