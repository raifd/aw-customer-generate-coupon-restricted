<?php
/**
 * Class Variable_Customer_Generate_Coupon_Restricted
 *
 * Adds a new AutomateWoo variable to generate coupons restricted to the customer's email.
 *
 * @package AW_Customer_Generate_Coupon_Restricted
 */

namespace AutomateWoo;

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'AutomateWoo\Variable_Abstract_Generate_Coupon' ) ) :

	/**
	 * Class Variable_Customer_Generate_Coupon_Restricted
	 *
	 * Extends Variable_Abstract_Generate_Coupon to add a coupon variable restricted to the customer's email.
	 */
	class Variable_Customer_Generate_Coupon_Restricted extends Variable_Abstract_Generate_Coupon {

		/**
		 * Variable name.
		 *
		 * @var string
		 */
		protected $name = 'customer.generate_coupon_restricted';

		/**
		 * Supported parameter fields.
		 *
		 * @var array
		 */
		protected $parameter_fields = array();

		/**
		 * Load admin details for the variable.
		 *
		 * @return void
		 */
		public function load_admin_details() {
			parent::load_admin_details();

			$this->title = __( 'Generate Coupon (Restricted)', 'aw-customer-generate-coupon-restricted' );

			try {
				$checkbox = new Fields\Checkbox();
				$checkbox->set_name( 'use_email_restriction' );
				$checkbox->set_description( __( 'Limit coupon usage to customer\'s email address.', 'aw-customer-generate-coupon-restricted' ) );

				$this->add_parameter_field( $checkbox );

			} catch ( \Throwable $e ) {
				if ( function_exists( 'wc_get_logger' ) ) {
					$logger = wc_get_logger();
					$logger->error(
						'AW Customer Generate Coupon Restricted: Failed to create parameter field - ' . $e->getMessage(),
						array( 'source' => 'aw-customer-generate-coupon-restricted' )
					);
				}
			}
		}

		/**
		 * Get supported parameter fields.
		 *
		 * @return array
		 */
		public function get_supported_parameter_fields() {
			return is_array( $this->parameter_fields ) ? $this->parameter_fields : array();
		}

		/**
		 * Generate the coupon value.
		 *
		 * @param \AutomateWoo\Customer $customer   The customer object.
		 * @param array                 $parameters Parameters for coupon generation.
		 * @param mixed                 $workflow   The workflow object.
		 * @return mixed
		 */
		public function get_value( $customer, $parameters, $workflow ) {
			if ( ! empty( $parameters['use_email_restriction'] ) ) {
				add_filter(
					'automatewoo/variables/coupons/use_email_restriction',
					function ( $use_value, $wf ) use ( $workflow ) {
						return $workflow->id === $wf->id ? true : $use_value;
					},
					10,
					4
				);
			}

			return $this->generate_coupon( $customer->get_email(), $parameters, $workflow );
		}
	}

	return new Variable_Customer_Generate_Coupon_Restricted();

endif;
