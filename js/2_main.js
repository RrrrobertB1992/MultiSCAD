( function( $ ) {
   $( 'a[href="#"]' ).click( function(e) {
      e.preventDefault();
   } );
} )( jQuery );

function main() {
	(function() {
		'use strict';
		$('a.page-scroll').click(function(event) {
			event.preventDefault();
			var target = $(this.hash).length ? $(this.hash) : $('[name=' + this.hash.slice(1) + ']');
			$("li").removeClass("active");
			$(this).parent().addClass("active");
			$(".bodySection").addClass("hidden");
			$(target).removeClass("hidden");
		});
		// affix the navbar after scroll below header
		$('#nav').affix({
			offset: { top: $('header').height() - 2 }
		});
		$('body').affix({
			offset: { top: $('header').height() - 2 }
		});
		// Hide nav on click
		$(".navbar-nav li a").click(function(event) {
			// check if window is small enough so dropdown is created
			if ($(".navbar-toggle").is(":visible")) {
				$(".navbar-collapse").collapse('hide');
			}
		});
	}());
}
main();