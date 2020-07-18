<?php
/*
 * Search form adapted from 2017 theme
 * See also: http://buildwpyourself.com/wordpress-search-form-template/
 * Theme support added in lib/setup.php
 *  @card #259
 *
 * Inline styling push form to center, right side of column.
 * The search form button code is a copy of the svg magnifying glass from the AJAX Woo plugin used in the header.
*/
$unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>


<div class="d-flex flex-nowrap justify-content-center justify-content-md-end">
  <form method="get" class="d-flex flex-nowrap form-inline my-0 my-md-2 my-lg-0" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" id="<?php echo $unique_id; ?>" class="form-control doc-search"
           placeholder="<?php echo esc_attr_x( 'Document Search &hellip;', 'placeholder', 'sage' ); ?>" <?php echo get_search_query(); ?>
           name="s">

    <input type="hidden" name="post_type" value="docs" />

    <button class="btn btn-outline-success doc-search my-2 my-sm-0" type="submit">
        <svg  focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px"><path class="search" d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" ></path></svg>
    </button>

  </form>
</div>

