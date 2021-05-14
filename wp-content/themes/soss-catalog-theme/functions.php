<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',       // Scripts and stylesheets
  'lib/extras.php',       // Custom functions
  'lib/setup.php',        // Theme setup
  'lib/titles.php',       // Page titles
  'lib/wrapper.php',      // Theme wrapper class
  'lib/customizer.php',   // Theme customizer
  'lib/walker.php',       // Nav walker
  'lib/utils.php',        // Utility functions
  'lib/woocommerce.php',  // WooCommerce Functions
  'lib/ACF_Forms.php',    // ACF Gravity Forms field
  'lib/controllers.php',  // Controller loader
  'lib/custom-types.php', // CPT & Taxonomy loader
  'lib/mobileDetect.php', // UA sniffing classes
  'lib/login.php',        // Promotion
];

  /**
   * Add function to fix heartbeat false positive error on WP Engine when using Query Monitor
   */
  add_filter( 'wpe_heartbeat_allowed_pages', function( $pages ) {
    global $pagenow;
    $pages[] =  $pagenow;
    return $pages;
  });


foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

/**
 * Helper for removing the Revslider Metabox from being on every CPT edit screen
 *
 * @param $post_type
 * https://gist.github.com/DevinWalker/ee9d4e53883460c6bbb8
 */
function remove_revslider_metabox($post_type)
{
  add_action('do_meta_boxes', function () use ($post_type) {
    remove_meta_box('mymetabox_revslider_0', $post_type, 'normal');
  });
}
add_action('registered_post_type', 'remove_revslider_metabox');



/**
 * Load ACF Custom Stylesheet
 * Please find this referenced in /lib/setup.php > Admin Styles section.
 */


/**
 * Deliver Responsive Images in ACF
 * adds the srcset to your front end image with image options inside of it

 */
function custom_theme_setup() {
  add_theme_support( 'advanced-image-compression' );
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

/**
 *  Add new image sizes
 */

add_image_size('feature_block', 300, 255, true);
add_image_size('opt_in', 608, 492, true);
add_image_size('opt_in_wide', 900, 600, true);
add_image_size('secondary_image', 800, 450, true);
add_image_size('slider_image', 1246, 500, true);
add_image_size('router_image', 570, 570, true);
add_image_size('custom_icon', 300, 300, true);
add_image_size('overview_portrait', 350, 400, true);
add_image_size('overview_landscape', 450, 350, true);
add_image_size('card_block', 500, 500, true);
add_image_size('card_image', 545, 307, true);
add_image_size('hero_cat', 765, 430, true);


/**
 *  Add Image Crop Images
 */
add_action('acf/register_fields', 'my_register_fields');

function my_register_fields() { include_once('acf-image-crop/acf-image-crop.php'); }


/**
 * Add Options Page
 * This is used to edit the Header and Footer templates
 */
if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
      'page_title' 	=> 'Theme General Settings',
      'menu_title'	=> 'Theme Settings',
      'menu_slug' 	=> 'theme-general-settings',
      'capability'	=> 'edit_posts',
      'position'    => 58,
      'icon_url'    => false,
      //'redirect'		=> false
  ));

}



/**
 * Limit length of excerpt by number of words
 * http://smallenvelop.com/limit-post-excerpt-length-in-wordpress/
 *
 * use echo excerpt($limit) instead of the_excerpt()
 */
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

// use this to limit number of words displaying

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/**
 * custom function targeting sticky posts
 * Use on blog landing page template
 *
 *  http://www.wpbeginner.com/wp-tutorials/how-to-display-the-latest-sticky-posts-in-wordpress/
 */

function soss_latest_sticky() {

  /* Get all sticky posts */
  $sticky = get_option( 'sticky_posts' );

  /* Sort the stickies with the newest ones at the top */
  rsort( $sticky );

  /* Get the 5 newest stickies (change 5 for a different number) */
  $sticky = array_slice( $sticky, 0, 5 );

  /* Query sticky posts */
  $the_query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
  // The Loop
  if ( $the_query->have_posts() ) {
    $return = '<ul>';
    while ( $the_query->have_posts() ) {
      $the_query->the_post();
      $return = '<li><a href="' .get_permalink(). '" title="'  . get_the_title() . '">' . get_the_title() . '</a><br />' . get_the_excerpt(). '</li>';

    }
    $return = '</ul>';

  } else {
    // no posts found
  }
  /* Restore original Post Data */
  wp_reset_postdata();

  return $return;

}
add_shortcode('latest_stickies', 'soss_latest_sticky');

/**
 * Remove Query Strings From Static Resources
 * https://kinsta.com/knowledgebase/remove-query-strings-static-resources/#remove-query-string-code
 */
function _remove_script_version( $src ){
  $parts = explode( '?', $src );
  return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );



/**
 * Add Featured column to video post type admin table view. The 'featured_video' value
 * returns True or False. If true, the item will show 'Yes,' and a bar if not.
 *
 * @param $columns
 * @return array
 */

function my_page_columns($columns) {

  $columns = array(
      'cb'	 	          => '<input type="checkbox" />',
      'title' 	        => 'Videos',
      'featured_video' 	=> 'Featured',
      'categories'	    => 'Categories',
      'tags'            => 'Tags',
      'date'		        => 'Date'
  );
  return $columns;
}

function my_custom_columns($column) {

  if($column == 'featured_video') {
    if(get_field('featured_video')) {
      echo 'Yes';
    } else {
      echo '<span aria-hidden="true">—</span>';
    }
  }
}

