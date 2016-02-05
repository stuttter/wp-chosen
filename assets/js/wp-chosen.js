jQuery( document ).ready( function ( $ ) {

	/* Options */
	var chosen_options = {
		disable_search_threshold: 10
	};

	/* Targets */
	$( '.wrap .actions:not(.bulkactions) select' ).chosen( chosen_options );
	$( '.wrap .form-table select' ).chosen( chosen_options );
	$( '#posts-filter .filter-items select' ).chosen( chosen_options );
	$( '.media-toolbar select' ).chosen( chosen_options );
	$( '#customize-theme-controls select' ).chosen( chosen_options );
} );
