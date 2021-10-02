<?php

add_action( 'after_setup_theme', 'pn_images_setup' );

/**
 * Add additional image sizing. - add_image_size('hero', 1920, null);
 */
function pn_images_setup() {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'hero', 1920, null );
}
