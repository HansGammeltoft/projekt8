<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9068d98231.js" crossorigin="anonymous"></script>
    <title></title>
    <?php wp_head();?>
  </head>
  <body <?php body_class('');?>>
    <div class="col-sm-12 container d-flex align-items-center justify-content-around">
      <p>USP text</p>
      <p>USP text</p>
      <p>USP text</p>
      <p>USP text</p>
      <p>USP text</p>
      <p>USP text</p>
    </div>
    <header class="sticky-top col-sm-12">
      <a href="javascript:void(0);" class="icon d-block d-md-none col-sm-2" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
      <nav class="col-sm-10 col-md-12 col-lg-12 container d-flex">
        <a class="col-sm-10 col-md-2 col-lg-1" href="/larsenshundeartikler">
          <img class="img-responsive logo" src="/larsenshundeartikler/wp-content/uploads/2021/05/logo-header.png" alt="">
        </a>
        <div id="myLinks" class="navmenu col-sm-12 col-sm-9 col-lg-10 align-items-center">
          <div class="mobile-searchbar col-sm-5 col-md-5 col-lg-3" >
            <?php echo do_shortcode('[fibosearch]'); ?>
          </div>
          <div class="top_menu col-sm-7 col-md-7 col-lg-9">
            <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'top-menu'
                )
              );
            ?>
          </div>
          <div class="desktop-searchbar col-sm-5 col-md-5 col-lg-3" >
            <?php echo do_shortcode('[fibosearch]'); ?>
          </div>
        </div>
        <div class="col-sm-2 col-md-1 col-lg-1 wishlist-cart d-flex align-items-center justify-content-around">
          <a href="#"><i class="fas fa-heart"></i></a>
          <a href="/larsenshundeartikler/cart/"><i class="fas fa-shopping-cart"></i></a>
        </div>
      </nav>
    </header>
    <?php if (class_exists('WooCommerce') && is_woocommerce()) : ?>

         <?php woocommerce_breadcrumb(); ?>

<?php endif; ?>

<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
