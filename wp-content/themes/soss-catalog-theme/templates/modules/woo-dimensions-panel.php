<h2>Dimensions</h2>
<div class="dimensions" role="presentation">



  <?php
  /**
   * Figure out if we show the tab and kill if not
   */
  $which_tabs = get_field( 'which_tabs' );

  if (in_array("dimensions", $which_tabs)) {
    ?>

    <script>
      // reference trello card #231
      // displays product button
      jQuery(document).ready(function ($) {
        $('.tab-dims').attr("style", "display:block");
      });
    </script>

    <?php
    // continue

  } else {

     //Remove an empty tab

    unset( $tabs['dimensions'] );
    echo "<style>li.dimensions_tab{ display:none !important; }</style>";

    ?>

    <script>
//      hides button from view
      jQuery(document).ready(function($) {
        $('.tab-dims').attr("style", "display:none");
      });
    </script>

    <?php

  }


  /**
   * Display Dimensions
   * 3/26/18 GRM
   */

  // vars
    $dim_text = get_field( 'dimensions_text' );
    $tab_caption = get_field( 'dims_caption' );
 ?>

  <div class="row">
    <div class="col-12"><?php echo $tab_caption; ?></div>
  </div>
  <?php if ( get_field( 'switch_col_widths' ) == 1 ) {

    // in the case where the first col should be wider, use this

    $firstCol ="col-12 col-md-10";
    $secondCol = "col-12 col-md-2";

  } else {
    $firstCol = "col-12 col-md-5";
    $secondCol = "col-12 col-md-7";
  } ?>

  <div class="row">
    <div class="<?php echo $firstCol; ?>"><?php echo $dim_text; ?></div>

    <div class="<?php echo $secondCol; ?>">

      <?php $table_image = get_field( 'table_image' ); ?>

      <?php if ( $table_image ) { ?>

        <img src="<?php echo $table_image['url']; ?>" alt="<?php echo $table_image['alt']; ?>" />

      <?php } ?>
    </div>
  </div>

  <?php if ( have_rows( 'add_images' ) ): ?>
    <?php while ( have_rows( 'add_images' ) ) : the_row(); ?>

    <h4>More Images</h4>
      <div class="row">
        <div class="col-md-10">
          <?php if ( get_row_layout() == 'add_image' ) : ?>

            <?php
            //vars
            $image_block = get_sub_field( 'image_block' );
            $caption = get_sub_field( 'caption' );


            ?>
            <?php if ( $image_block ) { ?>

              <img class="img-fluid" src="<?php echo $image_block['url']; ?>"  alt="<?php echo $image_block['alt'];?>" />

            <?php }

            echo $caption;

            ?>

          <?php endif; ?>
        </div>
      </div>
    <?php endwhile; ?>
  <?php else: // no rows?>
  <?php endif; ?>



</div>
