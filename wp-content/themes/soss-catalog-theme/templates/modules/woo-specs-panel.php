<h2>Specifications</h2>


<div class="row">
  <div class="col-md-12">

    <?php

    /**
     *
     * 3/26/18 GRM
     */

    /**
     * Figure out if we show the tab or kill if not
     */
    $which_tabs = get_field( 'which_tabs' );

    if (in_array("specs", $which_tabs)) {
      ?>

      <script>
        // reference trello card #231
        // displays product button
        jQuery(document).ready(function ($) {
          $('.tab-spec').attr("style", "display:block");
        });
      </script>

    <?php
      // continue
    } else {
      //Remove an empty tab

      unset( $tabs['specs'] );
      echo "<style>li.specs_tab{ display:none !important; }</style>";
      ?>

      <script>
        //      hides button from view
        jQuery(document).ready(function($) {
          $('.tab-spec').attr("style", "display:none");
        });
      </script>

      <?php
    }

    ?>

    <?php // vars

    $specs_text = get_field( 'specs_text' );
    $tab_caption = get_field( 'specs_caption' );

    ?>

    <div class="row">
      <div class="col-12"><?php echo $tab_caption; ?></div>
    </div>

    <?php

   if ( $specs_text ) :

    echo $specs_text;

   else :
     echo "<p>See our  <a href='/architectural-specifications/'>Architectural Specifications</a> page.</p>";
    // no rows
     ?>
   <?php endif; ?>



  </div>
</div>