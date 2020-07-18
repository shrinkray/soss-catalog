<?php

if ( have_rows( 'content_sections' ) ): ?>
  <?php while ( have_rows( 'content_sections' ) ) : the_row(); ?>


    <?php // FOCAL ROW  ?>

    <?php if ( get_row_layout() == 'focal_row' ) :


      include( 'partials/focal.php'); ?>



      <?php // PRODUCT LANDING ROUTER ?>


    <?php elseif ( get_row_layout() == 'product_router' ) :

      include('partials/router.php' ); ?>



      <?php // TESTIMONIALS

//    Removed 5/9/2019 GRM in adding plugin in its place

      ?>





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


