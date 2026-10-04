import assert from 'node:assert/strict';
import { readFile } from 'node:fs/promises';
import test from 'node:test';
import vm from 'node:vm';

const adminSource = await readFile( new URL( '../wp-chosen/includes/admin.php', import.meta.url ), 'utf8' );
const chosenSource = await readFile( new URL( '../wp-chosen/assets/js/chosen.jquery.min.js', import.meta.url ), 'utf8' );

function inlineScript( position ) {
	const pattern = /wp_add_inline_script\(\s*\$handle,\s*'((?:\\'|[^'])*)',\s*'(before|after)'/gs;

	for ( const match of adminSource.matchAll( pattern ) ) {
		if ( match[ 2 ] === position ) {
			return match[ 1 ].replaceAll( "\\'", "'" ).replaceAll( '\\\\', '\\' );
		}
	}

	throw new Error( `Unable to find the ${ position } inline script.` );
}

function runtime( defineState = null ) {
	const jQuery = function() {};
	jQuery.fn = {};

	const window = { jQuery };
	if ( defineState ) {
		window.define = defineState;
	}

	return { context: vm.createContext( { window } ), jQuery, window };
}

function executeChosen( current ) {
	vm.runInContext( inlineScript( 'before' ), current.context );
	vm.runInContext( chosenSource, current.context );
	vm.runInContext( inlineScript( 'after' ), current.context );
}

test( 'registers Chosen globally and restores an AMD loader', () => {
	const define = function() {};
	define.amd = {};
	const current = runtime( define );

	executeChosen( current );

	assert.equal( typeof current.jQuery.fn.chosen, 'function' );
	assert.strictEqual( current.window.define, define );
	assert.equal( Object.hasOwn( current.window, 'define' ), true );
	assert.equal( Object.hasOwn( current.window, 'wpChosenAmdDefineStack' ), false );
} );

test( 'restores the absence of an AMD loader', () => {
	const current = runtime();

	executeChosen( current );

	assert.equal( typeof current.jQuery.fn.chosen, 'function' );
	assert.equal( Object.hasOwn( current.window, 'define' ), false );
	assert.equal( Object.hasOwn( current.window, 'wpChosenAmdDefineStack' ), false );
} );
