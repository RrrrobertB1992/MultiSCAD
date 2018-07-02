
function main() {

(function () {
   'use strict';
   
  	$('a.page-scroll').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
			if($(window).width() >= 1000) {
				$('html,body').animate({
					scrollTop: target.offset().top - $('#nav').height() + 2
				}, 750);
			} else {
				$('html,body').animate({
					scrollTop: target.offset().top - $('.navbar-header').height() + 5
				}, 750);
				//alert($('.navbar-header').outerHeight(true));
			}
			//alert($(window).width());
            return false;
          }
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
  $(".navbar-nav li a").click(function (event) {
    // check if window is small enough so dropdown is created
    var toggle = $(".navbar-toggle").is(":visible");
    if (toggle) {
      $(".navbar-collapse").collapse('hide');
    }
  });




}());


}
main();