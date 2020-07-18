<?php
/**
 * Template for Privacy Policy page
 */

?>
<?php
    // vars
        $show_intro = get_field( 'show_intro' );
       $intro = get_field( 'introduction' );
       $empty = "";


       ?>

<div class="row">
  <div class="col-9 no-gutter">
    <?php // if left checked, the intro verbiage displays

     if ( $show_intro ) {
       echo $intro;
     }

    ?>
  </div>
</div>

<div class="grid-layout">
  <?php if ( have_rows( 'build_privacy_info' ) ): ?>
    <?php while ( have_rows( 'build_privacy_info' ) ) : the_row(); ?>

      <?php if ( get_row_layout() == 'privacy_section' ) :
        // vars
        $heading = get_sub_field( 'heading' );
        $privacy_desc = get_sub_field( 'privacy_description' );

        ?>

        <h2><?php echo $heading; ?></h2>
        <?php echo $privacy_desc; ?>

        <?php if ( have_rows( 'add_subsection' ) ) : ?>
        <?php while ( have_rows( 'add_subsection' ) ) : the_row();
          // vars
          $subhead = get_sub_field( 'subheading' );
          $info = get_sub_field( 'info_editor' );

          ?>
          <div class="col-sm-9">
            <h3><?php echo $subhead; ?></h3>
            <?php echo $info; ?>
          </div>

        <?php endwhile; ?>

      <?php else : ?>
        <?php // no rows found ?>
      <?php endif; ?>

          <?php elseif ( get_row_layout() == 'cookie_group' ) :

            // vars
            $category = get_sub_field( 'category' );
            $desc = get_sub_field( 'description' );
            $data = get_sub_field( 'data_consent' );

            ?>


              <div class="row cookie-group">
                <div class="col">
                <h3><?php echo $category; ?></h3>
                  <p class="small"><?php echo $desc; ?><br>

                <?php // if checked, displays 'true'

                echo '<strong>Prior consent: </strong>', ( $data ? 'true' : 'false');

                ?>
                 </p>
                </div>
              </div>

              <div class="row">
                <div class="col col-sm-2"><span class="th">Name</span></div>
                <div class="col col-sm-3"><span class="th">Domain</span></div>
                <div class="col col-sm-3"><span class="th">Purpose</span></div>
                <div class="col col-sm-2"><span class="th">Type</span></div>
                <div class="col col-sm-2"><span class="th">Expires</span></div>

              </div>

              <?php if ( have_rows( 'add_a_cookie' ) ) : ?>

                <?php while ( have_rows( 'add_a_cookie' ) ) : the_row();
                  // vars
                  $name = get_sub_field( 'cookie_name' );
                  $domain = get_sub_field( 'domain' );
                  $purpose = get_sub_field( 'description_purpose' );
                  $type = get_sub_field( 'cookie_type' );
                  $expires = get_sub_field( 'expiry' );

                  ?>


                  <div class="row data-display">
                    <div class="col col-sm-2"><?php echo $name; ?></div>
                    <div class="col col-sm-3"><?php echo $domain; ?></div>
                    <div class="col col-sm-3"><?php echo $purpose; ?></div>
                    <div class="col col-sm-2"><?php echo $type; ?></div>
                    <div class="col col-sm-2"><?php echo $expires; ?></div>

                  </div>

                <?php endwhile; // add a cookie


            endif; // add_a_cookie

        endif; // cookie_group

    endwhile; // build_privacy_info

  endif; // build_privacy_info

  ?>

</div>