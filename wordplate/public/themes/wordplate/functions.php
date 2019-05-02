<?php

declare(strict_types=1);

// Register plugin helpers.
require template_path('includes/plugins/plate.php');

require template_path('postTypes/chefs.php');


//removes editor from chef
add_action('init', 'my_rem_editor_from_post_type');
function my_rem_editor_from_post_type() {
    remove_post_type_support( 'chef', 'editor' );
}


//Adding rest API support to the chef post type.
add_filter( 'register_post_type_args', 'chef_endpoint', 10, 2 );



function chef_endpoint( $args, $post_type ) {
    if ( 'chef' === $post_type ) {
        $args['show_in_rest'] = true;
        $args['rest_base']             = 'chefs';
        $args['rest_controller_class'] = 'WP_REST_Posts_Controller';
    }
    return $args;
}



// Set theme defaults.
add_action('after_setup_theme', function () {
    // Disable the admin toolbar.
    show_admin_bar(false);

    // Add post thumbnails support.
    add_theme_support('post-thumbnails');

    // Add title tag theme support.
    add_theme_support('title-tag');

    // Add HTML5 theme support.
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'widgets',
    ]);

    // Register navigation menus.
    register_nav_menus([
        'navigation' => __('Navigation', 'wordplate'),
    ]);
});

// Enqueue and register scripts the right way.
add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');

    // wp_enqueue_style('wordplate', mix('styles/app.css'));

    // wp_register_script('wordplate', mix('scripts/app.js'), '', '', true);
    // wp_enqueue_script('wordplate');
});

// Remove JPEG compression.
add_filter('jpeg_quality', function () {
    return 100;
}, 10, 2);
