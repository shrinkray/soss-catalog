<?php
  /**
   * Social Promotion Builder
   * @description: sets one media property from a list. User sets one and label on button. The template applies icon,
   * property name, button label, alt text, title, and sets button label text.
   * @author gmiller
   * @date: 5/13/2021
   */
  $filename = '';
  $filename = basename($_SERVER["SCRIPT_FILENAME"], '.php');
  echo $filename;
?>

<?php the_sub_field( 'select_from_list_of_properties' ); ?>
<?php the_sub_field( 'add_follow_words' ); ?>

<?php // end Row Layout

