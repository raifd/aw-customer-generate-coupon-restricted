=== AW Customer Generate Coupon Restricted ===
Contributors: Raif Deari
Tags: woocommerce, automatewoo, coupons, email restriction
Requires at least: 6.0
Tested up to: 6.8
Stable tag: 1.0.5
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

This plugin adds a new AutomateWoo variable to generate unique coupons restricted to the customer’s email address.

== Description ==

AutomateWoo’s built-in coupon variable is powerful, but doesn’t support email restriction directly out of the box. This plugin introduces a new variable:

`{{ customer.generate_coupon_restricted }}`

When used in a workflow (such as post-purchase or review request automations), it allows you to optionally limit coupon redemption to the customer’s email address.

== Features ==

* Adds `customer.generate_coupon_restricted` to AutomateWoo
* Optionally restrict coupon usage to the customer’s email address
* Works with existing coupon templates and parameters
* Fully UI-driven (checkbox-based) configuration
* Logs variable usage to WooCommerce logs for easier debugging

== Credits ==

This plugin was developed by Raif Deari with the help of AI (ChatGPT) for debugging and code generation.

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/`
2. Activate the plugin through the WordPress admin
3. Use the new variable in your AutomateWoo workflows

== Changelog ==

= 1.0.5 =
* Initial release with email-restricted coupon generation
