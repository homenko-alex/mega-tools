<?php
defined( 'ABSPATH' ) || exit;

add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', 'mega_widgets_init' );
function mega_widgets_init()
{

    /*
     * Footer: Contacts
     */
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Contacts', 'mega' ),
        'id'            => 'footer-contacts',
        'class'         => 'site-footer__widget footer-contacts',
        'description'   => esc_html__( 'Add widgets here.', 'mega' ),
        'before_widget' => '<div class="col-12 col-md-6 col-lg-4"><div class="site-footer__widget footer-contacts">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h5 class="footer-contacts__title">',
        'after_title'   => '</h5>',
    ) );


	/*
	 * Footer: Menu
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu', 'mega' ),
		'id'            => 'footer-menu',
		'class'         => 'site-footer__widget footer-links',
		'description'   => esc_html__( 'Add widgets here.', 'mega' ),
		'before_widget' => '<div class="col-6 col-md-3 col-lg-2"><div class="site-footer__widget footer-links">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h5 class="footer-links__title">',
		'after_title'   => '</h5>',
	) );

	/*
    * Footer: Menu Account
    */
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu Account', 'mega' ),
		'id'            => 'footer-menu-account',
		'class'         => 'site-footer__widget footer-links',
		'description'   => esc_html__( 'Add widgets here.', 'mega' ),
		'before_widget' => '<div class="col-6 col-md-3 col-lg-2"><div class="site-footer__widget footer-links">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h5 class="footer-links__title">',
		'after_title'   => '</h5>',
	) );

	/*
	* Footer: Menu Account
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Right Column', 'mega' ),
		'id'            => 'footer-right-column',
		'class'         => 'site-footer__widget footer-newsletter',
		'description'   => esc_html__( 'Add widgets here.', 'mega' ),
		'before_widget' => '<div class="col-12 col-md-12 col-lg-4"><div class="site-footer__widget footer-newsletter">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h5 class="footer-newsletter__title">',
		'after_title'   => '</h5>',
	) );

}

