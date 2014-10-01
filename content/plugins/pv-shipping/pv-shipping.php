<?php
/*
Plugin Name: PV Shipping
Description:
Version: 1.0.0
*/

/**
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	function your_shipping_method_init() {
		if ( ! class_exists( 'WC_Your_Shipping_Method' ) ) {
			class WC_Your_Shipping_Method extends WC_Shipping_Method {

				public function __construct() {
					$this->id                 = 'pv_shipping'; // Id for your shipping method. Should be uunique.
					$this->method_title       = 'PV Shipping';  // Title shown in admin
					$this->method_description = ''; // Description shown in admin

					$this->enabled            = 'yes'; // This can be added as an setting but for this example its forced enabled
					$this->title              = 'Shipping'; // This can be added as an setting but for this example its forced.

					$this->init();
				}

				/**
				 * Init your settings
				 *
				 * @access public
				 * @return void
				 */
				function init() {
					// Load the settings API
					$this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
					$this->init_settings(); // This is part of the settings API. Loads settings you previously init.

					// Save settings in admin if you have any defined
					add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
				}


				function init_form_fields() {

				}

				/**
				 * calculate_shipping function.
				 *
				 * @access public
				 * @param mixed $package
				 * @return void
				 */
				public function calculate_shipping( $package ) {
					global $woocommerce;
					$country = $woocommerce->customer->get_shipping_country();

					$local = 'FR';
					$europe = array('AL', 'AD', 'AU', 'BE', 'BA', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FO', 'FI', 'DE', 'GI', 'GR', 'HU', 'IS', 'IE', 'IT', 'LV', 'LI', 'LT', 'LU', 'MK', 'MT', 'MC', 'NL', 'PL', 'PT', 'RO', 'SM', 'SK', 'SI', 'ES', 'SE', 'CH', 'GB', 'VA', 'ME');
					$eastern = array('NO', 'RU', 'UA', 'BY', 'RS', 'MD', 'DZ', 'LY', 'MR', 'MA', 'TN', 'GE', 'KZ', 'AM');
					$others = array ('CA', 'US', 'EG', 'IR', 'TR', 'IQ', 'SA', 'YE', 'SY', 'AE', 'IL', 'JO', 'LB', 'OM', 'KW', 'QA', 'BH', 'AO', 'SH', 'BJ', 'BW', 'BF', 'BI', 'CV', 'CF', 'TD', 'KM', 'CG', 'DJ', 'GQ', 'ER', 'ET', 'GA', 'GM', 'GH', 'GW', 'GN', 'CI', 'KE', 'LS', 'LR', 'MG', 'MW', 'ML', 'MU', 'YT', 'MZ', 'NA', 'NE', 'NG', 'RE', 'RW', 'ST', 'SN', 'SC', 'SL', 'SO', 'ZA', 'SH', 'SD', 'SZ', 'TZ', 'TG', 'UG', 'CD', 'ZM', 'TZ', 'ZW', 'SS', 'CD');

					if ($country == 'FR') {
						$cost = 10;
					} else if (in_array($country, $europe)) {
						$cost = 18;
					} else if (in_array($country, $eastern)) {
						$cost = 22;
					} else if (in_array($country, $others)) {
						$cost = 25;
					} else {
						$cost = 28;
					}


					$rate = array(
						'id' => $this->id,
						'label' => $this->title,
						'cost' => $cost,
						'calc_tax' => 'per_item'
					);

					// Register the rate
					$this->add_rate( $rate );
				}
			}
		}
	}

	add_action( 'woocommerce_shipping_init', 'your_shipping_method_init' );

	function add_your_shipping_method( $methods ) {
		$methods[] = 'WC_Your_Shipping_Method';
		return $methods;
	}

	add_filter( 'woocommerce_shipping_methods', 'add_your_shipping_method' );
}
