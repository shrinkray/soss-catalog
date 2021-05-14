<?php
  /**
   * Social Promotion Builder
   * @description: sets one media property from a list. User sets one and label on button. The template applies icon,
   * property name, button label, alt text, title, and sets button label text.
   * @author gmiller
   * @date: 5/13/2021
   */

  $select_property = get_sub_field('select_from_list_of_properties');
  $follow_label = get_sub_field('add_follow_words');
  $i_prop = '@SOSSD';
  $f_prop = 'SOSS Door Hardware';
  $l_prop = 'SOSS Door Hardware';
  $t_prop = '@SOSSDoors';

?>
<div class="break-out">
  <div class="container">
  <div class="row">
    <div class="col d-flex justify-content-center my-3">
      <div class="push d-flex  align-items-center">

<?php

  switch ( $select_property ) {
    case 'insta':
      ?>

        <i class="fa fa-instagram fa-2x"></i>
        <span class="property "><?= $i_prop; ?></span>
        <a href="" class="btn btn-primary cta-brand" title="" target="_blank"><?=  $follow_label; ?></a>

      <?php
      break;
    case 'face':
      ?>

        <i class="fa fa-facebook-square fa-2x"></i>
        <span class="$font-size-base"><?= $f_prop; ?></span>
        <a href="https://www.facebook.com/SOSS-Door-Hardware-254546971278920/"
           class="btn btn-primary cta-brand" title="" target="_blank" ><?= $follow_label; ?></a>

      <?php
      break;
    case 'link':
      ?>
      <i class="fa fa-linkedin-square fa-2x"></i>
      <span class="$font-size-base"><?= $l_prop; ?></span>
      <a href="https://www.linkedin.com/company/soss-door-hardware/"
         class="btn btn-primary cta-brand" title="" target="_blank"><?= $follow_label; ?></a>


      <?php
      break;
    case 'tweet':
      ?>
      <i class="fa fa-twitter-square fa-2x"></i>
      <span class="$font-size-base"><?= $t_prop; ?></span>
      <a href="https://twitter.com/SOSSDoors"
         class="btn btn-primary cta-brand" title="" target="_blank"><?= $follow_label; ?></a>


      <?php
      break;
  }
?>
      </div>
    </div>
    </div>
  </div>
</div>

<?php
?>



<?php // end Row Layout

