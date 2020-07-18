<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>


  <?php
  /**
   * Comparison adds script if site URL is same as production URL
   *
   * @returns inline script
   */

  $site_url = get_site_url();
  $prod_url = 'https://www.soss.com';

  if ( $site_url === $prod_url ) {   ?>

  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-671633-51"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-671633-51');
  </script>

  <?php
  }     ?>


</head>
