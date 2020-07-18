<?php
/**
 * Archive Product Above and Below Loop
 * 03/20/2020 GRM
 */
  $term = get_queried_object();
 if ( have_rows( 'category_landing_page', $term  ) ): ?>
  <?php while ( have_rows( 'category_landing_page', $term ) ) : the_row(); ?>

     <?php
// HERO GROUP
     if ( get_row_layout() == 'add_a_hero_row' ) : ?>

       <?php include( 'archive-part-hero.php' ); ?>


  <?php
// FINISHES
  elseif ( get_row_layout() == 'select_product_finishes' ) : ?>

    <?php include( 'archive-part-finish.php' ); ?>


    <?php
// 3D EMBED
     elseif ( get_row_layout() == 'embed_and_text_row' ) :   ?>

       <?php include( 'archive-part-embed.php' ); ?>


       <?php
// FULL  WYSIWYG
     elseif ( get_row_layout() == 'full_width_text_row' ) :   ?>

       <?php include( 'archive-part-fulltext.php' ); ?>


     <?php
// FULL  VIDEO
     elseif ( get_row_layout() == 'full_width_video_row' ) : ?>

       <?php include( 'archive-part-video.php' ); ?>


     <?php
// SETS A ROW FOR AN H2 SECTION HEADING
     elseif ( get_row_layout() == 'heading_above_row' ) : ?>
      <?php include( 'archive-part-heading.php' ); ?>


       <?php
// TWO COLUMNS
       elseif ( get_row_layout() == 'two_columns' ) :
         ?>

         <?php include( 'archive-part-twocol.php' ); ?>


       <?php
// SPACER
     elseif ( get_row_layout() == 'row_spacer' ) : ?>

       <?php include( 'archive-part-spacer.php' ); ?>

     <?php endif;
  endwhile; ?>

<?php else: ?>
  <?php // no layouts found ?>
<?php endif;

/**
 * END ACF CUSTOM FIELDS
 */
