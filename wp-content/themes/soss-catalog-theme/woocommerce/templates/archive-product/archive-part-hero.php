<?php
  // Vars
  // Note: See ** below for info about full-width background image

  $hero_image = get_sub_field( 'hero_image' );        // get the image

  // Gives us a better srcset from sizes on functions.php
  // https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
  $hero = wp_get_attachment_image($hero_image, 'hero_cat', false, $attr = array('class' => 'img-fluid  ' ));

  $toggle = get_sub_field( 'toggle_order' );          // layout
  $hero_pitch = get_sub_field( 'hero_pitch' );        // paragraph
  $bg_color = get_sub_field( 'color_picker' );        // Background color
  $fg_color = get_sub_field( 'color_picker_text' );   // Text color
  $spacer = get_sub_field( 'add_spacer' );            // Set spacing between rows
  $spacer_top = get_sub_field( 'add_spacer_top' );    // Set spacing between rows

  // Set value if spacer returns empty or zero otherwise use returned value
  $spacer = ( $spacer == '' || $spacer == 0 ) ? $spacer = '1' : $spacer;
  $spacer_top = ( $spacer_top == '' || $spacer_top == 0 ) ? $spacer_top = '1' : $spacer_top;

  // test if color exists, sends this value if none, otherwise send given color
  $bg_color = ( $bg_color == '' ) ? $bg_color = '#ffffff' : $bg_color;
  $fg_color = ( $fg_color == '' ) ? $fg_color = '#000000' : $fg_color;

  // Process in order of columns to set locations based on class
  // To switch columns we just push and pull rather than deliver a different code group.

  if ($toggle == 'image-left') {
    $toggle_image_class = 'col-md-6  order-1 d-flex flex-column align-self-center';
    $toggle_text_class = 'col-md-6 order-2 value-prop ';
  } else { // ( $toggle == 'image-right' ) {
    $toggle_image_class = 'col-md-6 image-right order-2 d-flex flex-column align-self-center';
    $toggle_text_class = 'col-md-6 text-left order-1 pitch value-prop ';
  }
?>
    <div class="super hero-cat mbs-<?php echo $spacer; ?> mts-<?php echo $spacer_top; ?>" style="background-color:<?php echo $bg_color; ?>">
      <div class="container">
        <div class="row">

          <div class="<?php echo $toggle_image_class; ?>">
            <?php
              if ( $hero ) {
                echo $hero;
              } else {  //echo 'no image';
                ?>
                <!-- Missing Image on Hero -->
                <?php
              }
            ?>
          </div>
          <div class="<?php echo $toggle_text_class ; ?>" style="color:<?php echo $fg_color; ?>">
            <?php
              if ($hero_pitch) {
                echo $hero_pitch;
              } else { //  echo 'no pitch'; ?>
                <!-- Missing Hero Promotion -->
                <?php
              }
            ?>
          </div>

        </div>
      </div>

    </div>

<?php
  // ** Removed from code: **
  // $image_array = get_sub_field( 'full_width_image' ); // Removed for simplification
  // ** to add full image below, see Commit Hash: 125f85149b5e30855ac16bd6b901d18c755167c2 (3/22/2020)
  // ** In ACF, need to add fields
