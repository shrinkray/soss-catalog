<?php

/**
 * Customized Login Actions
 */


function loginlogo() { // TODO use brand colors if possible

  echo "<style type=\"text/css\">
    .login h1 a {
      background-image: url('" . get_template_directory_uri() . "/dist/login.svg');
      width:320px;height:155px; 
      background-size:200px 155px;
      background-position: center center;
      margin-bottom: 0;
    }
    .login #nav {
      text-align: center;
      
    }
    #backtoblog {
      text-align: center;
      color: #008EC2 !important;
    }
    #backtoblog a { 
      color: #cd3327 !important;
      font-weight: 700;
      font-size: 1rem;
    }
   .wp-core-ui .button-primary {
    background: #cd3327;
    border-color: #832119;
    box-shadow: 0 1px 0 #832119;
    text-shadow: 0 -1px 1px #832119, 
    1px 0 1px #832119, 
    0 1px 1px #832119, 
    -1px 0 1px #832119;
    }
    .wp-core-ui .button-primary:hover {
    background: #832119;
    }
  </style>";

}
add_action('login_head', 'loginlogo');

function greg_loginURL() {
  return 'https://www.soss.com';
}
add_filter('login_headerurl', 'greg_loginURL');

function greg_loginURLtext() {
  return 'SOSS® UltraLatch is an innovative and ADA awarded door hardware with fire rating and a broad range of metallic finishes.';
}
add_filter('login_headertitle', 'greg_loginURLtext');

function greg_loginfooter() { ?>
  <p style="text-align: center; margin-top: 1em; color: #b4b4b4;">
    If you would like a cool site like this, <a style="color: rgba(238,64,11,0.52); text-decoration:
    none;" href="https://gregmiller.io/contact/">ask for Greg</a>.
  </p>

<?php }
add_action('login_footer','greg_loginfooter');

