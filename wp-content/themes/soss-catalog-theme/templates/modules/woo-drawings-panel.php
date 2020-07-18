<h2>Drawings</h2>
<div class="drawings" role="presentation">

  <?php

  /**
   *
   *  Build out the tab content
   *  3/26/18 GRM
   */

  /**
   * Figure out if we show the tab and kill if not
   */
  $which_tabs = get_field( 'which_tabs' );


  if (in_array("drawings", $which_tabs)) {
    // continue
    ?>

    <script>
      // reference trello card #231
      // displays product button
      jQuery(document).ready(function ($) {
        $('.tab-draw').attr("style", "display:block");
      });
    </script>

  <?php

  } else {
    //Remove an empty tab and replace contents

    unset( $tabs['drawings'] );
    echo "<style>li.drawings_tab{ display:none !important; }</style>";
    ?>

    <script>
      //      hides button from view
      jQuery(document).ready(function($) {
        $('.tab-draw').attr("style", "display:none");
      });
    </script>

    <?php
  } ?>

  <?php if ( have_rows( 'add_select_drawings' ) ) :

    //vars
    $tab_caption = get_field( 'drawing_caption' ); ?>
    <p><?php echo $tab_caption; ?></p>

    <div class="drawing-grid">

      <?php while ( have_rows( 'add_select_drawings' ) ) : the_row(); ?>

        <?php
        // vars
        $drawing = get_sub_field( 'drawing' );
        $pdf = get_sub_field( 'pdf_type' );
        $title = get_sub_field( 'drawing_title' );
        $size = $drawing['size'];
        $url = $drawing['url'];
        $type = substr($drawing['filename'], -3); // grabs last three chars
        $pdf_type = substr($pdf['filename'], -3); // grabs last three chars
        $extension = strtoupper($type); // force to uppercase
        $pdf_ext = strtoupper($pdf_type);
        $fileSize = size_format( filesize( get_attached_file( $drawing['id'] ) ), 2 );
        $pdfSize = size_format( filesize( get_attached_file( $pdf['id'] ) ), 2 );
        $dwgAlt = $drawing['alt'];
        $file_type = get_sub_field('file_type');

        $tab_caption = get_field('dims_caption');
        $dxf = get_sub_field( 'dxf_file' );
        $svg = get_sub_field( 'drawing_svg' );
        $upload_dir = wp_upload_dir();
        $base_url = $upload_dir['baseurl'];
        $svgUrl = $svg['url'];


        ?>

        <?php if ( $file_type == 'dxf_file' ) { // DXF or DWG

          // vars
          $closing_comment = get_field('closing_comment', 'option');
          $standard_message = get_field( 'standard_message', 'option');

          // Two Ternary assignments
          $drawing_title = $title ? $title : $drawing['title'];
          $drawing_caption = $drawing['caption'] ? $drawing['caption'] : 'Drawing';

          ?>
          <div class="row">
            <div class="col-sm-8 file-listing"><button title="<?php echo 'View ' . $drawing_title . '--' . $drawing_caption; ?>" class="linkified" data-toggle="modal" data-target="#Modal<?php echo $drawing['id']; ?>"><?php echo $drawing_title; ?></button>
              &nbsp;<span class="<?php echo $type; ?>"><?php echo $extension; ?></span>
              <span class="filesize">&nbsp;(<?php echo $fileSize; ?>)</span>
            </div>

            <div class="col-sm-4 file-actions">
              <button type="button" title="<?php echo 'View ' . $drawing_title . '--' . $drawing_caption; ?>" class="btn btn-primary btn-xs align-self-center" data-toggle="modal" data-target="#Modal<?php echo $drawing['id']; ?>">View</button>&nbsp;

              <a href="<?php echo $drawing['url']; ?>" class="download" title="Click here to download" download="<?php echo $drawing['filename']; ?>">Download</a>
            </div>
          </div>

          <?php // Modal ?>

          <div class="modal fade" id="Modal<?php echo $drawing['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="drawingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-large" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="drawingModalLabel">Preview</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h4><?php echo $title;  ?></h4>
                  <img src="<?php echo $svgUrl; ?>" alt="<?php echo $dwgAlt; ?>" class="img-fluid">
                </div>
                <div class="modal-footer">

                </div>
              </div>
            </div>
          </div>

        <?php } else { // $pdf

          // Two Ternary Assignments
          $pdf_title = $title ? $title : $pdf['title'];
          $pdf_caption = $pdf['caption'] ? $pdf['caption'] : 'Document';

          ?>
          <div class="row">
            <div class="col-sm-8 file-listing"><a href="<?php echo $pdf['url']; ?>" title="<?php echo 'View ' . $pdf_title . '--' . $pdf_caption; ?>" class="linkified" target="_blank"><?php echo $pdf_title;  ?></a>
              &nbsp;<span class="<?php echo $pdf_type; ?>"><?php echo $pdf_ext; ?></span>
              <span class="filesize">&nbsp;(<?php echo $pdfSize; ?>)</span>
            </div>

            <div class="col-sm-4 file-actions">
              <a href="<?php echo $pdf['url']; ?>" title="<?php echo 'View ' . $pdf_title. '--' . $pdf_caption; ?>" class="btn btn-primary btn-xs align-self-center" target="_blank">View</a>&nbsp;
              <a href="<?php echo $pdf['url']; ?>" title="Click here to download" class="download" download="<?php echo $pdf['filename']; ?>">Download</a>
            </div>
          </div>

        <?php } ?>

      <?php endwhile; ?>


      <!-- Common Drawings -->

      <?php // This is a way to force a list of docs
      // that are the same and appear on most of the hinge products
      // This will not show if no other rows above have been added.
      include('woo-common-drawings.php'); ?>

    </div> <!-- /.drawing-grid -->

  <?php else : // no rows ?>
  <?php endif; ?>

  <p>Step and Pro-E files are available upon request from SOSS.</p>
</div>