<?php
defined( 'ABSPATH' ) || exit;

if ( ! defined( '_S_VERSION' ) ) define( '_S_VERSION', '1.0.0' );

/*-- Theme Settings --*/
if ( ! function_exists( 'mega_setup' ) )
{

	function mega_setup()
    {

	    load_theme_textdomain( 'mega-tools', get_template_directory() . '/languages' );
		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

        remove_image_size( 'thumbnail-100x100' );
        remove_image_size( 'thumbnail-150x150' );
        remove_image_size( 'thumbnail-300x300' );

	    remove_image_size( '100x100' );
	    remove_image_size( '150x150' );
	    remove_image_size( '300x300' );

	    remove_image_size( 'woocommerce_thumbnail' );
	    remove_image_size( 'woocommerce_single' );
	    remove_image_size( 'woocommerce_gallery_thumbnail' );
	    remove_image_size( 'shop_catalog' );
	    remove_image_size( 'shop_single' );
	    remove_image_size( 'shop_thumbnail' );

    }
    mega_setup();

}

/*
 * SVG Upload
 *
 */
add_filter('upload_mimes', 'my_myme_types', 1, 1);
function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
