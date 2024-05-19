var $ = jQuery.noConflict();

/* Script on ready
------------------------------------------------------------------------------*/
$(() => {
	/* Do jQuery stuff when DOM is ready */
  headerHeight();

  // Acf Hero Inner Banner slider
  if ($('.hero-section .hero-slider').length) {
      $('.hero-section .hero-slider').slick({
          dots: false,
          arrows: true,
          fade: true,
          autoplay: true,
          autoplaySpeed: 2500,
          cssEase: 'linear',
          responsive: [
            {
              breakpoint: 480,
              settings: {
                dots: true,
                arrows: false,
              }
            }
          ]
      });
    }

  /** Testimonials slider home page */
  if ($('.testimonials-section .testimonials-slider').length) {
      $('.testimonials-section .testimonials-slider').slick({
          dots: true,
          arrows: false,
          infinite: true,
          slidesToShow: 3,
          slidesToScroll: 1,
          responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
      });
  }

  /** Fetured Post slider home page */
  if ($('.fetured-section .fetured-slider').length) {
      $('.fetured-section .fetured-slider').slick({
          dots: false,
          arrows: true,
          infinite: true,
          slidesToShow: 2,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          responsive: [
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        dots: true,
                        arrows: false,
                    }
                }
            ]
      });
  }


});

/* Script on load
------------------------------------------------------------------------------*/
window.onload = () => {
	/* Do jQuery stuff when DOM is fully loaded, including all frames, objects and images */
};

/* Script on scroll
------------------------------------------------------------------------------*/
window.onscroll = () => {
	/* Do jQuery stuff on Scroll */
  if ($(window).scrollTop() >= 50) {
       $('.main-header').addClass('sticky');
       $('.main-header').find('.header-top:not(.slide-upp)').slideUp('slow');
   } else {
       $('.main-header').removeClass('sticky');
       $('.main-header').find('.header-top:not(.slide-upp)').slideDown('slow');
   }
};

/* Script on resize
------------------------------------------------------------------------------*/

window.onresize = (event) => {
	/* Do jQuery stuff on resize */
  headerHeight();
};

/* Script all functions
------------------------------------------------------------------------------*/
/** Get the header height */
function headerHeight() {
    header_height = $(".main-header").outerHeight();
    $(".main-header").css("position", "Fixed");
    $(".header-space").css("height", header_height);
    $(".mbnav .menu-wrap > .menu-inner").css("padding-top", header_height);
}
