<?php

  declare( strict_types=1 );

?>


<?php

  if ( have_rows( 'build_wrapper' ) ): // Flexible Content Wrapper ?>

  <?php while ( have_rows( 'build_wrapper' ) ) : the_row(); ?>



      <?php // FEATURE HERO COMPONENT

      if ( get_row_layout() == 'hero_component' ) : ?>

        <?php  include( 'partials/home-hero-component.php');

     //   HERO ?>



    <?php // FEATURE BLOCK COMPONENT

       elseif ( get_row_layout() == 'feature_block_component' ) : ?>

        <?php  include( 'partials/home-block-component.php');

 // END 3X BLOCKS ?>



    <?php // FEATURE CAROUSEL COMPONENT

       elseif ( get_row_layout() == 'feature_carousel_component' ) : ?>

        <?php if ( get_sub_field( 'display_carousel' ) == 1 ) :

          include( 'partials/home-post-carousel.php');

        endif; // Displays include if T/F is true
        ?>



       <?php //FEATURE SOCIAL MEDIA
      elseif ( get_row_layout() == 'feature_social_media' ) : ?>

        <?php  include( 'partials/home-social-media.php');

        // END SOCIAL MEDIA ?>



    <?php // FEATURE GALLERY STRIP

       elseif ( get_row_layout() == 'gallery_strip_component' ) : ?>

      <?php include( 'partials/home-gallery-component.php' ); ?>


      <?php endif; // Row Layout ?>

  <?php endwhile; // End the Build Wrapper while() function ?>

<?php else: ?>
  <?php // no layouts found ?>
<?php endif; // End Build Wrapper

