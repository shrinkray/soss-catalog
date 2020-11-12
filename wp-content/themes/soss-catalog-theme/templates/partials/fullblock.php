<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 2/26/18
 * Time: 1:35 PM
 */

$full_row = get_sub_field( 'full_row_block' );
$section_title = get_sub_field( 'section_title' );
$wysiwyg = get_sub_field( 'text_block' );
$break_block = get_sub_field( 'break_block' );
$background = get_sub_field( 'background_options' );
$pallet = get_sub_field( 'theme_pallet' );
$pattern = get_sub_field( 'theme_pattern' );
$credit = get_sub_field( 'credited_to' );
$bg_image = get_sub_field( 'background_pattern' );

if ( $full_row  == 'media' ) { ?>

  <?php if ( $section_title ) { ?>
    <div class="row">
      <div class="col">
        <div class="block-title">
          <h2><?php echo $section_title; ?></h2>
        </div>
      </div>
    </div>
  <?php } else {
    // don't display a title row
  }
  ?>

  <div class="row">
    <div class="col">

      <div class="standard-block block">

        <div class="block">
          <?php echo $wysiwyg; ?>
        </div>

      </div> <!-- .standard-block -->
    </div>
  </div>

<?php } else { ?>

  <div class="row align-items-center">
    <div class="col">
      <div class="break-block block" data-image-src="">

        <blockquote class="text-center"><?php echo $break_block; ?></blockquote>

        <?php if ( $credit ) { // display only if the quotation has an author
          ?>
          <div class="credit">&mdash;&nbsp;<?php echo $credit; ?></div>
        <?php } else {
          // do nothing
        } ?>


      </div> <!-- .standard-block -->
    </div>
  </div>

<?php } ?>
