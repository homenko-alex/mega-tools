<?php
defined( 'ABSPATH' ) || exit;
/**
 * Register jQuery
 */
add_action( 'wp_enqueue_scripts', 'jquery_script_method' );
function jquery_script_method() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/assets/dist/vendor/jquery/jquery.min.js', false, null, false );
	wp_enqueue_script( 'jquery' );
}

/**
 * CSS files
 */
add_action( 'wp_enqueue_scripts', 'mega_styles' );
function mega_styles()
{

    wp_enqueue_style( 'mega-font-roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i', [], null );
	wp_enqueue_style( 'mega-bootstrap', get_template_directory_uri() . '/assets/dist/vendor/bootstrap/css/bootstrap.min.css', [], null );
	wp_enqueue_style( 'mega-owl', get_template_directory_uri() . '/assets/dist/vendor/owl-carousel/assets/owl.carousel.min.css', [], null );
    wp_enqueue_style( 'mega-photoswipe', get_template_directory_uri() . '/assets/dist/vendor/photoswipe/photoswipe.css', [], null );
	wp_enqueue_style( 'mega-photoswipe-skin', get_template_directory_uri() . '/assets/dist/vendor/photoswipe/default-skin/default-skin.css', [], null );
	wp_enqueue_style( 'mega-select2', get_template_directory_uri() . '/assets/dist/vendor/select2/css/select2.min.css', [], null );

	wp_enqueue_style( 'mega-style', get_template_directory_uri() . '/assets/dist/css/style.css', [], null );
	wp_enqueue_style( 'mega-fontawesome', get_template_directory_uri() . '/assets/dist/vendor/fontawesome/css/all.min.css', [], null );

	wp_enqueue_style( 'mega-tools', get_template_directory_uri() . '/assets/dist/fonts/stroyka/stroyka.css', [], null );

}
/**
 * JS files
 */
add_action( 'wp_enqueue_scripts', 'mega_scripts' );
function mega_scripts()
{

    wp_enqueue_script( 'mega-bootstrap', get_template_directory_uri() . '/assets/dist/vendor/bootstrap/js/bootstrap.bundle.min.js', ['jquery'], null, true );
	wp_enqueue_script( 'mega-owl', get_template_directory_uri() . '/assets/dist/vendor/owl-carousel/owl.carousel.min.js', ['jquery'], null, true );
	wp_enqueue_script( 'mega-nouislider', get_template_directory_uri() . '/assets/dist/vendor/vendor/nouislider/nouislider.min.js', ['jquery'], null, true );
	wp_enqueue_script( 'mega-photoswipe', get_template_directory_uri() . '/assets/dist/vendor/photoswipe/photoswipe.min.js', ['jquery'], null, true );
	wp_enqueue_script( 'mega-photoswipe-ui', get_template_directory_uri() . '/assets/dist/vendor/photoswipe/photoswipe-ui-default.min.js', ['jquery'], null, true );
	wp_enqueue_script( 'mega-select2', get_template_directory_uri() . '/assets/dist/vendor/select2/js/select2.min.js', ['jquery'], null, true );
	wp_enqueue_script( 'mega-number', get_template_directory_uri() . '/assets/dist/js/number.js', ['jquery'], null, true );
	wp_enqueue_script( 'mega-main', get_template_directory_uri() . '/assets/dist/js/main.js', ['jquery'], null, true );
	wp_enqueue_script( 'mega-header', get_template_directory_uri() . '/assets/dist/js/header.js', ['jquery'], null, true );
	wp_enqueue_script( 'mega-svg4everybody', get_template_directory_uri() . '/assets/dist/vendor/svg4everybody/svg4everybody.min.js', ['jquery'], null, true );

}

/*
 * Remove CSS
 */
function mega_dequeue_style() {
	/*
     * Css: Woocommerce
     */
	wp_dequeue_style( 'woocommerce_frontend_styles' );
	wp_dequeue_style( 'woocommerce_fancybox_styles' );
	wp_dequeue_style( 'woocommerce_chosen_styles' );
	wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
	wp_dequeue_style( 'wc-block-style' );
	wp_dequeue_style( 'woocommerce-inline' );
    wp_dequeue_style( 'woocommerce-layout' );
    wp_dequeue_style( 'woocommerce-smallscreen' );
    wp_dequeue_style( 'woocommerce-general' );

    /*
     * Otcher
     */
    wp_dequeue_style( 'jquery-selectBox' );

	/*
	 * JS
	 */
	wp_dequeue_script( 'wc_price_slider' );
	wp_dequeue_script( 'wc-chosen' );
	wp_dequeue_script( 'prettyPhoto' );
	wp_dequeue_script( 'prettyPhoto-init' );
	wp_dequeue_script( 'jquery-blockui' );
	wp_dequeue_script( 'jquery-placeholder' );
	wp_dequeue_script( 'fancybox' );
	wp_dequeue_script( 'jqueryui' );
	wp_dequeue_script( 'flexslider' );
	wp_dequeue_script( 'zoom' );
	wp_dequeue_script( 'photoswipe' );

    wp_dequeue_style( 'dashicons' );
    wp_dequeue_style( 'tawcvs-frontend' );
    wp_dequeue_style( 'dashicons' );

}
add_action( 'wp_enqueue_scripts', 'mega_dequeue_style' );
