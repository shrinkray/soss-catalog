<?php
  declare( strict_types=1 );

  namespace Roots\Sage\Setup;
  // use DirectoryIterator;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support( 'soil-clean-up' );
  add_theme_support( 'soil-nav-walker' );
  add_theme_support( 'soil-nice-search' );
  add_theme_support( 'soil-jquery-cdn' );
  add_theme_support( 'soil-relative-urls' );

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain( 'sage', get_template_directory() . '/lang' );

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support( 'title-tag' );

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus( [
    'primary_navigation' => __( 'Primary Navigation', 'sage' ),
    'social_navigation' => __( 'Social Navigation', 'sage' ),
    'footer_navigation' => __( 'Footer Navigation', 'sage' )
  ] );

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support( 'post-thumbnails' );

  // custom logo support
  // https://codex.wordpress.org/Theme_Logo
  add_theme_support( 'custom-logo' );

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support( 'post-formats', [ 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ] );

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style( Assets\asset_path( 'css/main.min.css' ) );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar( [
    'name'          => __( 'Primary Sidebar', 'sage' ),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ] );

  register_sidebar( [
      'name'          => __( 'Blog Sidebar', 'sage' ),
      'id'            => 'sidebar-blog',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3>',
      'after_title'   => '</h3>'
  ] );

  register_sidebar( [
      'name'          => __( 'Footer 1 (3 col)', 'sage' ),
      'id'            => 'first-4col-footer',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
  ] );


  register_sidebar( [
    'name'          => __( 'Footer 2 (3 col)', 'sage' ),
    'id'            => 'second-2col-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4 class="mb-4">',
    'after_title'   => '</h4>'
  ] );


  register_sidebar( [
      'name'          => __( 'Footer 3 (3 col)', 'sage' ),
      'id'            => 'fourth-2col-footer',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4 class="mb-4">',
      'after_title'   => '</h4>'
  ] );



  register_sidebar( [
      'name'          => __( 'Top Menu', 'sage' ),
      'id'            => 'header-widget',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
  ] );

  // Store Sidebar
  register_sidebar([
      'name'          => __('Shop Main', 'sage'),
      'id'            => 'shop-main',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4>',
      'after_title'   => '</h4>'
  ]);
}

add_action( 'widgets_init', __NAMESPACE__ . '\\widgets_init' );

/**
 * Determine which pages SHOULD display the sidebar
 */
function display_sidebar() {
  static $display;

  isset( $display ) || $display = in_array( true, [
    // The sidebar WILL be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_page_template( 'template-sidebar.php' ),
    is_page_template( 'template-secondary.php' ),
    is_page_template( 'template-blog.php' ),
    is_page_template( 'template-orders.php' ),
    //is_archive( 'archive-product.php' ),
    is_singular('post'),
  ] );

  return apply_filters( 'sage/display_sidebar', $display );
}

/**
 * THEME ASSETS
 *
 * Note: 999 is setting late Priority. This is to circumvent issue where ACF code appears before jquery.
 * @priority 999
 */

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 999, 1 );

/**
 * ENQUEUE FUNCTION SCRIPTS
 * Function assets() contains all theme enqueue calls
 */


function assets() {

  /**
   * This influenced me the most how to enqueue hash style files from Webpack build
   * @url: https://css-tricks.com/hashes-in-wordpress-assets-with-enqueue/
   *
   * $dirJS and $dirCSS
   */

  /**
   * NOTE: Refactored for Webpack.config -> file-loader: outputPath,
   * and in Plugins, miniCssExtractPlugin and in setup.php to correct enqueue path.
   * Also addresses how source is imported into main.css
   * @fixes_bug where theme could not find fontawesome library
   * GM 9/2/2019
   */

  $dirJS = get_template_directory_uri() . '/dist/js';
  $dirCSS = get_template_directory_uri(). '/dist/css';


  wp_enqueue_script( 'main_js', $dirJS . '/main.js',
    ['jquery'], 1.1, true );

  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'main_css', $dirCSS . '/main.css',
    null, null, 'all' );


  if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {

    wp_enqueue_script( 'comment-reply' );

  }
}


/**
 * Admin Styles
 *
 * Add styles to the admin area. Helps with visual clutter on ACF fields,
 * viewing SVG in media loader, etc.
 */
function admin_styles() {
  ob_start();
  include_once locate_template( 'templates/modules/admin-styles.php' );
  $output = ob_get_clean();
  echo $output;
}

add_action( 'admin_head', __NAMESPACE__ . '\\admin_styles' );
add_action( 'customize_controls_print_styles', __NAMESPACE__ . '\\admin_styles' );

/**
 * ACF Admin Access Control
 *
 * Hide / Show the ACF menu.
 *
 * Hides the ACF menu via a radio button tucked away in customizer.
 * Out of sight, out of mind.
 *
 * @return bool
 */
function acf_admin_control() {
  get_theme_mod( 'acf_visibility' ) === 'show' ? $return = true : $return = false;

  return $return;
}

add_filter( 'acf/settings/show_admin', __NAMESPACE__ . '\\acf_admin_control' );

/**
 * Add JavaScript to admin area only, specifying custom JS
 *
 * This is awesome. This enqueues an admin backend file added to /dist/ path.
 * https://discourse.roots.io/t/admin-enqueue-scripts/2847/4
 * 9/11/2019 GRM
 *
 * Only enqueues script on admin? I hope.
 * TODO: evaluate this, ... While the browsers does not throw and error, I still see this enqueued on a non-admin page.
 */


if ( is_admin() ) {
   // Runs only if this code is in a file that displays inside the admin panels, like a plugin file.

  function admin_assets() {
    wp_enqueue_script('sage/js', Assets\asset_path( 'admin-scripts.js'), ['jquery'], null, true);
  }
  add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\admin_assets', 9999 );

}
