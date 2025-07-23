<?php
/**
 * Plugin Name: AW Customer Generate Coupon Restricted
 * Description: Adds a new AutomateWoo variable to generate coupons restricted to the customer's email.
 * Version: 1.0.6
 * Author: Raif Deari
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 6.0
 * Tested up to: 6.8.1
 * Requires PHP: 7.4
 * WC requires at least: 9.0
 * WC tested up to: 10.0
 * Requires Plugins: woocommerce, automatewoo
 *
 * @package AW_Customer_Generate_Coupon_Restricted
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter(
	'automatewoo/variables',
	function ( $variables ) {
		// AutomateWoo requires the file to return an object instance of the variable class.
		$variables['customer']['generate_coupon_restricted'] = __DIR__ . '/variable-customer-generate-coupon-restricted.php';
		return $variables;
	}
);
