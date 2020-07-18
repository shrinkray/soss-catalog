<?php
/**
 * Template for SOSS Distributors page
 */

?>
<div class="row">
  <?php the_field( 'intro_field' ); ?>
</div>

<div class="drawing-grid">

<?php
if ( have_rows( 'add_distributor' ) ) : ?>
  <?php while ( have_rows( 'add_distributor' ) ) : the_row(); ?>

    <?php
    // vars
    $name = get_sub_field( 'distributor_name' );
    $url = get_sub_field( 'distributor_link' );

    $title = get_sub_field( 'link_title' );
    $image = get_sub_field( 'distributor_logo' );
    $pic = wp_get_attachment_image($image, 'thumbnail', false, $attr = array('class' => 'img-fluid  '));

    $parse = parse_url($url); // http://php.net/manual/en/function.parse-url.php
    $domain = $parse['host']; // returns domain name



    ?>

    <div class="row">

<!--        <div class="col">-->
<!--          <div class="dist-logo">-->
<!--            --><?php //if ( $image ) { ?>
<!--              --><?php //echo $pic; ?>
<!--            --><?php //}  ?>
<!--          </div>-->
<!--        </div>-->
        <div class="col-sm-3">
          <a href="<?php echo $url; ?>" title="<?php echo 'View ' . $name . ' -- ' . $title . ' | ' . $domain; ?>" class="" target="_blank"><?php echo $name; ?></a>
        </div>

        <div class="col-sm-9 file-listing">
          <span class="dist-text"></span>
        </div>

    </div>

  <?php endwhile; ?>
<?php else : ?>
  <?php // no rows found ?>
<?php endif; ?>

</div>
