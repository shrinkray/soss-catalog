<?php

  declare( strict_types=1 );

?>

<?php

  if ( have_rows( 'build_wrapper' ) ): // Flexible Content Wrapper ?>


  <?php while ( have_rows( 'build_wrapper' ) ) : the_row(); ?>
<!--   FEATURE SOCIAL MEDIA   -->
    <?php if ( get_row_layout() == 'feature_social_media' ) : ?>

        <?php  include( 'partials/home-social-media.php');

       // END SOCIAL MEDIA ?>



<!--     3 X FEATURE BLOCK COMPONENT   -->
    <?php elseif ( get_row_layout() == 'feature_block_component' ) : ?>

        <?php  include( 'partials/home-block-component.php');

 // END 3X BLOCKS ?>


<!--     FEATURE CAROUSEL COMPONENT   -->
    <?php elseif ( get_row_layout() == 'feature_carousel_component' ) : ?>

        <?php  include( 'partials/home-carousel-component.php'); ?>


<!--     FEATURE HERO COMPONENT   -->
    <?php elseif ( get_row_layout() == 'hero_component' ) : ?>

        <?php  include( 'partials/home-hero-component.php'); ?>

      <?php endif; // Row Layout ?>
  <?php endwhile; // End the Build Wrapper while() function ?>
<?php else: ?>
  <?php // no layouts found ?>
<?php endif; // End Build Wrapper

