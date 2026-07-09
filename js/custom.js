$(window).scroll(function(){
    if ($(this).scrollTop() > 114) {
       $('.navbar').addClass('fix-nav');
    } else {
       $('.navbar').removeClass('fix-nav');
    }
});  

$(window).scroll(function(){
    if ($(this).scrollTop() > 120) {
       $('.footers').addClass('fix-nav');
    } else {
       $('.footers').removeClass('fix-nav');
    }
});  

$(document).ready(function() {
               var owl = $('.owl-theme');
              owl.owlCarousel({
                margin: 15,
                 nav: true,
				 
                loop: true,
                responsive: {
                  0: {
                    items: 4
                  },
                  600: {
                    items: 2
                  },
                  1000: {
                    items: 4
                  }
                }
              })
            });

  $(document).ready(function() {
               var owl = $('.owl_1');
              owl.owlCarousel({
                margin: 10,
                 nav: true,
				 
                loop: true,
                responsive: {
                  0: {
                    items: 4
                  },
                  600: {
                    items: 2
                  },
                  1000: {
                    items: 4
                  },
					       autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true
                }
              })
            });

  jQuery(document).ready(function() {
               var owl = $('.owl-gallery');
              owl.owlCarousel({
                margin: 0,
                 nav: true,
				 
                loop: true,
                responsive: {
                  0: {
                    items: 4
                  },
                  600: {
                    items: 2
                  },
                  1000: {
                    items: 4
                  },
						       autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true
                }
              })
            });


$(document).ready(function() {
    $('.navbar a.dropdown-toggle').on('click', function(e) {
        var $el = $(this);
        var $parent = $(this).offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if(!$parent.parent().hasClass('nav')) {
            $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
        }

        $('.nav li.open').not($(this).parents("li")).removeClass("open");

        return false;
    });
});
