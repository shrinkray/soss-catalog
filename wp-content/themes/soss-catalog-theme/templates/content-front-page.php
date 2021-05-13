<?php

  declare( strict_types=1 );

?>

<?php

  if ( have_rows( 'build_wrapper' ) ): // Flexible Content Wrapper ?>


  <?php while ( have_rows( 'build_wrapper' ) ) : the_row(); ?>
<!--   FEATURE SOCIAL MEDIA   -->
    <?php if ( get_row_layout() == 'feature_social_media' ) : ?>

        <?php  include( 'partials/home-social-media.php'); ?>




<!--     3 X FEATURE BLOCK COMPONENT   -->
    <?php elseif ( get_row_layout() == 'feature_block_component' ) : ?>
        <?php // include( 'partials/home-block-component.php'); ?>

      <?php the_sub_field( 'block_row_heading' ); ?>
      <?php if ( have_rows( 'block_builder' ) ) : ?>
        <?php while ( have_rows( 'block_builder' ) ) : the_row(); ?>
          <?php $background_image = get_sub_field( 'background_image' ); ?>
          <?php $size = 'full'; ?>
          <?php if ( $background_image ) : ?>
            <?php echo wp_get_attachment_image( $background_image, $size ); ?>
          <?php endif; ?>
          <?php if ( have_rows( 'button' ) ) : ?>
            <?php while ( have_rows( 'button' ) ) : the_row(); ?>
              <?php the_sub_field( 'title' ); ?>
              <?php $link = get_sub_field( 'link' ); ?>
              <?php if ( $link ) : ?>
                <a href="<?php echo esc_url( $link); ?>"><?php echo esc_html( $link ); ?></a>
              <?php endif; ?>
            <?php endwhile; ?>
          <?php endif; ?>
        <?php endwhile; ?>
      <?php else : ?>
        <?php // no rows found ?>
      <?php endif; // END 3X BLOCKS ?>

<!--     FEATURE CAROUSEL COMPONENT   -->
    <?php elseif ( get_row_layout() == 'feature_carousel_component' ) : ?>
        <?php // include( 'partials/home-carousel-component.php'); ?>

      <?php if ( have_rows( 'create_a_carousel_panel' ) ) : ?>
        <?php while ( have_rows( 'create_a_carousel_panel' ) ) : the_row(); ?>
          <?php the_sub_field( 'tab_label' ); ?>
          <?php the_sub_field( 'slide_heading' ); ?>
          <?php the_sub_field( 'slide_description' ); ?>
          <?php if ( get_sub_field( 'add_panel_cta_button' ) == 1 ) : ?>
            <?php // echo 'true'; ?>
          <?php else : ?>
            <?php // echo 'false'; ?>
          <?php endif; ?>
          <?php the_sub_field( 'cta_button_label' ); ?>
          <?php $cta_page_link = get_sub_field( 'cta_page_link' ); ?>
          <?php if ( $cta_page_link ) : ?>
            <a href="<?php echo esc_url( $cta_page_link); ?>"><?php echo esc_html( $cta_page_link ); ?></a>
          <?php endif; ?>
          <?php the_sub_field( 'add_video_or_photo' ); ?>
          <?php $slide_image = get_sub_field( 'slide_image' ); ?>
          <?php $size = 'full'; ?>
          <?php if ( $slide_image ) : ?>
            <?php echo wp_get_attachment_image( $slide_image, $size ); ?>
          <?php endif; ?>
          <?php the_sub_field( 'add_video_clip' ); ?>
        <?php endwhile; ?>
      <?php else : ?>
        <?php // no rows found ?>
      <?php endif; // END CAROUSEL ?>


<!--     FEATURE HERO COMPONENT   -->
    <?php elseif ( get_row_layout() == 'hero_component' ) : ?>
        <?php // include( 'partials/home-hero-component.php'); ?>

      <?php if ( have_rows( 'add_hero_media' ) ) : ?>
        <?php while ( have_rows( 'add_hero_media' ) ) : the_row(); ?>
          <?php the_sub_field( 'value_proposition' ); ?>
          <?php the_sub_field( 'call_to_action_label' ); ?>
          <?php the_sub_field( 'link_titlle_text' ); ?>
          <?php $hero_page_link = get_sub_field( 'hero_page_link' ); ?>
          <?php if ( $hero_page_link ) : ?>
            <a href="<?php echo esc_url( $hero_page_link); ?>"><?php echo esc_html( $hero_page_link ); ?></a>
          <?php endif; ?>
          <?php the_sub_field( 'media_link' ); ?>
        <?php endwhile; ?>
      <?php else : ?>
        <?php // no rows found ?>
      <?php endif; ?>
    <?php endif; // END HERO ?>

  <?php endwhile; // End the Build Wrapper while() function?>
<?php else: ?>
  <?php // no layouts found ?>
<?php endif; // End Build Wrapper  ?>

<!--  END OF NEW CODE  -->

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


