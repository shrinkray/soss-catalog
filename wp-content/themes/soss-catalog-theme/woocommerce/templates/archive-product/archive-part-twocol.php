<?php
  $toggle = get_sub_field( 'choose_layout_options' );

  // WYSIWYG field
  $left = get_sub_field('left_column');       // Col Content
  $right = get_sub_field('right_column');     // Col Content
  $spacer = get_sub_field( 'add_spacer' );    // Set spacing between rows

  // Set value if spacer returns empty or zero otherwise use returned value
  $spacer = ( $spacer == '' || $spacer == 0 ) ? $spacer = '1' : $spacer;

  // Choice of layout returns class conditions below

  if ( $toggle == 'wide-left' ) {     // default
    $column_left_class = 'col-md-8';
    $column_right_class = 'col_md-4';
  } else if ( $toggle == 'wide-right' ) {
    $column_left_class = 'col-md-4';
    $column_right_class = 'col-md-8';
  } else {  // toggle == 'even'
    $column_left_class = 'col-md-6';
    $column_right_class = 'col-md-6';
  }
?>
<div class="row mbs-<?php echo $spacer; ?>">
  <div class="col <?php echo $column_left_class; ?> pitch">
    <?php echo $left; ?>
  </div>

  <div class="col <?php echo $column_right_class; ?> pitch">
    <?php echo $right; ?>
  </div>
</div>
