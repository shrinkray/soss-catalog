<?php
  // vars
  $iframe = get_sub_field( 'embed_a_video' );   // The video
  $spacer = get_sub_field( 'add_spacer' );      // Set spacing between rows

  // Set value if spacer returns empty or zero otherwise use returned value
  $spacer = ( $spacer == '' || $spacer == 0 ) ? $spacer = '1' : $spacer;

  // Use preg_match to find iframe src.
  preg_match('/src="(.+?)"/', $iframe, $matches);
  $src = $matches[1];

  // Add extra parameters to src and replcae HTML.
  $params = array(
    'controls' => 0,
    'hd'       => 1,
    'autohide' => 1
  );
  $new_src = add_query_arg($params, $src);
  $iframe = str_replace($src, $new_src, $iframe);

  // Add extra attributes to iframe HTML.
  $attributes = 'frameborder="0"';
  $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
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
