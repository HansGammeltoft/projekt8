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

//related posts
function example_cats_related_post() {

    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );

    if(!empty($categories) && !is_wp_error($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $current_post_type = get_post_type($post_id);

    $query_args = array(
        'category__in'   => $cat_ids,
        'post_type'      => $current_post_type,
        'post__not_in'    => array($post_id),
        'posts_per_page'  => '3',
     );

    $related_cats_post = new WP_Query( $query_args );

    if($related_cats_post->have_posts()):
         while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
            <ul>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                    <?php the_content(); ?>
                </li>
            </ul>
        <?php endwhile;

        // Restore original Post Data
        wp_reset_postdata();
     endif;

}

function mytheme_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );
