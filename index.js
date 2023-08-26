
$(document).ready(function () {

  var screenWidth = $(window).width();

  if (screenWidth <= 767) {
    $(".btn-info").addClass("w-100");
    $(".carousel-item").css("width", "100%");
  }

  $(window).resize(function () {
    var screenWidth = $(window).width();

    if (screenWidth <= 767) {
      $(".btn-info").addClass("w-100");
      $(".carousel-item").css("width", "100%");
    }
    else{
      $(".btn-info").removeClass("w-100");
    }
  });



  /* Tener el ancho entero del carousel: scrollWidth*/
  var carouselWidth = $(".cards-inner")[0].scrollWidth;

  /* Tener el ancho de cada carta: Width() */
  var cardWidth = $(".cards-item").width();

  /* Variable que almacena la posición actual del scroll que inicializará en 0 */
  var scrollPosition = 0;

  /* Cuando el botón "next" sea presionado, verificar si se llegó a la 7ma carta, porque no queremos seguir scrolleando */
  $(".carousel-control-next").on("click", function () {
    if (scrollPosition < (carouselWidth - cardWidth * 4)) { /* Verificar si podemos seguir scrolleando */
      scrollPosition += cardWidth; /* Actualizar posición del scroll */
      $(".cards-inner").animate({ scrollLeft: scrollPosition }, 600); /* Scrollear a la izquierda */
    }
  });

  /* Similarmente, cuando el botón "previus" sea presionado, verificar si estamos en la primera carta */
  $(".carousel-control-prev").on("click", function () {
    if (scrollPosition > 0) {
      scrollPosition -= cardWidth;
      $(".cards-inner").animate(
        { scrollLeft: scrollPosition },
        600
      );
    }
    $(document).ready(function () {
      // Espera a que el documento esté listo

      // Obtén el elemento del [carrusel](https://www.google.com/search?q=carrusel) por su clase o identificador
      var carouselItem = $('.carousel-item');

      // Modifica el ancho del elemento del [carrusel](https://www.google.com/search?q=carrusel)
      carouselItem.css('width', '100%');
    });
  });
});