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
  // PDF SVG for Inline Use
  $svg = '<svg class="pdfdoc" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 41.5 39.587"><path fill="#B52025" d="M36.023 39.444H9.176a3.36 3.36 0 01-3.356-3.356V1.187a3.36 3.36 0 013.356-3.356h13.655c.896 0 1.741.349 2.375.983l13.19 13.192c.634.633.983 1.477.983 2.373v21.708a3.36 3.36 0 01-3.356 3.357z"/><path fill="#FFF" d="M3.735 39.585c-.487 0-.963-.117-1.414-.344l-1.041-.52c-.534-.305-.763-.967-.611-1.77.414-1.997 2.858-4.496 6.539-6.695.444-.283 2.287-1.263 2.366-1.305l1.076-.572a129.577 129.577 0 003.504-6.435l.34-.672c1.151-2.27 2.456-4.844 3.516-7.396l.392-.967C16.872 7.043 16.027 2.516 16.85-.503c.253-.938 1.285-1.596 2.51-1.596h.755c1.542 0 2.343 1.775 2.429 2.725.127 1.146-.383 2.997-.405 3.074l-.053.19.069.011c-.011.218-.275 5.363-.608 6.999l-.007.029a9.466 9.466 0 00-.115.486c-.028.129-.057.261-.089.392 1.258 3.449 3.273 6.573 5.685 8.811.938.853 2.118 1.575 3.171 2.172 2.561-.356 4.839-.521 6.758-.493 2.848.033 4.729.47 5.589 1.298.322.294.533.662.638 1.111l-.119 1.659c-.06.26-.267 1.136-.436 1.44l-.024.04c-.287.41-.806.761-1.292.873-.337.088-.768.135-1.268.135-2.376 0-6.857-1.104-11.136-3.526-4.822.724-10.377 2.041-15.296 3.626-4.216 7.35-7.264 10.631-9.871 10.632z"/><path fill="#B52025" d="M11.085 28.777c-2.295 1.867-3.826 4.004-4.16 5.04 1.47-.613 3.321-3.007 5.141-5.936-.349.334-.795.755-.981.896zm20.332-5.249c2.164.944 4.238 1.527 5.51 1.527.398 0 .608-.061.716-.112.117-.053.371-.413.371-.413-.001-.003-.086-.369-1.402-.801-.641-.198-1.602-.299-2.851-.299a32.28 32.28 0 00-2.344.098zM20.244 3.162a1.377 1.377 0 00-.147.495l-.002.011a13.37 13.37 0 00-.162 1.966c0 1.308.214 2.925.597 4.575.213-.841.764-2.996.85-3.332v-.293c0-.563.003-1.415-.324-2.108-.383-.851-.656-1.184-.812-1.314zm4.505 18.554c.429.358.906.716 1.384 1.049-3.556.668-7.301 1.599-10.761 3.054.62-1.121 1.312-2.338 2.004-3.65 1.336-2.553 2.172-4.509 2.84-6.371 1.073 2.196 2.576 4.271 4.533 5.918z"/></svg>';
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

