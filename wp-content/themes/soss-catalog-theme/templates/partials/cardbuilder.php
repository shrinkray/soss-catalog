<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 2/26/18
 * Time: 1:36 PM
 */

      $section_title = get_sub_field( 'section_title' );
      $no_gutters = get_sub_field( 'remove_gutters' );

      if ( $section_title ) { ?>
        <div class="row d-flex">
          <div class="col">

            <div class="block-title">
              <h2 class=""><?php echo  $section_title ?></h2>
            </div>

          </div>
        </div>
      <?php } else {
        // pass through
      } ?>

        <div class="row d-flex">

      <?php if ( $no_gutters ) { ?>

          <div class="card-group block no-gutters">

      <?php } else { ?>
          <div class="card-group block">
    <?php } ?>


      <?php if ( have_rows( 'assemble_card' ) ) :

      while ( have_rows( 'assemble_card' ) ) : the_row();

      // This was made more complicated to add options for appearance.

        // vars
        $card_title = get_sub_field( 'card_title' );
        $card_text = get_sub_field( 'card_text' );
        $image = get_sub_field( 'card_image' );
        $over_image = get_sub_field( 'over_image' );
        $text_color = get_sub_field( 'text_color' );

        //CTA Button
        $toggle = get_sub_field( 'button_toggle' );
        $button = get_sub_field( 'button_name' );
        $type = get_sub_field( 'type' );
        $target = get_sub_field( 'target' );
        $internal = get_sub_field( 'internal_link' );
        $custom = get_sub_field( 'custom_link' );
        $style = get_sub_field( 'style' );

        // Image Links
        $img_link = get_sub_field( 'img_link' );
        $img_link_int = get_sub_field( 'img_link_internal' ); // radio button
        $img_int_link = get_sub_field( 'img_internal_link' ); // internal link
        $img_cust_link = get_sub_field( 'img_custom_link' );  // hard link
        $site_url = get_site_url();



        ?>

        <div class="col-sm-6 col-md-3">

          <div class="card flex-column">
            <div class="image-block mx-auto">

              <?php if( ! empty($image) ) : { ?>

                <?php $pic = wp_get_attachment_image( $image, "card_block", false, $attr=array('class' => 'align-self-center card-image-top')); ?>

                <?php if ($type == "internal") { // Title link to internal page

                  if ( $img_int_link ) { // If an internal link exists

                    $use_target = $target ? $target : '_self';  // If no target set, use self

                    ?>

                     <a href="<?php echo $internal; ?>" target="<?php echo $use_target; ?>">
                        <?php echo $pic; ?></a>

                    <?php

                  } else {

                        $use_target = $target ? $target : '_self';  // If no target set, use self
                    ?>

                    <a href="<?php echo $site_url . '/browse/' ?>" target="<?php echo $use_target; ?>">
                        <?php echo $pic; ?></a>

                    <?php

                  }
                  ?>




                <?php } elseif ( $type == "custom" ) { // Title link to external page

                  $use_target = $target ? $target : '_self';  // If no target set, use self

                  ?>

                  <a href="<?php echo $custom; ?>" target="<?php echo $use_target; ?>">
                    <?php echo $pic; ?></a>

                <?php } else { // No link
                   echo $pic;
                } ?>

              <?php } else :  // with no image display placeholder ?>
<!--                <img class="card-img-top" src="holder.js/600x200">-->
              <?php endif; ?>
              <?php if ( $over_image ) {
                // add card header text here ?>
                <header>
                  <h3 class="card-title over-image checkScrollHeightOverflow" style="color: <?= $text_color ?>;">
                    <?php echo $card_title ?>
                  </h3>
                </header>

              <?php } else {
                // text heading appears below image
              } ?>
            </div>

            <div class="card-block d-flex flex-column justify-content-between">

                <?php if ( ! $over_image ) { ?>
                  <?php if ($type == "internal") { // Title link to internal page

                    $use_target = $target ? $target : '_self';  // If no target set, use self

                    ?>
                    <header>
                      <h3 class="card-title text-center checkScrollHeightOverflow">
                        <a href="<?php echo $internal; ?>" target="<?php echo $use_target; ?>">
                          <?php echo $card_title ?></a>
                      </h3>
                    </header>
                  <?php } elseif ( $type == "custom" ) { // Title link to external page

                    $use_target = $target ? $target : '_self';  // If no target set, use self

                    ?>
                    <header>
                      <h3 class="card-title text-center checkScrollHeightOverflow">
                        <a href="<?php echo $custom; ?>" target="<?php echo $use_target; ?>">
                          <?php echo $card_title ?></a>
                      </h3>
                    </header>
                  <?php } else { // No link
                    ?>
                    <header>
                      <h3 class="card-title text-center checkScrollHeightOverflow">
                        <?php echo $card_title ?>
                      </h3>
                    </header>
                  <?php } ?>
                <?php } else {
                  // Heading appears on top of image
                } ?>

              <div class="card-summary card-text align-self-center">
                <p class="text-center"><?php echo $card_text ?></p>
              </div>
              <footer>
                <div class="d-flex justify-content-center align-self-center">
                  <?php if ( $toggle ) {
                    if ($button) { // display linked button

                      if ($type == "internal") {

                        $use_target = $target ? $target : '_self';  // If no target set, use self
                        ?>

                        <a class="<?php echo $style; ?> internal" href="<?php echo $internal; ?>"
                           role="button" target="<?php echo $use_target; ?>"><?php echo $button; ?></a>

                      <?php } elseif ($type == "custom") {

                        $use_target = $target ? $target : '_self';  // If no target set, use self
                        ?>

                        <a class="<?php echo $style; ?> external" href="<?php echo $custom; ?>"
                           role="button" target="<?php echo $use_target; ?>"><?php echo $button; ?></a>

                      <?php } else {
                        // no link
                      }
                    } else {
                      // no button
                    }
                  } else {
                    // toggle off
                  } ?>
                </div>
              </footer>
            </div> <!-- /.card-block -->
          </div> <!-- .card -->
        </div> <!-- /.col -->

      <?php  endwhile; ?>
      </div> <!-- .card-group -->
      </div> <!-- .row -->

    <?php else : ?>
      <?php // no rows found ?>
    <?php endif; // assemble_card ?>