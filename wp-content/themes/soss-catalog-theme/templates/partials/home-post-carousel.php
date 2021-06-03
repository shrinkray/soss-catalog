<?php
  declare( strict_types=1 );

  /**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 2/26/18
 * Time: 1:36 PM
 */



// vars
$post_type = get_sub_field( 'post_type' );
//$categories_ids = get_sub_field( 'categories' );
////   $dump =  var_dump( $categories_ids );
//$num_columns = get_sub_field( 'number_of_columns' );
//$num_posts = get_sub_field( 'number_of_posts' );
$section_title = get_sub_field( 'section_title' );
$excerpt = get_sub_field( 'show_excerpt' );
$featured = get_sub_field( 'display_featured_image' );
$show_meta = get_sub_field( 'display_meta_content' );
$which_meta = get_sub_field( 'which_meta' );
$set_length = get_sub_field( 'set_excerpt_length' );
$limit = get_sub_field( 'excerpt_limit' );
$select_tax = get_sub_field( 'select_taxonomy' );
$select_post_tax = get_sub_field( 'select_post_tax' );
$button = get_sub_field( 'button_text' );
$show_options = get_sub_field( 'show_options' );

?>

<?php
if ( $post_type ) {
  ?>

  <?php if ( $section_title ) { ?>
    <div class="row">
      <div class="col">
        <div class="block-title">
          <h2><?php echo $section_title; ?></h2>
        </div>
      </div>
    </div>
  <?php }

  ?>

  <?php // http://www.problogdesign.com/how-to/the-2-methods-of-showing-excerpts/
  // https://codex.wordpress.org/Class_Reference/WP_Query
  // query for the blog archive page

  //   $your_query = new WP_Query( $args );

  // "loop" through query (even though it's just one page)
  echo '<div class="row block eq-cols">';

  //while ($your_query->have_posts()) : $your_query->the_post(); ?>

  <?php if ( $select_tax ) {

    foreach ( $select_tax as $post ) :
      setup_postdata( $post );
      ?>

      <div class="col-sm-6 col-md">

        <article class="flex-column justify-content-between align-items-center" <?php //post_class(); ?>>

          <?php if ( $featured ) {
            if(has_post_thumbnail()) : ?>
              <a class="card" href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium', array('class' => 'mx-auto')); ?></a>
            <?php else : ?>

            <?php endif;
          }
          ?>
          <div class="card-block d-flex flex-column justify-content-between align-items-center">

            <header>
              <a href="<?php the_permalink() ?>"><h3 class="entry-title card-title checkScrollHeightOverflow"><?php the_title(); ?></h3></a>

              <?php // Do we show meta tags? If so, display from two combinations
              if ( $show_meta ) {
                // decide which meta
                switch ( $which_meta ) {
                  case "all" :
                    get_template_part('templates/partials/entry-meta');
                    break;
                  case "date" :
                    get_template_part('templates/partials/entry-meta-date');
                    break;
                  case "date_author" :
                    get_template_part('templates/partials/entry-meta-date-author');
                    break;
                  case "date_cat" :
                    get_template_part('templates/partials/entry-meta-date-cat');
                    break;
                }
              } else {
                // no meta to display on post
              } ?>
            </header>

            <?php if( $excerpt ) {
              if ( $set_length ) { // helps set consistency in displayed posts ?>
                <div class="entry-content">
                  <?php echo excerpt($limit); ?>
                </div>
              <?php } else { ?>
                <div class="entry-content">
                  <?php the_excerpt(); ?>
                </div>
              <?php }
              ?>

            <?php }
            ?>



              <?php

              if ( $show_options == 'options' ) {  // display the options button ?>

            <footer class="text-center py-2">

                <a href="<?php the_permalink() ?>"
                   class="button product_type_variable add_to_cart_button" aria-label="" ><?php echo $button; ?></a>

            </footer>

                <?php
              } else {
                ?>

            <!-- removed the footer -->

                <?php
              }

              ?>



          </div>

        </article>

      </div>
    <?php endforeach; ?>

  <?php } else {

    if ( $select_post_tax ) {

      foreach ( $select_post_tax as $post ) :
        setup_postdata( $post );
        ?>

        <div class="col-12 col-sm-6 col-md">
          <article <?php post_class(); ?>>
            <?php if ( $featured ) {
              if(has_post_thumbnail()) : ?>
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('medium', array('class' => 'mx-auto')); ?></a>
              <?php else : ?>

              <?php endif;
            }
            ?>
            <div class="card-block">
              <header>
                <a href="<?php the_permalink() ?>"><h3 class="entry-title card-title checkScrollHeightOverflow"><?php the_title(); ?></h3></a>

                <?php // Do we show meta tags? If so, display from two combinations
                if ( $show_meta ) {
                  // decide which meta
                  switch ( $which_meta ) {
                    case "all" :
                      get_template_part('templates/partials/entry-meta');
                      break;
                    case "date" :
                      get_template_part('templates/partials/entry-meta-date');
                      break;
                    case "date_author" :
                      get_template_part('templates/partials/entry-meta-date-author');
                      break;
                    case "date_cat" :
                      get_template_part('templates/partials/entry-meta-date-cat');
                      break;
                  }
                } else {
                  // no meta to display on post
                } ?>
              </header>

              <?php if( $excerpt ) {

                if ( $set_length ) { // helps set consistency in displayed posts ?>

                  <div class="entry-content">
                    <?php echo excerpt($limit); ?>
                  </div>

                <?php } else { ?>

                  <div class="entry-content">
                    <?php the_excerpt(); ?>
                  </div>

                <?php }
                ?>

              <?php }  ?>

              <?php

              if ( $show_options == 'options' ) {  // display the options button ?>

                <footer class="text-center py-2">

                  <a href="<?php the_permalink() ?>"
                     class="button product_type_variable add_to_cart_button" aria-label="" ><?php echo $button; ?></a>

                </footer>

                <?php
              } else {
                ?>

                <!-- removed the footer -->

                <?php
              }

              ?>


            </div>
          </article>
        </div>
      <?php endforeach; ?>

    <?php }

    ?>

    <?php
  } //else


  //endwhile;


  // reset post data (important!)
  wp_reset_postdata();
  ?>
  </div> <!-- .row -->

  <?php
} // close post_type ?>
