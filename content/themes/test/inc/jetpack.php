<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package test
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function test_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'test_jetpack_setup' );
