<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 2/26/18
 * Time: 1:33 PM
 *
 * ACF setup with sliding scale to select number of buttons.
 *
 * If() decision sets a column variable for the desktop, based on maximum number of columns.
 */


$buttons = get_sub_field( 'number_buttons' ); // set by Range, with Flex content, could not determine number using count

    if ( have_rows( 'button_builder' ) ) :
?>

        <div class="row mt-5">

      <?php
              $i = 1; // simple increment

        while ( have_rows( 'button_builder' ) ) : the_row();
        // vars
              $button_label = get_sub_field('add_a_button');
              $link = get_sub_field('button_link');


              if ( $buttons == 2 ) :
                $lg = "6";
                $md = "6";
              elseif ( $buttons == 3 ) :
                $lg = "4";
                $md = "4";
              elseif ( $buttons == 4 ) :
                $lg = "3";
                $md = "6";
              endif;
              
          ?>


          <div class="item col-12 col-md-<?php echo $md; ?> col-lg-<?php echo $lg; ?> mb-2">
            <div class="max-height">
              <a href="<?php echo $link; ?>" alt="" ><h3
                    class="focalRow__link item"><?php echo $button_label ?></h3></a>
            </div>
          </div>

        <?php


        endwhile; ?>
        <?php else : ?>
          <?php // no rows found ?>
        <?php  endif; // button_builder  ?>
      </div>