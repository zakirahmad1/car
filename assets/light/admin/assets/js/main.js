$.noConflict();

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	jQuery('.selectpicker').selectpicker;
	
	
	$(document).on('click', '.mlink', function(e) {
		
			var _this=$(this);
				$.ajax({
						type: "POST",
						url: _this.attr('href'),
						
						dataType: "json",
						
						success: function(data) {
							 $("#smallmodal .modal-body").append(data.html);
							
							 
							 // $("#"+placementId).modal();
							$("#smallmodal").modal('show');
							

				
						}
					});
					return false;
		});


	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	// $('.user-area> a').on('click', function(event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	$('.user-menu').parent().removeClass('open');
	// 	$('.user-menu').parent().toggleClass('open');
	// });


});