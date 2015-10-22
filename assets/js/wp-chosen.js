jQuery( document ).ready( function ( $ ) {
	$( '.wrap .actions:not(.bulkactions) select' ).chosen();
	$( '.wrap .form-table select' ).chosen();
	$( '#posts-filter .filter-items select' ).chosen();
	$( '.media-toolbar select' ).chosen();
} );