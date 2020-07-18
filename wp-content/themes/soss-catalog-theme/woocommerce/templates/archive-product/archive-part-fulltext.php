<?php
  // vars
  $wysiwyg = get_sub_field( 'wysiwyg_editor' );     // The text
  $spacer = get_sub_field( 'add_spacer' );          // Set spacing between rows

  // Set value if spacer returns empty or zero otherwise use returned value
  $spacer = ( $spacer == '' || $spacer == 0 ) ? $spacer = '1' : $spacer;

?>
<div class="row mbs-<?php echo $spacer; ?>">

  <div class="col-12">
    <?php
      //
      if ( $wysiwyg !== '' ) { ?>

        <?php echo $wysiwyg; ?>

      <?php } else { ?>
        <!-- Sorry no content added -->

      <?php }
    ?>
  </div>

</div>
