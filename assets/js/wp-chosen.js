jQuery( document ).ready( function ( $ ) {

	/* Options */
	var chosen_options = {
		disable_search_threshold: 13,
		search_contains: true
	};

	/* Targets */
	$( '.media-toolbar select' ).chosen( chosen_options );
	$( '.wrap .form-table select' ).chosen( chosen_options );
	$( '.wrap .form-wrap select' ).chosen( chosen_options );
	$( '.wrap .actions select' ).chosen( chosen_options );
	$( '#customize-theme-controls select' ).chosen( chosen_options );
	$( '#posts-filter .filter-items select' ).chosen( chosen_options );

	/* Meta Box Toggle */
	$( document ).on( 'postbox-toggled', function( event, postbox ) {
		$( postbox ).find( 'select' )
			.chosen( 'destroy' )
			.chosen( chosen_options );
	} );
} );
