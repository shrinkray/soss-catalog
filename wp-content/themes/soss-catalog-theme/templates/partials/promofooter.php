<?php
/**
 * Created by PhpStorm.
 * User: gmiller
 * Date: 2/26/18
 * Time: 1:37 PM
 */

if (!($invitation == "3")) { ?>

  <div class="cta-newsletter cta-news py-4" >
    <div class="container">
      <div class="row">
        <?php if ($invitation == "1") { // invitation form ?>

          <div class="col-sm-10 offset-sm-1  ">


            <div class="row">

              <?php

              $promo_card = get_field('promo_card', 'option');
              $welcome = get_field('welcome_message', 'option');
              $label = get_field('form_label', 'option');
              $placeholder = get_field('placeholder', 'option');
              $submit = get_field('button_name', 'option');
              $style = get_field('button_style', 'option');
              $email_help = get_field('email_help_message', 'option');


              ?>


              <?php if ($promo_card) { ?>

                <div class="col-12 col-sm-6 col-lg-3">

                  <div class="deals" aria-hidden="false">



                    <?php
                    $deal_msg = get_field('short_heading', 'option');

                    if ($deal_msg) { ?>

                      <h5 class="subheading"><?php echo $deal_msg; ?></h5>

                    <?php } ?>

                    <?php
                    $link = get_field( 'add_link', 'option' );
                    $link_name = get_field('link_name', 'option' );

                    if ($link) { ?>
                      <a href="<?php echo $link; ?>" class="promotion-link"><?php echo $link_name; ?></a>
                    <?php } ?>



                  </div><!-- /.deals -->

                </div>

              <?php } ?>


              <?php if ($welcome) { ?>

                <div class="col-12 col-sm-6 col-lg-3">

                  <div class="targeted-message">
                    <?php echo $welcome; ?>
                  </div>

                </div>

              <?php } ?>


              <div class="d-flex col-12 col-md-auto col-lg-6 form-group row no-gutters ">

                <?php
                gravity_form(1, $display_title = false, $display_description = false, $display_inactive = false,
                    $field_values = null, $ajax = false, $tabindex, $echo = true);
                ?>

                <div class="col-12 text-sm-center text-lg-left text-muted">
                  <?= $email_help ?>
                </div>
              </div>

            </div> <!-- /.row -->
          </div>

        <?php } // end invitation 1
        else {  // start Keep background but remove form ?>

          <div class="col-sm-10 offset-sm-1  ">


            <div class="">

              <?php

              $promo_card = get_field('promo_card', 'option');
              $welcome = get_field('welcome_message', 'option');

              $email_help = get_field('email_help_message', 'option');
              $message = get_field( 'footer_message', 'option' );


              ?>


              <?php if ($promo_card) { ?>

                <div class="col-12 col-sm-6 col-lg-3">

                  <div class="deals" aria-hidden="false">



                    <?php
                    $deal_msg = get_field('short_heading', 'option');

                    if ($deal_msg) { ?>

                      <h5 class="subheading"><?php echo $deal_msg; ?></h5>

                    <?php } ?>

                    <?php
                    $link = get_field( 'add_link', 'option' );
                    $link_name = get_field('link_name', 'option' );

                    if ($link) { ?>
                      <a href="<?php echo $link; ?>" class="promotion-link"><?php echo $link_name; ?></a>
                    <?php } ?>



                  </div><!-- /.deals -->

                </div>

              <?php } ?>


              <?php if ($welcome) { ?>

                <div class="col-12 col-sm-6 col-lg-3">

                  <div class="targeted-message">
                    <?php echo $welcome; ?>
                  </div>

                </div>

              <?php } ?>


              <div class="d-flex col-12 col-md-auto col-lg-6 form-group row no-gutters ">

                <?php echo $message; ?>

              </div>

            </div> <!-- /.row -->
          </div>


          <?php


        } // invitation 2 ?>

      </div>
    </div> <!-- /.row -->
  </div>

<?php } ?>