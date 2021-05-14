
<?php
 // include("modules/calculator.php");

  /**
 * Product Overview Template
 */

 $video =  get_field('add_a_video');

 // TODO: REMOVE this script?
  // <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

?>
<?php if ( $video )  : ?>
<div class="row row-break justify-content-center no-gutter">
  <div class="col-12 col-md-8 px-0">
    <div class="embed-container">
        <div class="embed"><?php echo $video; ?></div>
    </div>
  </div>
</div>
<?php else : ?>
       <i class="fa fa-youtube-play"></i> No video displayed
      <?php endif; ?>


<?php // Flexible Sections

 if ( have_rows( 'flexible_layout' ) ):  ?>

  <?php while ( have_rows( 'flexible_layout' ) ) : the_row(); ?>

     <?php if ( get_row_layout() == 'hinge_calculator' ) :

       $label = get_sub_field( 'name_on_button' );
      $description = get_sub_field( 'description' );

       ?>

       <div class="accordion" id="myAccordion">

         <div class="row callout" id="calcRow">
           <div class="col-md-4 offset-md-2 d-flex py-2 align-items-center justify-content-center" >
             <button id="show_calc_form" type="button" class="btn btn-primary cta-brand" data-toggle="collapse" data-target="#formRow" aria-expanded="true">
               <?php echo $label; ?>
             </button>
           </div>

           <div class="col-md-4 d-flex flex-column justify-content-center my-2">

             <?php echo $description; ?>

           </div>

         </div>

<!--   NOTE: Remove class show (below) so row collapses      -->

         <div id="formRow" class="collapse row" labelledby="calcRow" aria-labelledby="calcRow" data-parent="#calcRow" >

           <div class="col-md-12">
             <?php include ( "modules/soss-hinge-calculator.php" ); ?>
           </div>

         </div>

       </div>





     <?php elseif ( get_row_layout() == 'image_with_content' ) : // image (left or right) with content


       $image_layout = get_sub_field( 'image_placement' );
       $section = get_sub_field( 'section_heading' );
       $image_p = get_sub_field( 'add_portrait' );
       $image_l = get_sub_field( 'add_landscape' );
       $pic_p = wp_get_attachment_image($image_p, 'overview_portrait', false, $attr = ['class' => 'align-self-center']);
       $pic_l = wp_get_attachment_image($image_l, 'overview_landscape', false, $attr = ['class' => 'align-self-center']);

?>
<div class="row row-break">
<?php
       if (  $image_layout  == 'left' ) {

       ?>
         <!-- Layout A IMAGE LEFT TEXT RIGHT -->


         <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end mb-5">

             <?php if ( $image_p ) {

                echo $pic_p;

              }

              if ( $image_l ) {

                 echo $pic_l;

              } ?>

         </div>

        <div class="col-sm-12 col-md-5 ">
             <?php

         if ( have_rows( 'mix_content' ) ): // text & button ?>

           <?php while ( have_rows( 'mix_content' ) ) : the_row(); ?>


           <?php
             if ( get_row_layout() == 'add_text' ) :

               $add_text = get_sub_field( 'add_text_content' ); ?>

               <?php echo $add_text; ?>

                <?php elseif ( get_row_layout() == 'build_a_button' ) : // button builder ?>

                 <?php include "partials/build-button-part.php"; ?>

              <?php endif; ?>


           <?php endwhile; // mix_content ?>

         <?php else:  // --- no layouts found ?>

         <?php endif; // mix_content ?>

        </div>

    <?php  } else {

         ?>
         <!-- Layout B IMAGE RIGHT TEXT LEFT -->

         <div class="col-sm-12 col-md-6 order-md-2 d-flex justify-content-center justify-content-md-start mb-5">

           <?php if ( $image_p ) {

             echo $pic_p;

           }

           if ( $image_l ) {

             echo $pic_l;

           } ?>

         </div>

         <div class="col-sm-12 col-md-5 order-md-1 offset-md-1">
           <?php

           if ( have_rows( 'mix_content' ) ): // text & button ?>

             <?php while ( have_rows( 'mix_content' ) ) : the_row(); ?>

               <?php if ( get_row_layout() == 'build_a_button' ) : // button builder ?>

                 <?php include "partials/build-button-part.php"; ?>

               <?php elseif ( get_row_layout() == 'add_text' ) :

                   $add_text = get_sub_field( 'add_text_content' ); ?>

                   <?php echo $add_text; ?>

                 <?php endif;
                ?>


             <?php endwhile; // mix_content ?>

           <?php else:  // --- no layouts found ?>

           <?php endif; // mix_content ?>

         </div>


         <?php

       }?>
</div>

    <?php endif; // image_with_content ?>

  <?php endwhile; // flex layout ?>

<?php else:  // --- no layouts found ?>

<?php endif; // flex layout ?>
 <!-- /.row -->
<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"></h3>
        <button type="button" class="close" tabindex="-1" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php // include ( "modules/soss-hinge-selector.php" ); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="close" tabindex="-1" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">close this panel</span>
        </button>
      </div>
    </div>
  </div>
</div>

