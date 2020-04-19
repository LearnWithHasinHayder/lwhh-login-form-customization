<?php
/*
Plugin Name: Login Form
Plugin URI:
Description: Friendly Description
Version: 1.0.0
Author: LWHH
Author URI:
License: GPLv2 or later
Text Domain: login-form
 */
function lfp_login_logo() {?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo plugin_dir_url( __FILE__ ) . 'assets/images/wplogo.png'; ?>);
		height:100px;
		width:100px;
		background-size: 100px;
		background-repeat: no-repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'lfp_login_logo' );

add_action( 'login_head', function () {
    add_filter( 'gettext', function ( $translated_text, $text_to_translate, $textdomain ) {
        if ( 'Username or Email Address' == $text_to_translate ) {
            $translated_text = __( 'Your Login Key', 'login-form' );
        } elseif ( 'Password' == $text_to_translate ) {
            $translated_text = __( 'Pass Key', 'login-form' );
        }

        return $translated_text;
    }, 10, 3 );
} );

function lfp_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'lfp_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );