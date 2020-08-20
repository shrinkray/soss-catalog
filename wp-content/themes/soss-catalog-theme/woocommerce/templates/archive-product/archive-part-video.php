<?php
  // vars
  $iframe = get_sub_field( 'embed_a_video' );   // The video
  $spacer = get_sub_field( 'add_spacer' );      // Set spacing between rows

  // Set value if spacer returns empty or zero otherwise use returned value
  $spacer = ( $spacer == '' || $spacer == 0 ) ? $spacer = '6' : $spacer;

  /**
   *  Removed string replace code which complicated the embed
   *  Changed padding value for embed-container class in _product-cat.scss 
   * 2020-08-19 GM
   */

?>

<div class="video-cat mx-auto">
  <div class="row mt-2 mbs-<?php echo $spacer; ?>">
    <div class="col-12 embed-container ">
      <?php
        if ( $iframe !== '' ) { ?>

          <?php echo $iframe; ?>

        <?php } else { //  ?>
          <!-- No Video loaded -->

        <?php }
      ?>
    </div>
  </div>
</div>
