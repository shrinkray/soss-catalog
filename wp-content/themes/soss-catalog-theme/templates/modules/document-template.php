<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 11/29/18
 * Time: 2:15 PM
 */


/**
 * Gets terms from post type and returns $terms comma delimited list
 *
 */
// vars
  $type = get_field( 'file_type' );                                           // All PDF right now
  $pdf = get_field( 'pdf_type' );                                             // Attached file

  $pdf_type = substr($pdf['filename'], -3);                                     // grabs last three chars
  $pdf_ext = strtoupper($pdf_type);                                                   // force to uppercase
  $pdfSize = size_format( filesize( get_attached_file( $pdf['id'] ) ), 2 );  // size of file (help customer with size of download)
  $terms = get_field('category');                                             // ACF Category
  $term = get_term( $terms );


  $title = $pdf['title'];                                       // Uses title of PDF which may differ from post title, used in link title
  $pdf_caption = $pdf['caption'] ? $pdf['caption'] : 'Document';                      // caption from document, used in link title
  $svgPath = get_template_directory() . '/dist/adobe.svg';                            // adobe logo doc SVG
  $svg = file_get_contents( $svgPath );                                               // Sets content of file in var

  $post_id = $term->term_id;
  $term_name = $term->name;






/**
 * This section creates our row for PDF type documents
 * It is not sortable nor have a search capability
 *
 */


?>

  <div id="<?php post_class(); ?>" class="row">

    <div class="col-12 file-listing d-flex">

      <!-- Post title with file size, link and type -->

      <a href="<?php echo get_the_permalink(); ?>" title="<?php echo 'See more information about ' . $title . '--' . $pdf_caption; ?>"
         class="linkified" target="_self"><?php echo $svg; ?>&nbsp;<?php echo the_title() ?></a>
      &nbsp;<span class="<?php echo $pdf_type; ?>"><?php echo $pdf_ext; ?></span>
      <span class="filesize">&nbsp;(<?php echo $pdfSize; ?>)</span>

      <!-- Download the file -->

      <a class="small" href="<?php echo $pdf['url']; ?>" class="download" title="Download now" download="<?php echo $pdf['filename']; ?>" target="_blank">Download</a>



      <?php
            // Adds category info if available; TODO: Not appearing in search. 

      if ($terms) { ?>

        &nbsp;|&nbsp;<span class="list-inline-item terms"><?php echo $term_name; ?></span>
        | <span class="list-inline-item terms">--</span>

      <?php } ?>
      
    </div> 
    
    <div class="col-12"> <!-- Add a single category  -->
      <span class="entry-summary"><?php echo custom_field_excerpt(); ?></span>
    </div>


  </div> <!-- #post -->

