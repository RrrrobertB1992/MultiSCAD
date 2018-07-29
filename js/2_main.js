( function( $ ) {
   $( 'a[href="#"]' ).click( function(e) {
      e.preventDefault();
   } );
} )( jQuery );

function main() {
	(function() {
		var scrollLock = false;
		'use strict';
		$('a.page-scroll').click(function(event) {
			event.preventDefault();
			if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
				var target = $(this.hash);
				$("li").removeClass("active");
				$(this).parent().addClass("active");
				target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
				$(".bodySection").addClass("hidden");
				//alert(target);
				$(target).removeClass("hidden");
			}
		});
		// affix the navbar after scroll below header
		$('#nav').affix({
			offset: {
				top: $('header').height() - 2
			}
		});
		$('body').affix({
			offset: {
				top: $('header').height() - 2
			}
		});
		// Hide nav on click
		$(".navbar-nav li a").click(function(event) {
			// check if window is small enough so dropdown is created
			var toggle = $(".navbar-toggle").is(":visible");
			if (toggle) {
				$(".navbar-collapse").collapse('hide');
			}
		});
		// Cache selectors
		var topMenu = $("#nav"),
			topMenuHeight = topMenu.outerHeight() + 3,
			// All list items
			menuItems = topMenu.find("a"),
			// Anchors corresponding to menu items
			scrollItems = menuItems.map(function() {
				var item = $($(this).attr("href"));
				if (item.length) {
					return item;
				}
			});
		// Bind to scroll
		$(window).scroll(function() {
		});
	}());
}
main();