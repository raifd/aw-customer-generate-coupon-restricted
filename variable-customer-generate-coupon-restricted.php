<?php

namespace AutomateWoo;

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'AutomateWoo\Variable_Abstract_Generate_Coupon' ) ) {

	class Variable_Customer_Generate_Coupon_Restricted extends Variable_Abstract_Generate_Coupon {

		protected $name = 'customer.generate_coupon_restricted';
		protected $parameter_fields = [];

		public function load_admin_details() {
			parent::load_admin_details();

			$this->title = __( 'Generate Coupon (Restricted)', 'aw-customer-generate-coupon-restricted' );

			try {
				$select = new Fields\Select();
				$select->set_name( 'use_email_restriction' );
				$select->set_description( __( 'Should the coupon be restricted to the customer\'s email?', 'aw-customer-generate-coupon-restricted' ) );
				$select->set_options( [
					'yes' => __( 'Yes – Restrict to customer email', 'aw-customer-generate-coupon-restricted' ),
				] );

				$this->add_parameter_field( $select );

			} catch ( \Throwable $e ) {
				if ( function_exists( 'wc_get_logger' ) ) {
					wc_get_logger()->error(
						'AW Customer Generate Coupon Restricted: Failed to create parameter field - ' . $e->getMessage(),
						[ 'source' => 'aw-customer-generate-coupon-restricted' ]
					);
				}
			}
		}

		public function get_supported_parameter_fields(): array {
			return is_array( $this->parameter_fields ) ? $this->parameter_fields : [];
		}

		public function get_value( $customer, $parameters, $workflow ) {
			if ( isset( $parameters['use_email_restriction'] ) && $parameters['use_email_restriction'] === 'yes' ) {
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
}
