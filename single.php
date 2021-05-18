<?php get_header();?>
<div>
  <?php if(has_post_thumbnail()):?>
    <img src="<?php the_post_thumbnail_url('post_image'); ?>" alt="<?php the_title();?>">
  <?php endif;?>
  <h1><?php the_title();?></h1>
  <!--wordpress text editor-->
  <?php if(have_posts()) : while(have_posts()) : the_post();?>
    <?php the_content();?>
  <?php endwhile; else: endif;?>
  <?php example_cats_related_post() ?>
  <?php get_sidebar();?>
</div>
<?php get_footer();?>
