const slides = document.querySelectorAll('.slider img');
let currentIndex = 0;

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === index) {
            slide.classList.add('active');
        }
    });
}

function startSlider() {
    setInterval(() => {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }, 3000); // Change slide every 3 seconds
}

document.addEventListener('DOMContentLoaded', startSlider);
