jQuery(document).ready(function($) {
  "use strict";
  //Fame Sticky Header Script
  $('.fame-header.fame-sticky').FameSticky ({
    topSpacing: 0,
    zIndex: 11
  });
  // Mean Menu
  var $navmenu = $('nav');
  var $menu_starts = ($navmenu.data('nav') !== undefined) ? $navmenu.data('nav') : 1199;
  $('.fame-header .fame-navigation').meanmenu({
    meanMenuContainer: '.fame-header .fame-header-right',
    meanMenuOpen: '<span></span>',
    meanMenuClose: '<span></span>',
    meanExpand: '<i class="fa fa-angle-down"></i>',
    meanContract: '<i class="fa fa-angle-up"></i>',
    meanScreenWidth: $menu_starts,
  });

  //Fame Navigation Hover Script
  $('.has-dropdown').on ({
    mouseenter : function() {
      $(this).find('ul.dropdown-nav').first().stop(true, true).slideDown(300);
    },
    mouseleave : function() {
      $(this).find('ul.dropdown-nav').first().stop(true, true).slideUp(300);
    }
  });

  //Fame Add Remove Classes Script
  $('.search-link').on('click', function() {
    $('.fame-search').fadeIn(400);
    $('.fame-search').find('input[type="text"]').focus();
  });
  $('.search-closer').on('click', function() {
    $('.fame-search').fadeOut(400);
  });

  //Fame Get Window Height, Width And Script
  $(window).resize(function() {
    if (screen.width >= 992) {
      $('.fame-sticky-footer .main-wrap-inner').css('margin-bottom', $('.fame-footer').outerHeight());
    }
  });
  $(window).trigger('resize');

  //Fame Set Equal Height Script
  $('.fame-item').matchHeight ({
    property: 'height'
  });

  if($('div').hasClass('fame-image-animation')) {
    $('.fame-image-animation').parents('.elementor-section').addClass('overFlow');
  }

  //Fame Popup Video Script
  $('.fame-popup-video').magnificPopup ({
    mainClass: 'mfp-fade',
    type: 'iframe',
    closeMarkup:'<div class="mfp-close" title="%title%"></div>',
    iframe: {
      patterns: {
        youtube: {
          index: 'youtube.com/',
          id: function(url) {
            var m = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
            if ( !m || !m[1] ) return null;
            return m[1];
          },
          src: 'https://www.youtube.com/embed/%id%?autoplay=1'
        },
        vimeo: {
          index: 'vimeo.com/',
          id: function(url) {
            var m = url.match(/(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/);
            if ( !m || !m[5] ) return null;
            return m[5];
          },
          src: 'https://player.vimeo.com/video/%id%?autoplay=1'
        }
      }
    }
  });

  //Fame File Selector Script
  $('.file-selector').change(function() {
    $(this).parents('label').children('.file-title').text(this.files[0].name);
  });
  $('.file-selector').appendTo('.FileSelector');

  //Fame Owl Carousel Slider Script
  $('.owl-carousel').each(function() {
    var $carousel = $(this);
    var $items = ($carousel.data('items') !== undefined) ? $carousel.data('items') : 1;
    var $items_tablet = ($carousel.data('items-tablet') !== undefined) ? $carousel.data('items-tablet') : 1;
    var $items_mobile_landscape = ($carousel.data('items-mobile-landscape') !== undefined) ? $carousel.data('items-mobile-landscape') : 1;
    var $items_mobile_portrait = ($carousel.data('items-mobile-portrait') !== undefined) ? $carousel.data('items-mobile-portrait') : 1;
    $carousel.owlCarousel ({
      loop : ($carousel.data('loop') !== undefined) ? $carousel.data('loop') : true,
      items : $carousel.data('items'),
      margin : ($carousel.data('margin') !== undefined) ? $carousel.data('margin') : 0,
      dots : ($carousel.data('dots') !== undefined) ? $carousel.data('dots') : true,
      nav : ($carousel.data('nav') !== undefined) ? $carousel.data('nav') : false,
      navText : ["<div class='slider-no-current'><span class='current-no'></span><span class='total-no'></span></div><span class='current-monials'></span>", "<div class='slider-no-next'></div><span class='next-monials'></span>"],
      autoplay : ($carousel.data('autoplay') !== undefined) ? $carousel.data('autoplay') : false,
      autoplayTimeout : ($carousel.data('autoplay-timeout') !== undefined) ? $carousel.data('autoplay-timeout') : 5000,
      animateIn : ($carousel.data('animatein') !== undefined) ? $carousel.data('animatein') : false,
      animateOut : ($carousel.data('animateout') !== undefined) ? $carousel.data('animateout') : false,
      mouseDrag : ($carousel.data('mouse-drag') !== undefined) ? $carousel.data('mouse-drag') : true,
      autoWidth : ($carousel.data('auto-width') !== undefined) ? $carousel.data('auto-width') : false,
      autoHeight : ($carousel.data('auto-height') !== undefined) ? $carousel.data('auto-height') : false,
      center : ($carousel.data('center') !== undefined) ? $carousel.data('center') : false,
      responsiveClass: true,
      dotsEachNumber: true,
      smartSpeed: 600,
      responsive : {
        0 : {
          items : $items_mobile_portrait,
        },
        480 : {
          items : $items_mobile_landscape,
        },
        768 : {
          items : $items_tablet,
        },
        1024 : {
          items : $items,
        }
      }
    });
    var totLength = $('.owl-dot', $carousel).length;
    $('.total-no', $carousel).html(totLength);
    $('.current-no', $carousel).html(totLength);
    $carousel.owlCarousel();
    $('.current-no', $carousel).html(1);
    $carousel.on('changed.owl.carousel', function(event) {
      var total_items = event.page.count;
      var currentNum = event.page.index + 1;
      $('.total-no', $carousel ).html(total_items);
      $('.current-no', $carousel).html(currentNum);
    });
  });

  //Fame Hover Script
  $(window).load(function() {

    // One Page Menu
    var headerheight = $(".fame-header").outerHeight();

    $(".smooth-scroll ul li a[href^='#']").on('click', function (e) {
      var position = $($(this).attr("href")).offset().top-headerheight;
      $("body, html").animate({
        scrollTop: position
      }, 900 );
      e.preventDefault();
    });

    $(".smooth-scroll .mean-container ul li a[href^='#']").on('click', function (e) {
      $(".meanmenu-reveal").click();
    });

    $('.plan-item, .feature-item, .price-item, .portfolio-item, .case-item, .event-item, .news-item, .fame-share-link, .post-item').hover (
      function() {
        $(this).addClass('fame-hover');
      },
      function() {
        $(this).removeClass('fame-hover');
      }
    );

    var $grid = $('.fame-masonry').isotope ({
      itemSelector: '.masonry-item',
      layoutMode: 'packery',
      percentPosition: true,
      isFitWidth: true,
    });
    var filterFns = {
      ium: function() {
        var name = $(this).find('.name').text();
        return name.match(/ium$/);
      }
    };
    $('.masonry-filters.normal-filter').on('click', 'li a', function() {
      var filterValue = $(this).attr('data-filter');
      filterValue = filterFns[ filterValue ] || filterValue;
      $grid.isotope({
        filter: filterValue
      });
    });
    $('.masonry-filters.normal-filter').each(function(i, buttonGroup) {
      var $buttonGroup = $(buttonGroup);
      $buttonGroup.on('click', 'li a', function() {
        $buttonGroup.find('.active').removeClass('active');
        $(this).addClass('active');
      });
    });

    $('.fame-preloader').fadeOut(500);

    if($('div').hasClass('swiper-slides')) {
      $('.swiper-slides').each(function (index) {
        //Fame Swiper Slider Script
        var animEndEv = 'webkitAnimationEnd animationend';
        var swipermw = $('.swiper-container.swiper-mousewheel').length ? true : false;
        var swiperkb = $('.swiper-container.swiper-keyboard').length ? true : false;
        var swipercentered = $('.swiper-container.swiper-center').length ? true : false;
        var swiperautoplay = $('.swiper-container').data('autoplay');
        var swiperloop = $('.swiper-container').data('loop');
        var swipermousedrag = $('.swiper-container').data('mousedrag');
        var swipereffect = $('.swiper-container').data('effect');
        var swiperclikable = $('.swiper-container').data('clickpage');
        var swiperspeed = $('.swiper-container').data('speed');

        //Fame Swiper Slides Script
        var swiper = new Swiper($(this), {
          autoplay: swiperautoplay,
          effect: swipereffect,
          speed: swiperspeed,
          loop: swiperloop,
          paginationClickable: swiperclikable,
          watchSlidesProgress: true,
          simulateTouch: swipermousedrag,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
          mousewheelControl: swipermw,
          keyboardControl: swiperkb,
        });
        swiper.on('slideChange', function (s) {
          var currentSlide = $(swiper.slides[swiper.activeIndex]);
            var elems = currentSlide.find('.animated')
            elems.each(function() {
              var $this = $(this);
              var animationType = $this.data('animation');
              $this.addClass(animationType, 100).on(animEndEv, function() {
                $this.removeClass(animationType);
              });
            });
        });
      });
    }

  });

  //Fame Counter Script
  $('.fame-counter').each( function() {
    var $counter = $(this);
    var swiperdelay = $counter.data('delay');
    var swipertime = $counter.data('time');
    $counter.counterUp ({
      delay: swiperdelay,
      time: swipertime,
    });
  });

  //Fame tooltip script
  $('[data-toggle="tooltip"]').tooltip();

  //Fame Countdown Script
  $('.fame-countdown').each( function() {
    var $countdown = $(this);
    var date = $countdown.data("date");

    var austDay = new Date();
    austDay = new Date(date);

    $countdown.countdown({
      until: austDay,
      format: 'dHMS',
      labels: ['Yers', 'Mnts', 'Weks', 'Days', 'Hrs', 'Min', 'Sec'],
      labels1: ['Yer', 'Mnt', 'Wek', 'Day', 'Hrs', 'Min', 'Sec'],
      layout: ''
      + '<div class="countdown-item"><span class="countdown-value">{dn}</span> <span class="countdown-title">{dl}</span></div>'
      + '<div class="countdown-item"><span class="countdown-value">{hn}</span> <span class="countdown-title">{hl}</span></div>'
      + '<div class="countdown-item"><span class="countdown-value">{mn}</span> <span class="countdown-title">{ml}</span></div>'
      + '<div class="countdown-item"><span class="countdown-value">{sn}</span> <span class="countdown-title">{sl}</span></div>',
      alwaysExpire: true,
      onExpiry: liftOff,
    });
    function liftOff() {
      $('.widget-countdown .widget-title').text('Event Ended!');
    }
  });

  //Fame Floating Sidebar Script
  $(window).scroll(function() {
    var $window = jQuery(window),
    $flotingbar = jQuery('.fame-floating-sidebar'),
    offset = jQuery('.fame-mid-wrap').offset(),
    $scrolling = jQuery('.fame-primary').height(),
    $offsetHeight = jQuery('.fame-primary').offset(),
    $topHeight = 0;
    if (jQuery('.fame-floating-sidebar').length > 0) {
      if ($window.width() > 1199) {
        if (($window.scrollTop() + $topHeight) > offset.top) {
          if ($window.scrollTop() + $topHeight + $flotingbar.height() + 50 < $offsetHeight.top + $scrolling) {
            $flotingbar.stop().animate ({
              marginTop: ($window.scrollTop() - offset.top) + $topHeight - 60,
            });
          }
          else {
            $flotingbar.stop().animate ({
              marginTop: ($scrolling - $flotingbar.height() - 80) + 35,
            });
          }
        }
        else {
          $flotingbar.stop().animate ({
            marginTop: 0,
          });
        }
      }
      else {
        $flotingbar.css('margin-top', 0);
      }
    }
  });

  //Fame Sticky Sidebar Script
  $('.fame-sticky-sidebar').theiaStickySidebar ({
    additionalMarginTop: 40
  });

  //Fame Set Equal Height Script
  $('.woocommerce ul.products li.product').matchHeight ({
    property: 'height'
  });

  //Fame Nice Select Script
  $('select').niceSelect();
  $('.tribe-bar-views select').niceSelect('destroy');
  $('.woocommerce-Reviews select,.fame-widget.woocommerce select,.variations select, .shipping-calculator-form select').niceSelect('destroy');

  //Fame Back Top Script
  if($('div').hasClass('fame-back-top')) {
    var backtop = $('.fame-back-top');
    var position = backtop.offset().top;
    $(window).scroll(function() {
      var windowposition = $(window).scrollTop();
      if(windowposition + $(window).height() == $(document).height()) {
        backtop.removeClass('active');
      }
      else if (windowposition > 150) {
        backtop.addClass('active');
      }
      else {
        backtop.removeClass('active');
      }
    });
    jQuery('.fame-back-top a').on('click', function () {
      jQuery('body,html').animate ({
        scrollTop: 0
      }, 2000);
      return false;
    });
  }

});