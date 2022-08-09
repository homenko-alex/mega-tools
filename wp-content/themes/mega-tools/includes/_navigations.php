<?php
defined( 'ABSPATH' ) || exit;

// Register our menu.
register_nav_menus( [
	'header-menu-top' => esc_html__( 'Header: Верхнее меню', 'mega' ),
] );
