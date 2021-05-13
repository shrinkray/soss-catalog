<?php
  /**
   * Feature Block Component
   * @description: User uses repeater to create up to three boxes. They will add an image background, add foreground
   * text, and link to page in site.
   * @author gmiller
   * @date: 5/13/2021
   */
  $filename = '';
  $filename = basename($_SERVER["SCRIPT_FILENAME"], '.php');
  echo $filename;
?>

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
<?php else :
 // no rows found ?>
<?php endif; // end Block Row Layout
