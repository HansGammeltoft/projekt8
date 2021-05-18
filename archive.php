<?php get_header();?>
<section class="d-flex flex-wrap col-12 col-sm-12 col-md-12 col-lg-12">
  <div class="top-archive col-12 col-sm-12 col-md-12 col-lg-12">
    <h1 class="col-12 col-sm-12 col-md-12 col-lg-12">Blog</h1>
    <!-- sidebar er display none -->
    <div class="sidebar col-12 col-sm-12 col-md-12 col-lg-12">
      <?php dynamic_sidebar('blog-sidebar');?>
    </div>
  </div>
  <div class="article-cards-wrapper d-flex flex-wrap col-12 col-sm-12 col-md-12 col-lg-12">
    <!--wordpress text editor-->
    <?php if(have_posts()) : while(have_posts()) : the_post();?>
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
    <?php endwhile; else: endif;?>
  </div>
  <div class="pagination d-flex justify-content-center col-12 col-sm-12 col-md-12 col-lg-12">
    <?php
      global $wp_query;
      $big = 999999999; // need an unlikely integer

      echo paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'current' => max( 1, get_query_var('paged') ),
      'total' => $wp_query->max_num_pages
      ) );
    ?>
  </div>
</section>
<?php get_footer();?>
