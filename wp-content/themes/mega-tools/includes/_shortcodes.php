<?php
defined( 'ABSPATH' ) || exit;

/*
 * Shortcodes Contacts
 */
add_shortcode('contacts', 'adem_shortcodes_contacts');
function adem_shortcodes_contacts( $arr )
{
	return get_field('contacts', 26)[$arr['type']];
}
