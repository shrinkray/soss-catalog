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

    <div class="row category-ctas-block my-5 d-flex justify-content-center break-out">
      <ul class="category-ctas">


<?php if ( have_rows( 'block_builder' ) ) : ?>

    <?php while ( have_rows( 'block_builder' ) ) : the_row(); ?>
    <li>
      <?php if ( have_rows( 'image_info' ) ) : // Image Group ?>
        <?php while ( have_rows( 'image_info' ) ) : the_row();

        $image_id = get_sub_field('background_image');
        $size = 'full';
        $image_alt = get_sub_field('image_alt_desc');
        $bg_image = wp_get_attachment_image($image_id, $size, false, $attr = ['class' => 'img-fluid  align-self-center', 'alt' => $image_alt ]);

        // Present image in Button Group
        ?>
        <?php endwhile; ?>
      <?php endif; ?>

      <?php if ( have_rows( 'button' ) ) : // Button Group ?>
        <?php while ( have_rows( 'button' ) ) : the_row();
        $box_title = get_sub_field('title');
        $box_link = get_sub_field('link');

          if ( $box_link ) : ?>

            <a href="<?php echo esc_url( $box_link ); ?>">

              <?php  if ( $bg_image ) : ?>

                <?php echo  $bg_image ?>

              <?php endif; ?>
              <span class="cta-title"><?= $box_title ?></span>
            </a>
          <?php endif; ?>
        <?php endwhile; ?>
      </li>
      <?php endif; ?>
    <?php endwhile; ?>




<?php else :
 // no rows found ?>
<?php endif; // end Block Row Layout
?>
      </ul>
    </div>

<?php
