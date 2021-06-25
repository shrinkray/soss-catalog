<?php
  declare( strict_types=1 );
use Roots\Sage\Setup;
use Roots\Sage\Wrapper;
?>

<!doctype html>
<html <?php language_attributes(); ?> lang="en">
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>

    <?php
      acf_form_head();
      do_action('get_header');
      get_template_part('templates/header');
      do_action('after_header');
    ?>
    <?php
      /**
       * Replacement for RevSlider animation
       * @gsap
       */
      // include('templates/partials/content-slider.php');

    ?>
    <div class="wrap container-fluid" role="document">
      <div class="content row">
        <main class="main px-0 mt-0" >
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->


          <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
              <?php  include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
          <?php endif;
        ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      do_action('after_footer');
      wp_footer();
    ?>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/@accessible360/accessible-slick@1.0.1/slick/slick.min.js"></script>

  </body>
</html>
