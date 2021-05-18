<?php
function load_stylesheets()
{
  wp_register_style('stylesheet', get_template_directory_uri() . '/style.css', '', 1, 'all');
  wp_enqueue_style('stylesheet');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function load_javascript()
{
  wp_register_script('custom', get_template_directory_uri() . '/app.js', '', 1, true);
  wp_enqueue_script('custom');
}
add_action('wp_enqueue_scripts', 'load_javascript');

//tilføj menuer i wordpress
add_theme_support('menus');

//registrede menuer
register_nav_menus(
  array(
    'top-menu' => 'Top Menu',
  )
);

//tilføj thumpnail felt til indlæg + sider
add_theme_support('post-thumbnails');

//billede størrelser på thumbnails, wordpress autoscalerer til en bestemt størrelse
add_image_size('post_image', 1100, 750, false);

//tilføj sidebar - produktlist
register_sidebar(
    array(
      'name' => 'Page Sidebar',
      'id' => 'page-sidebar',
      'class' => '',
      'before_title' => '<p>',
      'after_title' => '</p>'
    )
  );

  //tilføj sidebar - blogindlæg
  register_sidebar(
      array(
        'name' => 'Blog Sidebar',
        'id' => 'blog-sidebar',
        'class' => '',
        'before_title' => '<p>',
        'after_title' => '</p>'
      )
    );

  //tilføj woocommerce support
  function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
  }

  add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


  /**
   * Rename "home" in breadcrumb
   */
  add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text' );
  function wcc_change_breadcrumb_home_text( $defaults ) {
      // Change the breadcrumb home text from 'Home' to 'Apartment'
  	$defaults['home'] = 'Shop';
  	return $defaults;
  }

  /**
 * Replace the home link URL
 */
add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
function woo_custom_breadrumb_home_url() {
    return '/larsenshundeartikler/shop/';
}

function mytheme_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );
