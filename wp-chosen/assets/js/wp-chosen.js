jQuery( document ).ready( function ( $ ) {

	/* Options */
	var chosen_options = {
		disable_search_threshold: 13,
		search_contains: true
	};

	/* Targets */
	var chosen_selects = ' select:not(#metakeyselect, [name^=acf_], [name^=edd], [name^=_edd], [name^=sc], [name=wc_order_action], [class*=chosen], [class*=select2], [class*=wc-enhanced-select], [class*=wc-product-search], [class*=wc-enhanced-select-nostd], [class*=wc-customer-search], [class*=wc-category-search], [class=learndash-binary-selector-items], [class=sendgrid-settings-select])',
		chosen_targets =
		'.wp-pretty-filters'         + chosen_selects
		+ ', .wp-filter'             + chosen_selects
		+ ', .media-toolbar'         + chosen_selects
		+ ', .postbox .inside'       + chosen_selects
		+ ', .tablenav'              + chosen_selects
		+ ', .form-table'            + chosen_selects
		+ ', .form-wrap'             + chosen_selects
		+ ', .customize-pane-parent' + chosen_selects;

	/* Attach */
	$( chosen_targets ).chosen( chosen_options );

	/* Special case the Meta-Box toggle */
	$( document ).on( 'postbox-toggled', function( event, postbox ) {
		wpChosenDelayedRefresh( $( postbox ).find( chosen_selects ) );
	} );

	/* Special case the "+ Add New Category" link */
	$( '.taxonomy-add-new' ).on( 'click', function() {
		wpChosenDelayedRefresh( $( this ).next().find( 'select.postform' ) );
	} );

	/* Special case the "Publish" meta box "Edit" links */
	$( '.misc-pub-section a' ).on( 'click', function() {
		wpChosenDelayedRefresh( $( this ).next( 'div, fieldset' ).find( chosen_selects ), 250 );
	} );

	/* Special case the "Publish" meta box "Edit" links */
	$( document ).on( 'bp-xprofile-show-options', function( e, forWhat ) {
		wpChosenDelayedRefresh( $( '#' + forWhat ).find( chosen_selects ) );
	} );

	/* Special case the "Display Name" magic */
	$( '#first_name, #last_name, #nickname' ).on( 'blur', function() {
		$( '#display_name' ).trigger( 'chosen:updated' );
	} );

	/**
	 * Delay a chosen refresh, for elements, for some time
	 *
	 * @param {elements} elements
	 * @param {integer} time
	 * @returns {void}
	 */
	function wpChosenDelayedRefresh( elements, time = 10 ) {
		setTimeout( function() {
			elements.chosen( 'destroy' ).chosen( chosen_options );
		}, time );
	}
} );
