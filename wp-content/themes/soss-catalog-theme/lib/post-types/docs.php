<?php
// Register Custom Post Type
function docs_post_type() {


    /**
     * Post Type: Soss Docs.
     */

    $labels = [
      "name" => __( "Soss Docs", "sage" ),
      "singular_name" => __( "Soss Doc", "sage" ),
    ];
    $path = get_template_directory_uri();

    $args = [
      "label" => __( "Soss Docs", "sage" ),
      "labels" => $labels,
      "description" => "",
      "public" => true,
      "publicly_queryable" => true,
      "show_ui" => true,
      "delete_with_user" => false,
      "show_in_rest" => true,
      "rest_base" => "",
      "rest_controller_class" => "WP_REST_Posts_Controller",
      "has_archive" => false,
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "delete_with_user" => false,
      "exclude_from_search" => false,
      "capability_type" => "post",
      "capability"      => "edit_post",
      "map_meta_cap" => true,
      "hierarchical" => false,
      "rewrite" => [ "slug" => "docs", "with_front" => true ],
      "query_var" => true,
      "menu_icon" => $path . "/dist/adobe.png",
      "taxonomies" => [ "category" ],
      "supports" => [ "title", "editor", "excerpt", "custom-fields", "page-attributes", "post-formats" ],
    ];

    register_post_type( "docs", $args );
  }

add_action( 'init', 'docs_post_type' );
