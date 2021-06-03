<?php
  /**
   * Feature Hero Component
   * @description: Fields capture minimal information. Image/Video will be added set with link to AWS or Cloudinary.
   * If more slides are needed, I'll need to setup a repeater.
   * @author gmiller
   * @date: 5/13/2021
   */

  declare( strict_types=1 );

  $filename = '';
  $filename = basename($_SERVER["SCRIPT_FILENAME"], '.php');
  echo $filename;
?>

<?php if ( have_rows( 'add_hero_media' ) ) : ?>
  <?php while ( have_rows( 'add_hero_media' ) ) : the_row(); ?>
    <?php the_sub_field( 'value_proposition' ); ?>
    <?php the_sub_field( 'call_to_action_label' ); ?>
    <?php the_sub_field( 'link_title_text' ); ?>
    <?php $hero_page_link = get_sub_field( 'hero_page_link' ); ?>
    <?php if ( $hero_page_link ) : ?>
      <a href="<?php echo esc_url( $hero_page_link); ?>"><?php echo esc_html( $hero_page_link ); ?></a>
    <?php endif; ?>
    <?php the_sub_field( 'media_link' ); ?>
  <?php endwhile; ?>
<?php else : ?>
  <?php // no rows found ?>
<?php endif; // end Hero have_rows
