<?php
  //vars
  $toggle_image_class = 'col-md-6 order-2 pitch finish-chips';
  $toggle_text_class = 'col-md-6 order-1 pitch value-prop';
  $bg_color = get_sub_field( 'background_color' );        // Background color
  $value_prop = get_sub_field('value_proposition'); // Paragraph CTA
  $spacer = get_sub_field( 'add_spacer' );          // Set spacing between rows

  // Set value if spacer returns empty or zero otherwise use returned value
  $spacer = ( $spacer == '' || $spacer == 0 ) ? $spacer = '1' : $spacer;
  $bg_color = ( $bg_color == '' ) ? $bg_color = '#e0e0e0' : $bg_color;

?>
<div class="super mbs-<?php echo $spacer; ?>" style="background-color:<?php echo $bg_color; ?>">
  <div class="container">


    <div class="row ">

      <div class="col-12 <?php echo $toggle_text_class; ?>">
        <?php
          // Test if WYSIWYG field returns a value
          if ( $value_prop !== '' ) { ?>

            <?php echo $value_prop; ?>

          <?php } else { //  ?>
            <!-- No Message in Finish  -->
          <?php }
        ?>
      </div>

      <div class="<?php echo $toggle_image_class; ?>">
        <?php
          // These are from the checkbox both getting value and label data
          $finishes_array = get_sub_field('finishes');

          if ($finishes_array): ?>
            <div class="finish-group">

              <?php foreach ($finishes_array as $finishes_item):

                $finish = $finishes_item['value']; // checkbox value
                $label = $finishes_item['label'];  // checkbox label
                $alt = 'Soss ' . $label . ' high quality finish'; // create tool tip

                if ( have_rows( 'finish_chip' ) ) :
                  while ( have_rows( 'finish_chip' ) ) : the_row();

                    // chip shape (defaults width: 50px; height: 50px; border-radius: 0;
                    $width = get_sub_field('chip_width');
                    $height = get_sub_field('chip_height');
                    $radius = get_sub_field('chip_border_radius');
                    $use_shadow = get_sub_field('use_drop_shadow');

                  //  echo 'width: ' . $width . '; height: ' . $height . '; radius: ' . $radius;

                    // set minimum if value does not exist
                   $width = ( $width == ''  ? $width = '50px' :  $width . 'px' );
                    $height = ( $height == ''  ? $height = '50px' : $height . 'px' );

                    // Check return and revise values and units
                    $radius = ( $radius == '' || $radius == 0  ? $radius = '0' : $radius = $radius . 'px'  );

                    // if use shadow switched on, set style, otherwise set nothing
                    ( $use_shadow != 1 ) ? $drop_shadow = '' :
                      $drop_shadow = ' box-shadow: 2px 2px 3px #13131396;';
                    ?>

                    <div class="swatch <?php echo $finish; ?>"
                         style="width:<?php echo $width; ?>;
                            height:<?php echo $height; ?>;
                            border-radius:<?php echo $radius; ?>;
                           <?php echo $drop_shadow; ?>"
                         data-toggle="tooltip"
                         data-placement="bottom"
                         data-html="true" title="<?php echo $alt; ?>" >
                    </div>
                  <?php
                  endwhile;
                endif;?>
              <?php endforeach; ?>
            </div>
          <?php endif;  ?>

      </div>
    </div>
  </div>
</div>
