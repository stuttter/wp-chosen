# WP Chosen contributor guidance

## Compatibility

- Preserve PHP 7.4 and WordPress 6.4 compatibility unless a dedicated pull
  request explicitly changes the published minimums.
- Treat broad administration selectors, third-party enhanced selects, the
  Customizer, generated assets, and the Reading screen override as elevated-risk
  behavior.
- Preserve public functions, hooks, filter arguments, script/style handles,
  asset URLs, and selector exclusions unless a deprecation path is part of the
  change.

## Tests and assets

- Add regression coverage before changing observed PHP or JavaScript behavior.
- Characterize affected administration screens and third-party select plugins
  before narrowing or expanding selectors.
- Keep SCSS and generated runtime CSS synchronized. Do not accept broad
  generated-file drift without explaining and reviewing its cause.
- Run `composer test` and `npm run build:check` before requesting review.

## Automation

Follow the organization-level safety boundaries. AI-authored implementation
must remain a draft pull request and cannot modify workflows, release policy,
ownership, security policy, dependencies, or this file. Releases require the
protected `wordpress.org` environment and an exact commit from `master`.
