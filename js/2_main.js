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
			if($(this).hasClass("disabled")) {
				return false;
			}
			var target = $('[id=' + $(this).attr("value") + ']');
			$("li").removeClass("active");
			$(this).parent().addClass("active");
			$(".bodySection.active").toggleClass('active hidden')
			$(target).toggleClass('active hidden')
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

$(function() {
	var activeSection=$(".bodySection,.active").attr('id');
	var href='a[href$="'+activeSection+'"]';
	$(href).parent().addClass("active");
	//$(".bodySection,.active").attr('id')
});