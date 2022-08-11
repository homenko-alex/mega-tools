<?php
defined( 'ABSPATH' ) || exit;

register_nav_menus( [
	'primary-menu' => esc_html__( 'Меню', 'mega' ),
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
	if($args->theme_location == 'primary-menu')
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

