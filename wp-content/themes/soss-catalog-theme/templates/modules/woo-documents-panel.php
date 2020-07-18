<h2>Documents</h2>
<div class="documents" role="presentation">

<?php

/**
 *
 *  Build out the tab content
 *  5/30/18 GRM
 */

$which_tabs = get_field( 'which_tabs' );


if (in_array("documents", $which_tabs)) {
  // continue
  ?>

  <script>
    // reference trello card #231
    // displays product button
    jQuery(document).ready(function ($) {
      $('.tab-docs').attr("style", "display:block");
    });
  </script>

  <?php

} else {
  //Remove an empty tab and replace contents

  unset( $tabs['documents'] );
  echo "<style>li.documents_tab{ display:none !important; }</style>";

  ?>

  <script>
    //      hides button from view
    jQuery(document).ready(function($) {
      $('.tab-docs').attr("style", "display:none");
    });
  </script>

  <?php
} ?>

  <?php if ( have_rows( 'add_select_documents' ) ) :

    //vars
    $tab_caption = get_field( 'document_caption' ); ?>
    <p><?php echo $tab_caption; ?></p>

  <div class="drawing-grid">

    <?php while ( have_rows( 'add_select_documents' ) ) : the_row(); ?>

      <?php
    // vars
        $document = get_sub_field( 'document' );
        $pdf = get_sub_field( 'pdf_type' );
        $title = get_sub_field( 'document_title' );
        $pdf_type = substr($pdf['filename'], -3); // grabs last three chars
        $pdf_ext = strtoupper($pdf_type); // force to uppercase
        $pdfSize = size_format( filesize( get_attached_file( $pdf['id'] ) ), 2 );
        $file_type = get_sub_field('file_type');

        ?>

      <?php if ( $file_type == 'pdf_file' ) { // $pdf

        $pdf_title = $title ? $title : $pdf['title'];
        $pdf_caption = $pdf['caption'] ? $pdf['caption'] : 'Document';

        ?>
          <?php
        /**
         * This section creates our row
         */
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

  </div> <!-- /.document-grid -->

  <?php else : // no rows ?>
  <?php endif; ?>

  <p>Step and Pro-E files are available upon request from SOSS.</p>
</div>