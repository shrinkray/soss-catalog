<div class="container">
  <div class="row">
    <div class="col-sm-12">

      <!-- Load the slider -->
      <?php // If running the local instance, we don't need the slider

        if ( site_url() === 'https://www.soss.com'  ||  site_url() === 'https://soss2.wpengine.com' )  {

          putRevSlider("short-punch", "homepage" );

        } else {


          //echo 'removed slider while working local, apply changes to content-front-page.php' ;

        }
      ?>

    </div>
  </div>
</div>

<?php

  if ( have_rows( 'content_sections' ) ): ?>
    <?php while ( have_rows( 'content_sections' ) ) : the_row(); ?>


      <?php // FOCAL ROW  ?>

      <?php if ( get_row_layout() == 'focal_row' ) :

        //include ( 'partials/focal.php' );

        include( 'partials/focal.php'); ?>



        <?php // PRODUCT LANDING ROUTER ?>


      <?php elseif ( get_row_layout() == 'product_router' ) :

        include('partials/router.php' ); ?>



        <?php // TESTIMONIALS ?>

        <!--    Removed 5/9/2019 :: Replaced by Testimonial Rotator Plugin -->


        <?php // FULL-WIDTH BLOCK ?>

      <?php elseif ( get_row_layout() == 'standard_block' ) :

        include( 'partials/fullblock.php' ); ?>




        <?php // CARD BUILDER ROW ?>

      <?php elseif ( get_row_layout() == 'card_builder' ) :

        include( 'partials/cardbuilder.php' ); ?>



        <?php // POSTS BUILDER ROW Secondary  ?>

      <?php elseif ( get_row_layout() == 'post_builder' ) :

        include( 'partials/postbuilder.php' ); ?>


      <?php

      endif; // last if layout
    endwhile; // big loop ?>
  <?php else: ?>
    <?php // no layouts found ?>
  <?php endif; // content_section


