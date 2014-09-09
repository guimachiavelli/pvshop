<?php

add_action('wp_enqueue_scripts', 'pv_enqueue_scripts');
add_action('wp_enqueue_scripts', 'pv_enqueue_styles');

function pv_enqueue_styles() {
	wp_register_style('pv-stylesheet', TEMPLATE_URL . '/css/pv-boutique.css');
	wp_enqueue_style('pv-stylesheet');
}

function pv_enqueue_scripts() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', false, false, true);
	wp_register_script('bundle', TEMPLATE_URL . '/js/bundle.js', array('jquery'), false, true);

	wp_enqueue_script('jquery');
	wp_enqueue_script('bundle');

    wp_localize_script('bundle', 'pv', array('config' => array(
        'templateURL' => TEMPLATE_URL,
		'siteURL' => SITE_URL,
    )));

}


