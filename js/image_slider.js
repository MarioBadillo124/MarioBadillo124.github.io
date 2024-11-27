// script.js
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');
const sliderTrack = document.querySelector('.slider-track');
const slides = document.querySelectorAll('.slide');
const indicators = document.querySelectorAll('.indicator');
let index = 0;
let autoplay;

function showSlide(newIndex) {
    // Asegurarnos de que el índice esté dentro del rango de las imágenes
    if (newIndex < 0) {
        index = slides.length - 1;
    } else if (newIndex >= slides.length) {
        index = 0;
    } else {
        index = newIndex;
    }

    // Animación de deslizamiento con GSAP
    gsap.to(sliderTrack, {
        x: -index * 100 + '%',
        duration: 0.8,
        ease: 'power2.out',
    });

    // Actualizar indicadores
    indicators.forEach((indicator, i) => {
        indicator.classList.remove('active');
        if (i === index) {
            indicator.classList.add('active');
        }
    });
}

function startAutoplay() {
    autoplay = setInterval(() => {
        showSlide(index + 1);
    }, 3000); // Cambiar de imagen cada 3 segundos
}

function stopAutoplay() {
    clearInterval(autoplay);
}

prevButton.addEventListener('click', () => {
    showSlide(index - 1);
    stopAutoplay();  // Detener el autoplay cuando se navega manualmente
    startAutoplay(); // Reiniciar el autoplay
});

nextButton.addEventListener('click', () => {
    showSlide(index + 1);
    stopAutoplay();
    startAutoplay();
});

// Añadir funcionalidad para los indicadores
indicators.forEach((indicator, i) => {
    indicator.addEventListener('click', () => {
        showSlide(i);
        stopAutoplay();
        startAutoplay();
    });
});

// Inicializamos el slider y el autoplay
showSlide(index);
startAutoplay();
