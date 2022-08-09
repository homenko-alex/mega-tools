<?php
/**
 * The header for our theme
 * @package mega
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- site -->
    <div class="site">

    <?php
    /**
     * header_parts hook
     *
     * @hooked mega_header_TagHeaderOpen - 10
     * @hooked mega_header_TagHeaderInner - 20
     * @hooked mega_header_TagHeaderClose - 30
     *
     */
    do_action('header_parts');
    ?>
