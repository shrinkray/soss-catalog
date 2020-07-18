<?php

/**
 * Reusable template of Search Bar
 * Calls searchform.php
 *
 * @card #259
 * This is a row above the form row displaying labels for the two sections
 * They behave similar to buttons. Labels are hidden when width is less than 'sm'.
 */
?>
<div class="row">
  <div class="col no-gutter">
    <div class="col-xs-12  no-gutter">

      <div class="d-flex flex-nowrap my-0  my-lg-0 justify-content-end">
        <small class="d-none d-sm-flex feature-description">Run A Search</small>
      </div>

    </div>
  </div>

  <div class="col no-gutter">

    <div class="col-xs-12 ml-3">
      <div class="d-flex flex-nowrap my-0  my-lg-0 justify-content-start">
        <small class="d-none d-sm-flex feature-description">Quick Links</small>
      </div>
    </div>

  </div>
</div>

<div class="soss-search-wrapper break-out d-flex">

  <div class="col d-flex flex-wrap flex-sm-nowrap">

    <div class="col-xs-12 col-sm-6 no-gutter">

      <?php

      get_search_form();

      ?>

    </div>
    <?php
    /**
     * Custom Button Builder
     * This creates a row of buttons to appear to the right of the search form.
     * The buttons are aligned left
     * On mobile, buttons wrap under form elements.
     *
     * @card #259
     *
     */

    $add_link = get_field( 'add_quick_links', 'option' );


    if ( $add_link ) {
    // echo 'true';
    if ( have_rows( 'button_builder', 'option' ) ) :

    ?>

    <div class="col col-sm-6">
      <div class="d-flex flex-nowrap my-0 my-md-2 my-lg-0 justify-content-center justify-content-md-start">

        <?php

        while ( have_rows( 'button_builder', 'option' ) ) : the_row();

          $quick_link = get_sub_field( 'quick_links' );
          $link_name = get_sub_field( 'link_name' );
          $name = get_sub_field( 'button_name' );
          $url = get_site_url(null, '', 'https');
          $prefix = '?s=';
          $type = '&post_type=docs';

          ?>

          <a class="btn btn-outline-success ml-0 mr-2"
             href="<?php echo $url . $prefix .$quick_link . $type ?>"
             title="<?php echo "Quick Link: " . $name; ?>"><?php echo $link_name; ?>
          </a>

        <?php

        endwhile;
        ?>
      </div>
    </div>

  </div>

  <?php
  else :
    // no rows found ?>
  <?php endif;

  } else {
    // echo 'false';
  } ?>

</div>  <!-- /.soss-search-wrapper -->