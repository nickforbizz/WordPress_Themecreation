<?php

// Loading Stylesheets
function enqueue_customtheme_style()
{
    wp_enqueue_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css");
    wp_enqueue_style("customtheme_style", get_stylesheet_uri());

}
add_action('wp_enqueue_scripts', 'enqueue_customtheme_style');



/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    if ( ! file_exists( get_template_directory() . '/helpers/class-wp-bootstrap-navwalker.php' ) ) {
        // File does not exist... return an error.
        return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
    } else {
        // File exists... require it.
        require_once get_template_directory() . '/helpers/class-wp-bootstrap-navwalker.php';
    }
}
add_action( 'after_setup_theme', 'register_navwalker' );



function customtheme_setup()
{
    register_nav_menus(array(
        "Primary" => __("Primary Menu", "myTheme")
    ));
    
    add_theme_support( "title-tag" );
}
add_action('after_setup_theme', 'customtheme_setup');

