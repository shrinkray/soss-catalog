<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 2/26/18
 * Time: 7:46 PM
 */

// Setting up the $args
// This is the query page, reading in the info from our documents post type.
//

// VARS
$intro = get_field( 'introduction' );
$close = get_field( 'closing' );
$sort_by = 'ASC'; //= get_field( 'sort_by' );

// value comes from 'documents' post type, we're using it as the sort order key
$name = get_field( 'document_name' );

?>

<?php if ($intro) : ?>
  <div class="row mb-4">
    <div class="col">
      <?php echo $intro; ?>
    </div>
  </div>
  <div class="drawing-grid mb-4">

<?php else:
 // No intro text added

 endif;
// Include form template
?>


    <div class="mb-3">

      <?php get_template_part('templates/modules/search', 'bar'); ?>

    </div>


    <div class="drawing-grid mt-3">
    <?php

    $terms = get_field('category');  // ACF Category
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $posts_per_page = 'posts_per_page';

    $args = array(

        'post_type' => 'docs',
        $posts_per_page => '6',
        'paged' => $paged,
        'order' => $sort_by,
        'tax_query' => 'document',

    );

    $docs_query = new WP_Query( $args );


if ( $docs_query->have_posts() ) : while ( $docs_query->have_posts() ) : $docs_query->the_post();
?>

   <?php get_template_part( 'templates/modules/document-template' ); ?>

    <?php endwhile;

  /**
   * Add a pagination navigation bar
   */
    // https://adambalee.com/how-to-add-pagination-to-your-wordpress-blog-without-a-plugin/

  ?>
      <div class="row docs_paginate">

        <div class="col-12  d-flex">
  <?php

  $big = 999999999; // need an unlikely integer

  echo paginate_links(array(
      'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
      'format' => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'total' => $docs_query->max_num_pages
  ));

  ?>
        </div>

      </div>

  <?php



  wp_reset_postdata();

    else : ?>

    <p><?php esc_html_e( 'Sorry, no posts matched your criteria. ' );  ?></p>

    <?php endif; ?>

</div> <!-- .drawing-grid -->

<?php ?>

<?php if ($close) : ?>

  <div class="row pt-4">
    <div class="col">
      <div class="close-comments">
        <?php echo $close; ?>
      </div>
    </div>
  </div>

<?php else: ?>

  <!-- No Closing Text added -->

<?php endif; ?>

