jQuery(document).ready(function($) {
	"use strict";
	/**
	 * Load category tab.
	 */

	ajax_pagenav();

	$('.ajax-filter').on('click', 'a', function(e) {
		e.preventDefault();

		$('.ajax-filter a').removeClass('active');
		$(this).addClass('active');

		var cat 	= $(this).data('cat'),
			limit 	= $(this).data('limit');

		$.ajax({
			type: 'POST',
			dataType: 'html',
			url: fame_admin_url.ajaxurl,
			data: {
				'cat'		: cat,
				'limit'  : limit,
				'action'	: 'fame_portfolio_ajax'
			},
			beforeSend : function () {
				$(".fame-masonry").append('<div class="products-loading"><div class="la-timer la-dark la-3x"><div></div></div></div>');
        $('.fame-masonry').isotope('reloadItems').isotope();
			},
			success: function (data) {
        $('.fame-masonry').isotope('reloadItems').isotope();
				$(".fame-portfolio-section .fame-masonry").html(data);

				$(".portfolio-item").mouseenter(function(){
		      $(this).addClass('fame-hover');
		    });
		    $(".portfolio-item").mouseleave(function(){
		      $(this).removeClass('fame-hover');
		    });
		    var $masonryheight = $(".fame-masonry").height();
		    $(".fame-port-data").css('height', $masonryheight);

			  setTimeout(ajax_pagenav, 100);
			  $('div.fame-pagination').hide();

			},
		});
	});

	function ajax_pagenav() {
		$(".ajax-page-numbers li").on( 'click', 'a', function(e){
			e.preventDefault();

			var page_no = $(this).data("page"),
			cat_slug = $(".ajax-filter a.active").data("cat"),
			limit 	= $(".ajax-filter a.active").data('limit');

			$.ajax({
				type: 'POST',
				dataType: 'html',
				url: fame_admin_url.ajaxurl,
				data: {
					'cat': cat_slug,
					'offset': page_no,
					'limit'  : limit,
					'action': 'fame_more_portfolio_ajax_pagi'
				},
				beforeSend : function () {
        	$('.fame-masonry').isotope('reloadItems').isotope();
					$(".fame-masonry").append('<div class="products-loading"><div class="la-timer la-dark la-3x"><div></div></div></div>');
				},
				success: function (data) {
        	$('.fame-masonry').isotope('reloadItems').isotope();
					$(".fame-portfolio-section .fame-masonry").html(data);
					var $masonryheight = $(".fame-masonry").height();
		    	$(".fame-port-data").css('height', $masonryheight);
				},
				complete: function (data) {
        	setTimeout( function(){
						$('.fame-masonry').isotope('reloadItems').isotope();
						var $masonryheight = $(".fame-masonry").height();
						$(".fame-port-data").css('height', $masonryheight);
       		},100);
					// Pagination data link update
					$(".ajax-page-numbers .last").remove();
					$(".ajax-page-numbers .first").remove();
					$('.ajax-page-numbers a').removeClass('current disabled-click');
					$('.ajax-page-numbers a[data-page = '+ page_no +']').addClass('current disabled-click');
					if (page_no > 1) {
						$(".ajax-page-numbers").prepend('<li class="first update-item"><a class="prev page-numbers" data-page="'+(page_no - 1)+'" href="#"><i class="fa fa-angle-left"></i></a></li>');
					}
					var navcount = $(".ajax-page-numbers > li").not('.update-item').length;
					if (navcount >= (page_no+1)) {
						$(".ajax-page-numbers").append('<li class="last update-item"><a class="next page-numbers" data-page="'+(page_no + 1)+'" href="#"><i class="fa fa-angle-right"></i></a></li>');
					}
					$(".portfolio-item").mouseenter(function(){
			      $(this).addClass('fame-hover');
			    });
			    $(".portfolio-item").mouseleave(function(){
			      $(this).removeClass('fame-hover');
			    });

					ajax_pagenav();
					$('div.fame-pagination').hide();
				}
			});

		});
	}

});