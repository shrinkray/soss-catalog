<?php
  // SECTION HEADING
  // VARS
  $heading = get_sub_field( 'heading_text' );       // Returns text
  $h = get_sub_field( 'level_of_heading' );         // Returns whole number
  $spacer = get_sub_field( 'add_spacer' );          // Set spacing between rows

  // Set Heading tags with H2 as default
  $h = ( $h == '' ) ? $h = 2 : $h;
  // Set value if spacer returns empty or zero otherwise use returned value
  $spacer = ( $spacer == '' || $spacer == 0 ) ? $spacer = '1' : $spacer;

?>
<div class="row mts-<?php echo $spacer; ?>">
  <div class="col-12">
    <h<?php echo $h ?> class="heading-cat" >
      <?php echo $heading; ?>
    </h<?php echo $h ?> >
  </div>
</div>
