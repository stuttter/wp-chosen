=== WP Chosen ===
Contributors: johnjamesjacoby, stuttter
Tags: jquery, select, chosen
Requires at least: 4.6
Tested up to: 4.7
Stable tag: 2.0.0
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9Q4F4EL5YJ62J

Make long, unwieldy select boxes much more user-friendly.

== Description ==

WP Chosen implements the [Chosen jQuery Plugin](http://harvesthq.github.com/chosen/) for WordPress.

[Chosen](http://harvesthq.github.com/chosen/) makes long, unwieldy select boxes much more user-friendly.

= Also checkout =

* [WP Event Calendar](https://wordpress.org/plugins/wp-event-calendar/ "The best way to manage events in WordPress.")
* [WP Term Meta](https://wordpress.org/plugins/wp-term-meta/ "Metadata, for taxonomy terms.")
* [WP Term Order](https://wordpress.org/plugins/wp-term-order/ "Sort taxonomy terms, your way.")
* [WP Term Authors](https://wordpress.org/plugins/wp-term-authors/ "Authors for categories, tags, and other taxonomy terms.")
* [WP Term Colors](https://wordpress.org/plugins/wp-term-colors/ "Pretty colors for categories, tags, and other taxonomy terms.")
* [WP Term Icons](https://wordpress.org/plugins/wp-term-icons/ "Pretty icons for categories, tags, and other taxonomy terms.")
* [WP Term Visibility](https://wordpress.org/plugins/wp-term-visibility/ "Visibilities for categories, tags, and other taxonomy terms.")
* [WP User Activity](https://wordpress.org/plugins/wp-user-activity/ "The best way to log activity in WordPress.")
* [WP User Avatars](https://wordpress.org/plugins/wp-user-avatars/ "Allow users to upload avatars or choose them from your media library.")
* [WP User Groups](https://wordpress.org/plugins/wp-user-groups/ "Group users together with taxonomies & terms.")
* [WP User Profiles](https://wordpress.org/plugins/wp-user-profiles/ "A sophisticated way to edit users in WordPress.")

== Screenshots ==

1. Filters
2. Time Zones

== Installation ==

* Download and install using the built in WordPress plugin installer.
* Activate in the "Plugins" area of your admin by clicking the "Activate" link.
* No further setup or configuration is necessary.

== Frequently Asked Questions ==

= What elements does this target? =

`
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
		+ ', .tablenav select'
		+ ', .form-table select'
		+ ', .form-wrap select'
		+ ', .customize-pane-parent select'
		+ ', #posts-filter select';
`

= Where can I get support? =

* Basic: https://wordpress.org/support/plugin/wp-chosen/
* Priority: https://chat.flox.io/support/channels/wp-chosen/

= Where can I find documentation? =

https://github.com/stuttter/wp-chosen/

== Changelog ==

= 2.1.0 - 2016/11/19 =
* Target more actions
* Target wp-filters
* Add WP Pretty Filters support

= 2.0.0 - 2016/10/29 =
* Target bulk-actions
* Improve efficiency of element targeting

= 1.1.0 - 2016/09/10 =
* Remove "Open Sans" font styling rules for WordPress 4.6 support

= 1.0.0 - 2016/09/08 =
* First pass outline styling support for improved accessibility

= 0.7.0 - 2016/04/20 =
* Target `form-wrap` select elements, for taxonomies and such

= 0.6.0 - 2016/04/06 =
* Provide filter to override Chosen enqueue handle

= 0.5.0 - 2016/04/06 =
* Improved compatibility with third party plugins and themes

= 0.4.0 - 2016/02/23 =
* Fix options-reading.php front page incompatibility

= 0.3.2 - 2016/02/23 =
* Override retina sprite support

= 0.3.1 - 2016/02/23 =
* Simplify dependency tree

= 0.3.0 - 2016/02/23 =
* Bump Chosen to 1.5.1
* Rename enqueue ID to 'jquery-chosen'

= 0.2.1 - 2016/02/05 =
* Only search when there are more than 10 items

= 0.2.0 - 2016/01/04 =
* Add multiple support

= 0.1.4 - 2015/11/15 =
* Add customizer support

= 0.1.3 - 2015/10/28 =
* Version JS
* Add support for media

= 0.1.2 - 2015/10/22 =
* Update styling
* Target media library

= 0.1.1 - 2015/10/06 =
* Fix drop-down search input styling

= 0.1.0 - 2015/10/01 =
* Initial release
