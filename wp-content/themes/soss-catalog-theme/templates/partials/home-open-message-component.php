<?php
  declare( strict_types=1 );
  /**
   * Open Message Component
   * @description: WYSIWYG Text Field
   * @author gmiller
   * @date: 6/21/2021
   */

  $text_field = get_sub_field('full_text_editor');
  $h2_content_header = get_sub_field('h2_content_header');
?>

  <div class="row mt-4">
    <div class="col-sm-12 col-md-10 offset-md-1" >
      <?php echo $h2_content_header; ?>
    </div>
  </div>

    <div class="row mb-4">
    <div class="col-sm-12 col-md-10 offset-md-1" >
      <?php echo $text_field; ?>
    </div>
  </div>

<?php
