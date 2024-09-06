/* Función para que la imagen y el texto se hagan más pequeños cuando se haga scroll
    y cuando llegue al inicio se vuelva del tamaño inicial */

window.addEventListener('scroll', function() {
    const logoContainer = document.querySelector('#logoGatoHeader');
    const hi = this.document.querySelector('#hii');
    const contenedor = this.document.querySelector('#enlaceHome');
    const header = document.querySelector('header');
    const contenedorMenu = document.querySelector(".contenedorMenu");
    let scrollPosition = window.scrollY;

    // Cambiar el tamaño del div cuando se hace scroll
    if (scrollPosition > 0) {
        logoContainer.style.width = '80px';
        logoContainer.style.height = '80px';
        // logoContainer.style.transform = 'scale(1)';
        logoContainer.style.opacity = '70%';

        hi.style.fontSize = '70px';
        contenedor.style.marginTop = '1%';
        header.style.background = 'linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 100%)';
        header.style.paddingLeft = "1%";
        contenedorMenu.style.marginRight = "2%";
        hi.style.display = "none";
    } else {
        logoContainer.style.width = '200px';
        logoContainer.style.height = '200px';
        // logoContainer.style.transform = 'scale(1.5)';
        logoContainer.style.opacity = '100%';

        hi.style.fontSize = '150px';
        contenedor.style.marginTop = '0';
        header.style.paddingLeft = "0";
        contenedorMenu.style.marginRight = "0";
        contenedorMenu.style.marginRight = "1%";
        hi.style.display = "block";
    }
});

// CONDICIONAL QUE CAMBIA EL ICONO DEL HEADER SI SE RECARGA LA PAGINA

if (sessionStorage.getItem('pageReloaded')) {
    const iconHeader = document.getElementById('logoGatoHeader');
    iconHeader.setAttribute('src', './img/LOGO_GATO_V2.png');
} else {
    sessionStorage.setItem('pageReloaded', 'true');
}