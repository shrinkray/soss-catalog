<?php
  declare( strict_types=1 );
// Setting up the $args
// http://www.wpbeginner.com/wp-themes/how-to-exclude-sticky-posts-from-the-loop-in-wordpress/
// https://www.billerickson.net/code/wp_query-arguments/
// https://www.mhthemes.com/blog/wordpress-sticky-posts/
?>





<?php
// vars
$limit = get_sub_field( 'excerpt_limit' );
$excerpt = get_sub_field( 'show_excerpt' );
$set_length = get_sub_field( 'set_excerpt_length' );

$args = [
    'order'               => 'DESC',
    'posts_per_page'      =>  6,
    'post_type'            => 'post',
    'no_found_rows'       => 'true',
];

$the_query = new WP_Query( $args );

// The Loop

while ( $the_query->have_posts() ) {
  $the_query->the_post();

  if (is_sticky()) { ?>
    <div class="row half-block">

      <article class="col-12 card-stack d-inline-flex sticky" <?php post_class(); ?>>
        <div class="no-gutters">
          <?php if(has_post_thumbnail()) : ?>
            <a class="" href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
          <?php else : ?>
            <a class="" href="<?php the_permalink() ?>"></a>
          <?php endif; ?>
        </div>
        <div class="col-sm-10">
          <header>
            <h4 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
            <?php // displays just the date meta
            get_template_part('templates/entry-meta-stack-date-cat'); ?>
          </header>
          <div class="entry-content">
            <?php the_excerpt(); ?>
          </div>
        </div>
      </article>

    </div> <!--close .row -->


  <?php } else {
    if ( ! (is_sticky()) ) { ?>

      <div class="row half-block">

        <article class="col-12 card-stack d-inline-flex non-stick" <?php post_class(); ?>>
          <div class="no-gutters">
            <?php if(has_post_thumbnail()) : ?>
              <a class="" href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
            <?php else : ?>
              <a class="" href="<?php the_permalink() ?>"></a>
            <?php endif; ?>
          </div>
          <div class="col-sm-10">
            <header>
              <h4 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
              <?php // displays just the date meta
              get_template_part('templates/entry-meta-stack-date-cat'); ?>
            </header>
            <div class="entry-content">
              <?php the_excerpt(); ?>
            </div>
          </div>
        </article>

      </div> <!--close .row -->

    <?php } // endif
  } // end if



} // endwhile

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$the_query = new WP_Query( 'posts_per_page=3&paged=' . $paged );


wp_reset_query(); //reset the original WP_Query



