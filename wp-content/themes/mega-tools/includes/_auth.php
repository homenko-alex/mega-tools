<?php
defined( 'ABSPATH' ) || exit;

add_action('init', 'mega_ajax_user_init');
function mega_ajax_user_init()
{

    /*
     * Autch
     */
	add_action('wp_ajax_user_login', 'mega_ajax_user_login');
    add_action( 'wp_ajax_nopriv_user_login', 'mega_ajax_user_login' );

    /*
     * Registration
     */
//    add_action('wp_ajax_user_registration', 'titan_user_registration');
//    add_action('wp_ajax_nopriv_user_registration', 'titan_user_registration');

}

/*
 * Function: Login
 */
function mega_ajax_user_login()
{

    check_ajax_referer( 'ajax-nonce', 'security' );

	if ( !is_email($_POST['email']) )
	{
		wp_send_json_error([
			'loggedin'  => false,
			'message'   => '<div class="alert alert-danger mb-3">' . __('Некорректный email', 'mega-tools') . '</div>'
		]);
	}

	if ( empty($_POST['email']) )
	{
		wp_send_json_error([
			'loggedin'  => false,
			'message'   => '<div class="alert alert-danger mb-3">' . __('Не введен Email', 'mega-tools') . '</div>'
		]);
	}

	if ( empty($_POST['password']) )
	{
		wp_send_json_error([
			'loggedin'  => false,
			'message'   => '<div class="alert alert-danger mb-3">' . __('Не введен пароль', 'mega-tools') . '</div>'
		]);
	}

    $info = [];

	$user = get_user_by( 'email', $_POST['email'] );

	$info['user_login'] = $user->user_login;
	$info['user_password'] = $_POST['password'];
	$info['remember'] = true;

    $user_signon = wp_signon( $info, false );

    if ( is_wp_error($user_signon) )
	{

	    wp_send_json_error([
                'loggedin'  => false,
                'message'   => '<div class="alert alert-danger mb-3">' . __('Введен неверный логин или пароль', 'mega-tools') . '</div>'
	    ]);

    } else {

        wp_send_json_success([
                'loggedin'  => true,
                'message'   => '<div class="alert alert-success mb-3">' . __('Отлично! Идет перенаправление...', 'mega-tools') . '</div>',
	            'redirecturl' => get_permalink( wc_get_page_id( 'myaccount' ) ),
        ]);

    }

}



