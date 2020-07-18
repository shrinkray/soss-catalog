<h2>Video Help</h2>

<?php $tab_caption = get_field( 'tab_caption' ); ?>
<p><?php echo $tab_caption; ?></p>

<div class="row">


    <?php

    /**
     * Display videos
     * 3/26/18 GRM
     */

    /**
     * Figure out if we show the tab or kill if not
     */
    $which_tabs = get_field( 'which_tabs' );

    if (in_array("video", $which_tabs)) {
      // continue
      ?>

      <script>
        // reference trello card #231
        // displays product button
        jQuery(document).ready(function ($) {
          $('.tab-video').attr("style", "display:block");
        });
      </script>

      <?php
    } else {
      //Remove an empty tab

      unset( $tabs['video'] );
      echo "<style>li.video_tab{ display:none !important; }</style>";

      ?>

      <script>
        //      hides button from view
        jQuery(document).ready(function($) {
          $('.tab-video').attr("style", "display:none");
        });
      </script>

      <?php
    }
    // vars
        $installation = get_field( 'hinge_installation' );

     if (  $installation ) { // default value set to add this common installation video ?>

         <div class="col-lg-8 mb-5">
           <div class="embed-container">
             <iframe width="520" height="390" src="https://www.youtube.com/embed/2iQTvRKpzIM?feature=oembed" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>
           </div>
         </div>
         <div class="col-lg-4">
           <p>Installation instructions for the Soss hinge.  Shows the use of the SOSS router installation guide.</p>
         </div>

    <?php

      } else {
       // echo 'false';
      }


 if ( have_rows( 'add_videos' ) ) : ?>

    <?php while ( have_rows( 'add_videos' ) ) : the_row();
    // vars
     $video = get_sub_field( 'oembed' );
     $caption = get_sub_field( 'video_caption' );

    ?>


      <div class="col-lg-8 mb-5">
        <div class="embed-container">
          <?php  echo $video;

          ?>
        </div>
      </div>
      <div class="col-lg-4">
        <?php echo $caption; ?>
      </div>

    <?php endwhile; ?>
    <?php else :

    // no rows

      ?>
    <?php endif; ?>


</div>


