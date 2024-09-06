document.addEventListener('DOMContentLoaded', function() {
  var lastScrollTop = 0;

  window.addEventListener('scroll', function() {
    var currentScroll = window.pageYOffset || document.documentElement.scrollTop;
    var scrollAmount = 15;

    if (Math.abs(currentScroll - lastScrollTop) > scrollAmount) {
      // Calcular la dirección del desplazamiento
      var scrollDirection = currentScroll > lastScrollTop ? 1 : -1;
      
      // Detener el desplazamiento
      window.scrollTo({
        top: lastScrollTop + (scrollAmount * scrollDirection),
        behavior: 'smooth'
      });
    }
    
    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // Para el desplazamiento en dispositivos móviles o desplazamiento negativo
  });
});



