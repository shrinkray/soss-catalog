<?php

  /**
   * Feature Block Component
   * @description: User uses repeater to create up to three boxes. They will add an image background, add foreground
   * text, and link to page in site.
   * @author gmiller
   * @date: 5/13/2021
   */

  declare( strict_types=1 );

  $heading = get_sub_field('block_row_heading');

?>

<?php the_sub_field( 'block_row_heading' ); ?>
<?php if ( have_rows( 'block_builder' ) ) : ?>
  <?php while ( have_rows( 'block_builder' ) ) : the_row(); ?>
    <?php
    $image_id = get_sub_field('background_image');
    $size = 'full';
    $bg_image = wp_get_attachment_image($image_id, $size, false, $attr = ['class' => 'img-fluid  align-self-center']);

// https://codepen.io/shrinkray/pen/LgNKXY?editors=1100
     if ( $bg_image ) : ?>

       <?php echo  $bg_image ?>

    <?php endif; ?>

    <?php if ( have_rows( 'button' ) ) :

      while ( have_rows( 'button' ) ) : the_row();

        $box_title = get_sub_field('title');
        $box_link = get_sub_field('link');

        if ( $box_link ) : ?>
          <a href="<?php echo esc_url( $box_link); ?>"><?= $box_title ?></a>
        <?php endif; ?>

      <?php endwhile; ?>

    <?php endif; ?>

  <?php endwhile; ?>
<?php else :
 // no rows found ?>
<?php endif; // end Block Row Layout
