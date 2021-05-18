<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9068d98231.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title></title>
    <?php wp_head();?>
  </head>
  <body <?php body_class('');?>>
    <div class="col-sm-12 container d-flex  justify-content-around">
      <p>USP text</p>
      <p>USP text</p>
      <p>USP text</p>
      <p>USP text</p>
      <p>USP text</p>
      <p>USP text</p>
    </div>
    <header class="sticky-top  container d-flex col-12 col-sm-12 col-md-12 col-lg-12">

      <div class="icon col-4 col-sm-4 d-md-none  d-flex justify-content-center">
        <a href="javascript:void(0);" class="col-6 col-sm-6 d-block d-md-none  d-flex justify-content-center" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
        <a href="javascript:void(0);" class="col-6 col-sm-6 d-block d-md-none  d-flex justify-content-center" onclick="myFunction()">
          <i class="fas fa-search"></i>
        </a>
      </div>

      <a class="logo-wrapper col-4 col-sm-4 col-md-2 col-lg-2" href="/larsenshundeartikler">
        <img class="img-responsive logo" src="/larsenshundeartikler/wp-content/uploads/2021/05/logo-header.png" alt="">
      </a>

      <nav id="myLinks" class="col-12 col-sm-12 col-md-9 col-lg-9 container">
        <div class="navmenu ">
          <div class="mobile-searchbar" >
            <?php echo do_shortcode('[fibosearch]'); ?>
          </div>
          <div class="top_menu">
            <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'top-menu',
                  //'after' => '<a class="link-arrowdown" href="?op=1"><p class="arrowdown">&#9660;</p><a>'
                )
              );
            ?>
          </div>
          <div class="desktop-searchbar" >
            <?php echo do_shortcode('[fibosearch]'); ?>
          </div>
        </div>
      </nav>

      <div class="wishlist-cart col-4 col-sm-4 col-md-1 col-lg-1 d-flex  d-md-flex d-flex justify-content-around">
        <a href="#"><i class="fas fa-heart"></i></a>
        <a href="/larsenshundeartikler/cart/"><i class="fas fa-shopping-cart"></i></a>
      </div>
    </header>
    <?php if (class_exists('WooCommerce') && is_woocommerce()) : ?>

         <?php woocommerce_breadcrumb(); ?>

<?php endif; ?>

<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "flex") {
    x.style.display = "none";
  } else {
    x.style.display = "flex";
  }
}


if (jQuery(window).width() < 768) {
  $(function(){
      $(".sub-menu").hide();
      $(".sub-menu-link").click(function(e){
          e.preventDefault();
          $(".sub-menu", $(this).parent()).slideToggle();
      });
  })
}


</script>
