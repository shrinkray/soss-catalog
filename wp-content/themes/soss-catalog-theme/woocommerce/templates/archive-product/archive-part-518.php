<?php
  //vars

  $path = get_sub_field('add_518_path_url');              // path to the models
  $toggle = get_sub_field( 'choose_layout_options' );          // layout


  // Arrange row based on layout choice
  if ($toggle == 'image-left-518') {
    $toggle_image_class = 'col-md-6 order-1 servex';
    $toggle_text_class = 'col-md-6 order-2 value-prop ';
  } else { //$toggle == 'image-right-518'
    $toggle_image_class = 'col-md-6 order-2 servex';
    $toggle_text_class = 'col-md-6 order-1  value-prop ';
  }

  /*
   * Will impose spacer values since Deidre is not thinking about this much. Below is the range and set values.
   * 0 : none, 1 : 1rem, 2 : 2rem, 3 : 3rem, 4 : 4rem, 5 : 5rem, 6 : 6rem, 7 : 7rem
   * */

  $spacer = 6;
?>

<div class="row mbs-<?php echo $spacer; ?>">

  <div class="<?php echo $toggle_text_class; ?>">

    <?php if ( have_rows( 'promotion' ) ) : ?>
      <?php while ( have_rows( 'promotion' ) ) : the_row();
      // vars
        $value_prop = get_sub_field( 'value_prop_518_product' ); // pitch CTA
        $embed_heading = get_sub_field('h2_heading_518');    // custom title area
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
              // $value_prop
              if ($value_prop !== '') { ?>
                <?php echo $value_prop ?>
              <?php } else {
                // no value ?>
                <!-- No catch phrase  -->
              <?php }
            ?>

          </div>

        </div>

      <?php endwhile; // Promotion Group ?>
    <?php endif; ?>

  </div>

  /*
  * TODO: This code will be organized differently.
  */

  <div class="<?php echo $toggle_image_class; ?>">

    <iframe class="iframe-embed" src="<?php echo $path; ?>?code=<?php echo $model;
    ?>&material=<?php echo $finish; ?>"></iframe>

  </div>
</div>
