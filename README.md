# WP Chosen

WP Chosen implements the [Chosen jQuery Plugin](http://harvesthq.github.com/chosen/) for WordPress.

[Chosen](http://harvesthq.github.com/chosen/) makes long, unwieldy select boxes much more user-friendly.

# Installation

* Download and install using the built in WordPress plugin installer.
* Activate in the "Plugins" area of your admin by clicking the "Activate" link.
* No further setup or configuration is necessary.

# FAQ

### What dropdowns does this target?

```
	/* Options */
	var chosen_options = {
		disable_search_threshold: 13,
		search_contains: true
	};

	/* Targets */
	var chosen_selects = ' select:not([name^=edd], [name^=_edd], [class*=select2], [class*=chosen-select])',
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
* Priority: https://chat.flox.io/support/channels/wp-chosen/

### Can I contribute?

Yes, please!
