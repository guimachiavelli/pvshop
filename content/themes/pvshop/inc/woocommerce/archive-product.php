<?php

	remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
	remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	remove_all_filters('woocommerce_show_page_title');

	remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);


	remove_all_actions('woocommerce_before_shop_loop', 30);
	remove_all_actions('woocommerce_after_shop_loop_item');

	add_action('woocommerce_before_shop_loop_item_title', 'pv_product_thumbnail', 10);

	add_action('woocommerce_before_main_content', 'pv_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'pv_wrapper_end', 10);

	function pv_product_thumbnail() {
		echo '<figure class="product-thumbnail">'
				. get_the_post_thumbnail() .
			'</figure>';
	}

	function pv_wrapper_start() {
		$classes = 'cabinet cabinet-top';
		if (is_single()) {
			$classes .= ' cabinet--inside';
		}
		echo '<div class="' . $classes . '">';
	}

	function pv_wrapper_end() {
		echo '<div class="cabinet-bottom"></div>';
		echo '</div>';
	}

