# Contributing

Thanks for helping maintain WP Chosen.

## Before changing behavior

Describe the observable behavior, compatibility expectations, and acceptance
criteria in a GitHub issue. Report suspected vulnerabilities privately through
[GitHub Security Advisories](https://github.com/stuttter/wp-chosen/security/advisories/new).

## Pull requests

- Keep each pull request focused and reversible.
- Add regression coverage for behavior changes and bug fixes.
- Preserve the declared PHP and WordPress minimum versions.
- Test affected administration and Customizer screens at desktop and mobile widths.
- Check compatibility with native selects, Chosen, Select2, and selectWoo where relevant.
- Identify broad selector, dependency, automation, and release-process implications.
- Do not commit credentials, build caches, development databases, or generated release ZIP files.
- Run `composer test` and `npm run build:check` before requesting review.
- Wait for every required check and resolve review conversations before merge.

AI-assisted contributions are welcome, but the contributor remains responsible
for understanding and validating the result.

## Development requirements

The plugin and its Composer development toolchain require PHP 7.4 or newer.
Production Composer installs should omit development dependencies.

The CSS build toolchain requires Node.js 22.22.3, Node.js 24.15.0, or a newer
compatible release, plus npm 10.9 or newer. Use `npm ci` so local builds use
the dependency versions recorded in `package-lock.json`.
