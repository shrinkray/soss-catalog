<?php
declare(strict_types=1);

  /**
   * FEATURE GALLERY COMPONENT
   * @description: In interface, user adds images with a specific dimension range. Images will display in strip for
   * near footer section of homepage.
   * @author gmiller
   * @date: Jun/09/2021
   */

?>

  <div class="row gallery-strip-block my-0 d-flex justify-content-center">

<?php
   $create_gallery_ids = get_sub_field( 'create_gallery' );
   $size = 'thumbnail'; ?>

<?php if ( $create_gallery_ids ) :  ?>

  <ul class="gallery-strip nowrap clearfix mt-1">
  <?php foreach ( $create_gallery_ids as $image_id ):


    $image_alt = get_post_meta($image_id, 'thumb', true);
    $attach_id = wp_get_attachment_image($image_id, 'gallery_block', false,

      $attr = [ 'class' => 'img-fluid lazyloaded', 'alt' => $image_alt ]);
    ?>

    <li>
      <span class="gallery-border">&nbsp;</span>
      <?php echo $attach_id; ?>
    </li>

  <?php endforeach; ?>
  </ul>
  </div>
<?php endif;
