<?php

namespace AutomateWoo;

defined( 'ABSPATH' ) || exit;

class Variable_Customer_Generate_Coupon_Restricted extends Variable_Abstract_Generate_Coupon {

	protected $name = 'customer.generate_coupon_restricted';
	protected $parameter_fields = [];

	public function load_admin_details() {
		parent::load_admin_details();

		$this->title = __( 'Generate Coupon (Restricted)', 'aw-customer-generate-coupon-restricted' );

		try {
			$checkbox = new Fields\Checkbox();
			$checkbox->set_name( 'use_email_restriction' );
			$checkbox->set_description( __( 'Limit coupon usage to customer\'s email address.', 'aw-customer-generate-coupon-restricted' ) );

			$this->add_parameter_field( $checkbox );

		} catch ( \Throwable $e ) {
			// Silently fail if field creation fails
		}
	}

	public function get_supported_parameter_fields() {
		return is_array( $this->parameter_fields ) ? $this->parameter_fields : [];
	}

	public function get_value( $customer, $parameters, $workflow ) {
		if ( ! empty( $parameters['use_email_restriction'] ) ) {
			add_filter( 'automatewoo/variables/coupons/use_email_restriction', function( $use, $wf ) use ( $workflow ) {
				return $workflow->id === $wf->id ? true : $use;
			}, 10, 4 );
		}

		return $this->generate_coupon( $customer->get_email(), $parameters, $workflow );
	}
}

return new Variable_Customer_Generate_Coupon_Restricted();