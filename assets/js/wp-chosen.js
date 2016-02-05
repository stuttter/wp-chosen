jQuery( document ).ready( function ( $ ) {

	/* Targets */
	$( '.wrap .actions:not(.bulkactions) select' ).chosen();
	$( '.wrap .form-table select' ).chosen();
	$( '#posts-filter .filter-items select' ).chosen();
	$( '.media-toolbar select' ).chosen();
	$( '#customize-theme-controls select' ).chosen();

	/* Options */
	$( '.chosen-select' ).chosen( {
		disable_search_threshold: 10
	} );
} );
