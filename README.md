# WP Chosen

WP Chosen implements the [Chosen jQuery Plugin](http://jjj.github.io/chosen/) for WordPress.

[Chosen](http://jjj.github.io/chosen/) makes long, unwieldy select boxes much more user-friendly.

# Installation

* Download and install using the built in WordPress plugin installer.
* Activate in the "Plugins" area of your admin by clicking the "Activate" link.
* Consider sponsoring future development by clicking "Sponsor".
* No further setup or configuration is necessary.

# Development

`composer install`

Use this command to install the PHP test dependencies.

`composer test`

Use this command to run the behavior characterization suite.

`npm ci`

Use this command to install PostCSS and all other development dependencies.
The build toolchain currently requires Node.js 18 or newer and npm 9 or newer.

`npm run build`

Use this command to compile both the human-readable and minified stylesheets.

`npm run dev`

Use this command to compile the human-readable stylesheet and its source map in
one source-map-aware PostCSS pass.

`npm run build:check`

Use this command to compile the stylesheet and verify that committed generated
runtime assets remain tracked and current. The check covers the human-readable
stylesheet, its corresponding source map, and the minified stylesheet. It also
verifies pinned SHA-256 digests for the vendored Chosen CSS and JavaScript,
whose upstream build sources are not part of this repository. WP Chosen
currently enqueues `wp-chosen.css`; `wp-chosen.min.css` remains a tracked
distribution asset.

`npm run prod`

Use this command to compile only the minified stylesheet.

The synchronized minified output restores the administration-control margins
and upward drop-shadow direction already present in the SCSS and readable CSS.


# FAQ

### What dropdowns does this target?

```
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
```

### Where can I get support?

* Community: https://wordpress.org/support/plugin/wp-chosen
* Development: https://github.com/stuttter/wp-chosen/discussions

### Contributing

Please [open a new issue](https://github.com/stuttter/wp-chosen/issues/new/choose) to discuss whether the feature is a good fit for the project. Once you've decided to work on a pull request, please follow the [WordPress Coding Standards](https://make.wordpress.org/core/handbook/coding-standards/).
