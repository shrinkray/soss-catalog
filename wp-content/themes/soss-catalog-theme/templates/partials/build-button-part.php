<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 3/17/18
 * Time: 8:34 AM
 */









 if ( have_rows( 'add_button' ) ) :

?>

   <ul class="p-0">

<?php

    while ( have_rows( 'add_button' ) ) : the_row(); // internal or external link

      $internal_link = get_sub_field( 'internal_link' );
      $btn_ext_link = get_sub_field( 'button_link' );
      $btn_int_link = get_sub_field( 'button_link_internal' );
      $label = get_sub_field( 'button_label' );
      ?>


        <?php if ( $internal_link ) { ?>

          <li class="d-flex mb-2">
            <a href="<?php echo $btn_int_link; ?>" class="cta-brand btn mx-auto" target=""><?php echo $label; ?></a>
          </li>

          <?php

        } else {

          ?>

          <div class="d-flex mb-2">
            <a href="<?php echo $btn_ext_link; ?>" class="cta-brand btn mx-auto" target="_blank"><?php echo $label; ?></a>
          </div>

          <?php

        } ?>


    <?php endwhile; // links  ?>
      </ul>



  <?php else : // --- no rows found ?>

  <?php endif; // add_button ?>



