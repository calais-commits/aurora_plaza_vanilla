$(document).ready(function() {
  // Al cargar la página, mostrar las imágenes según la resolución inicial de la pantalla
  showImages();

  // Al cambiar el tamaño de la ventana, actualizar la visibilidad de las imágenes
  $(window).resize(function() {
    showImages();
  });
});

function showImages() {
  var screenWidth = $(window).width();

  // Mostrar 3 imágenes en pantallas medianas
  if (screenWidth >= 768 && screenWidth < 992) {
    $('.carousel-item').addClass('d-none');
    $('.carousel-item').slice(0, 3).removeClass('d-none');
  }
  // Mostrar 5 imágenes en pantallas grandes
  else if (screenWidth >= 992) {
    $('.carousel-item').addClass('d-none');
    $('.carousel-item').slice(0, 5).removeClass('d-none');
  }
  // Mostrar todas las imágenes en pantallas pequeñas
  else {
    $('.carousel-item').removeClass('d-none');
  }
}