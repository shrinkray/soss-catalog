
<?php
  // SPACER
  $spacer = get_sub_field( 'add_spacer' );

  // Set value if spacer returns empty or zero otherwise use returned value
  $spacer = ( $spacer == '' || $spacer == 0 ) ? $spacer = '1' : $spacer;
?>

<div class="row mbs-<?php echo $spacer; ?>">
  <!-- empty row with margin-bottom  -->
</div>
