#!/usr/bin/env node

import { createHash } from 'node:crypto';
import { readFileSync } from 'node:fs';
import { dirname, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';

const repositoryRoot = resolve(dirname(fileURLToPath(import.meta.url)), '..');
const assets = new Map([
	['wp-chosen/assets/css/chosen.min.css', '24ff326610d42e825948574bc055367a906155e4c7b4b938c3646df1f3b9b304'],
	['wp-chosen/assets/js/chosen.jquery.min.js', 'cc1fb7d4aef1be1ae2d0883a371c2dd50246633e9a83ee9020cb55a1e807ff41'],
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