add_action("manage_video_posts_custom_column", "my_custom_columns");
add_filter("manage_video_posts_columns", "my_page_columns");


function wpb_change_search_url() {
  if ( is_search() && ! empty( $_GET['s'] ) ) {
    wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
    exit();
  }
}
add_action( 'template_redirect', 'wpb_change_search_url' );




/**
 * Add Document Title column to document post type admin table view. The 'document_name' value
 * returns a string.
 *
 * @param $columns
 * @return array
 */

//add_filter( 'manage_documents_posts_columns', 'soss_filter_posts_columns' );
//function soss_filter_posts_columns( $columns ) {
//
//  $columns = array(
//      'cb' => $columns['cb'],
//      'document_name' => __( 'Title' ),
//      'document_type' => __( 'Doc Type' ),
//      'document_description' => __( 'Doc Description' )
//  );
//  return $columns;
//}
//
//add_action( manage_soss_documents_posts_column, 'soss_documents_column', 10, 2 );
//
//  function soss_documents_column( $column, $post_id ) {
//    // Title
//    if ( 'document_name' === $column ) {
//      echo 'document_name';
//    } {
//      echo '<span aria-hidden="true">—</span>';
//    }
//    // Type
//    if ( 'document_type' === $column ) {
//      echo 'document_type';
//    } {
//      echo '<span aria-hidden="true">—</span>';
//    }
//    // Description
//    if ( 'document_description' === $column ) {
//      echo 'document_description';
//    } {
//      echo '<span aria-hidden="true">—</span>';
//    }
//
//  }







/**
 * Add the SVG Mime type to the uploader
 * @author Alain Schlesser (alain.schlesser@gmail.com)
 * @link https://gist.github.com/schlessera/1eed8503110fb3076e73
 *
 * @param  array $mimes list of mime types that are allowed by the
 * WordPress uploader
 *
 * @return array modified version of the $mimes array
 *
 * @see https://codex.wordpress.org/Plugin_API/Filter_Reference/upload_mimes
 * @see http://www.w3.org/TR/SVG/mimereg.html
 */
//function add_svg_mime_type( $mimes ) {
//  // add official SVG mime type definition to the array of allowed mime types
//  $mimes['svg'] = 'image/svg+xml';
//
//  // return the modified array
//  return $mimes;
//}
//
//add_filter( 'upload_mimes', __NAMESPACE__ . '\\add_svg_mime_type' );



/**
 * Add Custom Mime Types for file upload (Product Tabs Templates)
 * @param $mimes
 * @return array
 *
 * https://paulund.co.uk/change-wordpress-upload-mime-types
 * http://itswordpress.com/2011/09/18/add-additional-file-types-to-wordpress-media-library/
 *https://www.serverintellect.com/support/iis/mime-types/
 */
add_filter('upload_mimes','add_custom_mime_types');
function add_custom_mime_types($mimes){
  return array_merge($mimes,array (
      'dwg' => 'application/acad',
      'dxf' => 'image/vnd.dxf',
      'svg' => 'image/svg+xml'
  ));
}

/**
 * Add pagination to posts pages
 * This was not hooked up, but the page I was working on was the
 * 'content-page-documents' template 11/30/2018
 *
 * https://www.billerickson.net/custom-pagination-links/
 */
function pagination_bar() {
  global $wp_query;

  $total_pages = $wp_query->max_num_pages;

  if ($total_pages > 1){
    $current_page = max(1, get_query_var('paged'));

    echo paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => '/page/%#%',
        'current' => $current_page,
        'total' => $total_pages,
    ));
  }
}

function custom_pagination($numpages = '', $pagerange = '', $paged='')
{

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  global $paged;

  if (empty($paged)) {
    $paged = 1;
  }

  if ($numpages == '') {
    global $wp_query;

    $numpages = $wp_query->max_num_pages;

    if (!$numpages) {
      $numpages = 1;
    }
  }

  $pagination_args = array(
      'base' => get_pagenum_link(1) . '%_%',
      'format' => 'page/%#%',
      'total' => $numpages,
      'current' => $paged,
      'show_all' => False,
      'end_size' => 1,
      'mid_size' => $pagerange,
      'prev_next' => True,
      'prev_text' => __('&laquo;'),
      'next_text' => __('&raquo;'),
      'type' => 'plain',
      'add_args' => false,
      'add_fragment' => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<div class='pagination'>";
    echo "<div class='left'>Page " . $paged . " of " . $numpages . "</div> ";
    echo "<div class='right'>" . $paginate_links . "</div> ";
    echo "</div>";
  }
}

/** Disable Ajax Call from WooCommerce on front page and posts
 * https://www.webnots.com/fix-slow-page-loading-with-woocommerce-wc-ajaxget_refreshed_fragments/
 */
add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_cart_fragments', 11);
function dequeue_woocommerce_cart_fragments() {
  if (is_front_page() || is_single() ) wp_dequeue_script('wc-cart-fragments');
}


/**
 * Add Excerpt to Documents Listings
 *
 * - Added for setting the description field to excerpt so it will pull into the search results
 * - Added for formatting
 * - TODO: may be able to remove global $post var
 *
 */

// Custom Excerpt function for Advanced Custom Fields
function custom_field_excerpt() {
  global $post;
  $text = get_field('docs_excerpt'); //Replace 'your_field_name'
  if ( '' != $text ) {
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]&gt;', ']]&gt;', $text);
    $excerpt_length = 20; // 20 words
    $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
  }
  return apply_filters('the_excerpt', $text);
}
