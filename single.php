<?php get_header();?>
<section class="d-flex flex-wrap col-12 col-sm-12 col-md-12 col-lg-12">
  <div class="breadcrumbs d-flex flex-wrap col-12 col-sm-12 col-md-12 col-lg-12">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb( '</p><p id=“breadcrumbs”>','</p><p>' );
      }
    ?>
  </div>
  <div class="single-wrapper single-wrapper-img">
  <?php if(has_post_thumbnail()):?>
    <img class="img-responsive img-fluid" src="<?php the_post_thumbnail_url('post_image'); ?>" alt="<?php the_title();?>">
  <?php endif;?>
  </div>
  <div class="single-wrapper d-flex flex-wrap col-12 col-sm-12 col-md-12 col-lg-12">
  <h1><?php the_title();?></h1>
  <!--wordpress text editor-->
  <?php if(have_posts()) : while(have_posts()) : the_post();?>
    <?php the_content();?>
  <?php endwhile; else: endif;?>
  </div>
  <h2 class="related-posts-header col-12 col-sm-12 col-md-12 col-lg-12">Relaterede blogindlæg:</h2>
  <div class="related-posts d-flex flex-wrap col-12 col-sm-12 col-md-12 col-lg-12">
    <?php
    $tags = wp_get_post_terms( get_queried_object_id(), 'post_tag', ['fields' => 'ids'] );
        $args = [
            'post__not_in'        => array( get_queried_object_id() ),
            'posts_per_page'      => 4,
            'orderby'             => 'rand',
            'tax_query' => [
                [
                    'taxonomy' => 'post_tag',
                    'terms'    => $tags
                ]
            ]
        ];
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) : ?>

            <!-- the loop -->
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

              <div class="article-cards col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="<?php the_permalink(); ?>">
                  <div class="article-cards-styling">
                    <?php if(has_post_thumbnail()):?>
                      <img class="img-responsive img-fluid" src="<?php the_post_thumbnail_url('post_image'); ?>" alt="<?php the_title();?>">
                    <?php endif;?>
                      <h2><?php the_title();?></h2>
                      <div class="subheading">
                        <?php the_excerpt();?>
                      </div>
                      <div class="btn btn-primary d-flex justify-content-center">
                        Læs artiklen her
                      </div>
                  </div>
                </a>
              </div>

            <?php endwhile; ?>
            <!-- end of the loop -->

            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
  </div>
</section>
<?php get_footer();?>
