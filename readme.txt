=== WP Chosen ===
Contributors: johnjamesjacoby, stuttter
Tags: jquery, select, chosen
Requires at least: 5.7
Tested up to: 5.8
Stable tag: 6.1.1

Make long, unwieldy select boxes much more user-friendly.

== Description ==

WP Chosen implements the [Chosen jQuery Plugin](https://jjj.github.io/chosen/) for WordPress.

[Chosen](https://jjj.github.io/chosen/) makes long, unwieldy select boxes much more user-friendly.

= Also checkout =

* [WP User Activity](https://wordpress.org/plugins/wp-user-activity/ "The best way to log activity in WordPress.")
* [WP User Avatars](https://wordpress.org/plugins/wp-user-avatars/ "Allow users to upload avatars or choose them from your media library.")
* [WP User Groups](https://wordpress.org/plugins/wp-user-groups/ "Group users together with taxonomies & terms.")
* [WP User Profiles](https://wordpress.org/plugins/wp-user-profiles/ "A sophisticated way to edit users in WordPress.")
* [WP Term Order](https://wordpress.org/plugins/wp-term-order/ "Sort taxonomy terms, your way.")
* [WP Term Authors](https://wordpress.org/plugins/wp-term-authors/ "Authors for categories, tags, and other taxonomy terms.")
* [WP Term Colors](https://wordpress.org/plugins/wp-term-colors/ "Pretty colors for categories, tags, and other taxonomy terms.")
* [WP Term Icons](https://wordpress.org/plugins/wp-term-icons/ "Pretty icons for categories, tags, and other taxonomy terms.")
* [WP Term Visibility](https://wordpress.org/plugins/wp-term-visibility/ "Visibilities for categories, tags, and other taxonomy terms.")

== Screenshots ==

1. Filters
2. Time Zones

== Installation ==

* Download and install using the built in WordPress plugin installer.
* Activate in the "Plugins" area of your admin by clicking the "Activate" link.
* No further setup or configuration is necessary.

== Frequently Asked Questions ==

= What color schemes does this support? =

WordPress

* Default/Fresh
* Light
* Modern
* Blue
* Coffee
* Ectoplasm
* Midnight
* Ocean
* Sunrise

bbPress

* Evergreen
* Mint

Extras

* 80's Kid
* Adderley
* Aubergine
* High Contrast Blue
* Cruise
* Flat
* Kirk
* Lawn
* Primary
* Seashore
* Vinyard

American

* From Many One
* NASA 1976
* NASA
* Old Glory
* Open Highway
* Shenandoah

= What elements does this target? =

`

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

`

= Where can I get support? =

* Forums: https://wordpress.org/support/plugin/wp-chosen/

= Where can I find documentation? =

https://github.com/stuttter/wp-chosen/

== Changelog ==

= 6.1.1 - 2021/03/10 =
* Tweak third-party plugin compatibility

= 6.1.0 - 2021/03/09 =
* Add support for 6 extra color schemes

= 6.0.0 - 2021/03/09 =
* Add support for 11 extra color schemes
* Tweak WordPress 5.7 support
* Avoid conflicts with WooCommerce
* Avoid conflicts with SendGrid
* Avoid conflicts with LearnDash
* Avoid conflicts with Advanced Custom Fields

= 5.2.0 - 2021/03/02 =
* WordPress 5.7 support
* Avoid conflicts with custom fields
* Avoid conflicts with WooCommerce/selectWoo
* Avoid conflicts with other third party plugins

= 5.0.1 - 2020/07/27 =
* Tweak WordPress 5.5 support

= 5.0.0 - 2020/07/23 =
* WordPress 5.5 Support
* Upgrade Chosen to 2.0.0 fork

= 3.2.0 - 2019/10/15 =
* WordPress 5.3 Support

= 3.1.0 - 2017/06/22 =
* Avoid conflicts with Easy Digital Downloads
* Avoid conflicts with Stream
* Avoid conflicts with Select2

= 3.0.0 - 2017/05/09 =
* Update Chosen to 1.7.0
* Handle several special cases for known wp-admin quirks
* Add target for `.postbox .inside select`
* Remove duplicate target for `#posts-filter select`

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
