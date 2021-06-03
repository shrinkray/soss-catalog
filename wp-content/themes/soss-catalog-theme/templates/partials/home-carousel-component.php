<?php

  /**
   * Feature Carousel Component
   * @description: User adds a Carousel panel with several pieces with left and right side options. Code on this file
   * applies a Slick Slider toolkit.
   * @author gmiller
   * @date: 5/13/2021
   */

  declare( strict_types=1 );

  $filename = '';
  $filename = basename($_SERVER["SCRIPT_FILENAME"], '.php');
  echo $filename;
?>
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
  <?php // no rows found
 endif; // END carousel have_rows
