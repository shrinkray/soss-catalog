<?php
  //vars

  $path = get_sub_field('add_path_url');              // path to the models
  $model = get_sub_field('model_to_embed');           // selection
  $finish = get_sub_field('finish_to_embed');         // selection
  $toggle = get_sub_field( 'toggle_order' );          // layout
  $spacer = get_sub_field( 'add_spacer' );            // Set spacing between rows

  // Arrange row based on layout choice
  if ($toggle == 'image-left') {
    $toggle_image_class = 'col-md-6 order-1 servex';
    $toggle_text_class = 'col-md-6 order-2 value-prop ';
  } else { //$toggle == 'image-right'
    $toggle_image_class = 'col-md-6 order-2 servex';
    $toggle_text_class = 'col-md-6 order-1  value-prop ';
  }
  // Set value if spacer returns empty or zero otherwise use returned value
  $spacer = ( $spacer == '' || $spacer == 0 ) ? $spacer = '1' : $spacer;

?>

<div class="row mbs-<?php echo $spacer; ?>">

  <div class="<?php echo $toggle_text_class; ?>">

    <?php if ( have_rows( 'promotion' ) ) : ?>
      <?php while ( have_rows( 'promotion' ) ) : the_row();
      // vars
        $value_prop = get_sub_field( 'value_proposition' ); // pitch CTA
        $embed_heading = get_sub_field('embed_heading');    // custom title area
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

  <div class="<?php echo $toggle_image_class; ?>">

    <iframe class="iframe-embed" src="<?php echo $path; ?>?code=<?php echo $model;
    ?>&material=<?php echo $finish; ?>"></iframe>

  </div>
</div>
