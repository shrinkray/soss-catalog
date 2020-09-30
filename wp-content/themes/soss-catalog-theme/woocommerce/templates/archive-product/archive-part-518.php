
<?php
  //vars

  $path = get_sub_field('add_518_path_url');              // path to the models
  $toggle = get_sub_field( 'choose_layout_options' );          // layout

  /*
   * Custom css class meanings
   * .servex { display: grid; grid-template-rows: minmax(300px, 500px); } Sets height parameters
   * .value-prop { flex-direction: column; justify-content:center; } places everything to vertical center
   */

  // Arrange row based on layout choice
  if ( $toggle == 'image-left-518' ) {
    $toggle_image_class = 'col-md-8 order-md-1 order-1 servex';
    $toggle_text_class = 'col-md-4 order-md-2 order-2 value-prop ';
  } else if ( $toggle == 'image-right-518' ) { //$toggle == 'image-right-518' change order of classes on mobile
    $toggle_image_class = 'col-md-8 order-md-2 order-1 servex';
    $toggle_text_class = 'col-md-4 order-md-1 order-2 value-prop ';
  } else { // $toggle == 'full-width-518'
    $toggle_image_class = 'col-md-12 servex';
    $toggle_text_class = '';
  }

  /*
   * Will impose spacer values since Deidre is not thinking about this much. Below is the range and set values.
   * 0 : none, 1 : 1rem, 2 : 2rem, 3 : 3rem, 4 : 4rem, 5 : 5rem, 6 : 6rem, 7 : 7rem
   * */

  $spacer = 6;
  $top_spacer = 3;
?>

<div class="row mbs-<?php echo $spacer; ?> mts-<?php echo $top_spacer; ?>">

  <?php
    //
    if ( $toggle == 'full-width-518' ) { // when the image is full-width, this div is empty
    ?>
    <!-- With a full width image in the row, there's no room for text  -->

    <?php
  } else { // populate the div with content, using 30% of row
  ?>

  <div class="<?php echo $toggle_text_class; ?>">

    <?php if ( have_rows( 'promote_518_product' ) ) : ?>
      <?php while ( have_rows( 'promote_518_product' ) ) : the_row();
      // vars
        $embed_heading = get_sub_field('h2_heading_518');    // custom title area
        $value_prop = get_sub_field( 'value_prop_518_product' ); // pitch CTA appearing left or right

      ?>

    <div class="embed-text-group">
      <?php
        //
        if ( $embed_heading !== '' ) { ?>

          <h2 class="heading"><?php echo $embed_heading; ?></h2>

        <?php } else { ?>
          <!-- Sorry No heading added -->

        <?php }
      ?>


    <div class="catch-phrase">

<?php
        if ( $value_prop ) { ?>

          <?php echo $value_prop; ?>

        <?php } else {
          ?>

          <!-- No Value Prop? -->

          <?php
        }

        ?>

      </div> <!-- // catch phrase section  -->


    </div> <!-- // embed text section -->
        <?php

      endwhile; // Promotion Group
    endif;

    ?>

  </div>

  <?php

    } // end value_prop conditional

  ?>

  <div class="<?php echo $toggle_image_class; ?>">

    <iframe class="iframe-embed" src="<?php echo $path; ?>"></iframe>

  </div>
</div>
