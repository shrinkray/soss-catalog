<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 8/23/17
 * Time: 9:39 AM
 */

/**
 *  Upload Max Adjustment
 */
//@ini_set( 'upload_max_size' , '64M' );
//@ini_set( 'post_max_size', '64M');
//@ini_set( 'max_execution_time', '300' );

/**
 * WooCommerce Love
 */

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
  add_theme_support( 'woocommerce' );
}
/**
 * Code enables gallery functionality in theme
 * https://createandcode.com/broken-photo-gallery-and-lightbox-after-woocommerce-3-0-upgrade/
 */
add_action( 'after_setup_theme', 'soss_theme_setup' );

function soss_theme_setup() {
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );

  // Declare support for title theme feature.
  add_theme_support( 'title-tag' );

  // Declare support for selective refreshing of widgets.
  add_theme_support( 'customize-selective-refresh-widgets' );
}




/**
 * @snippet  Rename a Default Sorting Option @ WooCommerce Shop
 * @how-to   Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode   https://businessbloomer.com/?p=75511
 * @author   Rodolfo Melogli
 * @testedwith   WooCommerce 3.4.3
 *
 * Added by Greg Miller 10/22/2018
 * Per request from Michael Temple and per Soss team request
 */

add_filter( 'woocommerce_catalog_orderby', 'bbloomer_rename_sorting_option_woocommerce_shop' );

function bbloomer_rename_sorting_option_woocommerce_shop( $options ) {
  $options['alphabetical'] = __( 'Sort by Size', 'woocommerce' );
  $options['reverse_alpha'] = __( 'Reverse by Size', 'woocommerce' );
  return $options;
}

/**
 * @snippet  Remove a Sorting Option @ WooCommerce Shop
 * @author  Greg Miller
 * @testedwith  WooCommerce 3.4.7
 *
 * Added by Greg Miller 10/22/2018
 * Per request from Michael Temple and per Soss team request
 */

function my_woocommerce_catalog_orderby( $orderby ) {
  unset($orderby["price"]);
  unset($orderby["price-desc"]);
  return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "my_woocommerce_catalog_orderby", 20 );


/**
 * This section added from Ultralatch theme for customized templates
 * GRM 3/23/2018
 */

/**
 * Remove Existing Tabs
 * additional_information is data from migration but no image was included so it becomes worthless.
 *
 * https://gist.github.com/jameskoster/5133466
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

  unset( $tabs['additional_information'] );  	// Remove the additional information tab
  unset( $tabs['reviews'] );

  return $tabs;

}

/**
 * Change Tab Names
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

  $tabs['description']['title'] = __( 'Overview' );		// Rename the description tab
  //$tabs['reviews']['title'] = __( 'Ratings' );				// Rename the reviews tab
 // $tabs['additional_information']['title'] = __('Dimensions');

  return $tabs;

}

/**
 * Add and customize new Panel Tabs
 *
 */

// Dimensions

add_filter( 'woocommerce_product_tabs', 'dimensions_product_tab' );

function dimensions_product_tab( $tabs ) {

  // Adds the new tab

  $tabs['dimensions'] = array(
      'title' 	=> __( 'Dimensions', 'woocommerce' ),
      'priority' 	=> 50,
      'callback' 	=> 'dimensions_tab_content'
  );

  return $tabs;

}

function dimensions_tab_content() {

  get_template_part('templates/modules/woo-dimensions-panel' );

}

// Drawings

add_filter( 'woocommerce_product_tabs', 'drawings_product_tab' );

function drawings_product_tab( $tabs ) {

  // Adds the new tab

  $tabs['drawings'] = array(
      'title' 	=> __( 'Drawings', 'woocommerce' ),
      'priority' 	=> 52,
      'callback' 	=> 'drawings_tab_content'
  );

  return $tabs;

}

function drawings_tab_content() {

  // The drawings tab content

  get_template_part('templates/modules/woo-drawings-panel' );


}


// Documents

add_filter( 'woocommerce_product_tabs', 'documents_product_tab' );

function documents_product_tab( $tabs ) {

  // Adds the new tab

  $tabs['documents'] = array(
      'title' 	=> __( 'Documents', 'woocommerce' ),
      'priority' 	=> 53,
      'callback' 	=> 'documents_tab_content'
  );

  return $tabs;

}

function documents_tab_content() {

  // The documents tab content

  get_template_part('templates/modules/woo-documents-panel' );


}

// Architectural

add_filter( 'woocommerce_product_tabs', 'architectural_product_tab' );

function architectural_product_tab( $tabs ) {

  // Adds the new tab

  $tabs['specs'] = array(
      'title' 	=> __( 'Architectural Specs', 'woocommerce' ),
      'priority' 	=> 54,
      'callback' 	=> 'specs_tab_content'
  );

  return $tabs;

}

