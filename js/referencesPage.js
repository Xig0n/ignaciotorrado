// Registrar el plugin ScrollTrigger
gsap.registerPlugin(ScrollTrigger);

// Seleccionamos todas las imágenes con la clase 'parallax-image'
gsap.utils.toArray(".parallaxImage").forEach(image => {

  // Creamos el efecto parallax desplazando las imágenes hacia arriba
  gsap.to(image, {
    y: -1000, // Desplazar la imagen hacia arriba 200px
    ease: "none", // Sin efecto de aceleración
    scrollTrigger: {
      trigger: image, // El disparador es la propia imagen
      start: "top bottom", // Inicia cuando el top de la imagen entra en el viewport
      end: "bottom top", // Termina cuando el bottom de la imagen sale del viewport
      scrub: true, // Hace que la animación siga el scroll
    }
  });
});


gsap.to(".referencesTitle", {
    translateX: 0, // Mover a su posición original
    scrollTrigger: {
      trigger: ".referencesTitle", // El disparador es el título
      start: "90% 90%", // La animación comienza cuando el top del título toca el top del viewport
      end: "end end ", // Termina cuando el título está fuera del viewport
      scrub: true, // Hace que la animación siga el scroll
      pin: true, // Mantiene el título fijo mientras ocurre la animación
    }
  });

// document.addEventListener("DOMContentLoaded", (event) => {
//   gsap.registerPlugin(ScrollTrigger)
//   // gsap code here!
//  });