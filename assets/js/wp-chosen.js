jQuery( document ).ready( function ( $ ) {

	/* Options */
	var chosen_options = {
		disable_search_threshold: 13
	};

	/* Targets */
	$( '.media-toolbar select' ).chosen( chosen_options );
	$( '.wrap .form-table select' ).chosen( chosen_options );
	$( '.wrap .actions select' ).chosen( chosen_options );
	$( '#customize-theme-controls select' ).chosen( chosen_options );
	$( '#posts-filter .filter-items select' ).chosen( chosen_options );
} );
