<?php
/**
 * Plugin Name: AW Customer Generate Coupon Restricted
 * Description: Adds a new AutomateWoo variable to generate coupons restricted to the customer's email.
 * Version: 1.0.5
 * Author: Raif Deari
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'automatewoo/variables', function( $variables ) {
    // AutomateWoo requires the file to return an object instance of the variable class
    $variables['customer']['generate_coupon_restricted'] = __DIR__ . '/variable-customer-generate-coupon-restricted.php';
    return $variables;
});