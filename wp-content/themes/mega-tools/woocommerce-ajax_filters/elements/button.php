<?php
extract($berocket_query_var_title);

if( $widget_type === 'update_button' ) $cls = 'bapf_button btn btn-sm btn-primary';
if( $widget_type === 'reset_button' ) $cls = 'bapf_button btn btn-sm btn-secondary';

//Get default template functionality
$template_content = BeRocket_AAPF_Template_Build_default();
unset($template_content['template']['attributes']['data-op']);
unset($template_content['template']['attributes']['data-taxonomy']);
unset($template_content['template']['attributes']['data-name']);
unset($template_content['template']['content']['header']);
unset($template_content['template']['content']['filter']['attributes']);
$template_content['template']['content']['filter']['content']['button'] = array(
    'type'          => 'tag',
    'tag'           => 'button',
    'attributes'    => array(
        'class'         => array(
	        $cls
        )
    ),
    'content'       => array(
        berocket_isset($title)
    )
);

$template_content['template']['content']['header'] = '';

$template_content = apply_filters('BeRocket_AAPF_template_full_element_content', $template_content, $berocket_query_var_title);
echo BeRocket_AAPF_Template_Build($template_content);
