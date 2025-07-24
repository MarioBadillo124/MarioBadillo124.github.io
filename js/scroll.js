document.addEventListener('DOMContentLoaded', () => {
    let lastScrollTop = 0;
    const header = document.querySelector('header');
    
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
        
        if (currentScroll > lastScrollTop) {
            // Desplazamiento hacia abajo
            header.classList.remove('visible');
            header.classList.add('hidden');
        } else {
            // Desplazamiento hacia arriba
            header.classList.remove('hidden');
            header.classList.add('visible');
        }
        
        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Para evitar el valor negativo
    });
});
