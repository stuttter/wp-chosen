jQuery( document ).ready( function ( $ ) {

	/* Options */
	var chosen_options = {
		disable_search_threshold: 13,
		search_contains: true
	};

	/* Targets */
	var chosen_targets =
		'.wp-pretty-filters select'
		+ ', .wp-filter select'
		+ ', .media-toolbar select'
		+ ', .tablenav select'
		+ ', .form-table select'
		+ ', .form-wrap select'
		+ ', .customize-pane-parent select'
		+ ', #posts-filter select';

	/* Attach */
	$( chosen_targets ).chosen( chosen_options );

	/* Meta Box Toggle */
	$( document ).on( 'postbox-toggled', function( event, postbox ) {
		$( postbox ).find( 'select' )
			.chosen( 'destroy' )
			.chosen( chosen_options );
	} );

	/* Display Name */
	$( '#first_name, #last_name, #nickname' ).on( 'blur', function() {
		$( '#display_name' ).trigger( 'chosen:updated' );
	} );
} );
