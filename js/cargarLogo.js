document.addEventListener("DOMContentLoaded", function() {

    const loadingLogo = document.querySelector('#logoLoading');
    const scrollLogo = document.querySelector('#logoScroll');
    let scrollTimer; // Timer para manejar el debounce en el scroll

    // Mostrar el loading logo inicialmente y definir el tiempo de duración
    loadingLogo.style.display = 'block';
    setTimeout(function() {
        loadingLogo.style.display = 'none';
    }, 1000); // Duración de 1 segundo

    // Función para mostrar el logo de scroll
    function showScrollLogo() {
        if (!scrollLogo.classList.contains('show')) {
            scrollLogo.style.display = 'block'; // Aseguramos que esté visible
            setTimeout(function() {
                scrollLogo.classList.add('show'); // Añadir clase de visibilidad con animación
            }, 20); // Pequeño tiempo de espera para que display: block se aplique antes de añadir la clase
        }
    }

    // Función para ocultar el logo de scroll después de un tiempo sin scroll
    function hideScrollLogo() {
        scrollLogo.classList.remove('show'); // Quitar la clase de visibilidad
        setTimeout(function() {
            scrollLogo.style.display = 'none'; // Ocultar el logo después de la animación
        }, 300); // Tiempo para permitir que la animación finalice
    }

    // Manejar el evento de scroll con debounce
    window.addEventListener('scroll', function() {
        // Mostrar el logo cuando comienza el scroll
        showScrollLogo();

        // Reiniciar el temporizador si se sigue haciendo scroll
        clearTimeout(scrollTimer);

        // Ocultar el logo después de 800ms sin hacer scroll
        scrollTimer = setTimeout(function() {
            hideScrollLogo();
        }, 800);
    });
});
