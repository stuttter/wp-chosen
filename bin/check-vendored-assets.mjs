#!/usr/bin/env node

import { createHash } from 'node:crypto';
import { readFileSync } from 'node:fs';
import { dirname, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';

const repositoryRoot = resolve(dirname(fileURLToPath(import.meta.url)), '..');
const assets = new Map([
	['wp-chosen/assets/css/chosen.min.css', 'f56a9d3251cc74bd77f9c555555a0bb63dcb35e92616dc5f167108bf4066376b'],
	['wp-chosen/assets/js/chosen.jquery.min.js', 'bcc5e08f69727b8ce8b7d27bd431ce4b7089ba3a81858bd51d22bc3cad6efc26'],
]);

let failed = false;

for (const [path, expected] of assets) {
	const actual = createHash('sha256')
		.update(readFileSync(resolve(repositoryRoot, path)))
		.digest('hex');

	if (actual !== expected) {
		console.error(`${path}: expected ${expected}; received ${actual}.`);
		failed = true;
	}
}

if (failed) {
	process.exitCode = 1;
} else {
	console.log('Vendored Chosen asset digests are current.');
}
