<?php

	remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

	add_action('woocommerce_single_product_summary', 'pv_single_product_content', 5);
	add_action('woocommerce_single_product_summary', 'pv_single_product_view_cart', 30);
	add_action('woocommerce_single_product_summary', 'pv_single_product_navigation', 30);

	remove_all_actions('woocommerce_after_single_product_summary');

	function pv_single_product_content() {
		echo '<p>' . get_the_content() . '</p>';
	}

	function pv_single_product_view_cart() {
		echo '<a href="' . get_permalink(woocommerce_get_page_id('cart')) . '" class="btn">View basket</a>';
	}

	function pv_single_product_navigation() {
		echo '<div class="single-product-bottom-nav">';
		next_post_link('%link', 'Next item >', true, null, 'product_cat');
		previous_post_link('%link', '< Previous item', true, null, 'product_cat');
		echo '<a href="' . SITE_URL . '">Keep shopping</a>';
		echo '<a href="' . get_permalink(woocommerce_get_page_id('checkout')) . '" class="btn">Checkout</a>';
		echo '</div>';

	}


	function pv_single_product_class( $classes ) {
		global $post;
		if (is_single()) {
			if(($key = array_search('product', $classes)) !== false) {
				unset($classes[$key]);
			}
		}
		return $classes;
	}
	add_filter('post_class', 'pv_single_product_class');

