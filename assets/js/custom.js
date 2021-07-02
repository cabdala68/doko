/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

jQuery(document).ready(function($) {
 	 $(".frontpage-banner").owlCarousel({
 
      nav : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem: true,
      items : 1,
      navText: [
   		"<i class='fa fa-long-arrow-left'></i>",
   		"<i class='fa fa-long-arrow-right'></i>"
		]
 
  	});

  var window_width =$( window ).width();

  if(window_width <= 640 )
  {
    var slider_item = 1;
  }
  else {
    var slider_item = 2;
  }

 	 $(".testimonials").owlCarousel({
      nav : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem: true,
      margin: 110,
      items : slider_item,
      navText: [
   		"<i class='fa fa-long-arrow-left'></i>",
   		"<i class='fa fa-long-arrow-right'></i>"
		]


  	});

    /* Search button */
    var $searchHeader = $('.search-s'), 
      $search = $searchHeader.find('.searchbox-icon');
    if($search.length > 0){

      $searchHeader.off().on('click', function(e) {
        var self = $(this),
        $search = self.find('.searchbox-icon');
        $search.toggleClass('searchbox-open');
        e.stopPropagation();
      });

      $search.off().on('click', function(e) {
            e.stopPropagation();
      });


      $(document).click(function(e){
        if(!$(e.target).closest('.searchbox-icon').length){
            $search.removeClass('searchbox-open');
        }
      });

      $(document).on('click', function(e) {               
          $search.removeClass('searchbox-open');   
      });

    }

     /* Search button end */




    //isotopes 
     var $grid = $('.works-postse').imagesLoaded( function() {
      // init Isotope after all images have loaded
      $grid.isotope({
        itemSeelctor: '.works-post-wrape',
        layoutMode: 'packery',
      });
    });



    $('.works-post-filter').on( 'click', '.filter', function() {
        $('.works-post-filter .filter').removeClass('active');
        $(this).addClass('active');
      var filterValue = $(this).attr('data-filter');
      $('.works-postse').isotope({ filter: filterValue });
    }); 



      //Navigation toggle
    $("#toggle").click(function () {
       $(this).toggleClass("on");
       $("#primary-menu").toggleClass('menu-on');
    });


    //counter

   $(window).scroll(startCounter);
function startCounter() {
    if ($(window).scrollTop() > 200) {
        $(window).off("scroll", startCounter);
        $('.Count').each(function () {
            var $this = $(this);
            jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
                duration: 5000,
                easing: 'swing',
                step: function () {
                    $this.text(Math.ceil(this.Counter));
                }
            });
        });
    }
}


// scroll up icon slow
if ($('.scrollup').length) {
   var scrollTrigger = 100, // px
       goToTop = function() {
           var scrollTop = $(window).scrollTop();
           if (scrollTop > scrollTrigger) {
               $('.scrollup').show();
           } else {
               $('.scrollup').hide();
           }
       };
   //goToTop();
   $(window).on('scroll', function() {
       goToTop();
   });
   $('.scrollup').on('click', function(e) {
       e.preventDefault();
       $('html,body').animate({
           scrollTop: 0
       }, 700);
   });
}



});