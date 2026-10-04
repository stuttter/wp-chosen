import assert from 'node:assert/strict';
import { readFile } from 'node:fs/promises';
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

const define = function() {};
define.amd = {};
const withLoader = runtime( define );

executeChosen( withLoader );

assert.equal( typeof withLoader.jQuery.fn.chosen, 'function' );
assert.strictEqual( withLoader.window.define, define );
assert.equal( Object.hasOwn( withLoader.window, 'define' ), true );
assert.equal( Object.hasOwn( withLoader.window, 'wpChosenAmdDefineStack' ), false );

const withoutLoader = runtime();

executeChosen( withoutLoader );

assert.equal( typeof withoutLoader.jQuery.fn.chosen, 'function' );
assert.equal( Object.hasOwn( withoutLoader.window, 'define' ), false );
assert.equal( Object.hasOwn( withoutLoader.window, 'wpChosenAmdDefineStack' ), false );

console.log( 'Chosen registers globally and restores the original AMD loader state.' );
