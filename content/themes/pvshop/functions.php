<?php

	require_once 'inc/globals.php';
	require_once 'inc/settings.php';
	require_once 'inc/assets.php';
	require_once 'inc/woocommerce/archive-product.php';
	require_once 'inc/woocommerce/single-product.php';

	add_action( 'pre_get_posts', 'pv_get_featured_collection' );

	function pv_get_featured_collection($query) {
		if ( $query->is_front_page() && $query->is_main_query() ) {
			$query->set('product_cat', get_site_option('featured_collection'));
		}
	}

	$new_general_setting = new featured_collection_setting();

	class featured_collection_setting {
		function featured_collection_setting() {
			add_filter('admin_init', array(&$this , 'register_fields'));
		}

		function register_fields() {
			register_setting('general', 'featured_collection', 'esc_attr');
			add_settings_field('featured_collection', '<label for="featured_collection">Featured Collection</label>' , array(&$this, 'fields_html') , 'general' );
		}

		function fields_html() {
			$value = get_option( 'featured_collection', '' );
			echo '<input type="text" id="featured_collection" name="featured_collection" value="' . $value . '" />';
		}
	}


add_filter( 'woocommerce_billing_fields', 'custom_woocommerce_billing_fields' );

function custom_woocommerce_billing_fields( $fields ) {

   $fields['billing_state']	= array(
      'label'          => __('State/County', 'woothemes'),
      'placeholder'    => __('State/County', 'woothemes'),
      'required'       => false,
      'class'          => array('input-text')
   );

 return $fields;
}

add_filter('woocommerce_cart_shipping_method_full_label', 'remove_local_pickup_free_label', 10, 2);
function remove_local_pickup_free_label($full_label, $method){

	$label = split(':',$full_label);
	$label[0] = '<span class="shipping-method-label">' . $label[0] . '</span>';

	return join(' ', $label);
}
