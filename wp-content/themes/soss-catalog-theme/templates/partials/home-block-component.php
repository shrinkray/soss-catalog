<?php
  declare( strict_types=1 );
  /**
   * Feature Block Component
   * @description: User uses repeater to create up to three boxes. They will add an image background, add foreground
   * text, and link to page in site.
   * @author gmiller
   * @date: 5/13/2021
   */



  $heading = get_sub_field('block_row_heading');

?>

<?php the_sub_field( 'block_row_heading' ); ?>

    <div class="row category-ctas-block my-5 d-flex justify-content-center break-out block-button">
      <ul class="category-ctas emulated-flex-gap">


<?php if ( have_rows( 'block_builder' ) ) : ?>

    <?php while ( have_rows( 'block_builder' ) ) : the_row(); ?>
    <li>
      <?php if ( have_rows( 'image_info' ) ) : // Image Group ?>
        <?php while ( have_rows( 'image_info' ) ) : the_row();

        // Collects background image info, assign to variables

        $image_id = get_sub_field('background_image');
        $dummy_id = get_sub_field('dummy_background_image');
        $size = 'full';
        $image_alt = get_sub_field('image_alt_desc');
        $bg_image = wp_get_attachment_image($image_id, $size, false,
          $attr = [ 'class' => 'img-fluid  align-self-center', 'alt' => $image_alt ] );


        ?>
        <?php endwhile; ?>
      <?php endif; // Image group

      // Wraps Image content with our link messaging in the button row

       if ( have_rows( 'button' ) ) : // Button Group ?>
        <?php while ( have_rows( 'button' ) ) : the_row();

        $box_title = get_sub_field('title');
        $box_link = get_sub_field('link');

          if ( $box_link ) : ?>

            <a href="<?php echo esc_url( $box_link ); ?>">

              <span class="helper"></span>

              <?php  if ( $bg_image ) : ?>

                <?php echo  $bg_image ?>

              <?php endif; ?>
              <span class="cta-title"><?= $box_title ?></span>
            </a>
          <?php endif; ?>
        <?php endwhile; // button have rows() ?>
      </li>
      <?php endif; // Button Group ?>
    <?php endwhile; ?>




<?php else :
 // no rows found ?>
<?php endif; // end Block Row Layout
?>
      </ul>
    </div>

<?php
