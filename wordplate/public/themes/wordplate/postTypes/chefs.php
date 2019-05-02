<?php 

function create_posttype() {
register_post_type( 'chef',
// CPT Options
array(
  'labels' => array(
    'name' => __( 'Chef' ),
    'singular_name' => __( 'Chef' )
  ),
  'public' => true,
  'has_archive' => false,
  'rewrite' => array('slug' => 'Chef'),
  'menu_icon' => 'dashicons-carrot',
  'menu_position' => 20,
  'show_in_rest' => true,
  'public' => true,
 )
);
}



// Hooking up the function to the theme setup
add_action( 'init', 'create_posttype' );