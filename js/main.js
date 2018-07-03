
function main() {

(function () {
	
	var scrollLock = false;
	
   'use strict';
   
  	$('a.page-scroll').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
		  $("li").removeClass("active");
		  $(this).parent().addClass("active");
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  scrollLock = true;
          if (target.length) {
			if($(window).width() >= 1000) {
				$('html,body').animate({
					scrollTop: target.offset().top - $('#nav').height() + 2
				}, 750);
			} else if($('#nav').hasClass("affix-top")) {
				$('html,body').animate({
					scrollTop: target.offset().top - $('.navbar-header').height() + 5 - $('.navbar-collapse,#in').height()
				}, 750);
			} else {
				$('html,body').animate({
					scrollTop: target.offset().top - $('.navbar-header').height() + 5
				}, 750);
			}
			
			setTimeout(function() {   //calls click event after a certain time
				scrollLock = false;
			}, 850);
			//$('a.page-scroll').removeClass("active");
			

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

  
  
// Cache selectors
var topMenu = $("#nav"),
    topMenuHeight = topMenu.outerHeight() + 3,
    // All list items
    menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });

// Bind to scroll
$(window).scroll(function(){
	
	
	if(scrollLock == false && $(window).scrollTop() + $(window).height() != $(document).height()) {
   // Get container scroll position
   var fromTop = $(this).scrollTop()+topMenuHeight;

   // Get id of current scroll item
   var cur = scrollItems.map(function(){
     if ($(this).offset().top < fromTop)
       return this;
   });
   // Get the id of the current element
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : "";
   // Set/remove active class
   menuItems
     .parent().removeClass("active")
     .end().filter("[href='#"+id+"']").parent().addClass("active");
	}
});
}());


}
main();