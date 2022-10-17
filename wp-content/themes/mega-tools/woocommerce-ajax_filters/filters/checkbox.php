<?php
/**
* The template for displaying checkbox filters
*
* Override this template by copying it to yourtheme/woocommerce-ajax_filters/checkbox.php
*
* @author     BeRocket
* @package     WooCommerce-Filters/Templates
* @version  1.0.1
*/

extract($berocket_query_var_title);

if( $attribute === 'product_cat' )
{

	load_template( __DIR__ . '/category.php', true, $berocket_query_var_title );
	return;
}

$class_color = null;
if( $attribute === 'pa_color' )
{

	$class_color = 'colors';
}

foreach($terms as $term){break;}
//Get default template functionality
$template_content = BeRocket_AAPF_Template_Build_default();
//set unique id for filter
$filter_unique_class = 'bapf_'.$unique_filter_id;
$template_content['template']['attributes']['id']                                           = $filter_unique_class;
//set this template class
$template_content['template']['attributes']['class']['filter_type']                         = 'bapf_ckbox';
//Set data for filter links
$template_content['template']['attributes']['data-op']                                      = $operator;
$template_content['template']['attributes']['data-taxonomy']                                = ( berocket_isset($term, 'wpml_taxonomy') ? $term->wpml_taxonomy : $term->taxonomy );
//Set name for selected filters area and other siilar place
$template_content['template']['attributes']['data-name']                                    = $title;
//Set widget title
$template_content['template']['content']['header']['content']['title']['content']['title']  = '';
//Add widget content
$template_content['template']['content']['filter']['content']['list']                       = array(
    'type'          => 'tag',
    'tag'           => 'ul',
    'attributes'    => array(
	    'class'         => array(
			'filter-list__list-items-checkbox ' . $class_color
	    ),
    ),
    'content'       => array()
);
$terms_content = array();
foreach( $terms as $i => $term ) {
    $element_unique = $filter_unique_class.'_'.$term->term_id;
    $terms_content['element_'.$i] = apply_filters('BeRocket_AAPF_template_single_item', array(
        'type'          => 'tag',
        'tag'           => 'li',
        'attributes'    => array(),
        'content'       => array(
            'checkbox'  => array(
                'type'          => 'tag_open',
                'tag'           => 'input',
                'attributes'    => array(
                    'data-name'     => $term->name,
                    'id'            => $element_unique,
                    'type'          => 'checkbox',
                    'value'         => $term->value
                ),
            ),
            'label'     => array(
                'type'          => 'tag',
                'tag'           => 'label',
                'attributes'    => array(
                    'for'           => $element_unique
                ),
                'content'       => array(
                    'name' => esc_html__($term->name)
                )
            ),
        )
    ), $term, $i, $berocket_query_var_title);
}
$template_content['template']['content']['filter']['content']['list']['content'] = $terms_content;
$template_content = apply_filters('BeRocket_AAPF_template_full_content', $template_content, $terms, $berocket_query_var_title);
if( count($template_content['template']['content']['filter']['content']['list']['content']) > 0 )
{

	echo '<div class="widget-filters__item">';
	echo '<div class="filter filter--opened" data-collapse-item>';
	echo '<button type="button" class="filter__title" data-collapse-trigger>' . $title . '<svg class="filter__arrow" width="12px" height="7px"><use xlink:href="' . get_stylesheet_directory_uri() . '/assets/dist/images/sprite.svg#arrow-rounded-down-12x7"></use></svg></button>';
	echo '<div class="filter__body" data-collapse-content>';
	echo '<div class="filter__container">';
	echo '<div class="filter-list">';
	echo '<div class="filter-list__list">';

	echo BeRocket_AAPF_Template_Build($template_content);

	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';

}
