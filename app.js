$(function(){

	$('#function input[type=text]').focus();

	$('#function').submit( function(){

		if ( $('#function input[type=submit]').text() == 'Loading' )
			return false;

		var fcn = $(this).find( 'input[type=text]' ).val();
		if ( fcn.length == 0 )
			return false;
		$.History.go( fcn );
	
		return false;
	} );

	$.History.bind( function(state){
		$('#function input[type=text]').val( state );

		if ( state.length == 0 )
			return;

		_gaq.push( ['_trackEvent', 'PHPjs', 'Compile', state] );
		
		$('#result').css( 'opacity', 0.6 );

		var data = {};
		data.fcn = state;
		
		$('#function input[type=submit]').val( 'Loading' );
		$.post( 'run.php', data, function(resp){
			$('#function input[type=submit]').val( 'Do It' );
			$('#result').css( 'opacity', 1 );
			$('#result').val( resp ).select();
		} );

	} );

	$('#result').click( function(){
		$(this).select();
	} );

});