function specs_tab_content() {

  get_template_part('templates/modules/woo-specs-panel' );

}



// Video

add_filter( 'woocommerce_product_tabs', 'video_product_tab' );

function video_product_tab( $tabs ) {

  // Adds the new tab

  $tabs['video'] = array(
      'title' 	=> __( 'Video', 'woocommerce' ),
      'priority' 	=> 55,
      'callback' 	=> 'video_tab_content'
  );

  return $tabs;

}
function video_tab_content() {

  // The video tab content

  get_template_part('templates/modules/woo-video-panel' );

}


/**
 * Reorder Tab
 */

add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );

function woo_reorder_tabs( $tabs ) {

  $tabs['description']['priority'] = 5;	        // First
  $tabs['dimensions']['priority'] = 10;		      // Second
  $tabs['drawings']['priority'] = 15;		        // Third
  $tabs['documents']['priority'] = 20;          // Forth
  $tabs['video']['priority'] = 25;              // Fifth
  $tabs['specs']['priority'] = 30;              // Sixth
  $tabs['reviews']['priority'] = 35;			      // Seventh

  return $tabs;
}


/**
 * wc_direct_link_to_product_tabs
 *
 * Allows you to create custom URLs to activate product tabs by default, directly from the URL
 * ex: http://mysite.com/my-product-name#reviews
 *
 * TODO: refactor for PHP & if a tab does not exist, disable button;
 * TODO: create buttons based on available tabs; see source code
 */
//-->


/**
 * @snippet       Scroll to tab - WooCommerce Single Product
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.5.7
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

add_action( 'woocommerce_single_product_summary', 'bbloomer_scroll_to_and_open_product_tab', 21 );

function bbloomer_scroll_to_and_open_product_tab()
{

  //global $product;

  echo '<ul class="btn-group-sm product-tabs-nav" role="group">';

  // LINK TO SCROLL TO ADDITIONAL INFO TAB
//  if ( $product && ( $product->has_attributes()  ) ) {
  echo '<li class="tab-list"><a class="jump-to-tab btn tab-desc" href="#tab-title-description"
        title="Product overview section">'
      . __('Overview', 'woocommerce') . '</a></li>';

  echo '<li class="tab-list"><a class="jump-to-tab btn tab-dims" href="#tab-title-dimensions"
        title="Product dimensional information section">'
      . __('Dimensions', 'woocommerce') . '</a></li>';

  echo '<li class="tab-list"><a class="jump-to-tab btn tab-draw" href="#tab-title-drawings"
        title="View and download technical drawings">'
      . __('Drawings', 'woocommerce') . '</a></li>';

  echo '<li class="tab-list"><a class="jump-to-tab btn tab-docs" href="#tab-title-documents"
        title="View and download product data sheets">'
      . __('Documents', 'woocommerce') . '</a></li>';

  echo '<li class="tab-list"><a class="jump-to-tab btn tab-video" href="#tab-title-video"
        title="Watch a pro installation and other product related videos">'
      . __('Video', 'woocommerce') . '</a></li>';

  echo '<li class="tab-list"><a class="jump-to-tab btn tab-spec"  href="#tab-title-specs"
        title="Architectural specifications of our products">'
      . __('Specs', 'woocommerce') . '</a></li>';

  echo '</ul>';

  /**
   *
   */
  echo '<a href="/dealers/"
            title="Visit our Rep Locator page and find a knowledgable resource fast!"
            class="btn brand-cta-dealer mx-auto" style="font-size: 1rem;"
            target="_parent">Find Your Local Store</a>';
}
  ?>


<?php
/**
 * Remove price from products
 *
 * http://jeroensormani.com/hiding-product-prices-woocommerce/
 */
//$price = apply_filters( 'woocommerce_variation_prices_price', $variation->get_price( 'edit' ), $variation, $product );
//
add_filter( 'woocommerce_get_price_html', function( $price ) {
  //if ( is_admin() ) return $price;

  return '';
} );

add_filter( 'woocommerce_cart_item_price', '__return_false' );
add_filter( 'woocommerce_cart_item_subtotal', '__return_false' );




///**
// * WooCommerce Remove Variation "From: $XX" Price
// *
// * @author    	Patrick Rauland
// * @since		1.0
// * https://gist.github.com/BFTrick/7643587
// */
function patricks_custom_variation_price( $price, $product ) {
  $target_product_types = array(
      'variable'
  );
  if ( in_array ( $product->product_type, $target_product_types ) ) {
    // if variable product return and empty string
    return '';
  }
  // return normal price
  return $price;
}


/**
 * Fix for Gravity Forms bug
 * GRM 3-9-18
 *
 * Fixes this error: Uncaught ReferenceError: jQuery is not defined
 *
 * https://hereswhatidid.com/2013/01/move-gravity-forms-jquery-calls-to-footer/
 */

add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() {
return true;
}
