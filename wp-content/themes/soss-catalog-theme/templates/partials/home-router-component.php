<?php
  declare( strict_types=1 );
  /**
   * Router Component
   * @description: Hinges or Handles buttons
   * @author gmiller
   * @date: 6/21/2021
   */




  $section_title = get_sub_field( 'section_title' ); ?>

<?php
if ( $section_title ) { ?>
  <div class="row row-break mt-4">
    <div class="col">

      <div class="block-title">
        <h2 class=""><?php echo  $section_title ?></h2>
      </div>

    </div>
  </div>
<?php }

$left_title = get_sub_field('left_channel_title');
$right_title = get_sub_field('right_channel_title');
$left_link = get_sub_field( 'left_channel_link' );
$right_link = get_sub_field( 'right_channel_link' );
$left_image = get_sub_field( 'left_channel_image' );
$right_image = get_sub_field( 'right_channel_image' );
$left_label = get_sub_field( 'left_button_name' );
$right_label = get_sub_field( 'right_button_name' );

$right_pic = wp_get_attachment_image($right_image, 'router_image', false, $attr = ['class' => 'align-self-center right-router']);
$left_pic = wp_get_attachment_image($left_image, 'router_image', false, $attr = ['class' => 'align-self-center left-router']); ?>


<div class="router-container block mb-4 ">


  <div class="row">

    <div class="col-sm-6">

      <div class="image img_item item-2  overflow">
        <?php if ( $left_link ) { ?>
          <a href="<?php echo $left_link; ?>" class="overlay" >
            <?php if ( !empty( $left_image ) ) {

              echo $left_pic;


            } ?>
            <div id="left_middle" class="middle">
              <div class="text">
                <?php echo $left_label; ?>
              </div>
            </div>
          </a>
        <?php } ?>

        <div class="label">
          <?php if ( $left_link ) { ?>
            <a href="<?php echo $left_link; ?>">
              <h4><?php echo $left_title; ?></h4>
            </a>
          <?php } ?>

        </div>
      </div>

    </div>

    <div class="col-sm-6">

      <?php //if ( !empty( $right_image ) ) {



    //  } ?>

      <div class="image img_item item-2 overflow">
        <?php if ( $right_link ) { ?>
          <a href="<?php echo $right_link; ?>" class="overlay">
            <?php echo $right_pic;  ?>

            <div id="right_middle" class="middle">
              <div class="text">
                <?php echo $right_label; ?>
              </div>
            </div>
          </a>
        <?php } ?>

        <div class="label">
          <?php if ( $right_link ) { ?>
            <a href="<?php echo $right_link; ?>">
              <h4><?php echo $right_title; ?></h4>
            </a>
          <?php } ?>

        </div>
      </div>
    </div>

  </div>
</div>
