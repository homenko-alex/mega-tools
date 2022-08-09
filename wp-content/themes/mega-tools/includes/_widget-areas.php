<?php
defined( 'ABSPATH' ) || exit;
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', 'mega_widgets_init' );
function mega_widgets_init() {

    /*
     * Header: Contacts
     */
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Menu', 'mega' ),
        'id'            => 'footer-menu',
        'class'         => 'footer-nav',
        'description'   => esc_html__( 'Add widgets here.', 'mega' ),
        'before_widget' => '<div class="footer-column footer-column-nav">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="footer-column__title">',
        'after_title'   => '</div>',
    ) );




    /*
     * Berocket CompareList
     */
    register_sidebar( array(
        'name'          => esc_html__( 'Сравнение товаров', 'mega' ),
        'id'            => 'berocket-compare-list',
        'class'         => '',
        'description'   => esc_html__( 'Add widgets here.', 'mega' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ) );




    /*
 * WooCommerce: Viewed
 */
    register_sidebar( array(
        'name'          => esc_html__( 'Просмотренные товары', 'titan' ),
        'id'            => 'woo-viewed-products',
        'class'         => '',
        'description'   => esc_html__( 'Add widgets here.', 'titan' ),
        'before_widget' => '<div class="slider-catalog-list"><div class="container">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<div class="this-category-goods section-header-title"><h2 class="section-title">',
        'after_title'   => '</h2></div>',
    ) );

}

