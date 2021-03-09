# WP Chosen

WP Chosen implements the [Chosen jQuery Plugin](http://jjj.github.io/chosen/) for WordPress.

[Chosen](http://jjj.github.io/chosen/) makes long, unwieldy select boxes much more user-friendly.

# Installation

* Download and install using the built in WordPress plugin installer.
* Activate in the "Plugins" area of your admin by clicking the "Activate" link.
* No further setup or configuration is necessary.

# Development

`npm install`

Use this command to install PostCSS and all other development dependencies

`npm run remap`

Use this command to remap colors to the latest WordPress palette

`npm run dev`

Use this command to compile human-readable and unminified CSS files

`npm run prod`

Use this command to compile minified CSS files for production environments


# FAQ

### What dropdowns does this target?

```
	/* Options */
	var chosen_options = {
		disable_search_threshold: 13,
		search_contains: true
	};

	/* Targets */
	var chosen_selects = ' select:not(#metakeyselect, [name^=chosen], [name^=acf_], [name^=edd], [name^=_edd], [name^=sc], [name=wc_order_action], [class*=select2], [class*=wc-enhanced-select], [class*=wc-product-search], [class*=wc-enhanced-select-nostd], [class*=wc-customer-search], [class*=wc-category-search], [class=learndash-binary-selector-items], [class=sendgrid-settings-select])',
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

* Basic: https://wordpress.org/support/plugin/wp-chosen/

### Can I contribute?

Yes, please!
