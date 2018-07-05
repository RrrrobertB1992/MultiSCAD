'use strict';
(function(e,t,n){
	var r=e.querySelectorAll("html")[0];
	r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")
})(document,window,0);

( function( $, window, document, undefined )
{
	

	$( '.inputfile' ).each( function()
	{
		var $input	 = $( this ),
			$label	 = $input.next( 'label' ),
			labelVal = $label.html();

		$input.on( 'change', function( e )
		{
			var fileName = '';

			if( e.target.value )
				fileName = e.target.value.split( '\\' ).pop();
			if( fileName )
				$label.find( 'span' ).html( fileName );
			else
				$label.html( labelVal );
		})
		// Firefox bug fix
		$input
		.on( 'focus', function(){ $input.addClass( 'has-focus' ); })
		.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
	});
	
	
	
})( jQuery, window, document );