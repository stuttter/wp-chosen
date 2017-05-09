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
	var chosen_targets =
		'.wp-pretty-filters select'
		+ ', .wp-filter select'
		+ ', .media-toolbar select'
		+ ', .postbox .inside select'
		+ ', .tablenav select'
		+ ', .form-table select'
		+ ', .form-wrap select'
		+ ', .customize-pane-parent select';
```

### Where can I get support?

* Basic: https://wordpress.org/support/plugin/wp-chosen/
* Priority: https://chat.flox.io/support/channels/wp-chosen/

### Can I contribute?

Yes, please!
