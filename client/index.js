$(document).ready(function () {

  var screenWidth = $(window).width();

  function addStyles() {
    /* Second section styles */
    $("#second-section-text-container").removeClass("col-6");
    $("#second-section-text-container").addClass("row-6");
    $("#second-section-img-container").removeClass("col-6");
    $("#second-section-img-container").addClass("row-6");
    $("#second-section-title").addClass("text-center");
    $(".img-container").addClass("w-100");
    
    /* Carousel styles */
    $(".btn-info").addClass("w-100");
    $(".carousel-item").css("width", "100%");
    $(".btn-info").addClass("w-100");
  }

  function removeStyles (){
    /* Second section styles */
    $("#second-section-text-container").addClass("col-6");
    $("#second-section-text-container").removeClass("row-6");
    $("#second-section-img-container").addClass("col-6");
    $("#second-section-img-container").removeClass("row-6");
    $("#second-section-title").removeClass("text-center");
    $(".img-container").removeClass("w-100");
    /* Carousel styles */
    $(".btn-info").removeClass("w-100");
    $(".carousel-item").css("width", "100%");
    $(".btn-info").removeClass("w-100");
    $(".carousel-item").css("width", "100%");
  }

  if (screenWidth <= 767) {
    addStyles();
    
  }else if (screenWidth > 1050){
    $(".second-part-footer-container").css("margin-left", "1rem");
  }

  $(window).resize(function () {

    var screenWidth = $(window).width();

    
    if (screenWidth > 767) {
      removeStyles();
    } else if(screenWidth <=767){
      addStyles();
    }
    
    if (screenWidth > 1050){
      $(".second-part-footer-container").css("margin-left", "1rem");
    }

  });



  // Get carousel width
  var carouselWidth = $(".cards-inner")[0].scrollWidth;

  // Get card width
  var cardWidth = $(".cards-item").width();

  //Variable that save the actual position of the scroll that will initialize in 0
  var scrollPosition = 0;

  //When the button next is pressed, verify if the 7th card was reached, beacuse don't want to keep scrolling
  $(".carousel-control-next").on("click", function () {
    if (scrollPosition < (carouselWidth - cardWidth * 4)) { /* Verificar si podemos seguir scrolleando */
      scrollPosition += cardWidth; // Update scroll position
      $(".cards-inner").animate({ scrollLeft: scrollPosition }, 600); /* Scrollear a la izquierda */
    }
  });

  //When the previus button is pressed, verify if we are in the first card
  $(".carousel-control-prev").on("click", function () {
    if (scrollPosition > 0) {
      scrollPosition -= cardWidth;
      $(".cards-inner").animate(
        { scrollLeft: scrollPosition },
        600
      );
    }
    $(document).ready(function () {
      // Wait until the document is ready
       
      //Get the element of the carousel by his class o identifyer
      var carouselItem = $('.carousel-item');
      
      //Modify the width of the element of the carousel
      carouselItem.css('width', '100%');
    });
  });
});
