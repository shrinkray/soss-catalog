<?php

/**
 *  4/25/2018 GRM
 *  Employ modal template
 *  Each modal on the page pulls a unique panel ID based on $drawingNum
 */

?>

<div class="modal fade" id="Modal<?php echo $drawingNum; ?>" tabindex="-1" role="dialog" aria-labelledby="drawingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-large" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="drawingModalLabel">Preview</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4><?php echo $drawingTitle;  ?></h4>
        <img src="/wp-content/uploads/product_drawings/<?php echo $svgFile; ?>" alt="<?php echo $svgAlt; ?>" class="img-fluid">
      </div>
    </div>
  </div>
</div>