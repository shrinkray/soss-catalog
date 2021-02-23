/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */


// Added for later (Note: this is drawing from node_modules, very cool)
// import { TweenMax, ScrollToPlugin } from "gsap/TweenMax";
// Setup GSAP for website
import { gsap } from "gsap";
import { CSSRulePlugin } from "gsap/CSSRulePlugin";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { CustomEase } from "gsap/CustomEase";
import { Flip } from "gsap/Flip";

gsap.registerPlugin(CSSRulePlugin, ScrollToPlugin, CustomEase, Flip);


(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  let Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages

        // Add Alt info to to MegaMenu Logo Image
        $('.mega-menu-logo > img:not([alt])').attr('alt', 'SOSS');

        // Background Image Break Box

        // $(".break-block").css('background', function () {
        //   let bgBreak = (
        //       'linear-gradient(rgba(255,255,255,1) 0%, rgba(255,255,255,0.2) 30%, rgba(255,255,255,0.2) 70%, rgba(255,255,255,1)) 100%, ' +
        //    //   'linear-gradient(rgba(247,247,247,0.2) 0%, rgba(247,247,247,0.2)  100%, ' +
        //   'url(' + $(this).data("image-src") + ') rgba(237,237,237,0.8) repeat center center'
        //   );
        //   return bgBreak;
        // });




        // when button navbar-toggler is clicked, check for open class.
        // If it exists, replace class with a close class otherwise apply the open class

        $('.navbar-toggler').click (function(){
          if ($('.mega-menu-toggle').hasClass('mega-menu-open')) {
            $('.mega-menu-toggle').removeClass('mega-menu-open').addClass('mega-menu-close');
          } else if ($('.mega-menu-toggle').hasClass('mega-menu-close')) {
            $('.mega-menu-toggle').removeClass('mega-menu-close').addClass('mega-menu-open');
          }
        });


        // Back to top Script

        // show or hide the sticky 'return to top' button
        $(window).scroll(function () {
          if ($(this).scrollTop() > 200) {
            $('.go-top').fadeIn(200);
          } else {
            $('.go-top').fadeOut(200);
          }
        });

        // Animate to scroll to top
        $('.go-top').click(function (event) {
          event.preventDefault();

          $('html, body').animate({scrollTop: 0}, 400);
        });

        // Product Overview Calculator Button
        // Slide page up on accordion click event so form is not hidden
        // var adjustDist is calculated height with a multiplier.

          $('#show_calc_form').click(function (event) {
            event.preventDefault();
            var accPos = $( '#show_calc_form').offset().top;

            $('html, body').animate({ scrollTop:  accPos }, 1000);

          });


      // Background Image for Diagonal Rows
        $(".cta-diagonal").css('background', function () {
          let bg = ('url(' + $(this).data("image-src") + ') no-repeat 100% center');
          // console.log ( bg );
          return bg;
        });

        // Using javascript to add interest on hover in and out for ROUTER of Flexible Page Layouts
        // GRM 5/12/2019

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired

        $('.af-form').find('.af-fields').addClass('d-flex');

      } // closing
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page


        const tl = gsap.timeline({ paused: false });
        const pointer = document.querySelector('.down-angle');
        const slider = document.querySelector(".new-revslider");
        const sliderHeight = slider.offsetHeight;
        const windowHeight = window.innerHeight;
        const windowDiff = windowHeight - sliderHeight;

    // TODO: create a function to add and remove class wobble to the pointer target

        // Scrolldown function
        pointer.addEventListener("click", () => {
            tl.to(window, { duration: 2, scrollTo: sliderHeight, ease: 'power4.out' });
          });

        tl
          .set(
          ".open-up, .dont-settle, .cta, .down-angle", { opacity: 0 }
          )
          .fromTo( ".open-up", { x: -200, opacity: 0, duration: 1 }, { x: 0, opacity: 1 }
          )
          .fromTo(
            ".dont-settle",
            { opacity: 0, x: 300, duration: 0.5 },
            { x: 0, opacity: 1 },
            "-=.2"
          )
          .fromTo(
            ".cta",
            { opacity: 0, scale: 1, force3D: true, transformPerspective:400, rotationY: 100},
            { opacity: 1, scale: 1, rotationY: 360, duration: 1.1, ease: "elastic" },
            "-=1.0"
          )
          .fromTo(
            ".my-hinge",
            { scale: 0.6, opacity: 0, rotation: 60 },
            { opacity: 1, scale: 1.0,  duration: 1, rotation: 0 },
            "-=0.1"
          )
          .fromTo(
            ".down-angle",
            { opacity: 0, y: 300  },
            { opacity: 1, y: 0, duration: 2, ease: "elastic" },
            "+=0.1"
          ).fromTo(
          ".down-angle",
          { delay: 0.5, scale: 1, force3D: true, transformPerspective:300 },
          { rotationY: 180, duration: 2, ease: "power4.in" },
          "+=1"
        );



      }, // end init funtion
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },

     // Overview page
    'invisible_hinge_product_overview': {

      init: function() {
        // JavaScript to be fired on the Overview page


      },
      finalize: function() {
        // JavaScript to be fired on the Overview page, after the init JS
        document.ready(function() {


        });
      }
    },

    //WooCommerce
    'woocommerce': {
      init: function() {
        // JavaScript to be fired on the woocommerce page
      //BEGINNING


        $(document).ready(function($) {

          // Card #321 Invoice 202
          // GRM 9/4/2019

          // when the button is selected, call animation and active scripts
          $(".jump-to-tab").click( function(e) {

            let id = $(this).attr('href'),
                // Tabs
                overview = "#tab-title-description",
                dimensions = "#tab-title-dimensions",
                drawings = "#tab-title-drawings",
                documents = "#tab-title-documents",
                video = "#tab-title-video",
                specs = "#tab-title-specs",
                // Panels
                viewsWc = "#tab-description",
                dimsWc = "#tab-dimensions",
                drawsWc = "#tab-drawings",
                docsWc = "#tab-documents",
                vidsWc = "#tab-video",
                specsWc = "#tab-specs";

            //console.log(`id: ${id}`);


// Runs animate and active tabs based on value of clicked tab
// TODO: Refactor and simplify

            if ( id === overview ) {

              myAnimate(overview);
              activeTab(viewsWc);

            } else if ( id === dimensions ) {

              myAnimate(dimensions);
              activeTab(dimsWc);

            } else if ( id === drawings ) {

              myAnimate(drawings);
              activeTab(drawsWc);

            } else if ( id === documents ) {

              myAnimate( documents );
              activeTab( docsWc );

            } else if ( id === video ) {

              myAnimate( video );
              activeTab( vidsWc );

            } else if ( id === specs ) {

              myAnimate( specs );
              activeTab( specsWc );
            }
            e.preventDefault();
          });

          function myAnimate( elem ) {

            // myAnimate moves page up after brief delay. Tab classes are assigned based on focus.

            let offset = $( elem ).offset();

            $( 'body, html' ).delay(300).animate({
              scrollTop: offset.top -100
            }, 1000);
            $( 'li.active' ).removeClass( 'active' );
            $( elem ).addClass( 'active' );
          }

          function activeTab( el ) {

            // activateTab sets visibility of panel section of Woocommerce Tabs section

            $( '.woocommerce-Tabs-panel' ).attr('style', 'display:none;');
            $( el ).attr('style', 'display:block;');
          }
        });


      // END
      },
      finalize: function() {
        // JavaScript to be fired on woocommerce page, after the init JS
        // $('#pa_fire-rating').children('option').each(function() {
        //   $(this).attr( "disabled", 'disabled' );
        // });

      }
    }, // woocommerce

    // About us page, note the change from about-us to about_us.
    'invisible_hinge_product_overview': {
      init: function() {
        // JavaScript to be fired on the invisible hinge page



      } // init function
    }
  }; // end invisible hinge

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  let UTIL = {
    fire: function(func, funcname, args) {
      let fire,
          namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');
      UTIL.fire('woocommerce');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
      UTIL.fire('home', 'finalize');
      UTIL.fire('invisible_hinge_product_overview', 'finalize');
      UTIL.fire('woocommerce', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
