<?php get_header();?>
<section class="shop-page d-flex flex-wrap col-12 col-sm-12 col-md-12 col-lg-12">
  <div class="shop-sidebar d-none d-md-block col-md-3 col-lg-3">
    <div class="shop-sidebar-wrapper sticky-top">
    <?php dynamic_sidebar('shop-sidebar');?>
    </div>
  </div>
  <div class="shop-produktlist flex-wrap col-12 col-sm-12 col-md-9 col-lg-9">
    <?php woocommerce_content();?>
  </div>
</section>
<?php get_footer();?>

<script>
if (jQuery(window).width() > 768) {
  $(function(){
      $(".menu-shop-menu-container > .sub-menu").hide();
      $(".sub-menu-link").click(function(e){
          e.preventDefault();
          $(".sub-menu", $(this).parent()).slideToggle();
      });
  })
}
</script>
