<?php
/*	
*	---------------------------------------------------------------------
*	SCOPE Functions
*	--------------------------------------------------------------------- 
*/

// Define constants
define('SCOPE_PATH', get_template_directory());
define('SCOPE_URI', get_template_directory_uri());
define('SCOPE_INCLUDE', get_template_directory() . '/inc');
define('SCOPE_ADMIN', get_template_directory() . '/inc/theme-options');
define('SCOPE_ADMIN_EXT', get_template_directory() . '/inc/theme-options-extend');
define('SCOPE_PLUGINS', get_template_directory() . '/inc/plugins');

// Theme setup
require_once(SCOPE_INCLUDE . '/theme-setup.php');
require_once(SCOPE_INCLUDE . '/custom-functions.php');
require_once(SCOPE_INCLUDE . '/menu-walker.php');
require_once(SCOPE_INCLUDE . '/compiler.php');
require_once(SCOPE_INCLUDE . '/sidebars.php');
require_once(SCOPE_INCLUDE . '/tgm-plugin-activation.php');
require_once(SCOPE_INCLUDE . '/tgm-register-plugins.php');

// WooCommerce
require_once(SCOPE_INCLUDE . '/woocommerce/index.php');

// Theme options
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
require(SCOPE_ADMIN . '/ot-loader.php' );
require(SCOPE_ADMIN_EXT . '/theme-options.php');
require(SCOPE_ADMIN_EXT . '/config.php');
require(SCOPE_ADMIN_EXT . '/typography.php');
require(SCOPE_ADMIN_EXT . '/meta-boxes.php');

/*	
*	---------------------------------------------------------------------
*	SCOPE Enqueue scripts & styles
*	--------------------------------------------------------------------- 
*/

add_action('wp_enqueue_scripts', 'scope_scripts');
function scope_scripts() {

    // Global scripts
    wp_register_script( 'scope_main-js', SCOPE_URI . '/js/init.js', array('jquery'), '', true);
    wp_enque_script( 'scope_main-js' );

    // Sticky menu
    $sticky_header = ot_get_options('sticky_header', 'sticky_header_smart');

    if( is_category() || is_single() ){
        $category_styles = ot_get_option( 'category_styles', array() );
        if( ! empty( $category_styles ) ) {
            foreach( $category_styles as $category_style ) {
                if( $category_style['custom-header'] != '' ) {
                    $custom_header = $category_style['custom_header'];
                    if( $category_style['cs_select'] != '' && is_category( $category_style['cs_select'] ) ){
                        $sticky_header = get_post_meta( $custom_header, 'sticky_header', true);
                    }
                    if( is_single() && $category_style['cs_select'] != '' && in_category( $category_style['cs_select'] ) && $category_style['cs_header_posts'] != 'off' ) {
                        $sticky_header = get_post_meta( $custom_header, 'sticky_header', true);
                    }
                }
            }
        }
    }

    if( is_page() || is_single() ){
        $custom_header = get_post_meta( get_the_ID(), 'custom_header', true);
        if( $custom_header != '' ){
            $sticky_header = get_post_meta( $custom_header, 'sticky_header', true);
        }
    }

    if ( $sticky_header == 'sticky_header_smart' ){
        wp_register_script( 'scope_sticky-header-smart-js', SCOPE_URI . '/js/sticky-header-smart.js', array('jquery'), '', true);
        wp_enqueue_script(' scope_sticky-header-smart-js' );
    } elseif ( $sticky_header == 'sticky-header' ){
        wp_register_script( 'scope_sticky-header-js', SCOPE_URI . '/js/sticky-header.js', array('jquery'), '', true);
        wp_enqueue_script( 'scope_sticky-header-js');
    }

    // WooCommerce style
    if (class_exists( 'WooCommerce' )){
        wp_register-style( 'scope_woocommerce', SCOPE_URI . '/inc/woocommerce/woocommerce.css', null, 1.0, 'all');
        wp_enqueue_style( 'scope_woocommerce' );
    }

    // Main stylesheet
    wp_register_style( 'scope_main', get_stylesheet_uri());
    wp_enqueue_style( 'scope_main' );

    // Theia sticky sidebar
    wp_register( 'scope_sticky-sidebar', SCOPE_URI . '/js/theia-sticky-sidebar.js', array('jquery'), '', true);
    wp_enqueue_script( 'scope_sticky-sidebar' );

    // Icons
    wp_register_style( 'scope_post-icons', SCOPE_URI .'/css/post-icons.css', null, 1.0, 'all');
    wp_enqueue_style( 'scope_post-icons' );

    if ( ! function_exists( 'vc_map' ) ) {
        wp_register_style( 'font-awesome', SCOPE_URI . '/css/font-awesome.css', null, 1.0, 'all');
        wp_enqueue_style( 'font-awesome' );
    } else {
        wp_enqueue_style( 'font-awesome' );
    }

    // Threaded comments (when in use)
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'font-awesome' );
    }

    // Default typo
    $body_typo_array = ot_get_options('body-font');
    if ( empty( $body_typo_array['font-family'] ) ) {
        wp_register_style= 'scope_google-font-lato', 'https://fonts.googleapis.com/css?family=Lato:400,300,700,900', null, null, 'all');
        wp_enqueue_style( 'scope_google-font-lato' );
    }
    $menu_typo_array = ot_get_option('menu-font');
    $heading_typo_array = ot_get_option('heading-font');
    if ( empty( $menu_typo_array['font-family'] ) || empty( $heading_typo_array['font-family'] ) ) {
        wp_register_style( 'scope_google-font-roboto', 'https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900', null, null, 'all');
        wp_enqueue_style( 'scope_google-font-roboto' );
    }

}

// Enqueue custom styles from back-end
require_once(SCOPE_PATH . '/custom-style.php');

// Editor style
function scope_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'scope_add_editor_styles' );


// Custom back-end style
add_action( 'admin_enqueue_scripts', 'scope_admin_scripts' );
function scope_admin_scripts() {
    wp_register_style( 'scope_admin_css_extend', SCOPE_URI . '/inc/theme-options-extend/assets/theme-options-extend.css', null, '1.0.0');

    wp_enqueue_style( 'scope_admin_css_extend' );
}