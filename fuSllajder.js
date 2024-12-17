
const slider = document.querySelector('.slider');
let currentIndex = 0;

function autoSlide() {
    const slides = slider.children;
    const slideWidth = slides[0].clientWidth;

    // Lëviz slider-in në slide-in e radhës
    currentIndex = (currentIndex + 1) % slides.length;
    slider.scrollTo({
        left: currentIndex * slideWidth,
        behavior: 'smooth'
    });
}

// Nise lëvizjen automatike
setInterval(autoSlide, 3000); // Ndryshim çdo 3 sekonda

