<?php
defined( 'ABSPATH' ) || exit;

register_nav_menus( [
	'primary-menu' => esc_html__( 'Меню', 'mega' ),
	'footer-menu' => esc_html__( 'Footer: Меню', 'mega' ),
	'footer-menu-account' => esc_html__( 'Footer: Меню личный кабинет', 'mega' ),
] );

/**
 * @param $classes
 * @param $item
 * @param $args
 *
 * @return mixed
 */
add_filter('nav_menu_css_class', 'mega_menu_classes', 1, 3);
function mega_menu_classes($classes, $item, $args)
{

	$menu_locations = get_nav_menu_locations();

	if ( has_term($menu_locations['primary-menu'], 'nav_menu', $item) )
	{
		$classes[] = 'nav-links__item';
	}

	return $classes;
}

/**
 * @param $classes
 * @param $item
 * @param $args
 *
 * @return mixed
 */
add_filter('nav_menu_link_attributes', 'mega_add_additional_class_on_a', 1, 3);
function mega_add_additional_class_on_a($classes, $item, $args)
{
	if (isset($args->add_a_class)) {
		$classes['class'] = $args->add_a_class;
	}
	return $classes;
}
