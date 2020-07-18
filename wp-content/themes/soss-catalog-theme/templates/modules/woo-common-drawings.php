


<?php

/**
 *
 *  Hard coded
 *  4/23/18 GRM
 *
 *  9/13/2018 Converted some file names to variable names for more consistency in code.
 *  TODO: write as CPT
 */

/**
 *  User selects which common files they want to add to the product. 
 */
 // vars
    $common = get_field( 'common_drawings' );
    $upload_dir = wp_upload_dir();
    $base_url = $upload_dir['baseurl'];
    $sub_folder = "/product_drawings/";


    if ( $common ) { // Timesaver: if common hinge files are selected
       ?>

<?php // common_drawings ( value )
$common_drawings_array = get_field( 'common_drawings' );
if ( $common_drawings_array ):
  foreach ( $common_drawings_array as $common_drawings_item ):


switch ($common_drawings_item) {

  case "sizechart" :

    $dxfFile = "";
    $dwgFile = "";
    $pdfFile = "hinge_sizing_chart_2018.pdf";



    ?>




    <div class="row">
      <div class="col-sm-8 file-listing">
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>" title="View Hinge Sizing Chart" class="align-self-center" target="_blank">Hinge Sizing Chart</a>
        &nbsp;<span class="pdf">PDF</span>
        <span class="filesize">&nbsp;(49.58 KB)</span>
      </div>

      <div class="col-sm-4 file-actions">
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>" title="View Hinge Sizing Chart" class="btn btn-primary btn-xs align-self-center" target="_blank">View</a>&nbsp;
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>" title="Click here to download" class="download" download="<?php echo $pdfFile; ?>">Download</a>
      </div>
    </div>

    <?php
    break;

  case "nintydeg":

        $drawingNum = "1";
        $drawingTitle = "90 Degree Open";
        $svgFile = "90_degree_open.dxf.svg";
        $svgAlt = "";
        $dxfFile = "3900-SKT2.dxf";
        $dwgFile = "3900-SKT2.dwg";
        $pdfFile = "90_degree_open.pdf";
        ?>

    <div class="row">
      <div class="col-sm-8 file-listing"><button title="View <?php echo $drawingTitle; ?>" class="linkified" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>"><?php echo $drawingTitle; ?></button>
        &nbsp;<span class="dwg">DWG</span>
        <span class="filesize">&nbsp;(174.83 KB)</span>
      </div>

      <div class="col-sm-4 file-actions">
        <button type="button" title="View <?php echo $drawingTitle; ?>" class="btn btn-primary btn-xs align-self-center" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>">View</button>&nbsp;
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $svgFile; ?>" class="download" title="Click here to download" download="<?php echo $dwgFile; ?>">Download</a>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-8 file-listing"><button title="View <?php echo $drawingTitle; ?>" class="linkified" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>"><?php echo $drawingTitle; ?></button>
        &nbsp;<span class="dxf">DXF</span>
        <span class="filesize">&nbsp;(603.38 KB)</span>
      </div>

      <div class="col-sm-4 file-actions">
        <button type="button" title="View <?php echo $drawingTitle; ?>" class="btn btn-primary btn-xs align-self-center" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>">View</button>&nbsp;
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $dxfFile; ?>" class="download" title="Click here to download" download="<?php echo $dxfFile; ?>">Download</a>
      </div>
    </div>

    <!-- Modal -->
  <?php include('drawing-modal.php'); ?>


    <div class="row">
      <div class="col-sm-8 file-listing">
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>" title="View 90 Degree Open" class="align-self-center" target="_blank">90 degree Open</a>
        &nbsp;<span class="pdf">PDF</span>
        <span class="filesize">&nbsp;(20.81 KB)</span>
      </div>

      <div class="col-sm-4 file-actions">
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>" title="View 90 Degree Open" class="btn btn-primary btn-xs align-self-center" target="_blank">View</a>&nbsp;
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>" title="Click here to download" class="download" download="<?php echo $pdfFile; ?>">Download</a>
      </div>
    </div>

    <?php
  break;

  case "jambdetail" :

        $drawingNum = "2";
        $drawingTitle = "Cased Jamb Detail";
        $svgFile = "cased_jamb_detail.svg";
        $svgAlt = "";
        $dxfFile = "Cased_Jamb_Detail.dxf";
        $dwgFile = "Cased_Jamb_Detail.dwg";
        $pdfFile = "cased_jamb_detail.pdf";
    ?>


    <div class="row">
      <div class="col-sm-8 file-listing"><button title="View <?php echo $drawingTitle; ?>" class="linkified" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>"><?php echo $drawingTitle; ?></button>
        &nbsp;<span class="dwg">DWG</span>
        <span class="filesize">&nbsp;(222.12 KB)</span>
      </div>

      <div class="col-sm-4 file-actions">
        <button type="button" title="View <?php echo $drawingTitle; ?>" class="btn btn-primary btn-xs align-self-center" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>">View</button>&nbsp;
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $dwgFile; ?>" class="download" title="Click here to download" download="<?php echo $dwgFile; ?>">Download</a>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-8 file-listing"><button title="View <?php echo $drawingTitle; ?>" class="linkified" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>"><?php echo $drawingTitle; ?></button>
        &nbsp;<span class="dxf">DXF</span>
        <span class="filesize">&nbsp;(603.38 KB)</span>
      </div>

      <div class="col-sm-4 file-actions">
        <button type="button" title="View <?php echo $drawingTitle; ?>" class="btn btn-primary btn-xs align-self-center" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>">View</button>&nbsp;
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $dxfFile; ?>" class="download" title="Click here to download" download="<?php echo $dxfFile; ?>">Download</a>
      </div>
    </div>

    <!-- Modal -->
    <?php include('drawing-modal.php'); ?>


    <div class="row">
      <div class="col-sm-8 file-listing">
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>" title="Cased Jamb Detail" class="align-self-center" target="_blank">Cased Jamb Detail</a>
        &nbsp;<span class="pdf">PDF</span>
        <span class="filesize">&nbsp;(79.95 KB)</span>
      </div>

      <div class="col-sm-4 file-actions">
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>"  title="Cased Jamb Detail" class="btn btn-primary btn-xs align-self-center" target="_blank">View</a>&nbsp;
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>" title="Click here to download" class="download" download="<?php echo $pdfFile; ?>">Download</a>
      </div>
    </div>


    <?php
    break;
  case "clearance" :
        $drawingNum = "3";
        $drawingTitle = "Clearance Detail";
        $svgFile = "open_clearance_detail.svg";
        $svgAlt = "";
        $dxfFile = "4477-Clearance_Detail.dxf";
        $dwgFile = "4477-Clearance_Detail.dwg";
        $pdfFile = "open_clearance_detail.pdf";
    ?>

    <div class="row">
      <div class="col-sm-8 file-listing"><button title="View <?php echo $drawingTitle; ?>" class="linkified" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>"><?php echo $drawingTitle; ?></button>
        &nbsp;<span class="dwg">DWG</span>
        <span class="filesize">&nbsp;(581.64 KB)</span>
      </div>

      <div class="col-sm-4 file-actions">
        <button type="button" title="View <?php echo $drawingTitle; ?>" class="btn btn-primary btn-xs align-self-center" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>">View</button>&nbsp;
        <a href="/wp-content/uploads/product_drawings/<?php echo $dwgFile; ?>" class="download" title="Click here to download" download="<?php echo $dwgFile; ?>">Download</a>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-8 file-listing"><button title="View <?php echo $drawingTitle; ?>" class="linkified" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>"><?php echo $drawingTitle; ?></button>
        &nbsp;<span class="dxf">DXF</span>
        <span class="filesize">&nbsp;(2.10 MB)</span>
      </div>

      <div class="col-sm-4 file-actions">
        <button type="button" title="View <?php echo $drawingTitle; ?>" class="btn btn-primary btn-xs align-self-center" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>">View</button>&nbsp;
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $dxfFile; ?>" class="download" title="Click here to download" download="<?php echo $dxfFile; ?>">Download</a>
      </div>
    </div>


    <!-- Modal -->
    <?php include('drawing-modal.php'); ?>


    <div class="row">
      <div class="col-sm-8 file-listing">
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>" title="View Clearance Detail" class="align-self-center" target="_blank">Clearance Detail</a>
        &nbsp;<span class="pdf">PDF</span>
        <span class="filesize">&nbsp;(79.95 KB)</span>
      </div>

      <div class="col-sm-4 file-actions">
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>" title="View Clearance Detail" class="btn btn-primary btn-xs align-self-center" target="_blank">View</a>&nbsp;
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>" title="Click here to download" class="download" download="<?php echo $pdfFile; ?>">Download</a>
      </div>
    </div>

    <?php
    break;

  case "hingeloc" :

        $drawingNum = "4";
        $drawingTitle = "Hinge Location";
        $svgFile = "hinge_location.svg";
        $svgAlt = "";
        $dxfFile = "Hinge_Location.dxf";
        $dwgFile = "Hinge_Location.dwg";
        $pdfFile = "hinge_location.pdf";
    ?>

    <div class="row">
      <div class="col-sm-8 file-listing"><button title="View <?php echo $drawingTitle; ?>" class="linkified" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>"><?php echo $drawingTitle; ?></button>
        &nbsp;<span class="dwg">DWG</span>
        <span class="filesize">&nbsp;(125.51 KB)</span>
      </div>

      <div class="col-sm-4 file-actions">
        <button type="button" title="View <?php echo $drawingTitle; ?>" class="btn btn-primary btn-xs align-self-center" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>">View</button>&nbsp;
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $dwgFile; ?>" class="download" title="Click here to download" download="<?php echo $dwgFile; ?>">Download</a>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-8 file-listing"><button title="View <?php echo $drawingTitle; ?>" class="linkified" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>"><?php echo $drawingTitle; ?></button>
        &nbsp;<span class="dxf">DXF</span>
        <span class="filesize">&nbsp;(480.29 KB)</span>
      </div>

      <div class="col-sm-4 file-actions">
        <button type="button" title="View <?php echo $drawingTitle; ?>" class="btn btn-primary btn-xs align-self-center" data-toggle="modal" data-target="#Modal<?php echo $drawingNum; ?>">View</button>&nbsp;
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $dxfFile; ?>" class="download" title="Click here to download" download="<?php echo $dxfFile; ?>">Download</a>
      </div>
    </div>


    <!-- Modal -->
    <?php include('drawing-modal.php'); ?>


    <div class="row">
      <div class="col-sm-8 file-listing">
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>" title="View hinge location" class="align-self-center" target="_blank">Hinge Location</a>
        &nbsp;<span class="pdf">PDF</span>
        <span class="filesize">&nbsp;(49.58 KB)</span>
      </div>

      <div class="col-sm-4 file-actions">
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>" title="View Hinge Location" class="btn btn-primary btn-xs align-self-center" target="_blank">View</a>&nbsp;
        <a href="<?php echo $base_url . $sub_folder; ?><?php echo $pdfFile; ?>" title="Click here to download" class="download" download="<?php echo $pdfFile; ?>">Download</a>
      </div>
    </div>

    <?php
    break;
}
  endforeach; ?>


 <?php
endif; ?>

  <?php } ?>