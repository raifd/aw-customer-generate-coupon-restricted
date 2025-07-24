<?php
/**
 * Plugin Name: AW Customer Generate Coupon Restricted
 * Description: Adds a new AutomateWoo variable to generate coupons restricted to the customer's email.
 * Version: 1.0.6
 * Author: Raif Deari
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: aw-customer-generate-coupon-restricted
 * Requires at least: 6.0
 * Tested up to: 6.8.1
 * Requires PHP: 7.4
 * WC requires at least: 9.0
 * WC tested up to: 10.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Register your custom AutomateWoo variable.
add_filter( 'automatewoo/variables', function ( $variables ) {
    $variables['customer']['generate_coupon_restricted'] = __DIR__ . '/variable-customer-generate-coupon-restricted.php';
    return $variables;
} );

// Declare HPOS compatibility following WooCommerce docs
add_action( 'before_woocommerce_init', function () {
    if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility(
            'custom_order_tables', // correct HPOS slug
            __FILE__,
            true
        );
    }
} );
